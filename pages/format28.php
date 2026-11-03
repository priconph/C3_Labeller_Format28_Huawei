<div class="main_container">
	<legend> 
		<h1>
			<span class="fa fa-book"> C3 Labeller (Huawei) - Assembly Line 
			</span>
		</h1>
	</legend>
	<div id="div_system_message"></div>
	<div class="panel">
		<div class="btn-container">
			<p class="align-right">
				<button class="btn btn-primary fa fa-plus" id="btn_create_new_label"> Create New</button>
				<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>
				<?php								
					// if($_SESSION['username'] == 'cbretusto' || $_SESSION['username'] == 'cpagtalunan'){
					// 	echo '<button class="btn btn-primary fa fa-print" id="btn_reprint_label"> Re-Print</button>'; // 23/07/26 COMMENT KA MUNA BY CHRISTIAN NG APLAYA
					// }

					if ($_SERVER['REMOTE_ADDR'] != '192.168.15.241') { // CN1 PRODUCTION '192.168.15.241'
						echo '<button class="btn btn-primary fa fa-print" id="btn_reprint_label"> Re-Print</button>';
					}
				?>
				<!-- <button class="btn btn-danger fa fa-trash" id="btn_delete_label"> Delete</button> -->
			</p>
		</div>
		<div id="container_label">
			<table id="tbl_format28" class="table table-bordered" style="font-size:12px;">
				<thead>
					<tr>
						<th style="width:1%;">Select</th>
						<th>Customer P/N</th>
						<th>Manufacture P/N</th>
						<th>Qty</th>
						<th>Date Code</th>
						<th>LotNo</th>
						<th>Unique Number</th>
						<th>Emp Number</th>
						<!-- <th>Partial</th>
						<th>PATS</th> -->
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>

<!-- COMMENT OLD CODE 11-17-2025 -->
<!-- <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" id="modal_new_sticker" style="overflow: auto;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <div class="row">
			<div class="col-sm-6">
				<h4 class="modal-title"><span class="fa fa-plus"></span> Create New Label</h4>
			</div>
			<div class="col-sm-6">
				<p style="text-align:right;"><button class="btn btn-primary fa fa-search" id="btn_search_modal"> Search</button></p>
			</div>
		</div>
	</div>
	<p style="text-align:right;"><button class="btn btn-primary fa fa-search" id="btn_scan_modal"> Scan QR Sticker</button></p>
      <div class="modal-body">
        <form id="frm_new_label28">
			<div class="row">
				<div class="col-sm-6">
					<label class="control-label">Customer P/N:</label>
					<input type="text" class="form-control" name="txt_pn" id="txt_pn" tabindex="1" readonly required>
					
					<label class="control-label">Manufacture P/N:</label>
					<input type="text" class="form-control" name="txt_mpn" id="txt_mpn" tabindex="3" value="" readonly required>

					<label class="control-label">Item Code:</label>
					<input type="text" class="form-control" name="txt_item_code" id="txt_item_code" tabindex="3" readonly required>

					<label class="control-label" style="display: none">unique:</label>
					<input type="text" class="form-control" style="display: none" name="txt_unique" id="txt_unique" tabindex="3" readonly required>
					
					<label class="control-label">Oldest Lot Date:</label>
					<input type="text" class="form-control" maxlength="6" minlength="6" name="txt_date" id="txt_date" tabindex="5" placeholder="" required>
					<input type="hidden" class="form-control" name="txt_hidden_po_number" id="txt_hidden_po_number" placeholder="PO Number" required>
				</div>
				<div class="col-sm-6">
					<label class="control-label">Qty:</label>
					<div class="row">
						<div class="col-sm-6">
					        <?php								
								// if($_SESSION['username'] == 'jojpato' || $_SESSION['username'] == 'marlope'){
									echo '<input readonly type="number" maxlength="7" class="form-control" name="txt_qty" id="txt_qty" tabindex="2" data-qty="0" required>';
								// }else{
									// echo '<input type="number" class="form-control" name="txt_qty" id="txt_qty" tabindex="2" required readonly>';
								// }
							?>    
						</div>
					</div>					
					<label class="control-label">Reel/Bundle No:</label>
					<div class="row" id="container_lot_number">
						<div class="col-sm-6"> 
							<input type="text" class="form-control" maxlength="4" name="txt_lot_no" id="txt_lot_no" tabindex="4" placeholder="----" required>
						</div>
						<div class="col-sm-1 no-padding">
							-
						</div>
						<div class="col-sm-4 no-padding"> 
							<input type="text" class="form-control" style="text-transform:uppercase" maxlength="3" name="txt_lot_no_count" id="txt_lot_no_count" placeholder="001" required>
						</div>
					</div>
					<label class="control-label">Print Qty:</label>
					<i class="fa fa-question-circle" aria-hidden="true" title="In Assembly Line the default Print Qty is set to 1"></i>
					<div class="row">
						<div class="col-sm-4">
							<input type="number" class="form-control" name="txt_print_qty" id="txt_print_qty" tabindex="6" value="1" readonly required>
						</div>
					</div>

				</div>
			</div>

			<div class="row" style="margin: 5px 5px 0 0">
				<div class="col-md-5"></div>
				<div class="col-md-4"></div>
				<div class="col-md-2">
					<button type="button" class="btn btn-sm btn-info" id="add_row"><i class="fa fa-plus"></i> Add Row</button>
				</div>
			</div>

			<div id="prod_fill_in" style="margin-top: 15px">
				<input type="hidden" name="txt_max_row" id="txt_max_row" value="1">
				<div class="row">
						<div class="col-md-6">
							<input class="form-control" name="txt_print_lot" maxlength="15" id="txt_print_lot" placeholder="Print Lot"> 
						</div>
						<div class="col-md-5">
							<input class="form-control" name="txt_quantity" maxlength="5" id="txt_quantity" placeholder="Print Lot Quantity"> 
						</div>                   
				</div>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default fa fa-close" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary fa fa-print" id="btn_new_print"> Print</button>
		</form>
	  </div>
    </div>
  </div>
