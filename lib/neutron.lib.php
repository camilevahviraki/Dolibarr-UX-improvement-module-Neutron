<?php
/* Copyright (C) 2026 Dolibarr contributors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 * \file       htdocs/custom/neutron/lib/neutron.lib.php
 * \ingroup    neutron
 * \brief      Functions of the module Neutron.
 */

/**
 * Tabs of the setup pages
 *
 * @return array<array{0:string,1:string,2:string}>
 */
function neutronAdminPrepareHead()
{
	global $langs;

	$langs->load('neutron@neutron');

	return array(
		array(dol_buildpath('/neutron/admin/setup.php', 1), $langs->trans('Settings'), 'settings'),
		array(dol_buildpath('/neutron/admin/about.php', 1), $langs->trans('About'), 'about'),
	);
}
