<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $data;
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$si = $this->session->userdata('sessionInfo');
		$sifb = $this->session->userdata('sessionInfoFB');
		if(!$si || !$sifb) {
			redirect('auth/login');
		}
		$this->data['user_name'] = $sifb->name;
	}
}
/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */