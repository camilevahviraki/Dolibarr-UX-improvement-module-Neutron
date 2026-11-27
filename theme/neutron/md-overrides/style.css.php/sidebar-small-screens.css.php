<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/style.css.php/sidebar-small-screens.css.php
 * \brief      Left menu drawer of tablets and phones.
 *             Overrides htdocs/theme/md/style.css.php.
 */
?>

@media screen and (max-width: 1024px) {
	html body #id-container { width: 100%; }
	html body #id-right { padding-left: 0 !important; margin-left: 0; }

	/* ---------- Drawer ---------- */
	html body .side-nav, html body.sidebar-collapse .side-nav {
		display: block; position: fixed; top: 0; bottom: 0; left: 0; z-index: 1100;
		width: min(var(--n-side-w), 85vw); margin: 0;
		overflow-x: hidden !important; overflow-y: auto !important; overscroll-behavior: contain;
		transform: translateX(-100%); visibility: hidden;
		transition: transform .24s ease, visibility 0s .24s; transition-delay: 0s, .24s;
	}
	html body:not(.sidebar-collapse) .side-nav {
		transform: none; visibility: visible; box-shadow: var(--n-shadow-lg);
		transition-delay: 0s, 0s;
	}
	html body .side-nav #id-left { position: static; top: auto !important; border: 0; padding-bottom: 24px; }
	html body .side-nav div.vmenu div.menu_titre :is(a.vmenu, span.vmenu) { padding-top: 11px; padding-bottom: 11px; }
	html body .side-nav div.vmenu div.menu_contenu :is(a.vsmenu, span.vsmenu) { padding-top: 10px; padding-bottom: 10px; }
	html body .side-nav div.vmenu button.n-chev { width: 40px; height: 40px; right: 2px; }

	/* ---------- Veil ---------- */
	html body:not(.sidebar-collapse):has(.side-nav) { overflow: hidden; }
	html body:not(.sidebar-collapse):has(.side-nav)::after {
		content: ""; position: fixed; inset: 0; z-index: 1099;
		background: rgba(15,23,42,.5);
		cursor: pointer; /* iOS sends no click without it */
	}
	html body:not(.sidebar-collapse) .select2-container--open { z-index: 1101; }
}
@media (prefers-reduced-motion: reduce) {
	html body .side-nav { transition: none !important; }
}