</div> -->

<!-- START - CHAN - 11-17-2025 -->
<div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" id="modal_new_sticker" style="overflow: auto;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="row" style="width:100%;">
					<div class="col-sm-6">
						<h4 class="modal-title">
						<span class="fa fa-plus"></span> Create New Label
						</h4>
					</div>
					<div class="col-sm-6">
						<p style="text-align:right;">
						<button class="btn btn-primary fa fa-search" id="btn_search_modal"> Search</button>
						</p>
					</div>
				</div>
			</div>

			<div class="modal-body">
				<p style="text-align:left; margin: 5px 10px 10 0;">
					<button class="btn btn-primary fa fa-qrcode" id="btn_scan_modal"> Scan QR Sticker</button>
				</p>
				<form id="frm_new_label28">
					<div class="row">
						<div class="col-sm-6">
							<label class="control-label">Customer P/N:</label>
							<input type="text" class="form-control clear" name="txt_pn" id="txt_pn" tabindex="1" readonly required>

							<label class="control-label">Manufacture P/N:</label>
							<input type="text" class="form-control clear" name="txt_mpn" id="txt_mpn" tabindex="3" readonly required>

							<label class="control-label">Item Code:</label>
							<input type="text" class="form-control clear" name="txt_item_code" id="txt_item_code" tabindex="3" readonly required>

							<label class="control-label" style="display:none;">unique:</label>
							<input type="text" class="form-control clear" style="display:none;" name="txt_unique" id="txt_unique" readonly required>

							<label class="control-label">Oldest Lot Date:</label>
							<input type="text" class="form-control clear" maxlength="6" minlength="6"
									name="txt_date" id="txt_date" tabindex="5" required>

							<input type="hidden" class="form-control clear" name="txt_hidden_po_number" id="txt_hidden_po_number">
						</div>

						<div class="col-sm-6">
							<label class="control-label">Qty:</label>
							<div class="row">
								<div class="col-sm-6">
									<input readonly type="number" maxlength="7" 
										class="form-control clear" name="txt_qty" id="txt_qty" tabindex="2" data-qty="0" required>
								</div>
							</div>

							<label class="control-label">Reel/Bundle No:</label>
							<div class="row" id="container_lot_number">
								<div class="col-sm-6">
									<input type="text" class="form-control clear" maxlength="4"
										name="txt_lot_no" id="txt_lot_no" tabindex="4" placeholder="----" required>
								</div>
								<div class="col-sm-1 no-padding">-</div>
								<div class="col-sm-4 no-padding">
									<input type="text" class="form-control clear" maxlength="3" style="text-transform:uppercase"
										name="txt_lot_no_count" id="txt_lot_no_count" placeholder="001" required>
								</div>
							</div>

							<label class="control-label">Print Qty:
								<i class="fa fa-question-circle" title="Default Print Qty is 1"></i>
							</label>
							<div class="row">
								<div class="col-sm-4">
									<input type="number" class="form-control" name="txt_print_qty"
										id="txt_print_qty" value="1" tabindex="6" readonly required>
								</div>
							</div>
						</div>
					</div>

					<div class="row" style="margin: 5px 5px 0 0;">
						<div class="col-md-10"></div>
						<div class="col-md-2">
							<button type="button" class="btn btn-sm btn-info" id="add_row">
								<i class="fa fa-plus"></i> Add Row
							</button>
						</div>
					</div>

					<div id="prod_fill_in" style="margin-top: 15px;">
						<input type="hidden" name="txt_max_row" id="txt_max_row" value="1">

						<div class="row">
							<div class="col-md-6">
								<input class="form-control clear" name="txt_print_lot" maxlength="15"
									id="txt_print_lot" placeholder="Print Lot">
							</div>
							<div class="col-md-5">
								<input class="form-control clear" name="txt_quantity" maxlength="5"
									id="txt_quantity" placeholder="Print Lot Quantity">
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default fa fa-close" data-dismiss="modal"> Close</button>
				<button type="submit" class="btn btn-primary fa fa-print" id="btn_new_print" form="frm_new_label28"> Print</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal_scan">
	<div class="modal-dialog" style="width:300px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><span class="fa fa-qrcode"></span> QR Sticker</h4>
			</div>
			<div class="modal-body">
				<div class="col-12">
					<input type="text" class="form-control clear" id="txt_scan_pattern" style="opacity:0; position:absolute;">
					<!-- <input type="text" class="form-control clear" id="txt_scan_pattern"> -->
					<div class="text-center text-secondary">Please scan the code.<br><h1><i class="fa fa-qrcode fa-lg"></i></h1></div>
				</div>						
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END - CHAN - 11-17-2025 -->

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
							<th>Customer P/N</th>
							<th>Manufacture P/N</th>
							<th>Qty</th>
							<th>Date Code</th>
							<th>LotNo</th>
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
							<th>Customer P/N</th>
							<th>Manufacture P/N</th>
							<th>Qty</th>
							<th>Date Code</th>
							<th>LotNo</th>
							<th>PrintLot</th>
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
        <button type="submit" class="btn btn-success fa fa-print" id="btn_confirm_re_print"> Print.</button>
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
        <button type="submit" class="btn btn-success fa fa-search" id="btn_confirm_re_print"> Search</button>
		</form>
	  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="mdl_employee_number_scanner" data-formid="" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header border-bottom-0 pb-0">
				<!-- <h5 class="modal-title" id="exampleModalLongTitle"></h5> -->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body pt-0">
				<div class="text-center text-secondary">
					Please scan your ID.
					<h1><i class="fa fa-barcode fa-lg"></i></h1>
				</div>
				<input type="text" id="txt_employee_number_scanner" autocomplete="off" class="hidden_scanner_input" style="position: absolute;opacity:0;">
			</div>
		</div>
	</div>
</div>


<!--
	Added by -JD
