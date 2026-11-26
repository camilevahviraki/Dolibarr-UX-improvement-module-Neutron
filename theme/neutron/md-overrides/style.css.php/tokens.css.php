<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/style.css.php/tokens.css.php
 * \brief      Variables: those of Neutron (--n-*, default colors in lib/neutron.lib.php), then those of md.
 */

require_once dirname(__DIR__, 4).'/lib/neutron.lib.php';

print "\n/* ---------- Neutron: colors and sizes ---------- */\n:root {\n";
foreach (neutronColors() as $neutronname => $neutroncolor) {
	print "\t--n-".str_replace('_', '-', $neutronname).': '.$neutroncolor.";\n";
}
?>
	/* Shades derived from the colors above */
	--n-accent-strong: color-mix(in srgb, var(--n-accent) 82%, black);
	--n-accent-soft: color-mix(in srgb, var(--n-accent) 9%, var(--n-surface));
	--n-accent-ring: color-mix(in srgb, var(--n-accent) 22%, transparent);
	--n-top-active-text: color-mix(in srgb, var(--n-active) 75%, white);

	/* Top bar: same texts as the left menu */
	--n-bar-text: var(--n-side-strong);
	--n-bar-icon: var(--n-side-icon);
	--n-bar-hover: var(--n-side-hover);
	--n-shadow-bar: 0 1px 0 rgba(255,255,255,.06), 0 4px 16px rgba(15,23,42,.18);

	/* Font */
	--n-font: 'Poppins', 'Segoe UI', system-ui, -apple-system, Roboto, Arial, sans-serif;

	/* Sizes */
	--n-radius: 12px;
	--n-radius-sm: 8px;
	--n-side-w: 290px;
	--n-rail-w: 56px;
	--n-top-h: 50px;
	/* forms: height of a field, width of fields and text areas (shares of the screen), room of a field icon */
	--n-control-h: 36px;
	--n-control-h-sm: 30px;
	--n-field-w: 17vw;
	--n-area-w: 30vw;
	--n-icon-w: 22px;
	--n-shadow: 0 1px 2px rgba(15,23,42,.04), 0 6px 20px rgba(15,23,42,.04);
	--n-shadow-lg: 0 10px 30px rgba(15,23,42,.14);
}

/* ---------- Variables of md ---------- */
:root {
	--colortextbackhmenu: var(--n-side-strong);
	--colorboxstatsborder: var(--n-border);
	--inputbordercolor: var(--n-border-strong);
<?php
// Those that have a field in Setup - Display - Theme
foreach (neutronThemeFields() as $neutronfield) {
	foreach ($neutronfield[1] as $neutronvariable) {
		print "\t".$neutronvariable.': var(--n-'.str_replace('_', '-', $neutronfield[0]).");\n";
	}
}
?>
}
