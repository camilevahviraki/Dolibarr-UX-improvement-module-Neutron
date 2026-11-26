<?php
/**
 * \file       htdocs/custom/neutron/css/theme-images.css.php
 * \brief      Images that Dolibarr asks in htdocs/theme/neutron/img/, which does not exist for a theme that
 *             lives in a module: the ones of md are shown instead.
 */

$neutronimages = array(
	'object_calendar.png', 'object_calendarday.png', 'calendar.png', 'delete.png', 'grip.png', 'working.gif',
);

print "\n/* ---------- Neutron: images taken from md ---------- */\n";
foreach ($neutronimages as $neutronimage) {
	print 'img[src*="/theme/neutron/img/'.$neutronimage.'"], input[type=image][src*="/theme/neutron/img/'.$neutronimage.'"]';
	print ' { content: url("'.DOL_URL_ROOT.'/theme/md/img/'.$neutronimage.'"); }'."\n";
}
