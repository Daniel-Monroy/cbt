<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />

<style type="text/css">

 html{

    margin: 30pt 30pt;
 }
body {
    font-size: 12px;
    margin: 0.6em;
}
h1, h2, h3, h4, h5, h6, li, blockquote, p, th, td {
    font-family: Helvetica, Arial, Verdana, sans-serif;
}
h1, h2, h3, h4 {
    color: #5E88B6;
    font-weight: normal;
}
h2 {
    margin: 0 0 0 0;
    font-size: 1.5em;
}
address{
    font-style: normal;
}
#record_table table{
    page-break-inside:auto;
}
#record_table tr{
    page-break-inside:avoid;
    page-break-after:auto;
}
#record_table tr:nth-child(even) td {
    background: #ececec;
}
#record_table tr:nth-child(odd) td {
    background: #fff;
}
table {
    border-collapse: collapse;
    width: 100%;
}
td {
    padding:0 5px 0 5px;
    font-size: .8em;
}
#record_table td{
    padding: 5px;
}
#docto_table td{
    padding: 2px;
}
#kardex_table table{
    border-collapse: collapse;
    width: 100%;
}
#kardex_table table td, #kardex_table table th{
    padding: 1px 5px;
    border: 1px solid #000;
}
#kardex_table table td.bortopb{
    border-top: 2px solid #ccc;
}
td p {
    font-size: small;
    border: 1px solid #ccc;
    margin: 0;
}

#footer {
    border-top: 1px solid #CCC;
    font-size: .8em;
    color: #999999;
}
#footer a {
    color: #999999;
    text-decoration: none;
}
table.stripe {
    border-collapse: collapse;
    page-break-after: avoid;
}
table.stripe td {
    border-bottom: 1pt solid black;
}
#record_table tr.warning2{
    background-color: #c00;
}
p{
    margin:0;
}
.text-muted {
    color:#aaa;
}
.text-danger {
    color:#c00;
}
.text-success {
    color:#86bd6f;
}


hr {
    border:solid 1px #ddd;
}

.century_gothic {
    font-family: "century_gothic";
}
.img-thn {
    width:10px;
    height:10px;
}
tr.border > td {
    border: 2px solid #000;
}
</style>


<!--====  End of header_reportes  ====-->

<!--====================================
=            header_formats            =
=====================================-->
<style type="text/css">
h1, h2, h3, h4, h5, h6, li, blockquote, p, th, td {
    /*font-family: "century_gothic", Helvetica, Arial, Verdana, sans-serif;*/
    font-family: "Arial",gothic , Verdana, sans-serif;
}
.ft_title {
    text-align:center;
    /*color:#002060;*/
    color:#000;
    margin:0;
}
.ft_hrtitle {
    margin:0;
    margin-bottom:5px;
    border:1px solid #90b7db;
}
.ft_p1title {
    font-size: 1.3em;
}
.ft_ptitle {
    text-align: left;
}
.ft_p {
    text-align: justify;
    border:0;
    font-size: 10px;
    margin-top:.5em;
    margin-bottom: .5em;
}

.text-red {
    color: #c00;
}
.ft_section {
    margin-top: 5px;
    background-color:#17365d;
    color:#fff;
/*    padding-top:5px;
    padding-bottom:5px;*/
    font-size:12px;
    text-align:center;
}
.ft_photo {
    border:1px solid #ececec;
    width: 81px;
    height: 90px;

}
.ft_unl {
    text-decoration: underline;
    font-weight: bold;
}
.ft_table tr:nth-child(even) td.ft_th,
.ft_table tr:nth-child(even) td.ft_tr {
    background: #ececec;
}
.ft_table tr:nth-child(odd) td {
    background: #fff;
}
.ft_table2 tr:nth-child(even) td.ft_th,
.ft_table2 tr:nth-child(even) td.ft_tr {
    background: #d9e2f3;
}
.ft_table2 tr:nth-child(odd) td {
    background: #fff;
}
.ft_table2 th {
    background: #4472c4;
    color:#fff;
}
.ft_ul {
    text-align: justify;
    border:0;
    margin:0;
    font-size: 8.5px;
    padding-left:2em;
}
.ft_ul li{
    margin:0;
    padding: 0;
}
.page_with_break {
    page-break-before: always;
    /*font-size: 8px;*/
}
</style>


<style>
    <?php if($oformat == 'S'): ?>
    div.container
    {
        margin-top:: 10px;
        margin-left: 200px;
        margin-right: 200px;

    }
    <?php endif; ?>
    table > td{
        vertical-align:middle;

    }
    
    table img#logo{
        width: 110px;  
        height:100px;
    }

</style>




