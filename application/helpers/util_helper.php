<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('get_assets')){
   function get_assets($file, $type=NULL){
      if($type === NULL){
         preg_match('/^.*(min)?(\..+$)/', $file, $matches);
         $type = $matches[2];
      }
      switch ($type) {
         case '.css':
            return '<link type="text/css" rel="stylesheet" href="'. base_url() . 'assets/css/' . $file . '">' . PHP_EOL;
            break;
         case '.js':
            return '<script src="'.base_url().'assets/js/' . $file . '"></script>' . PHP_EOL;
            break;
         case 'adm_lte-css':   
            return '<link type="text/css" rel="stylesheet" href="'. base_url() . 'assets/adm_lte/' . $file . '">' . PHP_EOL;
            break;
         case 'adm_lte-js':   
            return '<script src="'.base_url().'assets/adm_lte/' . $file . '"></script>' . PHP_EOL;
            break;   
         default:
            return '';
            break;
      }
   }
}


if(!function_exists('get_message')){
   function get_message($type, $message){
      return '<div style="margin-top:16px;" class="alert alert-' .$type . ' alert-dismissable">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' .
                 '<span style="font-size:16px">'.$message.'</span>'.
             '</div>';
   }
}
