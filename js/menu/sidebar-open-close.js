/**
 * \file       htdocs/custom/neutron/js/menu/sidebar-open-close.js
 * \brief      Left menu: icon bar, hover preview and saved state on computers, drawer below.
 */
(function () {
	'use strict';

	var N = window.Neutron;
	if (!N || !N.active) {
		return;
	}

	var OPEN = 'neutron_menu_open';

	function applyState() {
		if (!N.desktop.matches) {
			document.body.classList.add(N.CLOSED);
		} else if (!/\/website\//.test(window.location.pathname)) {
			document.body.classList.toggle(N.CLOSED, N.local.get(OPEN) === 'false');
		}
	}

	// In <head>: applied as soon as <body> exists, so that the menu does not flash
	function restoreState() {
		new MutationObserver(function (changes, observer) {
			if (document.body) {
				applyState();
				observer.disconnect();
			}
		}).observe(document.documentElement, { childList: true });
	}

	function setupDrawer(menu) {
		var body = document.body;

		function close() {
			body.classList.add(N.CLOSED);
		}

		document.addEventListener('click', function (ev) {
			if (!N.desktop.matches && !body.classList.contains(N.CLOSED) &&
					!menu.contains(ev.target) && !ev.target.closest('li.menuhider, .select2-container')) {
				close();
			}
		});

		document.addEventListener('keydown', function (ev) {
			if (ev.key === 'Escape' && !N.desktop.matches) {
				close();
			}
		});

		N.desktop.addEventListener('change', function () {
			body.classList.remove(N.PEEK);
			applyState();
		});
	}

	function createTip(content, left, anchor) {
		var box = anchor.getBoundingClientRect();
		var tip = document.createElement('div');
		tip.className = 'n-rail-tip';
		tip.setAttribute('role', 'tooltip');
		tip.textContent = content;
		tip.style.left = left + 'px';
		tip.style.top = (box.top + box.height / 2) + 'px';
		document.body.appendChild(tip);
		return tip;
	}

	function setupToggle(toggle, menu) {
		var body = document.body;
		var timer = null;
		var held = false;
		var restore = null;

		function stay() {
			window.clearTimeout(timer);
		}

		function highlight(title, link) {
			var inside = false;
			for (var n = title.nextElementSibling; n && !n.classList.contains('menu_titre'); n = n.nextElementSibling) {
				inside = inside || n.classList.contains('n-current');
			}
			if (inside || link.classList.contains('n-current')) {
				return;
			}
			var marked = Array.prototype.map.call(menu.querySelectorAll('.vmenu.n-current, .vsmenu.n-current, .vmenu.n-current-parent'), function (el) {
				var name = el.classList.contains('n-current') ? 'n-current' : 'n-current-parent';
				el.classList.remove(name);
				return [el, name];
			});
			link.classList.add('n-current');
			restore = function () {
				link.classList.remove('n-current');
				marked.forEach(function (m) { m[0].classList.add(m[1]); });
			};
		}

		function endPreview() {
			stay();
			if (restore) {
				restore();
				restore = null;
			}
			held = false;
			body.classList.remove(N.PEEK);
		}

		function leave() {
			stay();
			if (held || !body.classList.contains(N.PEEK)) {
				return;
			}
			timer = window.setTimeout(function () {
				if (document.querySelector('.select2-container--open')) {
					leave();
				} else {
					endPreview();
				}
			}, 300);
		}

		toggle.addEventListener('mouseenter', function () {
			stay();
			if (N.desktop.matches && body.classList.contains(N.CLOSED)) {
				body.classList.add(N.PEEK);
			}
		});
		toggle.addEventListener('mouseleave', leave);
		menu.addEventListener('mouseenter', stay);
		menu.addEventListener('mouseleave', leave);

		var head = document.createElement('div');
		head.className = 'n-peek-head';
		toggle.closest('#id-top').appendChild(head);
		head.addEventListener('mouseenter', stay);
		head.addEventListener('mouseleave', leave);

		menu.addEventListener('click', function (ev) {
			var link = ev.target.closest('.menu_titre.n-has-children .vmenu');
			var bar = body.classList.contains(N.CLOSED) && !body.classList.contains(N.PEEK);
			if (!link || !bar || !N.desktop.matches || ev.ctrlKey || ev.metaKey || ev.shiftKey) {
				return;
			}
			ev.preventDefault();
			var title = link.closest('.menu_titre');
			stay();
			held = true;
			body.classList.add(N.PEEK);
			highlight(title, link);
			Array.prototype.forEach.call(menu.querySelectorAll('.menu_titre.n-has-children'), function (section) {
				section.dispatchEvent(new CustomEvent('neutron:show', { detail: title }));
			});
			title.scrollIntoView({ block: 'nearest' });
		});

		document.addEventListener('click', function (ev) {
			if (held && !menu.contains(ev.target) && !ev.target.closest('li.menuhider, .n-peek-head, .select2-container')) {
				endPreview();
			}
		});

		document.addEventListener('keydown', function (ev) {
			if (ev.key === 'Escape' && body.classList.contains(N.PEEK)) {
				endPreview();
			}
		});

		// Capture phase: before the Dolibarr handler
		document.addEventListener('click', function (ev) {
			if (!ev.target.closest('li.menuhider')) {
				return;
			}
			ev.preventDefault();
			endPreview();
			if (N.desktop.matches) {
				window.setTimeout(function () {
					N.local.set(OPEN, body.classList.contains(N.CLOSED) ? 'false' : 'true');
				}, 0);
			}
		}, true);
	}

	function setupBarTooltips(menu) {
		var tip = null;
		var owner = null;

		function hide() {
			if (tip) {
				tip.remove();
				tip = owner = null;
			}
		}

		function show(ev) {
			var link = ev.target.closest('.menu_titre .vmenu');
			var bar = document.body.classList.contains(N.CLOSED) && !document.body.classList.contains(N.PEEK);
			if (!link || link === owner || !bar || !N.desktop.matches) {
				return;
			}
			hide();
			owner = link;
			tip = createTip(N.text(link), menu.getBoundingClientRect().right + 8, link);
		}

		function leave(ev) {
			if (owner && !owner.contains(ev.relatedTarget)) {
				hide();
			}
		}

		menu.addEventListener('mouseover', show);
		menu.addEventListener('mouseout', leave);
		menu.addEventListener('focusin', show);
		menu.addEventListener('focusout', leave);
		menu.addEventListener('scroll', hide);
		document.addEventListener('click', hide, true);
	}

	function setupToggleTooltip(toggle) {
		var tip = null;

		function hide() {
			if (tip) {
				tip.remove();
				tip = null;
			}
		}

		function show() {
			hide();
			if (N.desktop.matches) {
				var closed = document.body.classList.contains(N.CLOSED);
				var text = closed ?
					N.t('menuClosedTip', 'Menu hidden: hover to preview, click to keep it open') :
					N.t('menuOpenTip', 'Click to reduce the menu to icons');
				tip = createTip(text, toggle.getBoundingClientRect().right + 8, toggle);
			}
		}

		toggle.addEventListener('mouseenter', show);
		toggle.addEventListener('mouseleave', hide);
		toggle.addEventListener('focusin', show);
		toggle.addEventListener('focusout', hide);
		toggle.addEventListener('click', function () {
			window.setTimeout(show, 0);
		});
	}

	restoreState();
	N.ready(function () {
		var toggle = document.querySelector('li.menuhider');
		var menu = document.querySelector('.side-nav');
		if (toggle && menu) {
			setupDrawer(menu);
			setupToggle(toggle, menu);
			setupBarTooltips(menu);
			setupToggleTooltip(toggle);
		}
	});
})();
