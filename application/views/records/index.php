<?php $this->load->view('header'); ?>
<div class="content" id="back">
	<div class="register-box" style="width: 80%!important;">
		<div class="register-logo">
			<a href="">
				<center>
				<img src="<?php echo base_url()?>assets/img/template/logo-cbt.png" class="img-responsive" style="border-radius: 10px;"> 
				</center>
				<h1><a href="<?php echo base_url()?>dshb/dshb" style="color: white"> Graduación 2019 </a> </h1>
				<hr>
				<p class="login-box-msg"  style="color: white;">
					-Las raíces de la educación son amargas, pero la fruta es dulce. 
								<br> - Aristóteles.
				</p>
			 </a>
		</div>

		<div class="register-box-body" style="background:rgba(255, 255, 255, .1);">
			<p class="login-box-msg"  style="color:white; font-weight:bold;">Registro de invitados</p>
			<div class="row">
				<div class="col-xs-12">
				   <?php 
				   		echo (isset($message))?($message):('');
				   		echo (validation_errors())?(get_message('danger', validation_errors())):('');
			        ?>
				</div>
			</div>

			<?php echo form_open_multipart('records/records/nwr', array('id' => 'newRecordForm', 'name' => 'newRecordForm', 'autocomplete' => 'off', 'onsubmit' => 'return requiredFields("");'));?>
				<div class="form-group <?php echo (form_error('code')?('has-error'):(''));?>">
					<?php echo required_field();?>
					<label for="code"> Código: (Asignado automaticamente): </label>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-key"></i>
						</span>	
						<?php echo form_input($code);?>
					</div>
				</div>
				<div class="form-group <?php echo (form_error('plan_id')?('has-error'):(''));?>">
					<?php echo required_field();?>
					<label for="plan_id"> Carrera: </label>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-graduation-cap"></i>
						</span>	
						<?php echo form_dropdown('plan_id', $plans, set_value('plan_id'), 'class="form-control plan_id"');?>
					</div>
				</div>
				<div class="form-group <?php echo (form_error('group_id')?('has-error'):(''));?>">
					<?php echo required_field();?>
					<label for="group_id"> Grupo: </label>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-users"></i>
						</span>	
						<?php echo form_dropdown('group_id', $groups, set_value('group_id'), 'class="form-control group_id"');?>
					</div>
				</div>
				<div class="form-group <?php echo (form_error('student_account')?('has-error'):(''));?>">
					<?php echo required_field();?>
					<label for="student_account"> Número de control:</label>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-key"></i>
						</span>	
						<?php echo form_input($student_account); ?> 
					</div>
				</div>
				<div class="form-group <?php echo (form_error('student_name')?('has-error'):(''));?>">
					<?php echo required_field();?>
					<label for="student_name"> Nombre del alumno: </label>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-user"></i>
						</span>	
						<?php echo form_input($student_name); ?> 
					</div>
				</div>
				<div class="form-group <?php echo (form_error('student_email')?('has-error'):(''));?>">
					<?php echo required_field();?>
					<label for="student_email"> Email: </label>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-envelope"></i>
						</span>	
						<?php echo form_input($student_email); ?> 
					</div>
				</div>
				<div class="form-group <?php echo (form_error('invited_list')?('has-error'):(''));?>">
					<?php echo required_field();?>
					<label for=""> Invitados: <i class="fa fa-users"></i> </label> 
					<input type="hidden" class="invited_list" name="invited_list">
					<input type="hidden" class="grade_description">
					<table class="table table-hover table-bordered table-condensed" id="table_guest" width="100%" style="color:#8ea3b96b!important">
						<thead>
							<tr class="text-muted">
								<th width="15%"> 
									<i class="fa fa-user-secret hidden-xs"></i> Nombre 
								</th>
								<th width="5%">
									<button type="button" class="btn btn-xs btn-primary pull-right btn_add_invited"> 
										<i class="fa fa-plus"></i> Agregar 
									</button>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="7" class="text-muted not_invited" style="font-size: 16px">
				                    <i class="fa fa-info"></i>
				                    No has agregado ningún invitado
				                </td>
			                </tr>
						</tbody>
					</table>	
					<button type="button" title="Eliminara todos los invitados" class="btn btn-danger btn-sm pull-right btn_trash_guests"> 
						<i class="fa fa-trash"></i> Eliminar todos los invitados 
					</button>
					<br>
				</div>
				<div class="form-group <?php echo (form_error('registration_code')?('has-error'):(''));?>">
					<?php echo required_field();?>
					<label for="registration_code"> Ingresa el código proporcionado por tu docente: </label>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-lock"></i>
						</span>	
						<?php echo form_input($registration_code); ?> 
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
			        <div class="col-sm-6 col-xs-12">
						<?php 
			        		echo anchor('', '<i class="glyphicon glyphicon-arrow-left"></i>  SALIR', array('class' => 'btn back_color pull-left', 'style' => 'margin-right: 10px;')); 
			           	?>
			        </div>	
			        <div class="col-sm-6 col-xs-12">
						 <button type="submit" class="btn back_color pull-right save_registred "> <i class="glyphicon glyphicon-save"></i> Guardar </button>
			        </div>
			    </div>
			<?php echo form_close(); ?>
		</div>	
	</div>
</div>
<?php $this->load->view('records/modal_add_invited'); ?>
<?php $this->load->view('footer'); ?>