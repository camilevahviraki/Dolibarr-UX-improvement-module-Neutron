<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/style.css.php/forms.css.php
 * \brief      forms.css, then the field widths and the tablet and phone layouts.
 *             Overrides htdocs/theme/md/style.css.php.
 */

$neutronsized = ':not(.width25, .width50, .width75, .width100, .width125, .width150, .width200, .hasDatepicker)';
$neutronsmall = ':not(.maxwidthdate, .maxwidth50, .maxwidth75, .maxwidth100)';
$neutrontext = 'input[type=text], input[type=email], input[type=url], input[type=password], input[type=tel], input:not([type]), span.select2-container';
$neutroncontrols = $neutrontext.', select:not(.select2-hidden-accessible)';
$neutronfield = 'calc(var(--n-field-w) - var(--n-icon-w))';
// Narrow screens: keeps room for a help picture
$neutronfill = 'calc(100% - var(--n-icon-w) - 8px)';
$neutronfillicon = 'calc(100% - 2 * var(--n-icon-w) - 8px)';
$neutrontextcontrols = 'textarea, div.cke, .cke_chrome, .cke_inner, .mce-tinymce, .tox-tinymce';

readfile(__DIR__.'/forms.css');
?>

/* ---------- Widths ---------- */
/* No max-width in %: a narrow cell would shrink one field only */
html body table.border td :is(<?php print $neutroncontrols; ?>):where(<?php print $neutronsized.$neutronsmall; ?>) {
	box-sizing: border-box;
	width: <?php print $neutronfield; ?> !important;
	max-width: none !important; min-width: 0 !important;
}
html body table.border td span.select2-container .select2-selection { width: 100% !important; max-width: none !important; min-width: 0 !important; }
html body table.border td .pictofixedwidth ~ :is(<?php print $neutroncontrols; ?>):where(<?php print $neutronsized; ?>) {
	margin-left: 0 !important;
	width: <?php print $neutronfield; ?> !important;
}
html body table.border td:has(.pictofixedwidth) :is(<?php print $neutroncontrols; ?>):where(<?php print $neutronsized; ?>) { margin-left: 0 !important; }
html body table.border td:not(:first-child):has(:is(input:not([type=hidden]), select, textarea, .cke, .select2-container)):not(:has(.pictofixedwidth)) {
	padding-left: calc(var(--n-icon-w) + 8px) !important;
}
html body table.border td > :is(input[type=checkbox], input[type=radio]) { margin-left: 3px; }

html body table.border td :is(<?php print $neutrontextcontrols; ?>) {
	box-sizing: border-box;
	width: var(--n-area-w) !important;
	max-width: 100% !important;
	margin-left: 0 !important;
}

<?php
$neutronform = 'html body table.border:not(.tableforfield):has(input, select, textarea)';
$neutronrow = $neutronform.' > tbody > tr:not(.hideobject, .hidden, .nodisplay)';
?>
/* ---------- Tablets ---------- */
@media (max-width: 1200px) {
	<?php print $neutronform; ?>, <?php print $neutronform; ?> > tbody { display: block; box-sizing: border-box; width: 100% !important; }
	<?php print $neutronrow; ?> { display: flex; flex-wrap: wrap; align-items: center; height: auto !important; }
	<?php print $neutronrow; ?> > td {
		box-sizing: border-box; flex: 0 0 65%; width: auto !important; max-width: 65%; min-width: 0 !important;
		height: auto !important;
		border-bottom: 0 !important;
	}
	<?php print $neutronrow; ?> > td:nth-child(odd) { flex-basis: 35%; max-width: 35%; }
	<?php print $neutronrow; ?> > td:only-child { flex-basis: 100%; max-width: 100%; }
	<?php print $neutronrow; ?> > td:nth-child(3) { color: var(--n-ink-2); font-size: 13px; font-weight: 600; }

	<?php print $neutronrow; ?> > td :is(<?php print $neutroncontrols; ?>):where(<?php print $neutronsized.$neutronsmall; ?>),
	<?php print $neutronrow; ?> > td :is(<?php print $neutrontextcontrols; ?>) {
		width: <?php print $neutronfill; ?> !important; max-width: 100% !important;
	}
	<?php print $neutronrow; ?> > td:has(.pictofixedwidth) :is(<?php print $neutroncontrols; ?>):where(<?php print $neutronsized.$neutronsmall; ?>),
	<?php print $neutronrow; ?> > td .pictofixedwidth ~ :is(<?php print $neutroncontrols; ?>):where(<?php print $neutronsized; ?>) {
		width: <?php print $neutronfillicon; ?> !important; max-width: 100% !important;
	}
	<?php print $neutronrow; ?> > td table:has(input, select) { width: 100%; }
	<?php print $neutronrow; ?> > td table td:first-child:has(input, select) { width: 100%; }
	<?php print $neutronrow; ?> > td :is(div.cke .cke_inner, div.cke .cke_contents, iframe) { width: 100% !important; max-width: 100% !important; }
	<?php print $neutronrow; ?> > td:has(.divfordateinput ~ .divfordateinput) .divfordateinput { width: calc((100% - 10px) / 2); }
}

/* ---------- Phones ---------- */
@media (max-width: 600px) {
	<?php print $neutronrow; ?> > td, <?php print $neutronrow; ?> > td:nth-child(odd) { flex-basis: 100%; max-width: 100%; }
	<?php print $neutronrow; ?> > td:nth-child(odd) { padding-bottom: 0; }
	<?php print $neutronrow; ?> > td:nth-child(even) { padding-top: 4px; }
	html body div.tabBar { padding: 12px 8px; }
}
