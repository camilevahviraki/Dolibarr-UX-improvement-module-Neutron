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
 * \brief      Texts of the menu scripts: Neutron.texts.
 */

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

require_once dirname(__DIR__, 2).'/lib/dolibarr-root.php';
$res = 0;
$neutronroot = neutronDolibarrRoot();
if ($neutronroot !== '') {
	$res = include $neutronroot.'/main.inc.php';
}
if (!$res) {
	die('Include of main fails');
}

/**
 * @var Translate $langs
 */

$langs->load('neutron@neutron');

$keys = array(
	'menuClosedTip' => 'NeutronMenuClosedTip',
	'menuOpenTip' => 'NeutronMenuOpenTip',
	'modules' => 'NeutronModules',
	'showModules' => 'NeutronShowModules',
	'tabs' => 'NeutronTabs',
	'tabsTitle' => 'NeutronTabsTitle',
);
$texts = array();
foreach ($keys as $name => $key) {
	$texts[$name] = html_entity_decode($langs->transnoentitiesnoconv($key), ENT_QUOTES, 'UTF-8');
}

header('Content-Type: application/javascript; charset=UTF-8');
header('Cache-Control: max-age=3600, private, must-revalidate');

print "window.Neutron = window.Neutron || {};\n";
print 'window.Neutron.texts = '.json_encode($texts, JSON_HEX_TAG | JSON_UNESCAPED_UNICODE).";\n";
