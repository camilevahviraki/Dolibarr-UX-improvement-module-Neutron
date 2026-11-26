/**
 * \file       htdocs/custom/neutron/js/menu/shared-menu-helpers.js
 * \brief      Shared by the menu scripts. Loaded on every page, before the others:
 *             Neutron.active is true only with the "neutron" theme, and each script checks it.
 */
(function () {
	'use strict';

	var N = window.Neutron = window.Neutron || {};

	// The style sheets are declared before the module scripts in the page head
	N.active = !!document.querySelector('link[href*="/theme/neutron/style.css.php"]');
	// Under this width the menu is a drawer: same limit as the *-small-screens.css.php files
	N.desktop = window.matchMedia('(min-width: 1025px)');
	N.root = new URL('../../../../', document.currentScript.src).href; // htdocs
	N.CLOSED = 'sidebar-collapse'; // Dolibarr class on <body>
	N.PEEK = 'n-menu-peek';
	N.TITLES = 'div.vmenu div.menu_titre';

	N.ready = function (fn) {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', fn);
		} else {
			fn();
		}
	};

	N.text = function (el) {
		return el.textContent.replace(/\s+/g, ' ').trim();
	};

	// Storage can be blocked by the browser: the menu then works without memory
	function storage(name) {
		return {
			get: function (key) {
				try { return window[name].getItem(key); } catch (e) { return null; }
			},
			set: function (key, value) {
				try { window[name].setItem(key, value); } catch (e) { /* ignore */ }
			},
			remove: function (key) {
				try { window[name].removeItem(key); } catch (e) { /* ignore */ }
			}
		};
	}
	N.local = storage('localStorage');
	N.session = storage('sessionStorage');
})();
