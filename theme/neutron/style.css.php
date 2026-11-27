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
 * \brief      Stylesheet of the theme "neutron": the "md" theme as a base, then what Neutron adds and overrides.
 */

// Buffered to replace the cache header of md
ob_start();

require_once dirname(__DIR__, 2).'/lib/dolibarr-root.php';
$neutronroot = neutronDolibarrRoot();
if ($neutronroot === '') {
	header('Content-Type: text/css');
	print '/* Neutron: the htdocs folder of Dolibarr was not found */';
	exit;
}

require $neutronroot.'/theme/md/style.css.php';

include __DIR__.'/md-overrides/index.php';

include dirname(__DIR__, 2).'/css/settings.css.php';

include dirname(__DIR__, 2).'/css/theme-images.css.php';

// TODO Restore a long max-age before publishing
header('Cache-Control: no-cache, must-revalidate');
ob_end_flush();
