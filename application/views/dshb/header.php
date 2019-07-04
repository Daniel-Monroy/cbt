<header class="main-header">
   <a href="<?php echo base_url(); ?>" class="logo text-center">
      <center>
         <span class="logo-mini"><b>T</b>ESVG</span>
         <span class="logo-lg"><b>TES</b>VG</span>
      </center>
   </a>
   <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
         <span class="sr-only">Menu de opciones</span>
      </a>
      <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">
            <?php $this->load->view('dshb/header/user'); ?>
         </ul>
      </div>
   </nav>
</header>
