<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Records_model extends CI_Model {

	private $table;
   	public function __construct(){
		parent::__construct();
		$this->table = 'records';
   	}

	function get_all($item = NULL, $value = NULL){	
		if ($item) {
			$this->db->where($item, $value);
		}
		$this->db->order_by('date_registred');
        return $this->db->get($this->table);
    }

    function add($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function update($record_id, $record_info){
        $this->db->where('record_id', $record_id);
        $this->db->update($this->table, $record_info);
        return TRUE;
    }

    function registration_code_enconde($registration_code){
        $this->load->library('encryption');
        $decoded_string = $this->encryption->encrypt($registration_code);
        return $decoded_string;
    }

    function registration_code_decode($registration_code){
        $this->load->library('encryption');
        $decoded_string = $this->encryption->decrypt($registration_code);
        return $decoded_string;
    }

}
/* End of file Records_model.php */
/* Location: ./application/models/records/Records_model.php */