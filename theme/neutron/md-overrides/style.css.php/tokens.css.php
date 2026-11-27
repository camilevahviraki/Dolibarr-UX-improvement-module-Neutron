<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/style.css.php/tokens.css.php
 * \brief      tokens.css, then the colors of lib/neutron.lib.php and the md variables that use them.
 */

require_once dirname(__DIR__, 4).'/lib/neutron.lib.php';

readfile(__DIR__.'/tokens.css');

print "\n:root {\n";
foreach (neutronColors() as $neutronname => $neutroncolor) {
	print "\t--n-".str_replace('_', '-', $neutronname).': '.$neutroncolor.";\n";
}
foreach (neutronThemeFields() as $neutronfield) {
	foreach ($neutronfield[1] as $neutronvariable) {
		print "\t".$neutronvariable.': var(--n-'.str_replace('_', '-', $neutronfield[0]).");\n";
	}
}
print "}\n";
