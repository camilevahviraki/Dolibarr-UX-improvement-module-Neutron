/**
 * \file       htdocs/custom/neutron/js/menu/highlight-current-page.js
 * \brief      Highlight of the current page in the left menu.
 */
(function () {
	'use strict';

	var N = window.Neutron;
	if (!N || !N.active) {
		return;
	}

	var KEY = 'neutron_menu_entry'; // {"id": "<section>|<entry>", "href": "..."} of the current entry
	var CLICKED = 'neutron_menu_clicked'; // set by a click, read by the next page
	var IGNORED = ['token', 'theme', 'optioncss', 'page', 'sortfield', 'sortorder'];

	function sameOrigin(href) {
		try {
			var u = new URL(href, window.location.href);
			return u.origin === window.location.origin ? u : null;
		} catch (e) {
			return null;
		}
	}

	// 0 = not this page. Menu parameters may be missing from the address.
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

	function sectionOf(node) {
		while (node && !node.classList.contains('menu_titre')) {
			node = node.previousElementSibling;
		}
		return node;
	}

	// Several entries can share one address
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

	// The clicked entry wins, even if its page redirects elsewhere
	N.markCurrent = function () {
		Array.prototype.forEach.call(document.querySelectorAll('div.vmenu .n-current, div.vmenu .n-current-parent'), function (el) {
			el.classList.remove('n-current', 'n-current-parent');
		});
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

		document.addEventListener('click', function (ev) {
			var a = ev.target.closest('div.vmenu a.vsmenu[href], ' + N.TITLES + ' a.vmenu[href]');
			if (a && !ev.defaultPrevented && !ev.ctrlKey && !ev.metaKey && !ev.shiftKey) {
				save(a);
				N.session.set(CLICKED, '1');
			}
		});
	});
})();
