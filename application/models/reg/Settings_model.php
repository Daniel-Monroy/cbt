<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

	private $table;
   	public function __construct(){
		parent::__construct();
		$this->table = 'settings';
   	}
   	function get($item = NULL, $value = NULL){
   		if($item){
   			$this->db->where($item, $value);
   		}
   		$this->db->where("status", ALIVE);
   		return $this->db->get($this->table);
   	}
}

/* End of file Settings_model.php */
/* Location: ./application/models/reg/Settings_model.php */