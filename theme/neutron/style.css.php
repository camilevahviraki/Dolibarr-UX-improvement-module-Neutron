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

// The output is held back so the cache header of md can be replaced at the end
ob_start();

// Base: md. It loads Dolibarr, sends the headers and prints its rules. Nothing of md is copied.
require dirname(__DIR__, 4).'/theme/md/style.css.php';

// Overrides of md, grouped like the files of md
include __DIR__.'/md-overrides/index.php';

// New in Neutron: the default colors on the theme setup page
include dirname(__DIR__, 2).'/css/settings.css.php';

// New in Neutron: images that Dolibarr looks for outside of the module
include dirname(__DIR__, 2).'/css/theme-images.css.php';

// md lets the browser keep the sheet for 3 hours: ask it to check at each page while the theme is being built.
// TODO Use a long max-age again before publishing.
header('Cache-Control: no-cache, must-revalidate');
ob_end_flush();
