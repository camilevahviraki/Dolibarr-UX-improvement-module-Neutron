<?php
/* Copyright (C) 2026 Dolibarr contributors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 * \file       htdocs/custom/neutron/js/menu/translations.js.php
 * \ingroup    neutron
 * \brief      Texts of the menu scripts, in the language of the page: Neutron.texts.
 *             The texts are in langs/<language>/neutron.lang. Dolibarr adds the language to the address.
 */

// A script: no login, no menu and no new token
if (!defined('NOREQUIRESOC')) {
	define('NOREQUIRESOC', '1');
}
if (!defined('NOCSRFCHECK')) {
	define('NOCSRFCHECK', 1);
}
if (!defined('NOTOKENRENEWAL')) {
	define('NOTOKENRENEWAL', 1);
}
if (!defined('NOLOGIN')) {
	define('NOLOGIN', 1);
}
if (!defined('NOREQUIREMENU')) {
	define('NOREQUIREMENU', 1);
}
if (!defined('NOREQUIREHTML')) {
	define('NOREQUIREHTML', 1);
}
if (!defined('NOREQUIREAJAX')) {
	define('NOREQUIREAJAX', '1');
}

// Load Dolibarr environment, from htdocs/custom/neutron/js/menu
$res = 0;
if (file_exists('../../../../main.inc.php')) {
	$res = include '../../../../main.inc.php';
} elseif (file_exists('../../../main.inc.php')) {
	$res = include '../../../main.inc.php';
}
if (!$res) {
	die('Include of main fails');
}

/**
 * @var Translate $langs
 */

$langs->load('neutron@neutron');

// Name used by the scripts => key of the language files
$keys = array(
	'menuClosedTip' => 'NeutronMenuClosedTip',
	'menuOpenTip' => 'NeutronMenuOpenTip',
	'modules' => 'NeutronModules',
	'showModules' => 'NeutronShowModules',
);
$texts = array();
foreach ($keys as $name => $key) {
	$texts[$name] = html_entity_decode($langs->transnoentitiesnoconv($key), ENT_QUOTES, 'UTF-8');
}

header('Content-Type: application/javascript; charset=UTF-8');
header('Cache-Control: max-age=3600, private, must-revalidate');

print "window.Neutron = window.Neutron || {};\n";
print 'window.Neutron.texts = '.json_encode($texts, JSON_HEX_TAG | JSON_UNESCAPED_UNICODE).";\n";
