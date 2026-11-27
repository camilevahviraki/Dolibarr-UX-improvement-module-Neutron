/**
 * \file       htdocs/custom/neutron/js/tabs/tabs-sheet.js
 * \brief      Tablets and phones: only the current tab, and a button that lists all tabs from the bottom.
 */
(function () {
	'use strict';

	var N = window.Neutron;
	if (!N || !N.active) {
		return;
	}

	var OPEN = 'n-tabs-open';

	function element(tag, className, text) {
		var el = document.createElement(tag);
		el.className = className;
		if (text) {
			el.textContent = text;
		}
		return el;
	}

	// Links of the row, and of the "more" list that Dolibarr builds on phones
	function links(tabs) {
		return Array.prototype.filter.call(tabs.querySelectorAll('.tabsElem a.tab, .popuptab a'), function (a) {
			return !a.classList.contains('moretab') && N.text(a);
		});
	}

	function setup(tabs) {
		var current = tabs.querySelector('.tabsElemActive');
		var all = links(tabs);
		if (!current || all.length < 2) {
			return;
		}
		var title = N.t('tabsTitle', 'Tabs of this record');

		var button = element('button', 'n-tabs-button');
		button.type = 'button';
		button.title = title;
		button.setAttribute('aria-expanded', 'false');
		var icon = element('span', 'n-tabs-icon');
		icon.setAttribute('aria-hidden', 'true');
		button.appendChild(icon);
		button.appendChild(element('span', 'n-tabs-label', N.t('tabs', 'Tabs')));

		var veil = element('div', 'n-tabs-veil');
		var sheet = element('nav', 'n-tabs-sheet');
		sheet.setAttribute('aria-label', title);
		sheet.appendChild(element('div', 'n-tabs-title', title));
		all.forEach(function (a) {
			var item = element('a', current.contains(a) ? 'n-tabs-item n-current' : 'n-tabs-item');
			item.href = a.getAttribute('href');
			Array.prototype.forEach.call(a.childNodes, function (node) {
				item.appendChild(node.cloneNode(true));
			});
			sheet.appendChild(item);
		});

		function show(open) {
			sheet.classList.toggle(OPEN, open);
			veil.classList.toggle(OPEN, open);
			document.body.classList.toggle(OPEN, open);
			button.setAttribute('aria-expanded', open ? 'true' : 'false');
		}

		tabs.addEventListener('click', function (ev) {
			if (!N.desktop.matches && !ev.target.closest('.floatright')) {
				ev.preventDefault();
				show(true);
			}
		});
		veil.addEventListener('click', function () {
			show(false);
		});
		document.addEventListener('keydown', function (ev) {
			if (ev.key === 'Escape') {
				show(false);
			}
		});
		N.desktop.addEventListener('change', function () {
			show(false);
		});

		tabs.appendChild(button);
		document.body.appendChild(veil);
		document.body.appendChild(sheet);
		tabs.classList.add('n-tabs-ready');
	}

	N.ready(function () {
		Array.prototype.forEach.call(document.querySelectorAll('div.tabs'), setup);
	});
})();
