function student_invited_validate(student_invited){
	var hash = /^[a-zA-ZñNÑáéíóúÁÉÍÓÚ ]*$/;
	if (!hash.test(student_invited)) {
		$("#modal_add_invited .student_invited").parent().before('<div class="alert alert-danger alert-error"> <strong> Error: </strong> no se permiten números o caracteres especiales </div>')
		return false;
	} else{
		return true;
	}
}
function compare_members_name(){
	if (($("#modal_add_invited .student_invited").val() != "" && $("#modal_add_invited .student_invited_validate").val() != "")){
		if (($("#modal_add_invited .student_invited").val() == $("#modal_add_invited .student_invited_validate").val())) {
			return true;
			$(this).parent().removeClass("has-error");
		} else {
			$("#modal_add_invited .student_invited_validate").val("");
			$("#modal_add_invited .student_invited_validate").parent().addClass("has-error");
			$("#modal_add_invited .student_invited").parent().before('<div class="alert alert-danger alert-error"> <strong> Error: </strong> verifica que los nombres coincidan </div>');
			return false;
		}
	}
}
$(document).on("change", ".student_invited, .student_invited_validate", function(){
	$(".alert-error").remove();
	var response = student_invited_validate($(this).val());
	if (!response) {
		$(this).val("");
		$(this).parent().addClass("has-error");
	} else{
		$(this).parent().removeClass("has-error");
	}
	compare_members_name();
})
