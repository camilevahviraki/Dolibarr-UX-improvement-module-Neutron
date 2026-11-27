<?php
/**
 * \file       htdocs/custom/neutron/theme/neutron/md-overrides/style.css.php/sidebar-desktop.css.php
 * \brief      Loads sidebar-desktop.css.
 */

// Not for print
if (GETPOST('optioncss', 'aZ09') != 'print') {
	readfile(__DIR__.'/sidebar-desktop.css');
}
