<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/style.css.php/record.css.php
 * \brief      Record cards: card panel, field tables, the two halves of a record view and its photo.
 *             Overrides htdocs/theme/md/style.css.php.
 */
?>

/* ---------- Card ---------- */
html body div.tabBar {
	padding: 18px 20px;
	background: var(--n-surface);
	border: 1px solid var(--n-border) !important;
	border-radius: var(--n-radius);
	box-shadow: var(--n-shadow);
}
html body .refidno { color: var(--n-muted); }

/* ---------- Field tables ---------- */
html body :is(table.border, table.bordernooddeven) {
	background: transparent; border: 0 !important; border-collapse: collapse; box-shadow: none !important;
}
html body :is(table.border, table.bordernooddeven) td {
	border: 0 !important;
	border-bottom: 1px solid var(--n-surface-3) !important;
	padding: 9px 8px;
}
html body :is(table.border, table.bordernooddeven) > tbody > tr:last-child > td { border-bottom: 0 !important; }
html body :is(table.border, table.bordernooddeven) table.nobordernopadding td { padding: 0; border: 0 !important; color: inherit; }
html body div.underbanner {
	border-top: 1px solid var(--n-border) !important;
	border-bottom: 1px solid var(--n-border) !important;
}

/* ---------- Record view panels ---------- */
html body div.fichecenter:has(> div.fichehalfleft) { display: flex; flex-wrap: wrap; align-items: stretch; gap: 24px; }
html body div.fichecenter > :is(div.fichehalfleft, div.fichehalfright) {
	float: none !important; flex: 1 1 380px; box-sizing: border-box;
	width: auto !important; min-width: 0; margin: 0 !important; padding: 8px 10px !important;
	background: var(--n-surface);
	border: 1px solid var(--n-border-strong);
	border-radius: var(--n-radius);
}
html body div.fichecenter > :is(div.fichecenterbis, div.clearboth) { flex-basis: 100%; }
html body :is(div.fichehalfleft, div.fichehalfright) > div.underbanner { display: none; }
html body :is(div.fichehalfleft, div.fichehalfright) table.border { width: 100%; }

/* ---------- Record view rows ---------- */
html body table.tableforfield {
	border-collapse: separate; border-spacing: 0 2px; overflow: visible;
	background: transparent !important;
}
html body table.tableforfield > tbody > tr > td {
	background: transparent;
	border: 0 !important;
	padding-top: 9px; padding-bottom: 9px;
	vertical-align: middle;
}
html body table.tableforfield > tbody > tr > td:first-child { padding-left: 12px; border-radius: var(--n-radius-sm) 0 0 var(--n-radius-sm); }
html body table.tableforfield > tbody > tr > td:last-child { border-radius: 0 var(--n-radius-sm) var(--n-radius-sm) 0; }
html body table.tableforfield > tbody > tr > td:nth-child(2) { padding-left: 16px; }
html body table.tableforfield > tbody > tr:not(.liste_titre):hover > td { background: var(--n-surface-2); }

/* ---------- Photo ---------- */
html body div.divphotoref { margin-right: 16px; }
html body div.divphotoref .photoref {
	display: inline-flex !important; align-items: center; justify-content: center; overflow: hidden;
	width: 72px; height: 72px; margin: 0 !important; padding: 0 !important;
	background: transparent !important; border: 0 !important; border-radius: 18px !important;
	box-shadow: 0 2px 10px rgba(15,23,42,.10), 0 1px 3px rgba(15,23,42,.06) !important;
}
html body div.divphotoref .photoref > :is(.fa, .fas, .far) {
	color: var(--n-accent-strong) !important;
	font-size: 28px !important; line-height: 1;
}
html body div.divphotoref :is(.photoref img, img.photo) {
	width: 100%; height: 100%; object-fit: cover;
	border: 0 !important; border-radius: 0 !important; box-shadow: none !important;
}
html body div.divphotoref img.photoref {
	display: block !important; object-fit: cover;
	width: 72px !important; height: 72px !important; max-width: none !important;
}
html body div.divphotoref img.photoref[src*="/theme/common/user_"] {
	box-sizing: border-box; object-fit: contain;
	padding: 14px !important; background: var(--n-surface) !important;
}
