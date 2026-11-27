<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/style.css.php/index.php
 * \brief      Loads the overrides of htdocs/theme/md/style.css.php.
 */

if (!defined('DOL_DOCUMENT_ROOT')) {
	exit;
}

// Dark mode comes last
include __DIR__.'/tokens.css.php';
include __DIR__.'/fonts.css.php';
include __DIR__.'/topbar.css.php';
include __DIR__.'/sidebar.css.php';
include __DIR__.'/sidebar-desktop.css.php';
include __DIR__.'/topbar-small-screens.css.php';
include __DIR__.'/modules-sheet.css.php';
include __DIR__.'/sidebar-small-screens.css.php';
include __DIR__.'/titles.css.php';
include __DIR__.'/tabs.css.php';
include __DIR__.'/tables.css.php';
include __DIR__.'/forms.css.php';
include __DIR__.'/record.css.php';
include __DIR__.'/cards.css.php';
include __DIR__.'/popups.css.php';
include __DIR__.'/dark.css.php';
