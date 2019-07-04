<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function lang_to_query($str = '')
{
    $CI =& get_instance();
    $CI->load->helper('text');

    $str = convert_accented_characters($str);

    $str = str_replace('.', '_', $str);
    $str = str_replace(' ', '_', $str);
    $str = str_replace('/', '_', $str);
    $str = str_replace('(', '', $str);
    $str = str_replace(')', '', $str);
    $str = str_replace('&', '_and_', $str);
    return $str;
}

// ------------------------------------------------------------------------

function lang_to_file_readable($str = '')
{
    $CI =& get_instance();
    $CI->load->helper('text');
    $str = str_replace('<br>', ' - ', $str);
    $str = convert_accented_characters($str);
    return $str;
}

// --------------------------------------------------------------------

function dig_seal($data='')
{
    $CI =& get_instance();
    if ($data==''){
        return str_encode($CI->session->userdata('user_description').'|'.date($CI->config->item('log_date_format'),time()));
    } else {
        return str_encode($data);
    }

}

// --------------------------------------------------------------------

function str_decode($coded_string)
{
    $CI =& get_instance();
    $CI->load->library('encryption');
    $decoded_string = $CI->encryption->decrypt($coded_string);
    return $decoded_string;
}

// --------------------------------------------------------------------

function str_encode($noncoded_string)
{
    $CI =& get_instance();
    $CI->load->library('encryption');
    $coded_string = $CI->encryption->encrypt($noncoded_string);
    return $coded_string;
}

// --------------------------------------------------------------------
require_once(APPPATH."third_party/dompdf/lib/html5lib/Parser.php");
require_once(APPPATH."third_party/dompdf/src/Autoloader.php");
Dompdf\Autoloader::register();
use Dompdf\Dompdf;

function pdf_create($html, $filename, $stream=TRUE, $save_file = FALSE, $directory = 'records_formats', $orientation="portrait", $paper="letter", $pass_protect=FALSE){

    ini_set("memory_limit","4112M");
  
    $dompdf = new Dompdf();

    $dompdf->set_paper($paper, $orientation);

    $dompdf->load_html($html);

    $dompdf->render();

    $CI =& get_instance();
    
    #GUARDAR EL PDF
    $CI->load->helper('file');

    if ($save_file) {
    
      write_file('./files/'.$directory.'/'.$filename.'.pdf', $dompdf->output());
    
    }
    #DESCARGAR PDF
    if ($stream) {
        $dompdf->stream($filename.".pdf");
    }
}

function to_xml($object, $element_name)
{

   print_r($object);
   $obj =& get_instance();

   /* determine whether the $object is a table name or query result */
   switch (TRUE){
   case is_string($object): // treat object as a tablename
      $query = $obj->db->get($object);
      $total = count($query->result_array());
      $fields = $obj->db->field_names($object);
      break;
   case !is_string($object): // treat object as an Active Record query result
      $query = $object;
      $total = $object->num_rows();
      $field_list = $object->field_data();



      foreach($field_list as $key=>$value)
      {
          if ($key = 'name') // only keep name metadata
          {
            $fields[] = current($value);
          }
      }
      break;
   }

   /* Prepare XML Writer  */
   $obj-> Writer4 = new Xmlwriter4();
   $xml = $obj-> Writer4;

   /* Start XML */
   $xml->push('invoice_information', array('total' => $total));

   /* Create an element for each query result */
   foreach ($query->result_array() as $row)
   {
      foreach ($fields as $field)
      {
         $allfields[$field] = $row[$field];
      }
      $xml->emptyelement($element_name, $allfields);
   } //end loop through query

   /* close XML and output */
   $xml->pop();
   print $xml->getXml();
}

// Xmlwriter class by Simon Willison, 16th April 2003
// Based on Lars Marius Garshol's Python XMLWriter class
class Xmlwriter4 {

    var $xml;
    var $indent;
    var $stack = array();

    function Writer4($indent = '   ') {
        $this->indent = $indent;
        $this->xml = '<?xml version="1.0" encoding="utf-8"?>'."\r\n";
    }
    function _indent() {
        for ($i = 0, $j = count($this->stack); $i < $j; $i++) {
            $this->xml .= $this->indent;
        }
    }
    function push($element, $attributes = array()) {
        $this->_indent();
        $this->xml .= '<'.$element;
        foreach ($attributes as $key => $value) {
            $this->xml .= ' '.$key.'="'.htmlentities($value).'"';
        }
        $this->xml .= ">\r\n";
        $this->stack[] = $element;
    }
    function element($element, $content, $attributes = array()) {
        $this->_indent();
        $this->xml .= '<'.$element;
        foreach ($attributes as $key => $value) {
            $this->xml .= ' '.$key.'="'.htmlentities($value).'"';
        }
        $this->xml .= '>'.htmlentities($content).'</'.$element.'>'."\r\n";
    }
    function emptyelement($element, $attributes = array()) {
        $this->_indent();
        $this->xml .= '<'.$element;
        foreach ($attributes as $key => $value) {
            $this->xml .= ' '.$key.'="'.htmlentities($value).'"';
        }
        $this->xml .= " />\r\n";
    }
    function pop() {
        $element = array_pop($this->stack);
        $this->_indent();
        $this->xml .= "</$element>\r\n";
    }
    function getXml() {
        return $this->xml;
    }
}

?>
