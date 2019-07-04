var tablePos = $("#table_members").position()

function delete_localStorage(){
    localStorage.removeItem("cbt_guests");
    localStorage.removeItem("cbt_records");
}

$(document).on("click", ".btn_trash_guests", function(){
	swal({
		type: "warning",
		title: "¿Está seguro de eliminar todos los invitados?",
		text: "Podrá ingresar nuevos invitados luego de esta acción",
		showCancelButton: true,
		showConfirmButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		cancelButtonText: "Cancelar",
		confirmButtonText: "Si eliminar"
	}).then((result)=>{
		if(result.value){
			$(".btn_trash_guests").attr("disabled", true);
			$(".btn_trash_guests").removeClass("btn_trash_guests");
			delete_localStorage();
			window.location = base_url + "records/records";
		} else{
			return;
		}
	});

})

function local_storage_add_registred(){
    var cbt_records_data = [];
    cbt_records_data.push({"plan_id": $(".plan_id").val(),
			               "student_name": $(".student_name").val(),
			               "group_id": $(".group_id").val(),
			               "student_name": $(".student_name").val(),
			               "student_email": $(".student_email").val()
			            })
    localStorage.setItem("cbt_records", JSON.stringify(cbt_records_data));
}