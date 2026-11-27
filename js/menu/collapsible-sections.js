/**
 * \file       htdocs/custom/neutron/js/menu/collapsible-sections.js
 * \brief      Arrows of the left menu sections and their sub entries.
 */
(function () {
	'use strict';

	var N = window.Neutron;
	if (!N || !N.active) {
		return;
	}

	var GROUPS = 'neutron_menu_groups'; // {"<section name>": true if folded}
	var FULL = 'neutron_menu_full';
	var MENU_URL = new URL('core/get_menudiv.php', N.root).href;

	function getGroups() {
		try { return JSON.parse(N.local.get(GROUPS)) || {}; } catch (e) { return {}; }
	}

	function saveGroup(name, folded) {
		var groups = getGroups();
		groups[name] = folded;
		N.local.set(GROUPS, JSON.stringify(groups));
	}

	function entriesOf(title) {
		var items = [];
		var n = title.nextElementSibling;
		while (n && !n.classList.contains('menu_titre')) {
			items.push(n);
			n = n.nextElementSibling;
		}
		return items;
	}

	function hasEntries(title) {
		return entriesOf(title).some(function (el) { return el.classList.contains('menu_contenu'); });
	}

	function setFolded(title, items, folded) {
		title.classList.toggle('n-collapsed', folded);
		var btn = title.querySelector('.n-chev');
		if (btn) {
			btn.setAttribute('aria-expanded', folded ? 'false' : 'true');
		}
		items.forEach(function (el) {
			el.classList.toggle('n-group-hidden', folded);
		});
	}

	function addArrow(title, foldedByDefault) {
		if (!hasEntries(title)) {
			return;
		}
		var items = entriesOf(title);
		var name = N.text(title);
		var hasCurrent = items.some(function (el) { return el.classList.contains('n-current'); });
		var saved = getGroups()[name];

		var btn = document.createElement('button');
		btn.type = 'button';
		btn.className = 'n-chev';
		btn.setAttribute('aria-label', name);
		btn.innerHTML = '<span class="fas fa-chevron-down" aria-hidden="true"></span>';
		title.appendChild(btn);
		title.classList.add('n-has-children');

		setFolded(title, items, !hasCurrent && (saved === undefined ? foldedByDefault : saved));

		btn.addEventListener('click', function (ev) {
			ev.preventDefault();
			ev.stopPropagation();
			var folded = !title.classList.contains('n-collapsed');
			setFolded(title, items, folded);
			saveGroup(name, folded);
		});

		// From the icon bar: shows that section only, without saving
		title.addEventListener('neutron:show', function (ev) {
			setFolded(title, items, ev.detail !== title);
		});
	}

	function loadFullMenu(done) {
		function parse(html) {
			done(new DOMParser().parseFromString(html, 'text/html'));
		}
		var cached = N.session.get(FULL);
		if (cached) {
			parse(cached);
			return;
		}
		fetch(MENU_URL, { credentials: 'same-origin' }).then(function (r) {
			return r.ok ? r.text() : '';
		}).then(function (html) {
			if (html.indexOf('ulmenu') !== -1) {
				N.session.set(FULL, html);
				parse(html);
			}
		}).catch(function () { /* offline or blocked: the menu stays as sent */ });
	}

	function sectionName(li) {
		var copy = li.cloneNode(true);
		Array.prototype.forEach.call(copy.querySelectorAll('ul'), function (ul) { ul.remove(); });
		return N.text(copy);
	}

	function matchingSections(doc, names) {
		var best = {};
		var bestCount = 0;
		Array.prototype.forEach.call(doc.querySelectorAll('ul.ulmenu > li.lilevel0'), function (main) {
			var sections = {};
			var count = 0;
			Array.prototype.forEach.call(main.querySelectorAll('li.lilevel1'), function (li) {
				var name = sectionName(li);
				sections[name] = li;
				count += names.indexOf(name) !== -1 ? 1 : 0;
			});
			if (count > bestCount) {
				best = sections;
				bestCount = count;
			}
		});
		return best;
	}

	function menuEntry(li) {
		var source = li.querySelector(':scope > a');
		if (!source) {
			return null;
		}
		var item = document.createElement('div');
		item.className = 'menu_contenu';
		var link = document.importNode(source, true);
		// A label without a page is a link to the home page in the full menu
		if (new URL(link.getAttribute('href') || N.root, window.location.href).href === N.root) {
			var label = document.createElement('span');
			while (link.firstChild) {
				label.appendChild(link.firstChild);
			}
			link = label;
		}
		link.className = 'vsmenu';
		Array.prototype.forEach.call(link.querySelectorAll('.fa-does-not-exists'), function (i) { i.remove(); });
		item.appendChild(link);
		return item;
	}

	function addMissingEntries(doc) {
		var titles = Array.prototype.slice.call(document.querySelectorAll(N.TITLES));
		var sections = matchingSections(doc, titles.map(N.text));
		titles.forEach(function (title) {
			var section = sections[N.text(title)];
			if (!section || hasEntries(title)) {
				return;
			}
			var last = title;
			Array.prototype.forEach.call(section.querySelectorAll('ul li'), function (li) {
				var item = menuEntry(li);
				if (item) {
					last.after(item);
					last = item;
				}
			});
			addArrow(title, true);
		});
	}

	function revealCurrent() {
		var node = document.querySelector('div.vmenu .menu_contenu.n-current');
		while (node && !node.classList.contains('menu_titre')) {
			node = node.previousElementSibling;
		}
		if (node) {
			node.dispatchEvent(new CustomEvent('neutron:show', { detail: node }));
		}
		var menu = document.querySelector('.side-nav');
		var current = menu && menu.querySelector('.n-current');
		if (!current) {
			return;
		}
		var box = current.getBoundingClientRect();
		var view = menu.getBoundingClientRect();
		if (box.top < view.top || box.bottom > view.bottom - 60) {
			current.scrollIntoView({ block: 'center' });
		}
	}

	N.ready(function () {
		var titles = Array.prototype.slice.call(document.querySelectorAll(N.TITLES));
		var incomplete = titles.some(function (title) { return !hasEntries(title); });
		titles.forEach(function (title) { addArrow(title, false); });
		revealCurrent();
		if (incomplete) {
			loadFullMenu(function (doc) {
				addMissingEntries(doc);
				N.markCurrent();
				revealCurrent();
			});
		}

		document.addEventListener('click', function (ev) {
			var name = ev.target.closest(N.TITLES + ' a.vmenu[href]');
			if (name && !ev.defaultPrevented) {
				saveGroup(N.text(name.closest('div.menu_titre')), false);
			}
		});
	});
})();