</head>
<body>
<?php
$base_prefix = base_url();
 if(isset($oformat)){

    if($oformat == 'P'){
        $this->config->load('config_reports');
        $base_prefix = $this->config->item('report_prefix');
    }
}
?>
 <div id="sendmail">
  <div class="container">

   <div id="header"> 
    
    <table width="100%">
        
        <tr>
            
            <td width="20%" align="left" >
                <img src="<?php echo $base_prefix; ?>assets/img/template/escudo-edomex.png" id="logo" alt="Tesvg"/>
            </td>
            
            <td  width="50%" align="center" style="vertical-align:middle;">
                <p style=" text-align:center; border:0;font-weight:normal; color: #296331;">
                    <b style="font-size: 25px; font-style: italic;">14° IdeaTec 2019 </b><br />
                    <b style="color:red; font-size:16px; font-style: italic;">
                        "Una persona que nunca cometió un error, nunca intentó algo nuevo"  <br> <small> -  Albert Einstein, físico. </small>
                    </b>
                </p>
            </td>
             <td width="20%" align="right" >
                <img src="<?php echo $base_prefix; ?>assets/img/template/logo_report.png" id="logo" alt="Tesvg" />
            </td>
        </tr>
    </table>
 </div><!--end header-->
 <div >
   <table width="100%">
    <tr>
        <td width="100%" colspan="2" align="center" >
            <p style="font-size:14px; text-align:center; border:0;font-weight:normal; color:black; padding: 2px ;">
               <b>CEDULA DE REGISTRO PARA LOS PROYECTOS DE IDEATEC 2019</b> <br/>
            </p>
        </td>
    </tr>
    <tr>
        <td width="90%" align="center" >
            <p style="font-size:12px; text-align:right; border:0;font-weight:normal; color:black; padding: 2px ;">
               <b>Folio</b> 
            </p>
        </td>
        <td  width="10%" align="center" style=" border: 1px solid black; ">
            <p style="font-size:12px; text-align:center; border:0;font-weight:normal; color:black; padding: 2px ;">
               <b> <?= $record_info->code ?> </b>
            </p>
        </td>        
    </tr>
    </table>
  </div>

    
