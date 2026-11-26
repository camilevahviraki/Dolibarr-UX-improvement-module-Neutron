<?php
/* Copyright (C) 2026 Dolibarr contributors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 * \file       htdocs/custom/neutron/theme/neutron/style.css.php
 * \brief      Stylesheet of the theme "neutron": the "md" theme as a base, then the layers of the module.
 */

// Base: md. It loads Dolibarr, sends the headers and prints its rules. Nothing of md is copied.
require dirname(__DIR__, 4).'/theme/md/style.css.php';

// Layers of the module, from the general to the particular. Dark mode comes last.
$neutronparts = array('tokens', 'fonts', 'topbar', 'sidebar', 'tables', 'forms', 'record', 'tabs', 'dark');
foreach ($neutronparts as $neutronpart) {
	include dirname(__DIR__, 2).'/css/parts/'.$neutronpart.'.css.php';
}
