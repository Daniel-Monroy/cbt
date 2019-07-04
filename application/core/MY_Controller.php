<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    function __construct(){
        date_default_timezone_set("America/Mexico_City");
        parent::__construct();
    }
}
