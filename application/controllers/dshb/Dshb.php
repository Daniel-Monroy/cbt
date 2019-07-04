<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Dshb
 */
class Dshb extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
		$data['extraHeadPluginsContent'] = "";
		$data['extraHeadContent']   = '';
		$data['extraHeadContent']  .= get_assets("dshb/index.css");
		$data['extraFooterPluginsContent'] = "";
		$data['extraFooterContent']  = "";
		$this->load->view('dshb/index', $data);
	}

}

/* End of file Dshb.php */
/* Location: ./application/controllers/dshb/Dshb.php */