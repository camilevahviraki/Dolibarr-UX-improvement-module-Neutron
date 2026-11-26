<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/style.css.php/sidebar.css.php
 * \brief      Left menu: panel, entries, current page; on computers, full height layout, icon bar and hover preview.
 *             Tablets and phones: see sidebar-small-screens.css.php.
 *             Overrides htdocs/theme/md/style.css.php.
 *
 * Classes prefixed "n-" are added by the scripts of js/menu (current page, folding, hover preview).
 * The styles work without them: only those behaviours are then missing.
 */
?>

/* ---------- Panel ---------- */
html body .side-nav {
	/* variables read by the menu rules of md */
	--colorbackvmenu1: var(--n-side-bg);
	--colortextbackvmenu: var(--n-side-text);
	width: var(--n-side-w);
	background: var(--n-side-bg);
	border-right: 1px solid var(--n-side-line);
	box-shadow: none;
	scrollbar-color: var(--n-side-line) var(--n-side-bg);
	scrollbar-width: thin;
}
/* !important: the content of md is wider than the panel */
html body .side-nav #id-left { display: block !important; box-sizing: border-box; width: 100% !important; min-width: 0 !important; max-width: 100% !important; padding-top: 14px; background: transparent; }
html body .side-nav div.vmenu { box-sizing: border-box; width: 100%; padding: 0 10px; background: transparent; }
html body .side-nav div.vmenu :is(div.blockvmenu, div.blockvmenupair, div.blockvmenuimpair, div.blockvmenubookmarks, div.blockvmenuend, div.blockvmenusearch) {
	box-sizing: border-box; width: auto; margin: 0 0 8px; padding: 0;
	background: transparent; border: 0; box-shadow: none;
}
/* md gives the menu its own fonts: use the one of the theme, icons excepted */
html body .side-nav, html body .side-nav :is(div, a, span):not([class*="fa-"]):not(.fa, .fas, .far, .fab) { font-family: var(--n-font); }
/* md separates the entries with line breaks: spacing comes from padding */
html body .side-nav div.vmenu :is(.menu_titre, .menu_contenu) > br { display: none; }

/* ---------- Section names ---------- */
html body .side-nav div.vmenu div.menu_titre { margin-top: 14px; padding: 0; text-transform: none; }
html body .side-nav div.vmenu div.menu_titre :is(a.vmenu, span.vmenu) {
	display: flex; align-items: center; gap: 8px;
	padding: 8px 10px; margin: 0;
	border-radius: var(--n-radius-sm);
	/* !important: md colors the menu links with !important */
	color: var(--n-side-strong) !important;
	background: transparent;
	font-size: 13px; font-weight: 600; line-height: 1.35; text-transform: none;
	white-space: normal; overflow-wrap: anywhere;
}
html body .side-nav div.vmenu div.menu_titre a.vmenu:hover { background: var(--n-side-hover); }

/* ---------- Entries, indented under their section with a guide line ---------- */
/* md indents deeper entries with spaces before the link, which take a line of their own: no size for that text */
html body .side-nav div.vmenu div.menu_contenu { margin: 0 0 0 18px; padding: 0; border-left: 2px solid var(--n-side-line); font-size: 0; line-height: 0; }
html body .side-nav div.vmenu div.menu_contenu :is(a.vsmenu, span.vsmenu) {
	display: block;
	padding: 6px 10px 6px 14px; margin: 0;
	border-radius: 0 var(--n-radius-sm) var(--n-radius-sm) 0;
	color: var(--n-side-strong) !important;
	font-size: 13.5px; font-weight: 500; line-height: 1.35;
	white-space: normal; overflow-wrap: anywhere;
}
html body .side-nav div.vmenu div.menu_contenu a.vsmenu:hover { background: var(--n-side-hover); }
html body .side-nav div.vmenu div.menu_contenu:hover { border-left-color: var(--n-active); }