<div> 
    <table style="margin-top: 20px;">
     <tr style="">
        <td width="15%" align="left" >
            <p style="font-size:12px; text-align:center; border:0;font-weight:normal; color:black; padding: 2px ;">
               <b>Institución:</b> 
            </p>
        </td>
        <td width="80%" align="center" >
            <p style="font-size:12px; text-align:left; border:0;font-weight:normal; color: black; padding: 2px;  border: 1px solid black; margin-top: 10px; height: 22px">
               <b> <?= $institute->description; ?> </b>
            </p>
        </td>  
    </tr>
     <tr>
        <td width="15%" align="left" >
            <p style="font-size:12px; text-align:center; border:0;font-weight:normal; color:black; padding: 2px ;">
               <b>Carrera (s):</b> 
            </p>
        </td>
        <td width="80%" align="center" >
            <p style="font-size:12px; text-align:left; border:0; font-weight:normal; color:black; padding: 2px; border: 1px solid black; margin-top: 10px; height: 22px">
               <b> <?= $plan->description; ?> </b>
            </p>
        </td>  
    </tr>
     <tr >
        <td width="15%" align="left" >
            <p style="font-size:12px; text-align:center; border:0;font-weight:normal; color:black; padding: 2px ;">
               <b>Proyecto:</b> 
            </p>
        </td>
        <td width="80%" align="center" >
            <p style="font-size:12px; text-align:left; border:0;font-weight:normal; color:black; padding: 2px; border: 1px solid black; margin-top: 10px; height: 22px">
              <b> <?= $record_info->proyect_name; ?> </b>
            </p>
        </td>  
    </tr>
     <tr >
        <td width="15%" align="left" >
            <p style="font-size:12px; text-align:center; border:0;font-weight:normal; color:black; padding: 2px ;">
               <b>Categoría:</b> 
            </p>
        </td>
        <td width="80%" align="center" >
            <p style="font-size:12px; text-align:left; border:0;font-weight:normal; color:black; padding: 2px; border: 1px solid black; margin-top: 10px; height: 22px">
               <b> <?= $proyect_category->description; ?> </b>
            </p>
        </td>  
    </tr>
    <tr>
     <td colspan="2" width="80%" align="center" >
            <p style="font-size:12px; text-align:left; border:0;font-weight:normal; color:black; padding: 2px; margin: 10px">
               <b>Emprendedores</b>
            </p>
        </td> 
    </tr>
    </table>
    
    <table width="100%">
       
        <thead style="background: #6fba1d">
            <tr>
            <th width="25%" style="border: 1px solid #000" align="center">Nombre</th>
            <th width="30%" style="border: 1px solid #000" align="center">Direción</th>
            <th width="10%" style="border: 1px solid #000" align="center">Teléfono</th>
            <th width="20%" style="border: 1px solid #000" align="center">e-mail</th>
            <th width="15%"  style="border: 1px solid #000" align="center">Semestre</th>
            </tr>
        </thead>
        
        <tbody style="margin-bottom: 15px; text-align: center; font-size: 11px">

         <?php 

            $members = json_decode($record_info->members_list, true);  
            
            foreach ($members as $key => $member):  ?>

           <tr>
                <td style="border: 1px solid #000; padding: 20px" >
                    <?= $member["member_name"]; ?> <br>
                    <?=
                        ($member["boss_member"] == 1)?('Lider de proyecto'):(''); 
                    ?>
                </td>
                <td style="border: 1px solid #000"> <?= $member["member_address"];?> </td>
                <td style="border: 1px solid #000"> <?= $member["member_phone"]; ?> </td>
                <td style="border: 1px solid #000"> <?= $member["member_email"]; ?> </td>
                <td style="border: 1px solid #000">  <?= $this->grades_model->get_all_grades("id", $member["member_grade"])->row()->description; ?> </td>
            </tr> 
           
         <?php endforeach; ?> 

         <?php

         for ($i=count($members)+1; $i <= 5 ; $i++):?>
         
           <tr>
                <td style="border: 1px solid #000; padding: 20px" ></td>
                <td style="border: 1px solid #000"></td>
                <td style="border: 1px solid #000"></td>
                <td style="border: 1px solid #000"></td>
                <td style="border: 1px solid #000"></td>
            </tr> 
       
        <?php endfor; ?>
        
        </tbody>

    </table>    

    <table align="center" width="100%">
        
        <tbody>

                <tr>
                    <td  align="left">
                        <p style="font-size:12px; text-align:left; border:0;font-weight:normal; color:black; padding: 2px;  margin-top: 20px">
                           <b>Asesor </b><br />
                           <b>académico</b>
                        </p>
                    </td>
                    <td   width="80%" align="center">
                        <p style="font-size:12px; text-align:left; border:0;font-weight:normal; color:black; height: 30px;  border: 1px solid black; margin-top: 20px">
                           <b style="margin-left: 10px"> <?php echo $record_info->academic_tutor ?> </b>
                        </p>
                    </td>  
                </tr>

                <tr>
                    <td width="15%" align="left">
                        <p style="font-size:12px; text-align:left; border:0;font-weight:normal; color:black; padding: 2px;  margin-top: 20px">
                           <b>Asesor </b><br />
                           <b>empresarial</b>
                        </p>
                    </td>
                    <td width="80%" align="center">
                        <p style="font-size:12px; text-align:left; border:0;font-weight:normal; color:black; height: 30px;  border: 1px solid black; margin-top: 20px">
                           <b style="margin-left: 10px"> <?php echo $record_info->business_tutor ?> </b>
                        </p>
                    </td>  
                </tr> 

                <tr>
                    <td width="100%" colspan="2" align="left">
                        <p style="font-size:12px; text-align:center; border:0;font-weight:normal; color:black; padding: 2px ; margin-top: 20px">
                           <b>Descripción del proyecto</b> 
                        </p>
                    </td>
                </tr>

                <tr>
                    <td width="100%" colspan="2" align="center">
                        <p style="font-size:12px; text-align:left; border:0;font-weight:normal; color:black; border: 1px solid black; height: 70px">
                          
                            <?php echo $record_info->proyect_description ?>
                          
                        </p>
                    </td>  
                </tr>
             
        </tbody>

    </table>

    <table align="center" width="100%">
        <tr>
            <td width="100%" align="center">
                <p style="font-size:12px; text-align:center; border:0;font-weight:normal; color:black; margin-top: 20px; margin-bottom: -15px">
                    <?php  $members = json_decode($record_info->members_list, true);  
                    $totals_members = count($members);
                    foreach ($members as $key => $member): ?>
                        <?php echo ($member["boss_member"] == 1)?($member["member_name"]):(''); ?>
                    <?php endforeach; ?> 
                </p>
            </td> 
        </tr>

        <tr>
            <td width="100%" align="center" style="vertical-align: bottom;">
                <p style="font-size:12px; text-align:center; border:0; font-weight:normal; color:black; margin-top: 10px; ">  
                   ________________________________ <br/>
                   Nombre y firma del representante.</b>
                </p>
            </td> 
        </tr>

        <tr>
            <td width="100%" align="center">
                <p style="font-size:12px; text-align:left; border:0;font-weight:normal; color:black; margin-top: 10px; ">
                   Anexar documento que describa las características principales del proyecto.</b>
                </p>
            </td> 
        </tr>
    </table>
</div>

</div>

</div>

</body>

</html>