-->
<div class="modal fade" id="mdl_employee_number_scanner_for_supervisor" data-formid="" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header border-bottom-0 pb-0">
				<!-- <h5 class="modal-title" id="exampleModalLongTitle"></h5> -->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body pt-0">
				<div class="text-center text-secondary">
					Please scan Supervisor.
					<h1><i class="fa fa-barcode fa-lg"></i></h1>
				</div>
				<input type="text" id="txt_employee_number_scanner_for_supervisor" autocomplete="off" class="hidden_scanner_input" style="position: absolute;opacity:0;">
			</div>
		</div>
	</div>
</div>

<!--
	Added by -JD
-->
<div class="modal fade" id="mdl_confirmation_to_print" data-formid="" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header border-bottom-0 pb-0"></div>
			<div class="modal-body pt-0">
				<div class="text-center text-secondary">
					The Print Lot Quantity is less than the Device/Series Quantity, do you want to continue?
					<!-- <h1><i class="fa fa-barcode fa-lg"></i></h1> -->
				</div>
				<!-- <input type="text" id="txt_employee_number_scanner_for_supervisor" autocomplete="off" class="hidden_scanner_input" style="position: absolute;opacity:0;"> -->
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" id="btn-ok">Yes</a>
            </div>
		</div>
	</div>
</div>
<!-- /.Modal -->


<script>
/* Handler and Username */
var handler = '../handler/handlerrev.php';
var username = $('hd_username').val();

/* Array of for selected rows */
var array_selected = [];

/* Datatables serverside configuration */
var oTable = $('#tbl_format28').DataTable( {
	"bProcessing": true,
	"bServerSide": true,
	"aaSorting"	 : [],
	"sAjaxSource"		: "../server_side/format28.php"
} );


/*
	Added by -JD
*/
$('#btn-ok').on('click', function(e) {
	$('#mdl_confirmation_to_print').modal('hide');
	$('#mdl_employee_number_scanner_for_supervisor').modal('show');
});


/* Create new label button event */
$('#btn_create_new_label').click(function(){
	/* clear data */
	/* To be added later on */
	// $('#sticker_preview div').empty();
	/* display modal */
	get_unique_number();
	$('#modal_new_sticker').modal('show');
	get_work_week();
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

// GEU UNIQUE NUMBER
function get_unique_number(){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: "action=get_unique",
		url		: handler,
		success	: function(result){

			console.log(result);
			$('#txt_unique').val(result['incremented_unique_id']);

			/* generates a datalist and append it to the body */
			// var html = '<datalist id="list_item_name">';
			// for(x=0;x<result['item_name'].length;x++){
			// 	html += '<option>'+result['item_name'][x]+'</option>';
			// }
			// html += '</datalist>';
			// $('body').append(html);
			// /* assign data list to the txt_itemaname */
			// $('#txt_mpn').attr('list','list_item_name');
		},error : function(){
			alert('error handler');
		}
		
	});
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
			$('#txt_mpn').attr('list','list_item_name');
		},error : function(){
			alert('error handler');
		}
		
	});
}

/* event to automatically load the next lotno */
$('#txt_lot_no').change(function(){
	var pn 			= $('#txt_pn').val();
	var lotno 		= $(this).val();
	check_existing_item_name_and_lotno(pn,lotno);
});

/* function for checking existing item name and lotno */
function check_existing_item_name_and_lotno(pn,lotno){
	var data = {
		"action" 	: "check_existing_item_name_and_lotno_format28",
		"pn"		: pn,
		"lotno"		: lotno
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
$('#frm_new_label28').submit(function(e){
	e.preventDefault();
	//---
	var action =  'frm_new_label28';
	if( $('#ckb_partial').is(':checked') || $('#ckb_pats').is(':checked') ){
		action = 'frm_new_label28_partial';
	}

	if($('#txt_pn').val() == ''){ // Chris - 11/08/24
		$('#txt_pn').prop('required', true) 
	}else{
		$('#txt_pn').prop('required', false)
	}
	/**
	 * Add condition for Min & Max characters length of Oldest Lot Date
	 * Added on 06-20-2024 -JD
	 */
	if($('#txt_date').val().length != 6){
		console.log('object ', $('#txt_date').val().length);
		alert('Oldest Lot Date should be 6 characters');
	}else{
		if($('#txt_hidden_po_number').val() == "" || $('#txt_hidden_po_number').val() == null){
			alert('PO not found! Please refresh the system.');
			// location.reload();
			return;
		}
		else{
			$('#txt_employee_number_scanner').val('');
			$('#txt_employee_number_scanner_for_supervisor').val('');
			$('#mdl_employee_number_scanner').attr('data-formid',action).modal('show');
			$('#mdl_employee_number_scanner_for_supervisor').attr('data-formid',action);
		}
	}

	
	// $('#txt_employee_number_scanner').val('');
	// $('#txt_employee_number_scanner_for_supervisor').val('');
	// $('#mdl_employee_number_scanner').attr('data-formid',action).modal('show');
	// $('#mdl_employee_number_scanner_for_supervisor').attr('data-formid',action);
	//---
	// frm_new_label28(); // Commented by -JD 02-02-2022
});

$('#ckb_partial').change(function(){
	if($(this).prop('checked') == true){
		$('#txt_qty').attr('readonly',false);
		$('#txt_qty').val('0');
	}
	else{
		$('#txt_qty').attr('readonly',true);
		$('#txt_qty').val( $('#txt_qty').attr('data-qty') );
	}
});

function frm_new_label28(){
	var data = {
		"action"	: "save_new_c3_label_format28",
		"format_no"	: "28",
		"username"	: username,
		"txt_employee_number_scanner"	: $('#txt_employee_number_scanner').val(),
		"partial"	:$('#ckb_partial').prop('checked'),
		// "pats"		:$('#ckb_pats').prop('checked'),
		"pats"		:"0",
	}
	data = $.param(data) + '&' + $('#frm_new_label28').serialize();
	console.log(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: handler,
		success	: function(result){
			/* send zpl code to the printer */
			console.log(result['label']);
			// inserted here to get txt_unique_new from save_new_c3_label_format28

			print_labels(result['label'], result['ip']);
			/* reload datatable serverside */
			oTable.ajax.reload();
			/* clear all input in modal */
			// $('#frm_new_label28 input').val('');
			// $('#txt_pn').val('14200208');
			// $('#txt_mpn').val('CN121S-104-0002 (01)');
			// $('#txt_qty').val('240');
			get_work_week();
			console.log("result['txt_unique_new']", result['txt_unique_new']);
			insert_c3_label_huawei_details(result['txt_unique_new']); // Insert in RapidX - PATS
			// console.log('insert_c3_label_huawei_details is called');

			
		}
	});
}

function frm_new_label28_with_authorization(){
	var data = {
		"action"	: "save_new_c3_label_format28",
		"format_no"	: "28",
		"username"	: username,
		"txt_employee_number_scanner"	: $('#txt_employee_number_scanner_for_supervisor').val(),
		"partial"	:$('#ckb_partial').prop('checked'),
		// "pats"		:$('#ckb_pats').prop('checked'),
		"pats"		:"0",
	}
	data = $.param(data) + '&' + $('#frm_new_label28').serialize();
	console.log(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: handler,
		success	: function(result){
			/* send zpl code to the printer */
			print_labels(result['label'], result['ip']);
			// inserted here to get txt_unique_new from save_new_c3_label_format28
			// console.log('insert_c3_label_huawei_details_with_authorization is called');
			
			/* reload datatable serverside */
			oTable.ajax.reload();
			/* clear all input in modal */
			// $('#frm_new_label28 input').val('');
			// $('#txt_pn').val('14200208');
			// $('#txt_mpn').val('CN121S-104-0002 (01)');
			// $('#txt_qty').val('240');
			get_work_week();
			
			insert_c3_label_huawei_details_with_authorization(result['txt_unique_new'],); // Insert in RapidX - PATS
		}
	});
}

