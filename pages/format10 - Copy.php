<div class="main_container">
	<legend> 
		<h1>
			<span class="fa fa-book"> Format 10
			</span>
		</h1>
	</legend>
	<div id="div_system_message"></div>
	<div class="panel">
		<div class="btn-container">
			<p class="align-right">
				<button class="btn btn-primary fa fa-plus" id="btn_create_new_label"> Create New</button>
				<?php session_start(); ?>
				<?php								
					if($_SESSION['username'] == 'jojpato' || $_SESSION['username'] == 'marlope'){
						echo '<button class="btn btn-primary fa fa-print" id="btn_reprint_label"> Re-Print</button>';
					}else{
						echo '<button class="btn btn-primary fa fa-print" id="btn_reprint_label" disabled> Re-Print</button>';
					}
				?>
				<button class="btn btn-danger fa fa-trash" id="btn_delete_label"> Delete</button>
			</p>
		</div>
		<div id="container_label">
			<table id="tbl_format10" class="table table-bordered" style="font-size:12px;">
				<thead>
					<tr>
						<th style="width:1%;">Select</th>
						<th>Product Name</th>
						<th>Qty</th>
						<th>Contractor Code</th>
						<th>Lot Number</th>						
						<th>Spec</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal_new_sticker">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
        <div class="row" style="padding-bottom:0px;margin-bottom:0px;">
			<div class="col-sm-6">
				<h4 class="modal-title"><span class="fa fa-plus"></span> Create New Label</h4>
			</div>
			<div class="col-sm-6">
				<p style="text-align:right;"><button class="btn btn-primary fa fa-search" id="btn_search_modal"> Search</button></p>
			</div>
		</div>
      </div>
      <div class="modal-body">
        <form id="frm_new_label">
			<div class="row">
				<div class="col-sm-6">
					<label class="control-label">Part No. :</label>
					<input type="text" class="form-control" name="txt_pn_code" id="txt_pn_code" tabindex="1" value="1-822-411-21" readonly required>
					<label class="control-label">Contractor Code:</label>
					<input type="text" class="form-control" name="txt_contractor_code" id="txt_contractor_code" value="108205" tabindex="3" value="108205" readonly required>
					<label class="control-label">Spec:</label>
					<input type="text" class="form-control" name="txt_spec" id="txt_spec" value="FPS009-2900 (03)" tabindex="6" readonly required>
					<label class="control-label">With P:</label>
					<input type="checkbox" class="" name="chk_p" id="chk_p" value="1" tabindex="7">
				</div>
				<div class="col-sm-6">
					<label class="control-label">Qty:</label>
					<div class="row">
						<div class="col-sm-6">
                            <?php								
								if($_SESSION['username'] == 'jojpato' || $_SESSION['username'] == 'jangeco'){
									echo '<input type="number" class="form-control" name="txt_qty" id="txt_qty" tabindex="2" required>';
								}else{
									echo '<input type="number" class="form-control" name="txt_qty" id="txt_qty" tabindex="2" required>';
									//-12212019
									// echo '<input type="number" class="form-control" name="txt_qty" id="txt_qty" tabindex="2" required readonly>';
								}
							?>
