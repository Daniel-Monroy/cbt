<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Plans
 */
class Plans extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('plans/plans_model');
	}

	public function get_all_plans(){
		if ($this->input->post("plan_id") != "") {
			$item = "id";
			$value = $this->input->post("plan_id");
		} else{
			$item = null;
			$value = null;
		}
		
		$request = $this->plans_model->get_all_plans($item, $value);
		
		echo json_encode($request->result());
	}

}