// Insert C3 Label Huawei details to rapidx -JD
function insert_c3_label_huawei_details(uniqueNumber){
	console.log('insert_c3_label_huawei_details is called', uniqueNumber);
	max_row		= $('#txt_max_row').val();
	console.log('max_row: ', max_row);
	/*
		Get multiple input fields of Print Lot & Qty
		Added by -JD
	*/
	let printLotArr = [];
	let printLotQuantityArr = [];
	if(max_row > 0){
		printLotArr.push($('#txt_print_lot').val());
		printLotQuantityArr.push($('#txt_quantity').val());
		for (let i=2; i <= max_row; i++) {
			printLotArr.push($('#txt_print_lot_'+i).val());
			printLotQuantityArr.push($('#txt_quantity_'+i).val());
		}
	}
	console.log('printLotArr: ', printLotArr);
	console.log('printLotQuantityArr: ', printLotQuantityArr);
	let implodedPrintLots = printLotArr.join(', ');
	let implodedQuantity = printLotQuantityArr.join(', ');
	console.log('implodedPrintLots: ', implodedPrintLots);
	console.log('implodedQuantity: ', implodedQuantity);

	let data = {
		// "action"	: "save_new_c3_label_format28",
		// "format_no"	: "28",
		"print_lots"	: implodedPrintLots,
		"print_lot_quantities"	: implodedQuantity,
		"username"	: username,
		"unique_number_new"	: uniqueNumber,
		"txt_employee_number_scanner"	: $('#txt_employee_number_scanner').val(),
		// "txt_employee_number_scanner"	: $('#txt_employee_number_scanner_for_supervisor').val(),
		// "partial"	:$('#ckb_partial').prop('checked'),
		// "pats"		:$('#ckb_pats').prop('checked'),
		"pats"		:"0",
	}
	data = $.param(data) + '&' + $('#frm_new_label28').serialize();
	console.log('insert_c3_label_huawei_details data: ',data);
	
	// $.ajax({
	// 	'data'      : data,
	// 	'type'      : 'get',
	// 	'dataType'  : 'json',
	// 	// 'url'       : 'http://rapidx/rapidx-api_test/api/insert_to_rapidx.php',
	// 	'url'       : 'http://rapidx/rapidx-api/api/insert_to_rapidx.php',
	// 	success	: function(result){
	// 		alert('Inserted Successfully');
	// 	}
	// });

	$.ajax({
		'data'      : data,
		'type'      : 'get',
		'dataType'  : 'json',
		'url'       : 'http://rapidx/rapidx-api/api/insert_to_rapidx_pats_cn_v2.php',
		success	: function(result){
			alert('Inserted Successfully');
			$('#frm_new_label28 input').val('');
			$('#txt_pn').val('14200208');
			$('#txt_mpn').val('CN121S-104-0002 (01)');
			$('#txt_qty').val('240');
			$('#modal_new_sticker').modal('hide');


		}
	});
}

// insert_c3_label_huawei_details to rapidx -JD
function insert_c3_label_huawei_details_with_authorization(uniqueNumber){
	console.log('insert_c3_label_huawei_details is called');
	max_row		= $('#txt_max_row').val();
	console.log('max_row: ', max_row);
	/*
		Get multiple input fields of Print Lot & Qty
		Added by -JD
	*/
	let printLotArr = [];
	let printLotQuantityArr = [];
	if(max_row > 0){
		printLotArr.push($('#txt_print_lot').val());
		printLotQuantityArr.push($('#txt_quantity').val());
		for (let i=2; i <= max_row; i++) {
			printLotArr.push($('#txt_print_lot_'+i).val());
			printLotQuantityArr.push($('#txt_quantity_'+i).val());
		}
	}
	console.log('printLotArr: ', printLotArr);
	console.log('printLotQuantityArr: ', printLotQuantityArr);
	let implodedPrintLots = printLotArr.join(', ');
	let implodedQuantity = printLotQuantityArr.join(', ');
	console.log('implodedPrintLots: ', implodedPrintLots);
	console.log('implodedQuantity: ', implodedQuantity);

	var data = {
		// "action"	: "save_new_c3_label_format28",
		// "format_no"	: "28",
		"print_lots"	: implodedPrintLots,
		"print_lot_quantities"	: implodedQuantity,
		"unique_number_new"	: uniqueNumber,
		"username"	: username,
		// "txt_employee_number_scanner"	: $('#txt_employee_number_scanner').val(),
		"txt_employee_number_scanner"	: $('#txt_employee_number_scanner_for_supervisor').val(),
		// "partial"	:$('#ckb_partial').prop('checked'),
		// "pats"		:$('#ckb_pats').prop('checked'),
		"pats"		:"0",
	}
	data = $.param(data) + '&' + $('#frm_new_label28').serialize();
	console.log('insert_c3_label_huawei_details data: ',data);
	// $.ajax({
	// 	'data'      : data,
	// 	'type'      : 'get',
	// 	'dataType'  : 'json',
	// 	// 'url'       : 'http://rapidx/rapidx-api_test/api/insert_to_rapidx.php',
	// 	'url'       : 'http://rapidx/rapidx-api/api/insert_to_rapidx.php',
	// 	success	: function(result){
	// 		alert('Inserted Successfully');
	// 	}
	// });

	$.ajax({
		'data'      : data,
		'type'      : 'get',
		'dataType'  : 'json',
		'url'       : 'http://rapidx/rapidx-api/api/insert_to_rapidx_pats_cn_v2.php',
		success	: function(result){
			alert('Inserted Successfully');
			$('#frm_new_label28 input').val('');
			$('#txt_pn').val('14200208');
			$('#txt_mpn').val('CN121S-104-0002 (01)');
			$('#txt_qty').val('240');
			$('#modal_new_sticker').modal('hide');
		}
	});
}