<!--							<input type="number" class="form-control" name="txt_qty" id="txt_qty" tabindex="2" value="500" required>-->
						</div>
					</div>
					<label class="control-label">Lot Number:</label>
					<div class="row" id="container_lot_number">
						<div class="col-sm-6"> 
							<input type="text" class="form-control" name="txt_lot_no" id="txt_lot_no" tabindex="4" placeholder="----" required>
						</div>
						<div class="col-sm-1 no-padding">
							-
						</div>
						<div class="col-sm-4 no-padding"> 
							<input type="text" class="form-control" name="txt_lot_no_count" id="txt_lot_no_count" placeholder="01A" required>
						</div>
					</div>
					<label class="control-label">Print Qty:</label>
					<div class="row">
						<div class="col-sm-4">
							<input type="number" class="form-control" name="txt_print_qty" id="txt_print_qty" tabindex="7" value="1" required>
						</div>
					</div>
				</div>
			</div>
			<h3>Sticker Format (Print Preview)</h3>
			<div id="sticker_preview">
				<p class="align-center"><img src="../img/C3_Label_Format/formatna.jpg" class="image"></p>
				<!--<div id="preview_item_name">CN048S-0002-0</div>
				<div id="preview_qty">2000pcs</div>
				<div id="preview_lot_no">5Z22-14A</div>
				<div id="preview_order_no">450123456700010</div>
				<div id="preview_remarks">Test only</div>-->
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default fa fa-close" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary fa fa-print" id="btn_new_print"> Print</button>
		</form>
	  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_delete_label">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="fa fa-trash"></span> Selected label for delete</h4>
      </div>
      <div class="modal-body">
        <form id="frm_delete_label">
			<div id="container_tbl_selected_labels">
				<table class="table table-bordered" id="tbl_selected_labels">
					<thead>
						<tr>
							<th>Product Name</th>
							<th>Qty</th>
							<th>Contractor Code</th>
							<th>Lot Number</th>						
							<th>Spec</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<div id="container_delete_message">
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default fa fa-close" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger fa fa-trash" id="btn_confirm_delete"> Proceed</button>
		</form>
	  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_re_print_label">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="fa fa-print"></span> Re-Print Label</h4>
      </div>
      <div class="modal-body">
        <form id="frm_re_print_label">
			<div id="container_tbl_selected_labels_re_print">
				<table class="table table-bordered" id="tbl_selected_labels_re_print">
					<thead>
						<tr>
							<th>Product Name</th>
							<th>Qty</th>
							<th>Contractor Code</th>
							<th>Lot Number</th>						
							<th>Spec</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<div id="container_message_re_print">
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default fa fa-close" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success fa fa-print" id="btn_confirm_re_print"> Print</button>
		</form>
	  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_search">
  <div class="modal-dialog" style="width:400px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="fa fa-search"></span> Search</h4>
      </div>
      <div class="modal-body">
        <form id="frm_search">
			<div class="row">
				<div class="col-sm-5">
					<label>Search Category</label>
				</div>
				<div class="col-sm-7">
					<select class="form-control" id="cmb_search_category">
						<option value="PONo">PO Number</option>
						<option value="CODE">Product Code</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-5">
					<label>Search</label>
				</div>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="txt_search_pattern">
				</div>						
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default fa fa-close" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success fa fa-search" id=""> Search</button>
		</form>
	  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
/* Handler and Username */
var handler = '../handler/handler.php';
var username = $('hd_username').val();

/* Array of for selected rows */
var array_selected = [];

/* Datatables serverside configuration */
var oTable = $('#tbl_format10').DataTable( {
	"bProcessing": true,
	"bServerSide": true,
	"aaSorting"	 : [],
	"sAjaxSource": "../server_side/format10.php"
} );


/* Create new label button event */
$('#btn_create_new_label').click(function(){
	/* clear data */
	/* To be added later on */
	// $('#sticker_preview div').empty();
	/* display modal */
	$('#modal_new_sticker').modal('show');
});

/* Preview Events */
// $('#txt_itemname').on('keyup change', function(){ change_preview_value('preview_item_name',$(this).val()); });
// $('#txt_qty').keyup(function(){ change_preview_value('preview_qty',$(this).val() + 'pcs'); });
// $('#txt_order_no').keyup(function(){ change_preview_value('preview_order_no',$(this).val()); });
// $('#txt_lot_no').keyup(function(){ change_preview_value('preview_lot_no',$(this).val() +'-'+ $('#txt_lot_no_count').val()); });
// $('#txt_remarks').keyup(function(){ change_preview_value('preview_remarks',$(this).val()); });

/* load preview */
function change_preview_value(div_id,div_value){
	$('#'+div_id).empty();
	$('#'+div_id).append(div_value);
}

/* creation of datalist for itemname */
create_datalist_item_name();

