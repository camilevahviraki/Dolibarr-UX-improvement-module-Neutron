/**
 * \file       htdocs/custom/neutron/js/menu/modules-sheet.js
 * \brief      Tablets and phones: the modules of the top bar open from the bottom of the screen.
 *
 * Adds to the top bar the name of the current module and a button. The button opens the entries of Dolibarr
 * as a grid (styles in modules-sheet.css.php); a tap outside of it, the button, the toggle of the left menu
 * or the Escape key closes it. Without this script, the entries stay in the top bar.
 */
(function () {
	'use strict';

	var N = window.Neutron;
	if (!N || !N.active) {
		return;
	}

	var READY = 'n-modules-ready';
	var OPEN = 'n-modules-open';

	function setup(bar, list) {
		var body = document.body;

		var button = document.createElement('button');
		button.type = 'button';
		button.className = 'n-modules-button';
		button.title = N.t('showModules', 'Show all modules');
		button.setAttribute('aria-expanded', 'false');
		var icon = document.createElement('span');
		icon.className = 'fas fa-th';
		icon.setAttribute('aria-hidden', 'true');
		button.appendChild(icon);
		// A visible title: a touch screen shows no tooltip
		var label = document.createElement('span');
		label.className = 'n-modules-label';
		label.textContent = N.t('modules', 'Modules');
		button.appendChild(label);

		var name = document.createElement('span');
		name.className = 'n-module-name';
		var current = list.querySelector('li.tmenusel .mainmenuaspan');
		name.textContent = current ? N.text(current) : '';

		function show(open) {
			body.classList.toggle(OPEN, open);
			button.setAttribute('aria-expanded', open ? 'true' : 'false');
		}

		button.addEventListener('click', function () {
			var open = !body.classList.contains(OPEN);
			if (open) {
				body.classList.add(N.CLOSED); // one panel at a time
			}
			show(open);
		});

		document.addEventListener('click', function (ev) {
			var inside = list.contains(ev.target) && !ev.target.closest('li.menuhider');
			if (body.classList.contains(OPEN) && !inside && !button.contains(ev.target)) {
				show(false);
			}
		}, true);

		document.addEventListener('keydown', function (ev) {
			if (ev.key === 'Escape') {
				show(false);
			}
		});

		N.desktop.addEventListener('change', function () {
			show(false);
		});

		bar.appendChild(name);
		bar.appendChild(button);
		body.classList.add(READY);
	}

	N.ready(function () {
		var bar = document.querySelector('#id-top');
		var list = bar && bar.querySelector('ul.tmenu');
		if (list) {
			setup(bar, list);
		}
	});
})();