/* Icons of the entries, except warnings which keep their color */
html body .side-nav div.vmenu :is(.menu_titre, .menu_contenu) [class*="fa-"]:not(.fa-exclamation-triangle) { color: var(--n-side-icon) !important; }
html body .side-nav :is(.help, .help a, .blockvmenuhelp, .blockvmenuhelp a) { color: var(--n-side-muted); }

/* ---------- Current page ---------- */
html body .side-nav div.vmenu div.menu_contenu.n-current { margin-left: 17px; border-left: 3px solid var(--n-active); }
html body .side-nav div.vmenu div.menu_contenu a.vsmenu.n-current,
html body .side-nav div.vmenu div.menu_contenu a.vsmenu.vmenusel,
html body .side-nav div.vmenu div.menu_titre a.vmenu.n-current {
	background: var(--n-active);
	color: var(--n-active-text) !important;
}
html body .side-nav div.vmenu div.menu_titre a.vmenu.n-current [class*="fa-"] { color: var(--n-active-text) !important; }

/* ---------- Folding of the sections (chevrons) ---------- */
html body .side-nav div.vmenu div.menu_titre.n-has-children { position: relative; }
html body .side-nav div.vmenu div.menu_titre.n-has-children :is(a.vmenu, span.vmenu) { padding-right: 34px; }
html body .side-nav div.vmenu button.n-chev {
	position: absolute; right: 6px; top: 50%; transform: translateY(-50%);
	display: inline-flex; align-items: center; justify-content: center;
	width: 26px; height: 26px; padding: 0;
	border: 0; border-radius: 6px;
	background: transparent; color: var(--n-side-text); cursor: pointer;
}
html body .side-nav div.vmenu button.n-chev:hover { background: var(--n-side-hover); color: var(--n-side-strong); }
html body .side-nav div.vmenu button.n-chev .fas { font-size: 11px; transition: transform .18s ease; }
html body .side-nav div.vmenu div.menu_titre.n-collapsed button.n-chev .fas { transform: rotate(-90deg); }
html body .side-nav div.vmenu .n-group-hidden { display: none !important; }

/* ---------- Search and bookmark lists ---------- */
html body .side-nav :is(.blockvmenusearch, .blockvmenubookmarks) :is(.select2-container, .select2-selection) { box-sizing: border-box; width: 100% !important; max-width: 100%; }
html body .side-nav .select2-container--default .select2-selection--single {
	position: relative; display: flex; align-items: center; height: 38px !important;
	background: var(--n-side-card); border: 1px solid var(--n-side-card); border-radius: var(--n-radius-sm);
}
html body .side-nav .select2-selection .select2-selection__rendered { flex: 1; min-width: 0; height: 36px !important; line-height: 36px !important; padding: 0 28px 0 12px; }
html body .side-nav .select2-selection .select2-selection__arrow { position: absolute; top: 0; right: 6px; height: 36px !important; }
html body .side-nav .select2-selection :is(.select2-selection__rendered, .select2-selection__placeholder, .fa) { color: var(--n-side-text) !important; }

/* the search fields that Dolibarr puts in the menu of phones */
/* !important: forms.css.php and md border the fields with !important */
html body .side-nav div.blockvmenusearch input[type=text] {
	box-sizing: border-box; width: 100%; max-width: 100%;
	background: var(--n-side-card); color: var(--n-side-strong); border-color: var(--n-side-line) !important;
}

