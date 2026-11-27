<?php
/* Copyright (C) 2026 Dolibarr contributors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 * \file       htdocs/custom/neutron/lib/dolibarr-root.php
 * \ingroup    neutron
 * \brief      Finds the htdocs folder of Dolibarr, usable before Dolibarr is loaded.
 */

/**
 * The module can be a link, or stored outside htdocs (hosted and packaged installs): __DIR__ is then not enough.
 *
 * @return string htdocs folder of Dolibarr, '' if not found
 */
function neutronDolibarrRoot()
{
	$folders = array(dirname(__DIR__, 3), dirname(__DIR__, 2));

	foreach (array('SCRIPT_FILENAME', 'SCRIPT_NAME') as $key) {
		if (empty($_SERVER[$key])) {
			continue;
		}
		$folder = dirname(($key == 'SCRIPT_NAME' ? (string) ($_SERVER['DOCUMENT_ROOT'] ?? '') : '').$_SERVER[$key]);
		while ($folder != dirname($folder)) {
			$folders[] = $folder;
			$folder = dirname($folder);
		}
	}
	foreach (array('CONTEXT_DOCUMENT_ROOT', 'DOCUMENT_ROOT') as $key) {
		if (!empty($_SERVER[$key])) {
			$folders[] = $_SERVER[$key];
		}
	}

	foreach ($folders as $folder) {
		$folder = str_replace('..', '', $folder);
		if (@is_file($folder.'/main.inc.php') && @is_file($folder.'/theme/md/style.css.php')) {
			return $folder;
		}
	}
	return '';
}
