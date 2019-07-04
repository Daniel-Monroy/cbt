<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dshb
 */
class Dshb_admin extends MY_Controller {

  function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
  }

  # = INDEX
  public function index(){
    $this->load->view('cmn/dshb');
  }

}