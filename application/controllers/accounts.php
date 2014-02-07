<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH .'third_party/JAXL-3.x/jaxl.php');
class accounts extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->show_list();
	}
	public function set_me() {
		$this->load->view('accounts_set_me',$this->data);
	}
	public function show_list() {
		$this->load->view('accounts_list',$this->data);
	}
	public function add() {
		$user_profileFB = $this->session->userdata('sessionInfoFB');
		$fb = My_facebook_wrapper::get_instance();
		$user = $fb->getUser();
		if(!$user) {
			// TODO Error occured
			trigger_error('facebook user object missing',E_USER_ERROR);
			return;
		}
		try {
 			$params = array(
 				'method' => 'fql.query',
//				'query' => "SELECT uid,name,sex,pic_square,is_app_user FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me()) AND sex='".$user_profileFB->gender."'"
				'query' => "SELECT uid,name,sex,pic_square,is_app_user FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me())"
 			);
			$this->data['user_friends'] = $fb->api($params);
		} catch(FacebookApiException $e) {
			;
		}
		$this->load->view('accounts_add',$this->data);
	}
	public function add_confirm() {
		$fb = My_facebook_wrapper::get_instance();
		$uid_installed = preg_split('/;;/',$this->input->post('uid_installed'));
		$to_fbuid = $uid_installed[0];
		$installed = count($uid_installed)>1&&$uid_installed[1];
		$from_fbuid = $this->session->userdata('sessionInfo')->fb_id;
		if($to_fbuid && $from_fbuid) {
			if( $installed ) {
				$this->send_message_apprequests_GraphAPI($fb,/*$this->facebook->getApplicationAccessToken()*/$this->getApplicationAccessToken(),$to_fbuid,/*$fb_message*/'plz check');
			} else {
				$this->send_message_JAXL($fb->getAccessToken(),$from_fbuid,$to_fbuid,"get a pai... no, i do not mean that. so sorry.\nhttp://apps.facebook.com/cargodinner/");
			}
		}
	}
	private function getApplicationAccessToken() {
		return $this->config->item('fb_appId').'|'.$this->config->item('fb_secret');
	}
	private function send_message_JAXL($fb_access_token,$from_fbuid,$to_fbuid,$fb_message) {
		$params = array(
			'jid' => $from_fbuid.'@chat.facebook.com',
			'fb_app_key' => $this->config->item('fb_appId'),
			'fb_access_token' => $fb_access_token,
			// force tls (facebook require this now)
			'force_tls' => true,
			// (required) force facebook oauth
			'auth_type' => 'X-FACEBOOK-PLATFORM',
			
			// (optional)
			//'resource' => 'resource',
			
			'log_level' => JAXL_INFO
// 			'log_level' => JAXL_DEBUG
		);

		$client = new JAXL($params);
		//
		// add necessary event callbacks here
		//
		$client->add_cb('on_auth_success', function() use($client, $to_fbuid, $fb_message) {
			_info("got on_auth_success cb, jid ".$client->full_jid->to_string());
			$client->set_status("available!", "dnd", 10);

			$client->send_chat_msg('-'.$to_fbuid.'@chat.facebook.com', $fb_message);
			$client->send_end_stream();
		});
		$client->add_cb('on_auth_failure', function($reason) use($client) {
			$client->send_end_stream();
			_info("got on_auth_failure cb with reason $reason");
		});
		$client->add_cb('on_disconnect', function() {
			_info("got on_disconnect cb");
		});

		//
		// finally start configured xmpp stream
		//
		try {
			$client->start();
		} catch(Exception $e) {
			var_dump($e);
		}
	}
	private function send_message_apprequests_GraphAPI($fb,$fb_application_access_token,$to_fbuid,$fb_message) {
		try {
			$fb->api('/'.$to_fbuid.'/apprequests','POST',array('message' => $fb_message, 'access_token' => $fb_application_access_token));
		} catch(Exception $e) {
			var_dump($e);
		}
	}
	public function modify($id) {
		$this->load->view('accounts_modify',$this->data);
	}
	public function delete($id) {
		$this->load->view('accounts_delete',$this->data);
	}
}
/* End of file accounts.php */
/* Location: ./application/controllers/accounts.php */