<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/style.css.php/modules-sheet.css.php
 * \brief      Modules sheet of tablets and phones.
 *             Overrides htdocs/theme/md/style.css.php.
 */
?>

.n-modules-button, .n-module-name { display: none; }

@media screen and (max-width: 1024px) {
	/* ---------- Top bar ---------- */
	html body.n-modules-ready #id-top .n-module-name {
		display: block; position: absolute; top: 0; left: 52px; right: 178px;
		overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
		color: var(--n-bar-text); font-size: 14px; font-weight: 600; line-height: var(--n-top-h);
	}
	html body.n-modules-ready #id-top .n-modules-button {
		display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 3px;
		position: absolute; top: 0; right: 112px;
		width: 60px; height: var(--n-top-h); margin: 0; padding: 0;
		border: 0; background: transparent; color: var(--n-bar-text); font-size: 18px; cursor: pointer;
	}
	html body #id-top .n-modules-label { font-family: var(--n-font); font-size: 11px; font-weight: 500; line-height: 1; }
	html body.n-modules-ready.n-modules-open #id-top .n-modules-button { color: var(--n-active); }

	/* ---------- Sheet ---------- */
	/* "bottom", not a transform: it would also move the menu toggle */
	html body.n-modules-ready #id-top ul.tmenu {
		position: fixed; left: 0; right: 0; bottom: -100%; z-index: 2; visibility: hidden;
		display: grid; grid-template-columns: repeat(auto-fill, minmax(84px, 1fr)); gap: 6px; align-content: start;
		box-sizing: border-box; height: auto; max-height: 70vh; margin: 0; padding: 14px 10px 18px;
		overflow-y: auto; overscroll-behavior: contain;
		background: var(--n-bar); border-radius: 18px 18px 0 0; box-shadow: var(--n-shadow-lg);
		transition: bottom .25s ease, visibility 0s .25s;
	}
	html body.n-modules-ready.n-modules-open #id-top ul.tmenu { bottom: 0; visibility: visible; transition: bottom .25s ease; }
	html body.n-modules-ready #id-top ul.tmenu > li { width: auto; height: auto; min-height: 62px; border-radius: var(--n-radius-sm); }
	html body.n-modules-ready #id-top ul.tmenu > li.tmenusel { background: var(--n-bar-hover); box-shadow: none; }
	html body.n-modules-ready #id-top ul.tmenu .tmenucenter { height: auto; padding: 8px 2px; }
	html body.n-modules-ready #id-top ul.tmenu .tmenulabel, html body.n-modules-ready #id-top ul.tmenu .mainmenuaspan {
		display: block; font-size: 11.5px; line-height: 1.3;
	}
	html body.n-modules-ready #id-top ul.tmenu > li.tmenusel::after { content: none; }
	html body.n-modules-ready #id-top ul.tmenu > li:is(.tmenuend, .menu_end) { display: none; }

	html body.n-modules-ready #id-top ul.tmenu > li.menuhider {
		position: fixed; top: 0; left: 0; visibility: visible;
		width: 48px; height: var(--n-top-h); min-height: 0;
	}

	/* ---------- Veil ---------- */
	html body.n-modules-ready.n-modules-open { overflow: hidden; }
	html body.n-modules-ready.n-modules-open #id-top::after {
		content: ""; position: fixed; inset: 0; z-index: 1;
		background: rgba(15,23,42,.5);
		cursor: pointer; /* iOS sends no click without it */
	}
}
@media (prefers-reduced-motion: reduce) {
	html body.n-modules-ready #id-top ul.tmenu { transition: none !important; }
}
