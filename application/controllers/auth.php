<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('profile');
		$this->load->model('fbprofile');
	}
	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$fb = My_facebook_wrapper::get_instance(true);
		$user = $fb->getUser();
		if(!$user) {
			$login_url = $fb->getLoginUrl(array(
				'canvas' => 1,
				'fbconnect' => 0,
				'scope' => $this->config->item('fb_scope')
			));
			redirect($login_url, 'GET');
			return;
		} else {
			try {
				$data['user_profile'] = $fb->api('/me?fields=id,name,gender,age_range', 'GET');

				$data['query'] = $this->profile->read_formFB($data['user_profile']['id']);
				if( count($data['query']) <= 0 )
				{
					$this->session->set_userdata(array('_tmpprf' => $data['user_profile']));
					$this->confirm_registration();
					return;
				}
				// TODO store session information
				$data['query2'] = $this->fbprofile->read($data['user_profile']['id']);
				$this->session->set_userdata(array('sessionInfo' => $data['query'][0]));
				$this->session->set_userdata(array('sessionInfoFB' => $data['query2'][0]));
				redirect('facade');
			} catch(FacebookApiException $e) {
				$user = NULL;
				echo var_dump($e);
			}
		}
	}
	public function confirm_registration() {
		$this->load->view('confirm_registration');
	}
	public function confitm_agreement() {
		$this->load->view('confitm_agreement');
	}
	public function regist() {
		$_user_profile = $this->session->userdata('_tmpprf');
		if( !$_user_profile ) {
			// TODO Error occured
			trigger_error('there is no profile data error',E_USER_ERROR);
			return;
		}
		$this->session->unset_userdata('_tmpprf');
		$this->profile->id = $this->get_new_id();
		$this->profile->fb_id = $_user_profile['id'];
		$ret = $this->profile->create();
		if( $ret ) {
			$this->fbprofile->id = $this->profile->fb_id;
			$this->fbprofile->name = $_user_profile['name'];
			$this->fbprofile->gender = $_user_profile['gender'];
			$this->fbprofile->age_range = $this->get_age_range($_user_profile['age_range']);
			$ret = $this->fbprofile->create();
			if( $ret ) {
				// TODO store session information
				$data['query'] = $this->profile->read_formFB($_user_profile['id']);
				$data['query2'] = $this->fbprofile->read($_user_profile['id']);
				$this->session->set_userdata(array('sessionInfo' => $data['query'][0]));
				$this->session->set_userdata(array('sessionInfoFB' => $data['query2'][0]));
				redirect('accounts/add');
			} else {
				// TODO roll back db
				$this->profile->delete($this->profile->id);
			}
		}
		// TODO Error occured
		trigger_error('insert  profile data failed',E_USER_ERROR);
	}
	
	private function get_new_id() {
		// TODO
		return uniqid();
	}
	private function get_age_range($_age_range) {
		$ret = NULL;
		if(isset($_age_range['min'])) {
			$ret = $_age_range['min'];
			$ret .= "-";
			if(isset($_age_range['max'])) {
				$ret .= $_age_range['max'];
			}
		}
		return $ret;
	}
	public function logout()
	{
		try {
			$this->session->unset_userdata(array('sessionInfo' => NULL));
			$this->session->unset_userdata(array('sessionInfoFB' => NULL));

			$cookie_name = 'fbsr_'.$this->config->item('fb_appId');
			setcookie($cookie_name,'',time()-3600,'/');
			unset($_COOKIE[$cookie_name]);

			$fb = My_facebook_wrapper::get_instance(/*true,$fb_config*/);
			$url = $fb->getLogoutUrl(array('next' => base_url()));
			$fb->destroySession();

			header('location: '.$url);
		} catch (Exception $e) {
			echo var_dump($e);
		}
	}
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */