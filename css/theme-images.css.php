<?php
/**
 * \file       htdocs/custom/neutron/css/theme-images.css.php
 * \brief      Images of md for the paths htdocs/theme/neutron/img/.
 */

$neutronimages = array(
	'object_calendar.png', 'object_calendarday.png', 'calendar.png', 'delete.png', 'grip.png', 'working.gif',
);

print "\n\n";
foreach ($neutronimages as $neutronimage) {
	print 'img[src*="/theme/neutron/img/'.$neutronimage.'"], input[type=image][src*="/theme/neutron/img/'.$neutronimage.'"]';
	print ' { content: url("'.DOL_URL_ROOT.'/theme/md/img/'.$neutronimage.'"); }'."\n";
}
