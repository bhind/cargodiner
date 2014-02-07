<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class facade extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('main_menu',$this->data);
	}
}
/* End of file facade.php */
/* Location: ./application/controllers/facade.php */