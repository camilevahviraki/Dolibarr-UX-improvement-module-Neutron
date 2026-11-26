<?php
/* Copyright (C) 2026 Dolibarr contributors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 * \file       htdocs/custom/neutron/admin/about.php
 * \ingroup    neutron
 * \brief      About page of the module Neutron.
 */

// Load Dolibarr environment, from htdocs/custom/neutron/admin
$res = 0;
if (file_exists('../../../main.inc.php')) {
	$res = include '../../../main.inc.php';
} elseif (file_exists('../../main.inc.php')) {
	$res = include '../../main.inc.php';
}
if (!$res) {
	die('Include of main fails');
}

require_once DOL_DOCUMENT_ROOT.'/core/lib/admin.lib.php';
require_once __DIR__.'/../lib/neutron.lib.php';

/**
 * @var Tranneutron $langs
 * @var User $user
 */

$langs->loadLangs(array('admin', 'neutron@neutron'));

if (!$user->admin) {
	accessforbidden();
}

llxHeader('', $langs->trans('About'));

$linkback = '<a href="'.DOL_URL_ROOT.'/admin/modules.php?restore_lastsearch_values=1">'.$langs->trans('BackToModuleList').'</a>';
print load_fiche_titre($langs->trans('NeutronSetup'), $linkback, 'title_setup');

print dol_get_fiche_head(neutronAdminPrepareHead(), 'about', $langs->trans('ModuleNeutronName'), -1, 'fa-columns');

print $langs->trans('ModuleNeutronDesc');

print dol_get_fiche_end();

llxFooter();
$db->close();
