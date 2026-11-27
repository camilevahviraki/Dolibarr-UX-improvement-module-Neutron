<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/btn.inc.php/index.php
 * \brief      Loads the overrides of htdocs/theme/md/btn.inc.php.
 */

if (!defined('DOL_DOCUMENT_ROOT')) {
	exit;
}

// Dark mode comes last
include __DIR__.'/buttons.css.php';
include __DIR__.'/dark.css.php';
