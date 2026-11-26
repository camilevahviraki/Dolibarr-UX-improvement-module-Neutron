<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/style.css.php/tables.css.php
 * \brief      Lists: panel, headers, rows, totals, row checkboxes, pagination and scrollbars.
 *             Overrides htdocs/theme/md/style.css.php.
 */
?>

/* ---------- A list is a rounded panel ---------- */
html body table.liste, html body table.formdoc,
html body table.noborder:not(.paymenttable, .margintable, .tableforcontact),
html body div.noborder:not(.paymenttable, .margintable, .tableforcontact) {
	background: var(--n-surface);
	border: 1px solid var(--n-border);
	border-radius: var(--n-radius);
	box-shadow: var(--n-shadow);
}
html body :is(table.liste, table.formdoc, table.noborder) { border-collapse: separate; border-spacing: 0; }

/* The panel does not clip (the column selector must overflow it): round the corner cells instead */
html body table.liste > :is(thead, tbody):first-of-type > tr:first-child > :is(th, td):first-child { border-top-left-radius: var(--n-radius); }
html body table.liste > :is(thead, tbody):first-of-type > tr:first-child > :is(th, td):last-child { border-top-right-radius: var(--n-radius); }
html body table.liste > tbody:last-of-type > tr:last-child > td:first-child { border-bottom-left-radius: var(--n-radius); }
html body table.liste > tbody:last-of-type > tr:last-child > td:last-child { border-bottom-right-radius: var(--n-radius); }

/* ---------- Header: dark, bold, not in capitals ---------- */
/* !important: md styles the header cells with !important in several places */
html body :is(table, div) tr.liste_titre > :is(th, td), html body table th.liste_titre, html body table td.liste_titre,
html body tr.liste_titre_sel > th {
	padding: 10px 12px;
	background: var(--n-surface-2) !important;
	border-top: 0 !important;
	border-bottom: 1px solid var(--n-border) !important;
	color: var(--n-ink) !important;
	font-family: var(--n-font); font-size: 13px; font-weight: 600; letter-spacing: 0; text-transform: none;
}
html body tr.liste_titre a, html body th.liste_titre a { color: var(--n-ink) !important; font-family: var(--n-font); font-weight: 600 !important; }
/* filters above a list: md draws a thick dark line over them */
html body div.liste_titre.liste_titre_bydiv {
	border-top: 1px solid var(--n-border) !important;
	border-radius: var(--n-radius) var(--n-radius) 0 0;
}
/* sorted column */
html body th.liste_titre_sel, html body th.liste_titre_sel a { font-weight: 700 !important; }
/* row of the search fields */
html body tr.liste_titre_filter > :is(td, th) { background: var(--n-surface) !important; }
html body table.dataTable thead th { background: var(--n-surface-2); border-bottom: 1px solid var(--n-border); }

/* ---------- Rows ---------- */
html body tr:is(.oddeven, .even, .odd, .pair, .impair) > :is(td, th) {
	padding-top: 11px; padding-bottom: 11px;
	background: var(--n-surface);
	border-bottom: 1px solid var(--n-surface-3);
}
html body tr.oddeven:hover > td { background: var(--n-surface-2); }
html body tr.oddeven:hover > td:first-child { box-shadow: inset 2px 0 0 var(--n-accent); }
html body :is(td.right, td.nowrap, .amount, .nowraponall) { font-variant-numeric: tabular-nums; }

/* totals and group rows */
html body tr.liste_total > :is(td, th), html body tr.liste_titre_sel > td { background: var(--n-surface-2) !important; border-top: 1px solid var(--n-border); font-weight: 600; }
html body tr.trforbreak > :is(td, th) { background: var(--n-accent-soft) !important; color: var(--n-accent-strong); }

/* ---------- Row checkboxes: in line with the "select all" box of the header ---------- */
/* The column is on the left or on the right depending on the list and on the settings: match it by content */
html body table.liste th.liste_titre.maxwidthsearch:has(#checkforselects),
html body table.liste td.actioncolumn, html body table.liste td:has(> input.checkforselect) {
	/* !important: md centres these cells with !important */
	text-align: right !important;
	padding-left: 4px !important; padding-right: 6px !important;
}
html body table.liste td.actioncolumn, html body table.liste td:has(> input.checkforselect) { padding-right: 8px !important; }
html body :is(input.checkforselect, input.checkforaction), html body :is(td.nowrap, td.center, th) input[type=checkbox] { margin: 0; vertical-align: middle; }

/* ---------- Pagination ---------- */
html body div.pagination li > a, html body div.pagination li > span.inactive, html body ul.pagination li > a {
	padding: 4px 9px;
	background: var(--n-surface); color: var(--n-ink-2);
	border: 1px solid var(--n-border); border-radius: 6px !important; /* md squares the middle ones with !important */
}
html body div.pagination li a:hover { background: var(--n-accent-soft); color: var(--n-accent-strong); border-color: var(--n-accent-ring); }
html body div.pagination li.active a, html body div.pagination li .active a {
	background: var(--n-accent) !important; border-color: var(--n-accent) !important; color: var(--n-button-text) !important;
}

/* ---------- Thin scrollbars (page, tables, lists) ---------- */
* { scrollbar-width: thin; scrollbar-color: var(--n-border-strong) transparent; }
*::-webkit-scrollbar { width: 8px; height: 8px; }
*::-webkit-scrollbar-track { background: transparent; }
*::-webkit-scrollbar-thumb { background: var(--n-border-strong); border: 2px solid transparent; border-radius: 8px; background-clip: content-box; }
*::-webkit-scrollbar-thumb:hover { background: var(--n-muted); background-clip: content-box; }
*::-webkit-scrollbar-button { display: none; width: 0; height: 0; }
