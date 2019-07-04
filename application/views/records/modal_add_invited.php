<div class="modal fade" id="modal_add_invited" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="background:rgba(255, 255, 255, .1);">
            <div class="modal-header" style="color: #fff!important;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color: #fff!important;"> <i class="fa fa-user-plus"></i> Agregar Invitado </h4>
            </div>
            
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-xs-12">
                        <?php echo required_field();?>
                        <label> Invitado </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user-secret"></i>
                            </span>
                            <?php echo form_input($student_invited);?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-12">
                        <?php echo required_field();?>
                        <label> Reingresa el nombre: </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user-secret"></i>
                            </span>
                            <?php echo form_input($student_invited_validate);?>
                        </div>
                    </div>
                </div> 
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn back_color pull-left" data-dismiss="modal"> 
                    <i class="fa fa-close"></i> Cerrrar 
                </button>
                <button type="button" class="btn back_color btn_save_invited"> 
                    <i class="glyphicon glyphicon-saved"></i> Agregar 
                </button>
            </div>
        </div>
    </div>
</div>