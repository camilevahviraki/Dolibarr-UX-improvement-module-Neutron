<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/style.css.php/topbar.css.php
 * \brief      Top bar: background, entries, current entry, and the block at its right (help, search, user).
 *             Overrides htdocs/theme/md/style.css.php.
 */
?>

/* ---------- Bar ---------- */
html body #id-top, html body #id-top div#tmenu_tooltip, html body #id-top div.tmenudiv { background: var(--n-bar); }
html body #id-top { box-shadow: var(--n-shadow-bar); }

/* ---------- Entries: icon and small label ---------- */
html body #id-top li.tmenu, html body #id-top li.tmenusel { background: transparent; border-radius: var(--n-radius-sm); }
/* !important: md colors the entries with !important in some states */
html body #id-top div.tmenucenter, html body #id-top a.tmenu, html body #id-top a.tmenusel, html body #id-top .tmenu a {
	color: var(--n-bar-icon) !important;
	font-weight: 500;
}
html body #id-top .tmenulabel, html body #id-top .mainmenuaspan { font-size: 12px; }

/* Pointer over an entry: soft background, bright text, no fading */
html body #id-top li.tmenu:not(.menuhider):hover { background: var(--n-bar-hover); opacity: 1; }
html body #id-top li.tmenu:not(.menuhider):hover :is(a, a span) { color: var(--n-bar-text) !important; }

/* Current entry: primary text and a line under it, no background */
html body #id-top li.tmenusel { box-shadow: inset 0 -2px 0 var(--n-top-active); }
html body #id-top li.tmenusel :is(div.tmenucenter, a, a span) { color: var(--n-top-active-text) !important; }

/* ---------- Block at the right: help, print, search, bookmarks and user, in one row ---------- */
html body #id-top .login_block, html body #id-top .login_block a, html body #id-top #topmenu-login-dropdown a.dropdown-toggle { color: var(--n-bar-text); }

@media screen and (min-width: 769px) {
	/* The bar takes the full width: md keeps its left corner for this block */
	html body #id-top.side-nav-vert { margin-left: 0; margin-right: 0; }

	html body #id-top div.login_block, html body.sidebar-collapse #id-top div.login_block {
		position: fixed; top: 0; right: 0; left: auto;
		display: flex; align-items: center; gap: 4px;
		width: auto; height: var(--n-top-h); padding: 0 8px 0 0;
		background: transparent; border: 0;
	}
	html body #id-top div.login_block_other, html body.sidebar-collapse #id-top div.login_block_other {
		order: 1; display: flex; align-items: center; clear: none;
		margin: 0; padding: 0; max-width: none;
	}
	html body #id-top div.login_block_tools { order: 2; display: flex; align-items: center; padding: 0; }
	html body #id-top div.login_block_user { order: 3; display: flex; align-items: center; clear: none; }
	/* !important: md fixes these at a computed distance from the right, with !important on narrow screens */
	html body #id-top div.login_block_tools > div { position: relative; top: auto; right: auto !important; display: flex; align-items: center; }
	html body #id-top div.login_block_user .login_block_elem_name { width: auto; height: auto; margin: 0; }
	html body #id-top div#topmenu-login-dropdown { position: relative; top: auto; right: auto; height: var(--n-top-h); line-height: calc(var(--n-top-h) - 1px); }
	html body #id-top .login_block_other .login_block_elem { float: none; display: inline-block; }
	html body #id-top div.login_block span.aversion { color: var(--n-bar-icon); font-size: 11px; filter: none; }
	/* !important: md colors these icons with !important */
	html body #id-top div.login_block_other .atoplogin { color: var(--n-bar-icon) !important; }

	/* Room kept for the block so that the entries do not slide under it */
	html body #id-top ul.tmenu { margin-right: 330px; }
}
@media screen and (min-width: 769px) and (max-width: 1500px) {
	html body #id-top div.login_block span.aversion, html body #id-top .atoploginusername { display: none; }
	html body #id-top ul.tmenu { margin-right: 210px; }
}
