<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans_model extends CI_Model {

	private $table;

	public function __construct(){
		parent::__construct();
		$this->table = 'plans';
	}

	function get_all($item = NULL, $value = NULL){	
		if ($item) {
			$this->db->where($item, $value);
		}
        $this->db->where('status', ALIVE);
        return $this->db->get($this->table);
    }

}

/* End of file Plan_model.php */
/* Location: ./application/models/plans/Plan_model.php */