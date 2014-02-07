<?php
class profile extends MY_Model {
	public $id = null;
	public $fb_id = null;
	public $pair_id = null;

	function __construct() {
		parent::__construct();
	}
	function read_formFB($fb_id) {
		return $this->read_general('fb_id', $fb_id);
	}
}
/* End of file profile.php */
/* Location: ./application/models/profile.php */