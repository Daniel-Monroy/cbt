<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * MY_Form_validation Class
 *
 * Extends Form_Validation library
**/
class MY_Form_validation extends CI_Form_validation{

	function __construct(){
	    parent::__construct();
	}

	function valid_combo_id($str){
		return (bool)preg_match( '/^[0-9]+$/', $str);
    }

    function valid_char_combo_id($str){
		return $str!='-1' ? TRUE : FALSE;
    }

	function different($str, $field){
		if ( ! isset($_POST[$field]))
		{
			return FALSE;
		}

		return ($str !== $_POST[$field]) ? TRUE : FALSE;
	}

	function human_date($date, $field){
        if (strlen($date)==0){
            return TRUE;
        }
        if (strlen($date)==10) {
            $year =substr($date,6,4);
            $month=substr($date,3,2);
            $day=substr($date,0,2);

            if (preg_match( '/^[0-9]+$/', $year) === FALSE) { return FALSE; }
            if (preg_match( '/^[0-9]+$/', $month) === FALSE) { return FALSE; }
            if (preg_match( '/^[0-9]+$/', $day) === FALSE) { return FALSE; }
            if (($month<1)||($month>12)) { return FALSE; }
            if (($day<1)||($day>31)) { return FALSE; }

            return TRUE;
        } else {
            return FALSE;
        }
	}

	function valid_time($time){
        if (strlen($time)==0){
            return TRUE;
        }
        if (strlen($time)==5) {
            $minute=substr($time,3,2);
            $hour=substr($time,0,2);
            if (preg_match( '/^[0-9]+$/', $minute) === FALSE) { return FALSE; }
            if (preg_match( '/^[0-9]+$/', $hour) === FALSE) { return FALSE; }
            if (($minute<0)||($minute>60)) { return FALSE; }
            if (($hour<0)||($hour>24)) { return FALSE; }
            return TRUE;
        } else {
            return FALSE;
        }
	}

    function alpha_dash_space($str = ''){
        return ( ! preg_match("/^([-a-z0-9_ ])+$/i", $str)) ? FALSE : TRUE;
    }

    function alpha_dash_int($str = ''){
        $str = (strtolower($this->CI->config->item('charset')) != 'utf-8') ? utf8_encode($str) : $str;
        return ( ! preg_match("/^[[:alpha:]- ÀÁÂÃÄÅĀĄĂÆÇĆČĈĊĎĐÈÉÊËĒĘĚĔĖĜĞĠĢĤĦÌÍÎÏĪĨĬĮİĲĴĶŁĽĹĻĿÑŃŇŅŊÒÓÔÕÖØŌŐŎŒŔŘŖŚŠŞŜȘŤŢŦȚÙÚÛÜŪŮŰŬŨŲŴÝŶŸŹŽŻàáâãäåæçèéêëìíîïñòóôõöøùúûüýÿœšß_.]+$/", $str)) ? FALSE : TRUE;
    }

    function alpha_dash_space_int($str = ''){
        $str = (strtolower($this->CI->config->item('charset')) != 'utf-8') ? utf8_encode($str) : $str;
        return ( ! preg_match("/^[[:alpha:]- ÀÁÂÃÄÅĀĄĂÆÇĆČĈĊĎĐÈÉÊËĒĘĚĔĖĜĞĠĢĤĦÌÍÎÏĪĨĬĮİĲĴĶŁĽĹĻĿÑŃŇŅŊÒÓÔÕÖØŌŐŎŒŔŘŖŚŠŞŜȘŤŢŦȚÙÚÛÜŪŮŰŬŨŲŴÝŶŸŹŽŻàáâãäåæçèéêëìíîïñòóôõöøùúûüýÿœšß_ .]+$/", $str)) ? FALSE : TRUE;
    }

    function search_chars($str = ''){
        $str = (strtolower($this->CI->config->item('charset')) != 'utf-8') ? utf8_encode($str) : $str;
        return ( ! preg_match("/^([a-z0-9\,\_\- ])+$/i", $str)) ? FALSE : TRUE;
    }

	function items_no_zero($str){
		if ( ! preg_match( '/^[0-9]+$/', $str))
		{
			return FALSE;
		}

		if ($str == 0)
		{
			return FALSE;
		}

		return TRUE;
	}

	function items_two_or_more($str){
		if ( ! preg_match( '/^[0-9]+$/', $str))
		{
			return FALSE;
		}

		if ($str == 0)
		{
			return FALSE;
		}

                if ($str == 1)
		{
			return FALSE;
		}

		return TRUE;
	}

    function item_error($field = '', $prefix = '', $suffix = '', $only_ast=TRUE){
        if ( ! isset($this->_field_data[$field]['error']) OR $this->_field_data[$field]['error'] == '')
        {
                return '';
        }

        if ($prefix == '')
        {
                $prefix = $this->_error_prefix;
        }

        if ($suffix == '')
        {
                $suffix = $this->_error_suffix;
        }

        if ($only_ast){
            return '<span class="error_color">**</span>';
        }
        else {
            return $prefix.$this->_field_data[$field]['error'].$suffix;
        }
    }

}
