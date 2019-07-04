<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

function my_number_format($number, $decimals)
{
    if (is_numeric($number)) {
        if ($number) {
            return number_format($number, $decimals);
        } elseif ($number === 0) { 
            return '0.00';
        } elseif ($number === '0.00') { 
            return '0.00';
        } else {
            return '';
        }
    } else {
        return $number;
    }  
}

// ------------------------------------------------------------------------

function edo_format($edo)
{
    switch ($edo) {
    case 'sin': $resp = "Sinaloa"; break;
    case 'dur': $resp = "Durango"; break;
    case 'zac': $resp = "Zacatecas"; break;
    case 'nay': $resp = "Nayarit"; break;
    case 'jal': $resp = "Jalisco"; break;
    case 'col': $resp = "Colima"; break;
    case 'chiuh': $resp = "Chihuahua"; break;
    case 'coah': $resp = "Coahuila"; break;
    case 'nl': $resp = "Nuevo león"; break;
    case 'tam': $resp = "Tamaulipas"; break;
    case 'hgo': $resp = "Hidalgo"; break;
    case 'ver': $resp = "Veracruz"; break;
    case 'tlax': $resp = "Tlaxcala"; break;
    case 'df': $resp = "Distrito Federal"; break;
    case 'mex': $resp = "México"; break;
    case 'mor': $resp = "Morelos"; break;
    case 'pue': $resp = "Puebla"; break;
    case 'mich': $resp = "Michoacán"; break;
    case 'gro': $resp = "Guerrero"; break;
    case 'oax': $resp = "Oaxaca"; break;
    case 'chis': $resp = "Chiapas"; break;
    case 'tab': $resp = "Tabasco"; break;
    case 'cam': $resp = "Campeche"; break;
    case 'yuc': $resp = "Yucatán"; break;
    case 'qroo': $resp = "Quintana Roo"; break;
    case 'son': $resp = "Sonora"; break;
    case 'bc': $resp = "Baja California"; break;
    case 'bcs': $resp = "Baja California Sur"; break;
    case 'gto': $resp = "Guanajuato"; break;
    case 'slp': $resp = "San Luis Potosí"; break;
    case 'qro': $resp = "Querétaro"; break;
    case 'ags': $resp = "Aguascalientes"; break;
    default: $resp = '';
    }
    
    return $resp;
}

// ------------------------------------------------------------------------

function ext_icon($extension)
{
    switch ($extension) {
    case 'doc': $resp = "word.png"; break;
    case 'docx': $resp = "word.png"; break;
    case 'xls': $resp = "excel.png"; break;
    case 'xlsx': $resp = "excel.png"; break;
    case 'csv': $resp = "excle.png"; break;
    case 'ppt': $resp = "pp.png"; break;
    case 'pptx': $resp = "pp.png"; break;
    case 'pdf': $resp = "pdf.png"; break;
    default: $resp = "text.png"; break;
    }
    return $resp;
}

// ------------------------------------------------------------------------

function required_field()
{
    return '<span class="pull-left text-danger"> *&nbsp;</span>';
}

// ------------------------------------------------------------------------

function row_class($f1, $f2, $f3, $f4)
{
    if ( ($f1)&&(!$f4) ) { 
        $clase=' class="warning"'; 

    } else { 
        if ( ($f3) ) { 
            $clase=' class="active"';

        } else {
            $clase=''; 

        }
    }
    return $clase;
}

// ------------------------------------------------------------------------

function row_table_class($f1, $f2, $f3, $f4)
{

    if ( ($f1)&&(!$f4) ) { 
        $clase=' class="strong"'; 

    } else { 
        if ( ($f3) ) { 
            $clase=' class="active"';

        } else {
            $clase=''; 

        }
    }
    return $clase;
}


/* End of file MY_form_helper.php */
