<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/style.css.php/forms.css.php
 * \brief      Fields and select lists, their common height and width, checkboxes, radios and dates.
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
?>

/* ---------- Fields ---------- */
html body :is(input:not([type=checkbox], [type=radio], [type=submit], [type=button], [type=file]), select, textarea) {
	padding: 7px 10px;
	background: var(--n-surface);
	border: 1px solid var(--n-border-strong) !important;
	border-radius: var(--n-radius-sm) !important;
	font-family: var(--n-font);
	transition: border-color .15s, box-shadow .15s;
}
html body :is(input, select, textarea):focus:not([type=checkbox], [type=radio]) {
	outline: none;
	border-color: var(--n-accent) !important;
	box-shadow: 0 0 0 3px var(--n-accent-ring) !important;
}

/* ---------- Height ---------- */
html body input:not([type=checkbox], [type=radio], [type=file], [type=range], [type=color], [type=hidden], [type=image], [type=submit], [type=button]),
html body select:not([multiple], [size]),
html body .select2-container--default .select2-selection--single {
	box-sizing: border-box;
	height: var(--n-control-h) !important;
	min-height: var(--n-control-h) !important;
	line-height: 1.2;
}

/* ---------- Text size ---------- */
html body :is(input:not([type=checkbox], [type=radio], [type=submit], [type=button]), select, textarea, .select2-container, .select2-dropdown) {
	font-size: 14px;
}

/* ---------- select2 ---------- */
html body .select2-container { vertical-align: middle; }
html body .select2-container > .selection { display: block; width: 100%; }
html body .select2-container--default :is(.select2-selection--single, .select2-selection--multiple) {
	border-color: var(--n-border-strong); border-radius: var(--n-radius-sm) !important;
}
html body .select2-container--default .select2-selection--single .select2-selection__rendered { color: var(--n-ink); }
html body .select2-container--open .select2-dropdown {
	border: 1px solid var(--n-border) !important; border-radius: var(--n-radius) !important;
	box-shadow: var(--n-shadow-lg);
}
html body .select2-results__option { font-size: 13.3px; }
html body :is(.select2-results__option[aria-disabled=true], .select2-container--disabled, .select2-container--disabled *, select:disabled) { cursor: default; }
html body .select2-container--default .select2-selection--single { display: flex; align-items: center; margin: 0; padding: 0; }
html body .select2-container--default .select2-selection--single .select2-selection__rendered {
	flex: 1; overflow: hidden; padding: 0 28px 0 10px; line-height: normal; text-overflow: ellipsis; white-space: nowrap;
}
html body .select2-container--default .select2-selection--single .select2-selection__arrow { top: 0; right: 2px; width: 18px; height: 100%; }
html body .select2-container--default .select2-selection--multiple { box-sizing: border-box; min-height: var(--n-control-h); }
html body .select2-container--default .select2-selection--multiple .select2-search__field { height: 22px !important; min-height: 0 !important; margin: 0; border: 0 !important; box-shadow: none !important; }
html body .select2-container--default .select2-results__option--highlighted[aria-selected] { background: var(--n-accent); color: var(--n-button-text); }
html body select.select2-hidden-accessible {
	width: 1px !important; height: 1px !important; min-height: 0 !important;
	margin: -1px !important; padding: 0 !important; border: 0 !important; box-shadow: none !important;
}
html body .select2-container.limit { width: auto !important; min-width: 56px; height: var(--n-control-h); }
html body .select2-container.limit .select2-selection--single { width: 100% !important; min-width: 56px; }
html body .select2-container.limit .select2-selection__rendered { padding: 0 18px 0 8px; }

/* ---------- Search fields ---------- */
html body :is(.divfilteralone, .divsearchfield) { display: inline-flex; align-items: center; gap: 8px; vertical-align: middle; }
html body .divsearchfield { padding-top: 6px; padding-bottom: 6px; }
html body tr.liste_titre_filter td input:not([type=checkbox], [type=radio], [type=file], [type=range], [type=color], [type=hidden], [type=image], [type=submit]),
html body tr.liste_titre_filter td select:not([multiple], [size]),
html body tr.liste_titre_filter td .select2-container--default .select2-selection--single,
html body tr.liste_titre_filter td .select2-container--default .select2-selection--multiple {
	height: var(--n-control-h-sm) !important;
	min-height: var(--n-control-h-sm) !important;
	padding-top: 0; padding-bottom: 0;
	font-size: 12.5px;
}
html body tr.liste_titre_filter td .select2-container--default .select2-selection--multiple { max-height: var(--n-control-h-sm); overflow: hidden; }

html body :is(.divfilteralone, .divsearchfield) .select2-container--default .select2-selection--multiple {
	box-sizing: border-box; display: flex; align-items: center; overflow: hidden; padding: 0 6px;
	height: var(--n-control-h) !important; min-height: var(--n-control-h) !important;
}
html body :is(.divfilteralone, .divsearchfield) .select2-selection--multiple .select2-selection__rendered { display: flex; align-items: center; flex-wrap: nowrap; margin: 0; padding: 0; }
html body :is(.divfilteralone, .divsearchfield) .select2-selection--multiple .select2-search__field { padding-top: 0; padding-bottom: 0; line-height: 22px; }