/* function for creation of datalist */
function create_datalist_item_name(){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: "action=get_all_item_name",
		url		: handler,
		success	: function(result){
			/* generates a datalist and append it to the body */
			var html = '<datalist id="list_item_name">';
			for(x=0;x<result['item_name'].length;x++){
				html += '<option>'+result['item_name'][x]+'</option>';
			}
			html += '</datalist>';
			$('body').append(html);
			/* assign data list to the txt_itemaname */
			$('#txt_spec').attr('list','list_item_name');
		},error : function(){
			alert('error handler');
		}
		
	});
}

/* event to automatically load the next lotno */
$('#txt_lot_no,#txt_spec').keyup(function(){
	var spec 		= $('#txt_spec').val();
	var lotno 		= $('#txt_lot_no').val();
	check_existing_item_name_and_lotno(spec,lotno);
});

/* function for checking existing item name and lotno */
function check_existing_item_name_and_lotno(spec,lotno){
	var data = {
		"action" 		: "check_existing_item_name_and_lotno_format10",
		"spec"			: spec,
		"lotno"			: lotno
	}
	data = $.param(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: handler,
		success	: function(result){
			/* clear lot no count field, then append the new one */
			$('#txt_lot_no_count').val(result['lotno_extension']);
			// $('#preview_lot_no').empty();
			// $('#preview_lot_no').append($('#txt_lot_no').val() +'-'+ $('#txt_lot_no_count').val());
		}
	});
}

/* event when pressing submit on the add label modal */
$('#frm_new_label').submit(function(e){
	e.preventDefault();
	var data = {
		"action"	: "save_new_c3_label_format10",
		"username"	: username
	}
	data = $.param(data) + '&' + $(this).serialize();
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: handler,
		success	: function(result){
			/* send zpl code to the printer */
			print_labels(result['label']);
			/* reload datatable serverside */
			oTable.ajax.reload();
			/* clear all input in modal */
			$('#frm_new_label input').val('');
			$('#txt_pn_code').val('1-822-411-21');
			$('#txt_contractor_code').val('108205');
			$('#txt_qty').val('500');
			$('#txt_spec').val('FPS009-2900-0 (03)');
		}
	});
});

/* event for reprinting labels */
$('#btn_reprint_label').click(function(){
	/* validation to checkk if no record was selected */
	if(array_selected.length == 0){
		alert("No Record Selected!");
		return false;
	}
	/* hide the container message, display the table container, display print button */
	$('#container_message_re_print').hide();
	$('#container_tbl_selected_labels_re_print').show();
	$('#btn_confirm_re_print').show();
	/* function for generating value for records to be printed, appends the value to the table */
	load_selected_label_info('#tbl_selected_labels_re_print');
	/* display modal */
	$('#modal_re_print_label').modal('show');
});

/* event when a reprint button was submitted */
$('#frm_re_print_label').submit(function(e){
	e.preventDefault();
	/* do reprinting here */
	reprint_label();
});

/* event for deleting a label */
$('#btn_delete_label').click(function(){
	/* validation to checkk if no record was selected */
	if(array_selected.length == 0){
		alert("No Record Selected!");
		return false;
	}
	/* hide the container message, display the table container, display delete button */
	$('#container_delete_message').hide();
	$('#container_tbl_selected_labels').show();
	$('#btn_confirm_delete').show();
	/* function for generating value for records to be deleted, appends the value to the table */
	load_selected_label_info('#tbl_selected_labels');
	$('#modal_delete_label').modal('show');
});

/* event when delete label confirmation was clicked */
$('#frm_delete_label').submit(function(e){
	e.preventDefault();
	/* do deletion here */
	delete_label();
});

/* function for reprinting label */
function reprint_label(){
	var data = {
		"action"	 	: "reprint_label_format10",
		"array_pkid" 	: array_selected
	}
	data = $.param(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: handler,
		success	: function(result){
			/* pass the zpl commands for printing */
			print_labels(result['label']);
			/* display the message and hides the table container and re-print button */
			$('#container_message_re_print').empty();
			$('#container_message_re_print').append('<div class="alert alert-success"><h3>Label has been re-printed!<h3></div>');
			$('#container_message_re_print').show();
			$('#container_tbl_selected_labels_re_print').hide();
			$('#btn_confirm_re_print').hide();
			/* reload datatable serverside */
			oTable.ajax.reload();
			/* empty the array */
			array_selected = [];
		}
	});
}

