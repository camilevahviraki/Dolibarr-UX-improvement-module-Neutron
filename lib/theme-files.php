<?php
/* Copyright (C) 2026 Dolibarr contributors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 * \file       htdocs/custom/neutron/lib/theme-files.php
 * \ingroup    neutron
 * \brief      Files Neutron needs in htdocs/theme/neutron/.
 *             Dolibarr only reads theme_vars.inc.php there, even for the theme of a module.
 */

// Written in each created file: only those files are replaced or removed
const NEUTRON_CREATED_FILE = 'Created by the module Neutron';

/**
 * @return string Folder of the theme in htdocs
 */
function neutronThemeFolder()
{
	return DOL_DOCUMENT_ROOT.'/theme/neutron';
}

/**
 * @return bool True if theme_vars.inc.php is in place, false if it cannot be written
 */
function neutronCreateThemeFiles()
{
	$folder = neutronThemeFolder();
	$file = $folder.'/theme_vars.inc.php';
	if (is_file($file) && strpos((string) file_get_contents($file), NEUTRON_CREATED_FILE) === false) {
		return true;
	}
	if (!is_dir($folder) && !@mkdir($folder, 0755, true)) {
		return false;
	}
	$code = "<?php\n// ".NEUTRON_CREATED_FILE.", removed when it is disabled.\n";
	$code .= "include dol_buildpath('/neutron/theme/neutron/theme_vars.inc.php');\n";
	if (@file_put_contents($file, $code) === false) {
		return false;
	}
	// Dolibarr lists this folder as a theme too: it gets the same preview
	@copy(dirname(__DIR__).'/theme/neutron/thumb.png', $folder.'/thumb.png');
	return true;
}

/**
 * Removes the files created above, then the folder if nothing else is in it
 *
 * @return void
 */
function neutronRemoveThemeFiles()
{
	$folder = neutronThemeFolder();
	$file = $folder.'/theme_vars.inc.php';
	if (!is_file($file) || strpos((string) file_get_contents($file), NEUTRON_CREATED_FILE) === false) {
		return;
	}
	@unlink($file);
	@unlink($folder.'/thumb.png');
	@rmdir($folder);
}
