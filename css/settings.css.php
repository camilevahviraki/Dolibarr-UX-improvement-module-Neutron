<?php
/**
 * \file       htdocs/custom/neutron/css/settings.css.php
 * \brief      Setup - Display - Theme: shows the Neutron colors as defaults. Dolibarr reads defaults
 *             from htdocs/theme only, so it prints "Unknown" for a theme that lives in a module.
 */

require_once dirname(__DIR__).'/lib/neutron.lib.php';

$neutroncolors = neutronDefaultColors();
print "
/* ---------- Neutron: default colors on the theme setup page ---------- */
";
foreach (neutronThemeFields() as $constant => $field) {
	$selector = 'html body.mod-admin tr:has(input[name="'.$constant.'"]) strong';
	print $selector." { font-size: 0; }
";
	print $selector.'::after { content: "'.ltrim($neutroncolors[$field[0]], '#').'"; font-size: 14px; }'."
";
}