/* ---------- Toggle: a panel icon ---------- */
html body .menuhider span.fa-bars::before {
	content: ""; display: inline-block; width: 20px; height: 20px; vertical-align: middle;
	background-color: currentColor;
	-webkit-mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23000' stroke-width='1.8' stroke-linecap='round'%3E%3Crect x='3' y='4' width='18' height='16' rx='3'/%3E%3Cpath d='M9.5 4v16'/%3E%3C/svg%3E") center / contain no-repeat;
	mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23000' stroke-width='1.8' stroke-linecap='round'%3E%3Crect x='3' y='4' width='18' height='16' rx='3'/%3E%3Cpath d='M9.5 4v16'/%3E%3C/svg%3E") center / contain no-repeat;
}
<?php
// The layout below depends on the width only, so that a narrow window and a phone look the same. Not for print.
if (GETPOST('optioncss', 'aZ09') != 'print') {
	?>
.n-peek-head { display: none; }

@media screen and (min-width: 1025px) {
	/* ---------- Full height column: the head (behind the toggle) and the scrolling menu ---------- */
	html body:has(.side-nav)::before {
		content: ""; position: fixed; top: 0; left: 0; z-index: 90;
		box-sizing: border-box; width: var(--n-side-w); height: var(--n-top-h);
		background: var(--n-side-bg); border-right: 1px solid var(--n-side-line);
	}
	/* position and !important: Dolibarr lays phones and large tablets out differently */
	html body .side-nav { position: fixed; top: var(--n-top-h); bottom: 0; overflow-x: hidden; overflow-y: auto; transition: width .24s ease; transition-delay: 0s; }
	html body .side-nav #id-left { top: auto !important; }
	html body:has(.side-nav) #id-top.side-nav-vert { margin-left: var(--n-side-w); }
	html body:has(.side-nav) #id-right { padding-left: calc(var(--n-side-w) + 23px) !important; }

	html body:has(.side-nav) #id-top li#mainmenutd_menu {
		position: fixed; top: 0; left: 0; z-index: 2;
		display: flex; align-items: center; justify-content: center;
		width: var(--n-rail-w); height: var(--n-top-h);
		background: transparent; box-shadow: none; opacity: 1;
	}
	html body:has(.side-nav) #id-top li#mainmenutd_menu :is(a, span) { color: var(--n-side-icon) !important; }
	html body:has(.side-nav) #id-top li#mainmenutd_menu:hover :is(a, span) { color: var(--n-side-strong) !important; }

	/* ---------- Closed: a narrow column ---------- */
	html body.sidebar-collapse:has(.side-nav)::before { width: var(--n-rail-w); }
	html body.sidebar-collapse:has(.side-nav) #id-top.side-nav-vert { margin-left: var(--n-rail-w); }
	html body.sidebar-collapse:has(.side-nav) #id-right { padding-left: calc(var(--n-rail-w) + 9px) !important; }
	html body.sidebar-collapse .side-nav { display: block; width: var(--n-rail-w); }

	/* ---------- Closed and not previewed: one icon per section ---------- */
	html body.sidebar-collapse:not(.n-menu-peek) .side-nav div.vmenu { padding: 0 8px; }
	html body.sidebar-collapse:not(.n-menu-peek) .side-nav div.vmenu :is(.menu_contenu, button.n-chev, .blockvmenubookmarks),
	html body.sidebar-collapse:not(.n-menu-peek) .side-nav :is(#blockvmenuhelp, .blockvmenuhelp) { display: none; }
	html body.sidebar-collapse:not(.n-menu-peek) .side-nav div.vmenu div.menu_titre { margin: 4px 0; }
	html body.sidebar-collapse:not(.n-menu-peek) .side-nav div.vmenu div.menu_titre :is(a.vmenu, span.vmenu) {
		justify-content: center; gap: 0; height: 40px; padding: 0; overflow: hidden; font-size: 0;
	}
	html body.sidebar-collapse:not(.n-menu-peek) .side-nav div.vmenu div.menu_titre .vmenu [class*="fa-"] { width: auto; margin: 0; padding: 0; font-size: 17px; }
	html body.sidebar-collapse:not(.n-menu-peek) .side-nav div.vmenu div.menu_titre .vmenu img { width: 18px; margin: 0; }
	/* default icon for a section that has none */
	html body.sidebar-collapse:not(.n-menu-peek) .side-nav div.vmenu div.menu_titre .vmenu:not(:has([class*="fa-"], img))::before {
		content: "\f07b"; font: 900 17px "Font Awesome 5 Free";
	}
	/* the section of the current page: its entry is not visible here */
	html body.sidebar-collapse:not(.n-menu-peek) .side-nav div.vmenu div.menu_titre .vmenu.n-current-parent { background: var(--n-active); }
	html body.sidebar-collapse:not(.n-menu-peek) .side-nav div.vmenu div.menu_titre .vmenu.n-current-parent [class*="fa-"] { color: var(--n-active-text) !important; }
	/* search box reduced to its magnifier */
	html body.sidebar-collapse:not(.n-menu-peek) .side-nav .blockvmenusearch :is(.select2-container, .select2-selection) { width: 40px !important; }
	html body.sidebar-collapse:not(.n-menu-peek) .side-nav .blockvmenusearch .select2-selection__rendered { display: flex; align-items: center; justify-content: center; padding: 0; }
	html body.sidebar-collapse:not(.n-menu-peek) .side-nav .blockvmenusearch .select2-selection__arrow { display: none; }
	html body.sidebar-collapse:not(.n-menu-peek) .side-nav .blockvmenusearch .select2-selection__placeholder { font-size: 0; }
	html body.sidebar-collapse:not(.n-menu-peek) .side-nav .blockvmenusearch .select2-selection__placeholder .fa { margin: 0; padding: 0; font-size: 16px; }

	/* ---------- Hover preview: the menu grows over the page and the top bar, the content does not move ---------- */
	html body.sidebar-collapse.n-menu-peek .side-nav {
		width: var(--n-side-w); z-index: 1001;
		box-shadow: var(--n-shadow-lg); clip-path: inset(0 -32px 0 0);
	}
	html body.sidebar-collapse.n-menu-peek .side-nav #id-left { width: var(--n-side-w) !important; max-width: none !important; }
	/* head of the preview, over the left part of the top bar (element added by the script) */
	html body #id-top .n-peek-head {
		display: block; position: fixed; top: 0; left: 0; z-index: 1; visibility: hidden;
		width: var(--n-rail-w); height: var(--n-top-h); background: var(--n-side-bg);
		transition: width .24s ease, visibility 0s .24s;
	}
	html body.sidebar-collapse.n-menu-peek #id-top .n-peek-head {
		visibility: visible; width: var(--n-side-w); transition: width .24s ease;
		box-shadow: var(--n-shadow-lg); clip-path: inset(0 -32px 0 0);
	}
	/* the texts slide in, one section after the other */
	html body.sidebar-collapse.n-menu-peek .side-nav div.vmenu :is(.menu_titre, .menu_contenu) { animation: n-menu-text .26s ease .08s both; }
	html body.sidebar-collapse.n-menu-peek .side-nav div.vmenu > :nth-child(2) :is(.menu_titre, .menu_contenu) { animation-delay: .12s; }
	html body.sidebar-collapse.n-menu-peek .side-nav div.vmenu > :nth-child(3) :is(.menu_titre, .menu_contenu) { animation-delay: .16s; }
	html body.sidebar-collapse.n-menu-peek .side-nav div.vmenu > :nth-child(n+4) :is(.menu_titre, .menu_contenu) { animation-delay: .2s; }

	/* ---------- Name shown beside an icon (element added by the script) ---------- */
	.n-rail-tip {
		position: fixed; z-index: 1100; transform: translateY(-50%); pointer-events: none;
		padding: 6px 10px; border-radius: 6px; white-space: nowrap;
		background: var(--n-side-card); color: var(--n-side-strong); box-shadow: var(--n-shadow-lg);
		font-size: 12.5px; font-weight: 500;
	}
}
@keyframes n-menu-text {
	from { opacity: 0; transform: translateX(-12px); }
	to { opacity: 1; transform: none; }
}
@media (prefers-reduced-motion: reduce) {
	html body .side-nav, html body #id-top .n-peek-head { transition: none !important; }
	html body .side-nav div.vmenu :is(.menu_titre, .menu_contenu) { animation: none !important; }
}
	<?php
}