/* function for deleting label */
function delete_label(){
	var data = {
		"action"	 	: "delete_label_format10",
		"array_pkid" 	: array_selected
	}
	data = $.param(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: handler,
		success	: function(result){
			$('#container_delete_message').empty();
			/* display the message and hides the table container and delete button */
			$('#container_delete_message').append('<div class="alert alert-success"><h3>'+result['msg']+'<h3></div>');
			$('#container_delete_message').show();
			$('#container_tbl_selected_labels').hide();
			$('#btn_confirm_delete').hide();
			/* reload datatable serverside */
			oTable.ajax.reload();
			/* empty the array */
			array_selected = [];
		}
	});
}

/* get all selected row data */
function load_selected_label_info(tbl_id){
	var data = {
		"action"	 : "load_selected_label_info_format10",
		"array_pkid" : array_selected
	}
	data = $.param(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: handler,
		success	: function(result){
			/* append table data to the specified table */
			$(tbl_id+' tbody').empty();
			$(tbl_id+' tbody').append(result['html']);
		}
	});
}

/* event when checkbox is clicked */
$('#tbl_format10 tbody').on('click','#chk_select', function(){
	var selected_row = $(this).closest('tr');
	var pkid = selected_row.find('td:eq(1) #hd_pkid').val();
	/* validate if the checkbox is checked, remove the pkid to the array if not checked, else append it to the array */
	var selected = $(this).prop('checked');
	if(selected == false){ 
		selected_row.attr('style','');
		remove_value_from_array(pkid);
		console.log(array_selected);
	}else{
		selected_row.attr('style','background:teal;color:white;');
		push_new_value_to_array(pkid);
	}
	
});

/* function to remove an element(value) to the array */
function remove_value_from_array(value_remove){
	array_selected = jQuery.grep(array_selected, function(value) {
	  return value != value_remove;
	});
}

/* function to add an element(value) to the array */
function push_new_value_to_array(value_new){
	/* check if the value is existing in the array */
	var exist = 0;
	for(x=0;x<array_selected.length;x++){
		if(array_selected[x] == value_new){
			exist = 1;
		}
	}
	/* if not existing(0) add to the array */
	if(exist == 0){
		array_selected.push(value_new);
		console.log(array_selected);
	}
}

/* additional functions */
$('#btn_search_modal').click(function(){ $('#modal_search').modal('show'); });

$('#frm_search').submit(function(e){
	e.preventDefault();
	var search_category 	= $('#cmb_search_category').val();
	var search_pattern 		= $('#txt_search_pattern').val();
	search_item(search_category,search_pattern);
});

function search_item(search_category,search_pattern){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: 'action=search_item&search_category='+search_category+'&search_pattern='+search_pattern,
		url		: handler,
		success	: function(result){
			$('#txt_spec').val('');
			if(result['exist'] == 0){
				alert('Record does not exist!');
				return false;
			}
			var item_name_new = result['item_name'][0];
			item_name_new = item_name_new.split('PART No.')[0];
			item_name_new = item_name_new.trim();
			$('#txt_spec').val(item_name_new);
			$('#modal_search input').val('');
			$('#modal_search').modal('hide');
            default_values(result['item_name'][0]);
		}, error : function(){
			alert('error handler');
		}
	});
}
    
function default_values(device_name){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: 'action=get_cn_default_value&item_name='+device_name,
		url		: handler,
		success	: function(result){
			console.log(result);
			$('#txt_qty').val("0");//novs 2020-10-24 removed since no use
			$('#txt_qty').val(result['data']['quantity']);
			$('#txt_pn_code').val(result['data']['pn_code']);//added for part number auto fetch from cn default, removed since there is other texts needed at the top of the bar code (not included in format 10)
		}, error : function(){
			alert('error handler');
		}
	});
}

/* the zpl commands are sent here for printing */
function print_labels(array_label){
	findPrinter('ZT220',array_label);
}
</script>
<!--Zebra Printing Stuff-->
<script type="text/javascript" src="../LabelPrinter/js/deployJava.js"></script>
<script type="text/javascript" src="../js/zpl_print_script.js"></script>
