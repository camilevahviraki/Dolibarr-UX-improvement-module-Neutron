<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/dropdown.inc.php/lists.css.php
 * \brief      Dropdown lists: search, bookmarks, column selector.
 *             Overrides htdocs/theme/md/dropdown.inc.php.
 */
?>

/* ---------- A dropdown is a rounded panel ---------- */
/* !important: md sets the corners, borders and shadows of these panels with !important */
html body :is(.dropdown-menu, div.dropdown-content, .ui-menu) {
	border: 1px solid var(--n-border) !important;
	border-radius: var(--n-radius) !important;
	box-shadow: var(--n-shadow-lg) !important;
}
html body :is(.dropdown-menu, div.dropdown-content) { background: var(--n-surface); color: var(--n-ink); }
html body :is(.dropdown-menu, .dropdown-content) a { border-radius: 6px; }
html body :is(.dropdown-menu, .dropdown-content) a:hover { background: var(--n-accent-soft) !important; }

/* ---------- Column selector (list icon in the header of a list) ---------- */
html body .multiselectcheckboxselectedfields ul.selectedfieldsleft {
	/* !important: md styles this list with !important */
	margin-top: 6px; padding: 8px !important;
	background: var(--n-surface) !important;
	border: 1px solid var(--n-border) !important;
	border-radius: var(--n-radius) !important;
	box-shadow: var(--n-shadow-lg) !important;
	z-index: 1000;
	font-weight: 400; letter-spacing: 0; text-transform: none;
}
html body .multiselectcheckboxselectedfields ul.selectedfieldsleft li {
	display: flex; align-items: center; gap: 8px;
	padding: 5px 8px; border-radius: 6px; list-style: none;
	color: var(--n-ink); font-size: 13px; text-transform: none;
}
html body .multiselectcheckboxselectedfields ul.selectedfieldsleft li:hover { background: var(--n-accent-soft); }
html body .multiselectcheckboxselectedfields ul.selectedfieldsleft li label { flex: 1; margin: 0; padding: 0 !important; cursor: pointer; text-transform: none; }
/* its search field stays on top, opaque, so that the choices never show through it */
html body .multiselectcheckboxselectedfields ul.selectedfieldsleft li.liinputsearch,
html body .multiselectcheckboxselectedfields ul.selectedfieldsleft li.liinputsearch:hover {
	position: sticky; top: -8px; z-index: 2;
	margin: -8px -8px 4px; padding: 8px !important;
	background: var(--n-surface) !important;
	border-bottom: 1px solid var(--n-border);
	border-radius: var(--n-radius) var(--n-radius) 0 0;
}