/* ---------- Checkboxes and radios ---------- */
html body input[type=checkbox], html body input[type=radio] {
	-webkit-appearance: none; appearance: none;
	box-sizing: border-box;
	width: 18px; height: 18px; min-width: 18px; min-height: 18px;
	margin: 0 6px 0 0; padding: 0;
	vertical-align: middle; cursor: pointer;
	background: var(--n-surface);
	border: 1px solid var(--n-border-strong) !important;
	box-shadow: none;
	transition: background .12s, border-color .12s, box-shadow .12s;
}
html body input[type=checkbox] { border-radius: 6px !important; }
html body input[type=radio] { width: 16px; height: 16px; min-width: 16px; min-height: 16px; border-radius: 50% !important; }
html body input[type=checkbox]:hover, html body input[type=radio]:hover { border-color: var(--n-accent) !important; box-shadow: 0 0 0 3px var(--n-accent-soft); }
html body input[type=checkbox]:focus-visible, html body input[type=radio]:focus-visible { outline: none; box-shadow: 0 0 0 3px var(--n-accent-ring); }
html body input[type=checkbox]:is(:checked, :indeterminate) {
	background: var(--n-accent) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath d='M3.5 8.5l3 3 6-6.5' fill='none' stroke='%23fff' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E") center / 12px 12px no-repeat;
	border-color: var(--n-accent) !important;
}
html body input[type=checkbox]:indeterminate {
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath d='M4 8h8' stroke='%23fff' stroke-width='2' stroke-linecap='round'/%3E%3C/svg%3E");
}
html body input[type=radio]:checked {
	background: radial-gradient(circle at center, var(--n-surface) 0 2.5px, var(--n-accent) 3px);
	border-color: var(--n-accent) !important;
}
html body input[type=checkbox]:disabled, html body input[type=radio]:disabled { background-color: var(--n-surface-3); border-color: var(--n-border) !important; cursor: default; opacity: .7; }
html body input[type=checkbox]:checked:disabled { background-color: color-mix(in srgb, var(--n-accent) 45%, var(--n-surface)); border-color: transparent !important; }

/* ---------- Labels ---------- */
html body table.border td[class*="titlefield"],
html body table.border > tbody > tr > td:first-child:not([colspan]) {
	color: var(--n-ink-2) !important;
	font-size: 13px !important;
	font-weight: 600 !important;
}
html body table.border > tbody > tr > td:first-child:not([colspan]) .fieldrequired { color: var(--n-ink) !important; font-weight: 600 !important; }
html body table.border > tbody > tr > td:nth-child(2) { color: var(--n-ink); font-size: 14px; }
html body table.border td { padding-top: 6px; padding-bottom: 6px; }

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

/* ---------- Date picker ---------- */
html body img.ui-datepicker-trigger {
	box-sizing: border-box; width: 20px; height: 20px; margin: 0 4px; padding: 0;
	vertical-align: middle; cursor: pointer;
	object-position: -100px 0; /* hides the image: the mask gives the shape */
	background-color: var(--n-ink-2);
	-webkit-mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23000' stroke-width='1.8' stroke-linecap='round' stroke-linejoin='round'%3E%3Crect x='3' y='4.5' width='18' height='16.5' rx='3'/%3E%3Cpath d='M8 2.5v4M16 2.5v4M3 10h18'/%3E%3Cpath d='M8 14h.01M12 14h.01M16 14h.01M8 17.5h.01M12 17.5h.01'/%3E%3C/svg%3E") center / contain no-repeat;
	mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23000' stroke-width='1.8' stroke-linecap='round' stroke-linejoin='round'%3E%3Crect x='3' y='4.5' width='18' height='16.5' rx='3'/%3E%3Cpath d='M8 2.5v4M16 2.5v4M3 10h18'/%3E%3Cpath d='M8 14h.01M12 14h.01M16 14h.01M8 17.5h.01M12 17.5h.01'/%3E%3C/svg%3E") center / contain no-repeat;
	transition: background-color .15s;
}
html body img.ui-datepicker-trigger:hover { background-color: var(--n-accent); }

/* ---------- Date ranges ---------- */
html body table.border td:has(.divfordateinput ~ .divfordateinput) .divfordateinput {
	display: inline-flex !important; align-items: center; gap: 6px; vertical-align: middle;
	width: calc((var(--n-field-w) - var(--n-icon-w) - 10px) / 2);
}
html body table.border td:has(.divfordateinput ~ .divfordateinput) .divfordateinput input.hasDatepicker { flex: 1 1 auto; min-width: 0; width: 100% !important; max-width: none !important; }
html body table.border td:has(.divfordateinput ~ .divfordateinput) .divfordateinput img.ui-datepicker-trigger { flex: 0 0 auto; }

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
