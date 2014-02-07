<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class post_test extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('post_test',$this->data);
	}
	public function post()
	{
		$message = $this->input->post('post_message');
		if( $message ) {
			try {
				$fb = My_facebook_wrapper::get_instance();
				$ret = $fb->api('/me/feed','POST',
						array('message' => $message,
							'link' => 'http://apps.facebook.com/cargodinner/',
							'name' => 'Cargo Dinner',
							'caption' => 'caption',
							'description' => 'description'
				));
			} catch(FacebookApiException $e) {
				;
			}
		}
		redirect('post_test',$this->data);
	}
}
/* End of file post_test.php */
/* Location: ./application/controllers/post_test.php */