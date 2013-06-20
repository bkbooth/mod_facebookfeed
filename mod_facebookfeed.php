<?php
/*
 * Facebook Feed module
 * © 2012 e-motion design
 * dev@e-motion.com.au
 * www.e-motion.com.au
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$profile_id = $params->get('fb_profile_id');
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

$profile = modFacebookfeedHelper::getProfile($params);
$feed = modFacebookfeedHelper::getFeed($params);

require(JModuleHelper::getLayoutPath('mod_facebookfeed'));

?>