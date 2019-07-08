<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
$CI =& get_instance();
$CI->load->model('reg/settings_model');
$sInfo = $CI->settings_model->get("settings_email", 1)->row();
$config['sender_email'] = $sInfo->email;
$config['sender_name']  = $sInfo->sender_name;
