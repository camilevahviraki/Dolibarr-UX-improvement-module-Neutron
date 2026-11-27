<?php
/* Copyright (C) 2026 Dolibarr contributors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 * \file       htdocs/custom/neutron/admin/setup.php
 * \ingroup    neutron
 * \brief      Setup page of the module Neutron.
 */

require_once dirname(__DIR__).'/lib/dolibarr-root.php';
$res = 0;
$neutronroot = neutronDolibarrRoot();
if ($neutronroot !== '') {
	$res = include $neutronroot.'/main.inc.php';
}
if (!$res) {
	die('Include of main fails');
}

require_once DOL_DOCUMENT_ROOT.'/core/lib/admin.lib.php';
require_once __DIR__.'/../lib/neutron.lib.php';

/**
 * @var Translate $langs
 * @var User $user
 */

$langs->loadLangs(array('admin', 'neutron@neutron'));

if (!$user->admin) {
	accessforbidden();
}

llxHeader('', $langs->trans('NeutronSetup'));

$linkback = '<a href="'.DOL_URL_ROOT.'/admin/modules.php?restore_lastsearch_values=1">'.$langs->trans('BackToModuleList').'</a>';
print load_fiche_titre($langs->trans('NeutronSetup'), $linkback, 'title_setup');

print dol_get_fiche_head(neutronAdminPrepareHead(), 'settings', $langs->trans('ModuleNeutronName'), -1, 'fa-columns');

print '<span class="opacitymedium">'.$langs->trans('NeutronSetupIntro').'</span>';

print dol_get_fiche_end();

llxFooter();
$db->close();