var totalQty;
function computeIfReached(){
	/*
		Compute the Print Lot Qty to match in Device Qty
		Added by -JD
	*/
	var max_row = $('#txt_max_row').val();
	totalQty = 0;
	totalQty += parseInt($('#txt_quantity').val());
	if(max_row > 1){

		for(let i = 2; i <= max_row; i++){
			totalQty += parseInt($('#txt_quantity_'+ i).val());
			console.log('index ',i);
		}
		console.log('totalQty: ', parseInt(totalQty));
	}
}

// /*
// 	Compute the Print Lot Qty to match in Device Qty
// 	Added by -JD
// */
// let max_row = $('#txt_max_row').val();
// var txt_qty = $('#txt_qty').val();
// var totalQty = 0;
// if(max_row > 1){
// 	totalQty += parseInt($('#txt_quantity').val());

// 	for(let i = 2; i <= max_row; i++){
// 		totalQty += parseInt($('#txt_quantity_'+ i).val());
// 		console.log('index ',i);
// 	}
// 	console.log('totalQty: ', parseInt(totalQty));
// }


/*
	Added by -JD
*/
function validate_user_for_supervisor(position,arr){
	//---
	var data2 = {
		'employee_id' 				: $('#txt_employee_number_scanner_for_supervisor').val(),
		'status' 					: 1,
	};
	$.ajax({
		'data'      : data2,
		'type'      : 'get',
		'dataType'  : 'json',
		'url'       : 'http://rapidx/NAAYES/api/users.php',
		beforeSend: function(){
        	$('#btn_new_print').prop('disabled', true);
        },
		success : function(data3){
			var alert_msg = '';
			console.log('data3 position', data3);
			if($.trim(data3)){
				if(jQuery.inArray(data3[0]['position'], position) !== -1){
					switch( arr['action'] ){
						case 'frm_new_label28':
							// frm_new_label28();
							frm_new_label28_with_authorization();
							// insert_c3_label_huawei_details_with_authorization(); // Insert in RapidX - PATS
							// console.log('insert_c3_label_huawei_details_with_authorization is called');
							//$('#modal_new_sticker').modal('hide');
							$('#btn_new_print').prop('disabled', false); // Chan 10-13-2022

							break;
						case 'reprint_label_format28':
							reprint_label();
							$('#modal_re_print_label').modal('hide');
							$('#btn_new_print').prop('disabled', false); // Chan 10-13-2022
							break;
						default:
						break;
					}
				}
				else if($('#txt_employee_number_scanner_for_supervisor').val() == 'N065' || 
					$('#txt_employee_number_scanner_for_supervisor').val() == 'N094' || 
					$('#txt_employee_number_scanner_for_supervisor').val() == 'R181' || 
					$('#txt_employee_number_scanner_for_supervisor').val() == 'N023' || 
					$('#txt_employee_number_scanner_for_supervisor').val() == 'M126' || 
					$('#txt_employee_number_scanner_for_supervisor').val() == 'R004' || 
					$('#txt_employee_number_scanner_for_supervisor').val() == 'N007' || 
					$('#txt_employee_number_scanner_for_supervisor').val() == 'M009' ||
					$('#txt_employee_number_scanner_for_supervisor').val() == 'Q080'){
					switch( arr['action'] ){
						case 'frm_new_label28':
							console.log($('#txt_employee_number_scanner_for_supervisor').val());
							// frm_new_label28();
							frm_new_label28_with_authorization();
							// insert_c3_label_huawei_details_with_authorization();
							// console.log('insert_c3_label_huawei_details_with_authorization is called');
							// $('#modal_new_sticker').modal('hide');
							break;
						case 'reprint_label_format28':
							reprint_label();
							$('#modal_re_print_label').modal('hide');
							break;
						default:
						break;
					}
				}
				else{
					
					alert_msg = 'Please scan Supervisor or QC Inspector\'s ID.';// for partial qty or for PATS
					if(data3[0]['position']!='4'){
						alert_msg = 'Invalid ID. Please scan Operator\'s ID.';
					}
				}
			}
			else{
				console.log('REPRINT')
				alert_msg = 'User ID not found in PATS.';
			}
			//---
			if(alert_msg){
				alert(alert_msg);
				return;
			}
			//---
		}
	});
}


