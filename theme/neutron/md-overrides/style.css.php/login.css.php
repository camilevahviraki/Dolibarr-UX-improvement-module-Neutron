<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/style.css.php/login.css.php
 * \brief      login.css, then the labels of the fields in the language of the user.
 *             Overrides htdocs/theme/md/style.css.php.
 */

readfile(__DIR__.'/login.css');

print "\n";
foreach (array('username' => 'Login', 'password' => 'Password') as $neutroninput => $neutronkey) {
	$neutronlabel = html_entity_decode($langs->transnoentitiesnoconv($neutronkey), ENT_QUOTES, 'UTF-8');
	print 'html body.bodylogin div.login_table .tdinputlogin:has(> input#'.$neutroninput.')::before';
	print ' { content: "'.addcslashes($neutronlabel, "\\\"\n\r<").'"; }'."\n";
}
