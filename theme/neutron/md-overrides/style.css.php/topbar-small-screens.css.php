<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/style.css.php/topbar-small-screens.css.php
 * \brief      Top bar of tablets and phones.
 *             Overrides htdocs/theme/md/style.css.php.
 */
?>

@media screen and (max-width: 1024px) {
	html body #id-top { position: sticky; top: 0; z-index: 1005; margin: 0 !important; }
	html body #id-top, html body #id-top div#tmenu_tooltip, html body #id-top div.tmenudiv {
		box-sizing: border-box; width: 100% !important; height: var(--n-top-h) !important; min-height: 0; margin: 0; padding: 0;
	}

	/* ---------- Without the script: one scrolling row ---------- */
	html body #id-top ul.tmenu {
		display: flex; flex-wrap: nowrap; align-items: center; gap: 2px;
		height: var(--n-top-h); margin: 0 96px 0 0; padding: 0;
		overflow-x: auto; overflow-y: hidden; scrollbar-width: none;
	}
	html body #id-top ul.tmenu::-webkit-scrollbar { display: none; }
	html body #id-top ul.tmenu > li { display: block; float: none; flex: 0 0 auto; width: 64px; margin: 0; padding: 0; }
	html body #id-top ul.tmenu .tmenucenter { box-sizing: border-box; width: 100% !important; max-width: 100%; padding: 4px 2px 0; text-align: center; }
	html body #id-top ul.tmenu .tmenulabel, html body #id-top ul.tmenu .mainmenuaspan {
		display: block; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-size: 11px;
	}

	html body #id-top ul.tmenu > li.menuhider {
		position: sticky; left: 0; z-index: 2;
		display: flex !important; align-items: center; justify-content: center;
		width: var(--n-rail-w); height: var(--n-top-h);
		background: var(--n-bar); opacity: 1;
	}

	html body #id-top ul.tmenu > li.menuhider :is(.tmenucenter, a.tmenuimage, div.mainmenu, span.fa-bars) {
		display: flex; align-items: center; justify-content: center;
		position: static !important; width: auto !important; height: 26px !important; min-height: 0; margin: 0 !important; padding: 0 !important;
	}
	html body #id-top ul.tmenu > li.menuhider .tmenulabel, html body #id-top ul.tmenu > li.menuhider .mainmenuaspan { display: none; }

	/* ---------- Block at the right ---------- */
	html body #id-top div.login_block div.login_block_other, html body #id-top .atoploginusername { display: none; }
}