function validate_user(position,arr){
	//---
	var data2 = {
		'employee_id' 				: $('#txt_employee_number_scanner').val(),
		'status' 					: 1,
	};
	$.ajax({
		'data'      : data2,
		'type'      : 'get',
		'dataType'  : 'json',
		'url'       : 'http://rapidx/NAAYES/api/users.php',
		beforeSend: function(){
        	$('#btn_new_print').prop('disabled', true);
        },
		success : function(data3){
			var alert_msg = '';
			// console.log('data3 position', data3[0]['position']);
			if($.trim(data3)){
				if(jQuery.inArray(data3[0]['position'], position) !== -1){
					// if(parseInt(totalQty) <= parseInt($('#txt_qty').val())){
					if(parseInt(totalQty) == parseInt($('#txt_qty').val())){
						console.log('txt_qty ',$('#txt_qty').val());
						console.log('print lot quantity is not greater than device quantity');
						switch( arr['action'] ){
							case 'frm_new_label28':
								frm_new_label28();
								// Commented by - CP 11/13/25 -> implement new code for rapidx insert
								// insert_c3_label_huawei_details(); // Insert in RapidX - PATS 
								// console.log('insert_c3_label_huawei_details is called');
								// $('#modal_new_sticker').modal('hide');
								$('#btn_new_print').prop('disabled', false); // Chan 10-13-2022

								break;
							default:
							break;
						}
					}else if (parseInt(totalQty) > parseInt($('#txt_qty').val())){
						console.log('txt_qty ',$('#txt_qty').val());
						console.log('totalQty ',totalQty);
						console.log('Print lot quantity should not be greater than device quantity');
						alert('Print lot quantity should not be greater than device quantity');
					}else if (parseInt(totalQty) < parseInt($('#txt_qty').val())){
						console.log('txt_qty ',$('#txt_qty').val());
						console.log('totalQty ',totalQty);
						console.log('Print lot quantity should not be greater than device quantity');
						// alert('Print lot quantity should not be greater than device quantity');
						$('#mdl_confirmation_to_print').modal('show');
					}
				}
				else if(
				$('#txt_employee_number_scanner').val() == 'N023' ||
				$('#txt_employee_number_scanner').val() == 'M126' ||
				$('#txt_employee_number_scanner').val() == 'M009' ||
				$('#txt_employee_number_scanner').val() == 'R181' ||
				$('#txt_employee_number_scanner').val() == 'Q080' ||
				$('#txt_employee_number_scanner').val() == 'N094'

				){
					if(parseInt(totalQty) == parseInt($('#txt_qty').val())){
						console.log('txt_qty ',$('#txt_qty').val());
						console.log('print lot quantity is not greater than device quantity');
						switch( arr['action'] ){
							case 'frm_new_label28':
								frm_new_label28();
								// insert_c3_label_huawei_details(); // Insert in RapidX - PATS
								// console.log('insert_c3_label_huawei_details is called');
								// $('#modal_new_sticker').modal('hide');
								$('#btn_new_print').prop('disabled', false); // Chan 10-13-2022

								break;
							default:
							break;
						}
					}else if (parseInt(totalQty) > parseInt($('#txt_qty').val())){
						console.log('txt_qty ',$('#txt_qty').val());
						console.log('totalQty ',totalQty);
						console.log('Print lot quantity should not be greater than device quantity');
						alert('Print lot quantity should not be greater than device quantity');
					}else if (parseInt(totalQty) < parseInt($('#txt_qty').val())){
						console.log('txt_qty ',$('#txt_qty').val());
						console.log('totalQty ',totalQty);
						console.log('Print lot quantity should not be greater than device quantity');
						// alert('Print lot quantity should not be greater than device quantity');
						$('#mdl_confirmation_to_print').modal('show');
					}
				}
				else{
					
					alert_msg = 'Please scan Supervisor or QC Inspector\'s ID.';// for partial qty or for PATS
					if(data3[0]['position']!='4'){
						alert_msg = 'Invalid ID. Please scan Operator\'s ID.';
					}
				}
			}
			else{
				alert_msg = 'User ID not found in PATS.';
			}
			//---
			if(alert_msg){
				alert(alert_msg);
				return;
			}
			//---
		}
	});
	


	// Remove or comment this code after server issue -> Chris 032524
	// if(parseInt(totalQty) == parseInt($('#txt_qty').val())){
	// 	console.log('txt_qty ',$('#txt_qty').val());
	// 	console.log('print lot quantity is not greater than device quantity');
	// 	switch( arr['action'] ){
	// 		case 'frm_new_label28':
	// 			frm_new_label28();
	// 			insert_c3_label_huawei_details(); // Insert in RapidX - PATS
	// 			console.log('insert_c3_label_huawei_details is called');
	// 			$('#modal_new_sticker').modal('hide');
	// 			$('#btn_new_print').prop('disabled', false); // Chan 10-13-2022

	// 			break;
	// 		default:
	// 		break;
	// 	}
	// }else if (parseInt(totalQty) > parseInt($('#txt_qty').val())){
	// 	console.log('txt_qty ',$('#txt_qty').val());
	// 	console.log('totalQty ',totalQty);
	// 	console.log('Print lot quantity should not be greater than device quantity');
	// 	alert('Print lot quantity should not be greater than device quantity');
	// }else if (parseInt(totalQty) < parseInt($('#txt_qty').val())){
	// 	console.log('txt_qty ',$('#txt_qty').val());
	// 	console.log('totalQty ',totalQty);
	// 	console.log('Print lot quantity should not be greater than device quantity');
	// 	// alert('Print lot quantity should not be greater than device quantity');
	// 	$('#mdl_confirmation_to_print').modal('show');
	// }

}
//----------
//----------
//----------
$( ".modal" ).on('shown.bs.modal', function(){
	$(this).find('.hidden_scanner_input').focus();
});


