/**
 * \file       htdocs/custom/neutron/js/menu/highlight-current-page.js
 * \brief      Highlight of the current page in the left menu.
 *
 * The page reloads on every click, so the last clicked entry is kept in sessionStorage.
 */
(function () {
	'use strict';

	var N = window.Neutron;
	if (!N || !N.active) {
		return;
	}

	var KEY = 'neutron_menu_entry'; // {"id": "<section>|<entry>", "href": "..."} of the current entry
	var CLICKED = 'neutron_menu_clicked'; // set by a click, read once by the next page
	var IGNORED = ['token', 'theme', 'optioncss', 'page', 'sortfield', 'sortorder'];

	function sameOrigin(href) {
		try {
			var u = new URL(href, window.location.href);
			return u.origin === window.location.origin ? u : null;
		} catch (e) {
			return null;
		}
	}

	// Score of a link against the current page. 0 = not this page.
	// Same file is required, and every parameter of the link must match the current address
	// (menu parameters may be absent or empty in the current address). More matching parameters = better.
	function score(a) {
		var u = sameOrigin(a.getAttribute('href'));
		var here = new URL(window.location.href);
		if (!u || u.pathname !== here.pathname) {
			return 0;
		}
		var s = 1;
		var ok = true;
		u.searchParams.forEach(function (v, k) {
			if (!ok || IGNORED.indexOf(k) !== -1) {
				return;
			}
			var cur = here.searchParams.get(k);
			if (cur === v) {
				s += 2;
			} else if (!((k === 'mainmenu' || k === 'leftmenu') && !cur)) {
				ok = false;
			}
		});
		return ok ? s : 0;
	}

	// The menu is flat: the section of an entry is the closest previous section name
	function sectionOf(node) {
		while (node && !node.classList.contains('menu_titre')) {
			node = node.previousElementSibling;
		}
		return node;
	}

	// Name of an entry: its section and its own text. Several entries can share one address, not one name.
	function entryId(a) {
		var node = a.closest('.menu_titre, .menu_contenu');
		var isTitle = node && node.classList.contains('menu_titre');
		var section = sectionOf(node);
		return (section ? N.text(section) : '') + '|' + (isTitle ? '' : N.text(a));
	}

	function save(a) {
		N.session.set(KEY, JSON.stringify({ id: entryId(a), href: a.getAttribute('href') }));
	}

	function savedEntry(links) {
		var saved = null;
		try { saved = JSON.parse(N.session.get(KEY)); } catch (e) { /* ignore */ }
		if (!saved) {
			return null;
		}
		var same = links.filter(function (a) { return entryId(a) === saved.id; });
		return same.filter(function (a) { return a.getAttribute('href') === saved.href; })[0] || same[0] || null;
	}

	function highlight(a) {
		a.classList.add('n-current');
		var item = a.closest('.menu_contenu');
		if (item) {
			item.classList.add('n-current');
			var section = sectionOf(item);
			var name = section && section.querySelector('a.vmenu, span.vmenu');
			if (name) {
				name.classList.add('n-current-parent');
			}
		}
	}

	var clicked = !!N.session.get(CLICKED);
	N.session.remove(CLICKED);

	// Marks the one entry of the current page. The entry just clicked wins, even if its page redirects
	// elsewhere. Without a click: the best match of the address (the last entry when it is as good),
	// and failing that the last entry.
	N.markCurrent = function () {
		Array.prototype.forEach.call(document.querySelectorAll('div.vmenu .n-current, div.vmenu .n-current-parent'), function (el) {
			el.classList.remove('n-current', 'n-current-parent');
		});
		// Entries first: when an entry and a section name match the same page, the entry wins
		var links = Array.prototype.slice.call(document.querySelectorAll('div.vmenu a.vsmenu[href]'))
			.concat(Array.prototype.slice.call(document.querySelectorAll(N.TITLES + ' a.vmenu[href]')));
		var last = savedEntry(links);
		var best = null;
		var bestScore = 0;
		links.forEach(function (a) {
			var s = score(a);
			if (s > bestScore) {
				best = a;
				bestScore = s;
			}
		});
		if (last && (clicked || !best || score(last) >= bestScore)) {
			best = last;
		}
		if (best) {
			highlight(best);
			save(best);
		}
	};

	N.ready(function () {
		N.markCurrent();

		// Remember the clicked entry before the page reloads (also for the entries added later)
		document.addEventListener('click', function (ev) {
			var a = ev.target.closest('div.vmenu a.vsmenu[href], ' + N.TITLES + ' a.vmenu[href]');
			// Not a click handled here (icon bar), nor a new tab asked with a modifier key
			if (a && !ev.defaultPrevented && !ev.ctrlKey && !ev.metaKey && !ev.shiftKey) {
				save(a);
				N.session.set(CLICKED, '1');
			}
		});
	});
})();
