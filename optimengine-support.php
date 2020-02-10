<?php
/**
* OptimEngine Support Client
*
* @wordpress-plugin
* Plugin Name:      OptimEngine Support Client
* Description:      Keep this activated if your site is hosted by OptimEngine managed hosting. This is a must have plugin which helps us to do regular maintenance of your site and provide you support.
* Version:          5.6.0
* Author:           OptimEngine
* License:          GPL-2.0+
* License URI:      http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain:      optimengine
*/

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/OptimBro/OptimEngine-Support',
	__FILE__,
	'optimengine-support'
);

//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('your-token-here');

//Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('stable-branch-name');

require __DIR__ . '/mainwp-child/mainwp-child.php';