/*
	Added by -JD
*/
$(document).on('keypress',function(e){
	if( ($("#mdl_employee_number_scanner_for_supervisor").data('bs.modal') || {}).isShown ){
		$('#txt_employee_number_scanner_for_supervisor').focus();
		setTimeout(() => {
			$('#txt_employee_number_scanner_for_supervisor').val('');
		}, 200);
		if( e.keyCode == 13 ){
			$('#mdl_employee_number_scanner_for_supervisor').modal('hide');
			var formid = $("#mdl_employee_number_scanner_for_supervisor").attr('data-formid');
			// computeIfReached();
			// console.log(totalQty);
			if ( ( formid ).indexOf('#') > -1){
				$( formid ).submit();
			}
			else{
				switch( formid ){
					case 'frm_new_label28':
						console.log('txt_employee_number_scanner_for_supervisor keypressed');
						var arr = [];
						arr['action'] = 'frm_new_label28';
						$('#txt_employee_number_scanner').val('');
						validate_user_for_supervisor(['10','1','2','0'],arr);
						break;
					case 'reprint_label_format28':
						var arr = [];
						console.log('reprint');
						arr['action'] = 'reprint_label_format28';
						validate_user_for_supervisor(['1','2','8','0'],arr);
						break;
					// case 'frm_new_label28_partial':
					// 	var arr = [];
					// 	arr['action'] = 'frm_new_label28';
					// 	validate_user(['1','2','5','7','8'],arr);
					// 	break;
					default:
					break;
				}
			}
		}
	}
});

$(document).on('keypress',function(e){
	if( ($("#mdl_employee_number_scanner").data('bs.modal') || {}).isShown ){
		$('#txt_employee_number_scanner').focus();
		setTimeout(() => {
			$('#txt_employee_number_scanner').val('');
		}, 200);
		if( e.keyCode == 13 ){
			$('#mdl_employee_number_scanner').modal('hide');
			var formid = $("#mdl_employee_number_scanner").attr('data-formid');
			computeIfReached();
			console.log(totalQty);
			if ( ( formid ).indexOf('#') > -1){
				$( formid ).submit();
			}
			else{
				switch( formid ){
					case 'frm_new_label28':
						var arr = [];
						arr['action'] = 'frm_new_label28';
						validate_user(['10','1','2','0','4'],arr);
						break;
					case 'frm_new_label28_partial':
						var arr = [];
						arr['action'] = 'frm_new_label28';
						validate_user(['1','2','8','0'],arr);
						break;
					default:
					break;
				}
			}
		}
	}
});
//----------
//----------
//----------

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

// $('#btn_reprint_label').click(function(){
// 	var action =  'reprint_label_format28';
// 	$('#txt_employee_number_scanner_for_supervisor').val('');
// 	$('#mdl_employee_number_scanner_for_supervisor').attr('data-formid',action);
// });
/*
	
	 

/* event when a reprint button was submitted */
$('#frm_re_print_label').submit(function(e){
	e.preventDefault();
	/* do reprinting here */
	var action =  'reprint_label_format28';
	$('#txt_employee_number_scanner_for_supervisor').val('');
	$('#mdl_employee_number_scanner_for_supervisor').attr('data-formid',action).modal('show');
	// reprint_label(); // Commented by -JD
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
		"action"	 	: "reprint_label_format28",
		"array_pkid" 	: array_selected
	}
	data = $.param(data);
	// console.log(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: handler,
		success	: function(result){
			/* pass the zpl commands for printing */
			console.log(result);
			print_labels(result['label'], result['ip']);
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
		"action"	 	: "delete_label_format28",
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
		"action"	 : "load_selected_label_info_format28",
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
$('#tbl_format28 tbody').on('click','#chk_select', function(){
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

// START - CHAN - 11-17-2025
$('#btn_scan_modal').click(function(){ $('#modal_scan').modal('show'); });
$('#modal_scan').on('shown.bs.modal', function () {
	$('#prod_fill_in').find('.remove_row').closest('.row').remove();
	$('#txt_max_row').val('1')
	$('.clear').val('')
    $('#txt_scan_pattern').focus();
		const mdlScanQrCode = document.querySelector("#modal_scan");
		const inptQrCode = document.querySelector("#txt_scan_pattern");
		let focus = false;

		mdlScanQrCode.addEventListener("mouseover", () => {
			if (inptQrCode === document.activeElement) {
				focus = true;
			} else {
				focus = false;
			}
		});

		mdlScanQrCode.addEventListener("click", () => {
			if (focus) {
				inptQrCode.focus()
			}
		});
});

$('#txt_scan_pattern').on('keypress',function(e){
	if( e.keyCode == 13 ){
		let scanQrCode = $(this).val();
		try{
			let scanQrCodeDetails = JSON.parse(scanQrCode)
			console.log('scanQrCodeDetails: ', scanQrCodeDetails['po_no']);
			if(typeof scanQrCodeDetails == 'object'){
				let scan_reel_bundle_no	= scanQrCodeDetails['reel_lot_no'].split('-');
				let scan_oldest_lot_no 	= scanQrCodeDetails['oldest_lot_no']
				let search_category 	= 'PONo';
				let search_pattern 		= scanQrCodeDetails['po_no'];

				search_item(search_category,search_pattern);
				console.log('object: ', search_pattern);
				$('#txt_lot_no').val(scan_reel_bundle_no[0])
				$('#txt_lot_no_count').val(scan_reel_bundle_no[1]) 
				$('#txt_date').val(scan_oldest_lot_no)

				setTimeout(() => {
					$('#txt_hidden_po_number').val(search_pattern)
				}, 500);

				let printLots = scanQrCodeDetails['print_lot_no'];
				if(Array.isArray(printLots)){
					$('#txt_print_lot').val(printLots[0].print_lot);
					$('#txt_quantity').val(printLots[0].print_lot_qty);

					for(let i = 1; i < printLots.length; i++){
						$('#add_row').click();

						let lastRow = $('#prod_fill_in .row').last();
						let lotInput  = lastRow.find("input[name^='txt_print_lot']");
						let qtyInput  = lastRow.find("input[name^='txt_quantity']");

						lotInput.val(printLots[i].print_lot);
						qtyInput.val(printLots[i].print_lot_qty);
					}
				}else{
					// ikaw na bahala
				}

				if(scan_oldest_lot_no.length === 6){
					$('#btn_new_print').show();
				}else{
					alert('Oldest Lot Date must be 6 characters')
					$('#btn_new_print').hide();
				}
			}else{
				alert('The Scan QR Code was not found!!')
			}
		}
		catch (error) {
			alert('The Scan QR Code was not found!')
		}
		$('#modal_scan').modal('hide')
	}
});
// END - CHAN - 11-17-2025

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
			$('#txt_mpn').val('');
			// $('#txt_pn').val('');
			if(result['exist'] == 0){
				alert('Record does not exist!');
				return false;
			}
			
			$('#txt_hidden_po_number').val($('#txt_search_pattern').val());
			// console.log('txt_hidden_po_number ',$('#txt_hidden_po_number').val());

			$('#txt_mpn').val(result['item_name'][0]);
			$('#txt_item_code').val(result['item_code'][0]);
			// assign_fix_value( result['item_name'][0] );
			// $('#txt_pn').val( result['PONo'][0].substring(0, 10) );
            default_values(result['item_name'][0]);
			$('#modal_search input').val("");
			$('#modal_search').modal('hide');
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

			//-11242020
			if (result['item_name'] == 'CN109S-022-0002(H1)'){
				$('#txt_pn').val('14200778');
				$('#txt_qty').val('600');
			}else{
				$('#txt_pn').val(result['data']['customer_pn']);
				$('#txt_qty').val(result['data']['quantity']);
				$('#txt_qty').attr('data-qty',result['data']['quantity']);
			}


// 			$('#txt_qty').val("0");
// 			$('#txt_pn').val(result['data']['customer_pn']);
//			$('#txt_remarks').val("");
// 			$('#txt_qty').val(result['data']['quantity']);
//			$('#txt_order_no').val(result['data']['order_no']);
//			$('#txt_remarks').val(result['data']['remarks']);
//			change_preview_value( 'preview_item_name',$('#txt_itemname').val() );
//			change_preview_value( 'preview_qty',$('#txt_qty').val() );
//			change_preview_value( 'preview_remarks',$('#txt_remarks').val() );			
		}, error : function(){
			alert('error handler');
		}
	});
}

