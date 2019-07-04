<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Institutes_model
 */
class Institutes_model extends CI_Model {

	private $table;
   	public function __construct(){
      parent::__construct();
      $this->table = 'institutes';
   	}

	function get_all_institutes($item, $value){	
		if ($item != null) {
			$this->db->where($item, $value);
		}
        $this->db->where('delete_user_id is null');
        return $this->db->get($this->table);
    }
}

/* End of file Institutes_model.php */
/* Location: ./application/models/institutes/Institutes_model.php */