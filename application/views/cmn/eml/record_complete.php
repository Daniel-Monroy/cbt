<html>

<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

<style type='text/css'>
    html {background-color: #fefefe;}
    body {color:#333;}
    a{color:#31708f;}
    .text-info{color:#000;}
    .text-muted{color:#999;}
    .table-info{white-space:nowrap; text-align: center;}
    .table-info th{text-align:center;border-bottom:1px solid #31708f;}
    .table-info td{white-space:nowrap;border-bottom:1px solid #ccc; border-width: 50%}
</style>

</head>

<body style="width:100%">

	<div style="width: 100%; background: #eee; position: relative; font-family: sans-serif; padding-bottom: 40px;">
    
	<br> <br>

	<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
	    
	    <center>
	        <img style="padding:20px; width:40%" src="<?php echo base_url()?>assets/img/template/logo-cbt.png">
	        <hr style="border:1px solid #ccc; width:80%">
	    </center> 

        <table border="0" width="100%" cellspacing="0" style="border-collapse: collapse;">
           
            <tr width="100%">
           
                <td width="100%" style="vertical-align:middle;" style="color:#000; font-size: 20px; border-radius: 10px">
           
                    <h3 class="text-info" style="text-align: center; line-height:30px; border-radius: 10px;">

                        Registro Exitoso

                    </h3>

                    <p class="text-info" style="text-align: center; white-space: normal; margin-top: -15px; line-height:20px; border-radius: 10px; padding-bottom: 10px;">
                        -Las raíces de la educación son amargas, pero la fruta es dulce. 
                        <small>
                            <br>
                            - Aristóteles.
                        </small>
                    </p>
                    
           
                </td>
           
            </tr>

            <tr width="100%">
                
                <td width="100%" style="vertical-align:top;">
                    
                    <p style="text-align:center; white-space: normal; line-height:30px; padding-bottom: 10px;">
                       
                       <strong>CBT-GRADUACIÓN 2019</strong> <br>

                       <small> <?php echo $description;?> </small>
                   
                    </p>
                    
                    <table class="table-info" align="center">
                        <tr>            
                            <td colspan="2" class="text-muted"><b> Información de registro </b></td> 

                        </tr>

                        <tr>            
                            <td align='right' width="auto" style="text-align: right;">Codigo de registro:</td>        
                            <td align='left' width="50%" style="text-align: left;"><b><?php echo $record_number;?></b></td>    
                        </tr>  

                        <tr>            
                            <td align='right'>Nombre del Alumno:</td>        
                            <td align='left'><b><?php echo $student_name;?></b></td>    
                        </tr>  
                       
                        <tr>            
                            <td align='right'>Fecha de registro:</td>        
                            <td align='left'><b><?php echo $date;?></b></td>    
                        </tr>
                    
                    </table>

                    
                    <br>
               
                    <table class="table-info" align="center"  > 
                        <tr>            
                            <td colspan="2" class="text-muted"><b> Invitados </b></td> 
                        </tr>       
                        <?php 
                        $inviteds_list = json_decode($inviteds_list, true);
                        foreach ($inviteds_list as $key => $invited_list): ?>
                                <tr>      
                                    <td align='right' width="10%" style="text-align: right;"><?php echo $key+1;?>.-</td>      
                                    <td align='left'  width="70%" style="text-align: left;">
                                        <b><?php echo $invited_list["student_invited"];?></b>
                                    </td>    
                                </tr>    
                        <?php endforeach; ?>
                    </table>
                </td>
            </tr>
        </table>    

        <center>
         
            <hr style="border:1px solid #ccc; width:80%">
            
            <h5 style="font-weight:100; color:#999">

                Si reconoce el registro, puede ignorar este correo electrónico. 

                <br>

                <strong>Favor de no contestar este correo.</strong>

            </h5>
   
        </center>
   
    </div>

</div>

</body>

</html>

