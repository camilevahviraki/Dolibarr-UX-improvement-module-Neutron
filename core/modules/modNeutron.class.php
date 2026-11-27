<?php
/* Copyright (C) 2026 Dolibarr contributors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 */

/**
 * \file       htdocs/custom/neutron/core/modules/modNeutron.class.php
 * \ingroup    neutron
 * \brief      Descriptor of the module Neutron: a theme and interface improvements.
 */

require_once DOL_DOCUMENT_ROOT.'/core/modules/DolibarrModules.class.php';

/**
 * Descriptor of the module Neutron
 */
class modNeutron extends DolibarrModules
{
	/**
	 * Constructor
	 *
	 * @param DoliDB $db Database handler
	 */
	public function __construct($db)
	{
		$this->db = $db;

		// TODO Reserve an id on https://wiki.dolibarr.org/index.php/List_of_modules_id
		$this->numero = 513900;
		$this->rights_class = 'neutron';
		$this->family = 'interface';
		$this->module_position = '90';
		$this->name = preg_replace('/^mod/i', '', get_class($this));
		$this->description = 'ModuleNeutronDesc';
		$this->descriptionlong = 'ModuleNeutronDesc';
		$this->version = '0.1.0';
		$this->const_name = 'MAIN_MODULE_'.strtoupper($this->name);
		$this->picto = 'fa-columns';

		$this->module_parts = array(
			'theme' => 1,
			// In loading order
			'js' => array(
				'/neutron/js/menu/shared-menu-helpers.js',
				'/neutron/js/menu/translations.js.php',
				'/neutron/js/menu/highlight-current-page.js',
				'/neutron/js/menu/collapsible-sections.js',
				'/neutron/js/menu/sidebar-open-close.js',
				'/neutron/js/menu/modules-sheet.js',
				'/neutron/js/tabs/tabs-sheet.js',
				'/neutron/js/tooltips/tooltip-pointer.js',
				'/neutron/js/forms/blank-choice.js',
			),
		);

		$this->dirs = array();
		$this->config_page_url = array('setup.php@neutron');
		$this->langfiles = array('neutron@neutron');

		$this->depends = array();
		$this->requiredby = array();
		$this->conflictwith = array();
		$this->phpmin = array(7, 2);
		$this->need_dolibarr_version = array(23, -3);

		$this->const = array();
		$this->rights = array();
		$this->menu = array();
	}

	/**
	 * Called when the module is enabled
	 *
	 * @param  string $options Options when enabling the module
	 * @return int             1 if OK, 0 if KO
	 */
	public function init($options = '')
	{
		return $this->_init(array(), $options);
	}

	/**
	 * Called when the module is disabled
	 *
	 * @param  string $options Options when disabling the module
	 * @return int             1 if OK, 0 if KO
	 */
	public function remove($options = '')
	{
		global $conf;

		if (getDolGlobalString('MAIN_THEME') == 'neutron') {
			require_once DOL_DOCUMENT_ROOT.'/core/lib/admin.lib.php';
			dolibarr_set_const($this->db, 'MAIN_THEME', 'eldy', 'chaine', 0, '', $conf->entity);
		}

		return $this->_remove(array(), $options);
	}
}