function assign_fix_value(devicename){
	if( devicename == "CA009-S101-001(01)" ){
		$('#txt_pn').val('14200358');
		$('#txt_qty').val('240');
		get_work_week();
	}
}

function get_work_week(){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: 'action=get_work_week',
		url		: handler,
		success	: function(result){
			$('#txt_date').val(result['work_week']);
		}, error : function(){
			alert('error handler');
		}
	});
}


$('#add_row').click(function(){
	let i = 1;// counter for txt_max_row
    let maxRow = $('#txt_max_row').val();

    if(maxRow > 7){
        alert('Print lot already reached');
    }else{
		maxRow++;
		console.log('txt_max_row after adding row: ' + maxRow);
		var html =  '	  <div class="row" style="margin-top: 10px">';
			// html += '     	<div class="col-md-11">';
			html += '     		<div class="col-md-6" id="row'+maxRow+'">';
			html += '      			<input class="form-control" maxlength="15" name="txt_print_lot_'+maxRow+'" id="txt_print_lot_'+maxRow+'" placeholder="Print Lot">';
			html += '     		</div>';

			// Qty
			html += '	    	<div class="col-md-5">';
			html += '         	<input type="text" class="form-control form-control-sm" maxlength="5" id="txt_quantity_'+maxRow+'" name="txt_quantity_'+maxRow+'" placeholder="Print Lot Quantity">';
			html += '	    	</div>';

			// Remove Row
			html += '	    	<div class="col-md-1">';
			html += '		    	<a class="remove_row" style="margin-left: -20px;" remove-row="'+maxRow+'"><i class="btn fa fa-close pointer" style="color:red"></i></a>';
			html += '	    	</div>';
			// html += '     	</div>';
			html += '     </div>';

		$('#txt_max_row').val(maxRow);
		$('#prod_fill_in').append(html);
	}
});


/*
	Remove Print Lot row Start
	Added by -JD
*/
$("#prod_fill_in").on('click', '.remove_row', function(e){
	let maxRow = $('#txt_max_row').val();
	maxRow--;
	console.log('txt_max_row after removing row: ' + maxRow);
	$('#txt_max_row').val(maxRow).trigger('change');
	$(this).closest('.row').remove();

});

$("#modal_new_sticker").on('hidden.bs.modal', function(){
	console.log('Modal is closed');
	$('#txt_max_row').val(1).trigger('change');
	$('#prod_fill_in').find('.remove_row').closest('.row').remove();
	// $('#prod_fill_in').find('.remove_row').closest('.row').val('');
	$('#frm_new_label28')[0].reset();
});


/* the zpl commands are sent here for printing */
function print_labels(array_label, ip){
	// if(ip == '192.168.30.120' || ip == '192.168.14.216' || ip == '192.168.30.117' || ip == '192.168.30.46'){
	if(ip == '192.168.30.46'){ // 192.168.30.46 cn2 packing
		findPrinter('ZT220',array_label);
	}
	// else if(ip == '192.168.15.241' || ip == '192.168.14.74' || ip == '192.168.102.110' || ip == '192.168.100.64'){ // additional printer in production
	else if(ip == '192.168.15.241' || ip == '192.168.14.74' || ip == '192.168.102.110' || ip == '192.168.100.66' || ip == '192.168.102.126'){ // additional printer in production
	 	findPrinter('ZD421',array_label);
	}
	// else if(ip == '192.168.100.22'){ // CN1 PACKING
	//  	findPrinter('ZT220',array_label);
	// }
	else{	// else for production printing of c3
		findPrinter('ZD420',array_label);
	}
	// findPrinter('ZD420',array_label); // 04272023
}
//--------------------
//prevent typing of barcode/qr code
//--------------------
// $(document).on('keydown',function(e){
// 	if ($("#txt_employee_number_scanner").is(":focus")) {
// 	  setTimeout(function() {
// 	  	$("#txt_employee_number_scanner").val('');
// 	  }, 200);
// 	}
// });
//--------------------
//prevent typing of barcode/qr code
//--------------------
</script>
<!--Zebra Printing Stuff-->
<script type="text/javascript" src="../LabelPrinter/js/deployJava.js"></script>
<script type="text/javascript" src="../js/zpl_print_script.js"></script>
