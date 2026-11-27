<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/info-box.inc.php/index.php
 * \brief      Loads the overrides of htdocs/theme/md/info-box.inc.php.
 */

if (!defined('DOL_DOCUMENT_ROOT')) {
	exit;
}

// Dark mode comes last
include __DIR__.'/dashboard.css.php';
include __DIR__.'/dark.css.php';
