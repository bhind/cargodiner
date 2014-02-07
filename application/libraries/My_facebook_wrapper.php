<?php
require_once('facebook.php');
class My_facebook_wrapper {
	private static $_instance = null;
	public static function get_instance($_force_refresh = false, $_fb_config = null) {
		if($_force_refresh || is_null(self::$_instance)) {
			self::$_instance = null;
			if( is_null($_fb_config) ) {
				$ci = get_instance();
				$fb_config = array(
					'appId' => $ci->config->item('fb_appId'),
					'secret' => $ci->config->item('fb_secret'),
					'scope' => $ci->config->item('fb_scope')
				);
			} else {
				$fb_config = $_fb_config;
			}
			$_instance_buf = new Facebook($fb_config);
			self::$_instance = $_instance_buf;
		}
		return self::$_instance;
	}
}
/* End of file My_facebook_wrapper.php */
/* Location: ./application/libraries/My_facebook_wrapper.php */