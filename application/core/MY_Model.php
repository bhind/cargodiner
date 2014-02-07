<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $tablename;
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->tablename = get_class($this);
	}
	public function create() {
		$now = $this->get_now();;
		$this->db->set(array('create_date' => $now, 'modified_date' => $now));
		return $this->db->insert($this->tablename,$this);
	}
	public function read($id) {
		return $this->read_general('id', $id);
	}
	protected function read_general($columnname,$key) {
		$query = $this->db->get_where($this->tablename,array($columnname => $key));
		return $query->result();
	}
	public function update($id) {
		return $this->db->update($this->tablename,$this,array('id' => $id));
	}
	public function delete($id) {
		return $this->db->delete($this->tablename,array('id' => $id));
	}
	private function get_now() {
		return date('Y-m-d H:i:s');
	}
}
/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */