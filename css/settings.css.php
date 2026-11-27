<?php
/**
 * \file       htdocs/custom/neutron/css/settings.css.php
 * \brief      Default colors on the theme setup page.
 */

require_once dirname(__DIR__).'/lib/neutron.lib.php';

$neutroncolors = neutronDefaultColors();
print "
";
foreach (neutronThemeFields() as $constant => $field) {
	$selector = 'html body.mod-admin tr:has(input[name="'.$constant.'"]) strong';
	print $selector." { font-size: 0; }
";
	print $selector.'::after { content: "'.ltrim($neutroncolors[$field[0]], '#').'"; font-size: 14px; }'."
";
}
