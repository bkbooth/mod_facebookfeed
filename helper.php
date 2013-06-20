<?php
/*
 * Facebook Feed module - helper
 * © 2012 e-motion design
 * dev@e-motion.com.au
 * www.e-motion.com.au
 */

// no direct access
defined('_JEXEC') or die;

class modFacebookfeedHelper {
	
	function getProfile($params) {
		$profile_id = $params->get('fb_profile_id');
		
		$profile = modFacebookfeedHelper::fetchUrl("https://graph.facebook.com/{$profile_id}");
		
		return json_decode($profile);
	}
	
	function getFeed($params) {
		$profile_id = $params->get('fb_profile_id');
		$app_id = $params->get('fb_app_id');
		$app_secret = $params->get('fb_app_secret');
		$feed_limit = $params->get('feed_limit');
		
		$authToken = modFacebookfeedHelper::fetchUrl("https://graph.facebook.com/oauth/access_token?type=client_cred&client_id={$app_id}&client_secret={$app_secret}");
		$feed = modFacebookfeedHelper::fetchUrl("https://graph.facebook.com/{$profile_id}/feed?{$authToken}&limit={$feed_limit}");
		
		return json_decode($feed);
	}
	
	static function fetchUrl($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		
		$retData = curl_exec($ch);
		curl_close($ch); 
		
		return $retData;
	}
}

?>