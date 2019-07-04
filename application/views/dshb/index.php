<?php $this->load->view('header'); ?>

<div class="content" id="back">
	
	<div class="header-content">

        <div class="header-content-inner">

        	<center>

        		<img src="<?php echo base_url()?>assets/img/template/logo-cbt.png" class="img-responsive" style="border-radius: 10px; background: rgba(255, 255, 255, .1);">

        	</center>

            <h1> <span>  Graduación 2019 </span> </h1>

            <hr>
            
			<p> -Las raíces de la educación son amargas, pero la fruta es dulce. <br> 
            <small> - Aristóteles.  </small> </p>

        	<?php 
        		echo anchor('records/records/', '<i class="fa fa-user-plus"></i>  REGISTRO', array('class' => 'btn btn-primary btn-lg page-scroll btn-registred', 'style' => 'margin-right: 10px;')); 
        	?>

            <hr style="margin-bottom: 10px">
        	<center id="inntec-slogan">
        	 	<p style="color: #fff; margin-bottom: -30px">
        	 		 Creating a world with your ideas <br> <a href="http://grupoinntec.com"> 
                        <strong style="color: rgba(255, 255, 255, .8);"> DAF-Systems </strong> </a> 
        	 	</p><br>
        	</center>
        </div>


        <div id="footer" >


        </div>

    </div>

</div>

<?php $this->load->view('footer'); ?>
