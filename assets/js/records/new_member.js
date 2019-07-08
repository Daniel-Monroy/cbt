$(document).on("click", ".btn_add_invited", function(){
	$('#modal_add_invited').modal({backdrop: 'static', keyboard: false});
})
var invited_list_ls = [];

if (localStorage.getItem("cbt_guests") != null) {
	$(".not_invited").parent().remove();
	if (localStorage.getItem("cbt_records") != null) {
		var cbt_records = JSON.parse(localStorage.getItem("cbt_records"));
		if (cbt_records["plan_id"] != "") {
			$(".plan_id").val(cbt_records[0]["plan_id"]);
		}
		if (cbt_records["group_id"] != "") {
			$(".group_id").val(cbt_records[0]["group_id"]);
		}
		if (cbt_records["student_account"] != "") {
			$(".student_account").val(cbt_records[0]["student_account"]);
		}
		if (cbt_records["student_name"] != "") {
			$(".student_name").val(cbt_records[0]["student_name"]);
		}
		if (cbt_records["student_email"] != "") {
			$(".student_email").val(cbt_records[0]["student_email"]);
		}
	}

	invited_list_ls = JSON.parse(localStorage.getItem("cbt_guests"));
	$(".invited_list").val(localStorage.getItem("cbt_guests"))
	var table_guest = '';
	for (var i = 0; i < invited_list_ls.length; i++) {
		var t_delete_invited = '<button class="btn btn-xs btn-danger pull-left delete_invited_list" invited_id="'+invited_list_ls[i].invited_id+'"> <i class="fa fa-trash"></i> Eliminar </button>';
		table_guest = table_guest + 
					'<tr style="background:#76818c6b">' +
						'<td class="t_student_invited" invited_id="'+invited_list_ls[i].invited_id+'" student_invited="'+invited_list_ls[i].student_invited+'">    '+invited_list_ls[i].student_invited+' </td>'+
						'<td> '+t_delete_invited+' </td>'+
	                '</tr>';
	}
	$('#table_guest tbody').append(table_guest); 
}

$(document).on("click", ".btn_save_invited", function(){
	if ($("#modal_add_invited .student_invited").val() != "" &&
		$("#modal_add_invited .student_invited_validate").val() != ""){
		var student_invited = $(".student_invited").val();
		if($(".invited_list").val() != ""){
			var invited_list = JSON.parse($(".invited_list").val());
			if (invited_list.length == 5) {
				swal({
					title: "Ya han sido agregados los 5 invitados",
					text: "",
					type: "warning",
					showCancelButton: false,
					confirmButtonColor: "#d73925",
					confirmButtonText: "¡Volver!",
					closeOnConfirm: false
				})
				return;
			}
			for (var i = 0; i < invited_list.length; i++) {
				if (invited_list[i]["student_invited"] == student_invited) {
					swal({
						title: "Ya has agregado a este invitado",
						text: "Verifica los datos ingresados",
						type: "warning",
						showCancelButton: false,
						confirmButtonColor: "#d73925",
						confirmButtonText: "¡Volver!",
						closeOnConfirm: false
					})
					return;
				}
			}	
		}
		
	    if (localStorage.getItem("cbt_guests") == null) {
	    	invited_list_ls = [];
	    	var invited_id = 1;
	    } else{ 
	        invited_list_ls.concat(localStorage.getItem("cbt_guests"));
	        var invited_id = invited_list_ls.length + 1;
	    }
	    
	    invited_list_ls.push({"invited_id": invited_id, "student_invited": student_invited})
		localStorage.setItem("cbt_guests", JSON.stringify(invited_list_ls));
		local_storage_add_registred()
		$(".invited_list").val(JSON.stringify(invited_list_ls));
		swal({
			title: "Invitado agregado", 
			text: "",
			type: "success", 
			showCancelButton: false,
			confirmButtonColor: "#d73925", 
			confirmButtonText: "¡Continuar!",
			showConfirmButton: true, 
			allowOutsideClick: false
		}).then((result)=>{
			if(result.value){
				window.location = base_url + "records/records";
			}
		});
	} else{
		if ($("#modal_add_invited .student_invited").val() == "" ) {
			$("#modal_add_invited .student_invited").parent().addClass("has-error");
		} else{
			$("#modal_add_invited .student_invited").parent().removeClass("has-error");
		}
		if ($("#modal_add_invited .student_invited_validate").val() == "" ) {
			$("#modal_add_invited .student_invited_validate").parent().addClass("has-error");
		} else{
			$("#modal_add_invited .student_invited_validate").parent().removeClass("has-error");
		}
		swal({
			type: "error",
			title: "!Error!",
			text: "Debe llenar todos los campos para poder agregar el integrante",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			showConfirmButton: false
		});
		return;
	}
})

$(document).on("click", ".delete_invited_list", function(){
    $(this).parent().parent().remove();
    var student_invited = $(".t_student_invited");
    invited_list_ls = [];
    if (student_invited.length != 0) {
        for (var i = 0; i < student_invited.length; i++) {
            var invited_id_array      = $(student_invited[i]).attr("invited_id");
            var student_invited_array = $(student_invited[i]).attr("student_invited");
			invited_list_ls.push({"invited_id": invited_id_array, "student_invited": student_invited_array})
        }
      local_storage_add_registred();  
	  localStorage.setItem("cbt_guests", JSON.stringify(invited_list_ls));
    } else {
        delete_localStorage();
    }
    window.location = base_url + "records/records";
})




