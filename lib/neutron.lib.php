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
 * Default colors of the theme. The name of a color gives its CSS variable ("side_bg" gives --n-side-bg)
 * and the constant that replaces it (NEUTRON_COLOR_SIDE_BG).
 *
 * @return array<string,string>
 */
function neutronDefaultColors()
{
	return array(
		'accent' => '#097fc3',
		'link' => '#097fc3',
		'bar' => '#2c3739',
		'side_bg' => '#384547',
		'side_card' => '#263539',
		'side_hover' => '#3b4a4c',
		'side_line' => '#465355',
		'side_strong' => '#eff5f7',
		'side_text' => '#aab5b9',
		'side_icon' => '#c2cacc',
		'side_muted' => '#8b9798',
		'active' => '#097fc3',
		'active_text' => '#ffffff',
		'top_active' => '#d9dee0',
		'body' => '#f5f6f8',
		'surface' => '#ffffff',
		'surface_2' => '#f8fafc',
		'surface_3' => '#f1f5f9',
		'ink' => '#0f172a',
		'ink_2' => '#334155',
		'muted' => '#64748b',
		'border' => '#e2e8f0',
		'border_strong' => '#cbd5e1',
		'title_text' => '#0f172a',
		'row_hover' => '#f8fafc',
		'row_checked' => '#e9f4fa',
		'button_text' => '#ffffff',
		'danger' => '#b91c1c',
		'ok_bg' => '#f0fdf4',
		'warn_bg' => '#fffbeb',
		'err_bg' => '#fef2f2',
		'tile_1' => '#3f566f',
		'tile_2' => '#3f6052',
		'tile_3' => '#7d6340',
		'tile_4' => '#744c55',
		'tile_5' => '#57526f',
		'tile_6' => '#3d5e6b',
	);
}

/**
 * Colors in use: the defaults, replaced by the constants that hold a valid hexadecimal color
 *
 * @return array<string,string>
 */
function neutronColors()
{
	$colors = neutronDefaultColors();
	foreach ($colors as $name => $default) {
		$value = getDolGlobalString('NEUTRON_COLOR_'.strtoupper($name));
		if (preg_match('/^#([0-9a-f]{3}|[0-9a-f]{6})$/i', $value)) {
			$colors[$name] = $value;
		}
	}
	return $colors;
}

/**
 * The color fields of Setup - Display - Theme: for each one, the Neutron color that is its default
 * and the variables of the md sheet it drives (none yet for the left menu).
 *
 * @return array<string,array{0:string,1:string[]}>
 */
function neutronThemeFields()
{
	return array(
		'THEME_ELDY_TOPMENU_BACK1' => array('bar', array('--colorbackhmenu1', '--colortopbordertitle1')),
		'THEME_ELDY_VERMENU_BACK1' => array('side_bg', array()),
		'THEME_ELDY_BACKBODY' => array('body', array('--colorbackbody')),
		'THEME_ELDY_TEXTTITLENOTAB' => array('title_text', array('--colortexttitlenotab')),
		'THEME_ELDY_BACKTITLE1' => array('surface_2', array('--colorbacktitle1')),
		'THEME_ELDY_TEXTTITLE' => array('title_text', array('--colortexttitle')),
		'THEME_ELDY_TEXTTITLELINK' => array('title_text', array('--colortexttitlelink')),
		'THEME_ELDY_LINEIMPAIR1' => array('surface', array('--colorbacklineimpair1', '--colorbacklineimpair2')),
		'THEME_ELDY_LINEPAIR1' => array('surface', array('--colorbacklinepair1', '--colorbacklinepair2')),
		'THEME_ELDY_TEXTLINK' => array('link', array('--colortextlink')),
		'THEME_ELDY_USE_HOVER' => array('row_hover', array('--colorbacklinepairhover')),
		'THEME_ELDY_USE_CHECKED' => array('row_checked', array('--colorbacklinepairchecked')),
		'THEME_ELDY_BTNACTION' => array('accent', array('--butactionbg')),
		'THEME_ELDY_TEXTBTNACTION' => array('button_text', array('--textbutaction')),
	);
}

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
