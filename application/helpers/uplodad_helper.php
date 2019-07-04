<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
function prepare_upload_path($upload_path, $relative_path=TRUE,$upload_flag=TRUE){
    if (strlen($upload_path)>2){
        if (substr($upload_path,0,2)=='./'){
            $upload_path = substr($upload_path,2,strlen($upload_path));
        }
    }
    if (!$relative_path){
        return base_url().$upload_path;
    } else {
        return $upload_path;
    }
}
?>