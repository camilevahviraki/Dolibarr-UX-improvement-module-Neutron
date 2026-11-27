<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/style.css.php/tabs.css.php
 * \brief      Tabs: dark texts, and a thick line rounded on top under the current one.
 *             Overrides htdocs/theme/md/style.css.php.
 */
?>

/* ---------- Row of tabs ---------- */
html body div.tabs {
	display: flex; flex-wrap: wrap; align-items: flex-end;
	gap: 0;
	margin: 0 0 16px; padding: 0;
	border-bottom: 1px solid var(--n-border);
}

html body div.tabs :is(div.tabsElem, div.tab, div.tabactive, div.tabunactive) {
	margin: 0; padding: 0;
	background: transparent !important; border: 0 !important; border-radius: 0; box-shadow: none;
}

/* ---------- Tab ---------- */
html body div.tabs a.tab, html body div.tabs a.tab:is(:link, :visited, :hover) {
	display: inline-block; position: relative;
	margin: 0 !important; padding: 10px 14px;
	background: transparent; border: 0;
	color: var(--n-ink-2); font-family: var(--n-font); font-weight: 500 !important; text-decoration: none;
	transition: color .15s;
}
html body div.tabs a.tab:hover { color: var(--n-ink); }

html body div.tabs a.tab::after {
	content: ""; position: absolute; left: 0; right: 0; bottom: -2px;
	height: 4px; border-radius: 4px 4px 0 0;
	background: transparent; transition: background .15s;
}
html body div.tabs a.tab:hover::after { background: var(--n-border-strong); }

/* ---------- Current tab ---------- */
html body div.tabs :is(div.tabactive, div.tabsElemActive) a.tab,
html body div.tabs :is(div.tabactive, div.tabsElemActive) a.tab:is(:link, :visited, :hover),
html body div.tabs a.tab.tabactive, html body div.tabs a.tabactive {
	color: var(--n-accent-strong) !important;
	background: transparent !important;
	border: 0 !important;
	font-weight: 600 !important;
}
html body div.tabs :is(div.tabactive, div.tabsElemActive) a.tab::after,
html body div.tabs a.tab.tabactive::after, html body div.tabs a.tabactive::after { background: var(--n-accent); }

/* ---------- Counters and buttons ---------- */
html body div.tabs a.tab :is(.badge, .badge-status) { margin-left: 6px; }
html body div.tabsAction { gap: 8px; margin: 18px 0 8px; }
