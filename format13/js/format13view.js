var handler = "../format13/handler/handler.php";

var tbl_for_format13 	= "tbl_for_format13";
var dt_tbl_for_format13 = '';
// var dt_records 		= "";
//var username 		= "ronfern";
var pk="";
var pid=""
$(document).ready(function(){

	// if you want to put data in table without the use of server side
dt_tbl_for_format13 =  $('#tbl_for_format13').DataTable();

loadTable();
	
	// /* open modal for adding new record */
	$('#btn_add').click(function(){ 
		$pn = document.getElementById("pn").value
		$mm_no = document.getElementById("mm_no").value
		$pn_ypics = document.getElementById("pn_ypics").value
		if($pn == "" || $mm_no == "")
		{
			alert("No data!");
		}
		else{
		//alert(document.getElementById("pn").value);
		var data ={
			"action"	: "add_new_record",
			"pn_ypics"	: $pn_ypics,
			"pn"		: $pn,
			"mm_no"		: $mm_no,
		}
		data = $.param(data);
		add_new_record(data);
	}
	});
	

});

// /* function for adding new record */
function add_new_record(data){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: handler,
		success	: function(data){
			alert(data['result']);
			loadTable();
			
		}
	});
}
function loadTable(){
	var data = {
		"action"	: "load_format13_info"
	}
		data = $.param(data);
		// console.log(data);
		//var table = document.getElementById("t_RMShipping");
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: handler,
		success	: function(data){
			console.log(data);
			$('#tbl_for_format13 tbody').empty();	
			var ctr = data['ctr'];	
			console.log(ctr);
			for(i=0;i<ctr;i++){
				var html  = '<tr id = "'+data['pkid'][i]+'">';
					html += '<td><button value="'+data['pkid'][i] + '" id = "btn_save_'+data['pkid'][i] + '" class="btn btn-primary">save</button><br></td>';
					html += '<td>'+data['pkid'][i]+'</td>';
					html += '<td><input  id = "txt_pn_ypics_'+data['pkid'][i] + '" value="' + data['pn_ypics'][i] + '"></td>';
					html += '<td><input  id = "txt_pn_'+data['pkid'][i] + '" value="' + data['pn'][i] + '"></td>';
					html += '<td><input  id = "txt_mm_no_'+data['pkid'][i] + '" value="' + data['mm_no'][i] + '"></td>';
					html += '</tr>';

				$('#tbl_for_format13 tbody').append(html);	
				// pk =  data['pkid'][i];
				// pk=data['pkid'][i];
				$('#btn_save_'+data['pkid'][i]).click(function(){
					pk = $(this).val();
					console.log(pk);
					var pn= $('#txt_pn_'+pk).val();
					var mm_no = $('#txt_mm_no_'+pk).val();
					var pn_ypics = $('#txt_pn_ypics_'+pk).val();
					console.log(pn);
					console.log(mm_no);
					var data = {
						"action"	: "update_record",
						"pn_ypics"	: pn_ypics,
						"pkid"		:pk,
						"txt_pn"	:pn,
						"txt_mm"	:mm_no
					}
					data = $.param(data);
					update_record(data);
				});

			 }


		},error:function(data){
			alert("ajaxError");
		}
	});
}
function update_record(data){

	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: handler,
		success	: function(data){
			alert(data['result']);
			loadTable();
		},error	: function(data){
			alert("ajax error2");
		}
	});
}
// /* function for updating record */
// function update_record(data){
// 	console.log('test1');
// 	$.ajax({
// 		type	: "post",
// 		dataType: "json",
// 		data	: data,
// 		url		: handler,
// 		success	: function(data){
// 			alert(data['result']);
// 			$('#modal_update_record').modal('hide');
// 			dt_records.ajax.reload();
// 			console.log(data);
// 		}
// 	});
// }

// function delete_record(data){
// 	$.ajax({
// 		type	: "post",
// 		dataType: "json",
// 		data	: data,
// 		url		: handler,
// 		success	: function(data){
// 			alert(data['result']);
// 			console.log('d2 na sa delete pogi');
// 			dt_records.ajax.reload();
// 			console.log('d2 na sa delete pogi2');
// 		}
// 	});
// }