<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/index.php
 * \brief      Loads everything that overrides the theme "md".
 *
 * This folder follows the structure of htdocs/theme/md. An md file that is overridden becomes a folder
 * with the same name, split by concern, and its index.php loads those files. See README.md.
 */

if (!defined('DOL_DOCUMENT_ROOT')) {
	exit; // included by the stylesheet of the theme, never called directly
}

// In the order of md. Add a line when a new md file is overridden.
include __DIR__.'/style.css.php/index.php';
include __DIR__.'/badges.inc.php/index.php';
include __DIR__.'/btn.inc.php/index.php';
include __DIR__.'/dropdown.inc.php/index.php';
include __DIR__.'/info-box.inc.php/index.php';
