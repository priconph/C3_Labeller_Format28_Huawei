<div class="main_container">
	<legend> 
		<h1>
			<span class="fa fa-gear"> Settings
			</span>
		</h1>
	</legend>
	<div class="row" style="padding-left:10px;">
		<div>
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#alignment" aria-controls="alignment" role="tab" data-toggle="tab">Alignment</a></li>
			<li role="presentation"><a href="#default_values" aria-controls="default_values" role="tab" data-toggle="tab">CN Default Values</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="alignment">
					<div class="col-sm-5">
						<div class="panel panel-primary">
						  <div class="panel-heading">
							Sticker Alignment
						  </div>
						  <div class="panel-body">
							<label>PC IP: </label>
							<input class="form-control" type="text" id="txt_pc_ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" disabled>
							<label>Left Space: </label>
							<input class="form-control" type="number" id="txt_left_space">
							<label>Top Space: </label>
							<input class="form-control" type="number" id="txt_top_space">
							<label>Font Name: </label> (Note: Do not edit font name)
							<input class="form-control" type="text" id="txt_font_name">
							<br>
							<p style="text-align:right;">
								<button class="btn btn-primary fa fa-save" id="btn_update_alignment"> Update Alignment</button>
							</p>
						  </div>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="panel panel-primary">
						  <div class="panel-heading">
							UL Label Alignment
						  </div>
						  <div class="panel-body">
							<label>PC IP: </label>
							<input class="form-control" type="text" id="txt_pc_ip_ul" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" disabled>
							<label>Left Space: </label>
							<input class="form-control" type="number" id="txt_left_space_ul">
							<label>Top Space: </label>
							<input class="form-control" type="number" id="txt_top_space_ul">
							<label>Font Name: </label> (Note: Do not edit font name)
							<input class="form-control" type="text" id="txt_font_name_ul">
							<br>
							<p style="text-align:right;">
								<button class="btn btn-primary fa fa-save" id="btn_update_alignment_ul"> Update Alignment</button>
							</p>
						  </div>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="default_values">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1" style="padding:5px;">
							<button class="btn btn-primary fa fa-plus pull-right" id="btn_new_default_values"> New</button>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1" style="padding:5px;">
							<table class="table table-bordered table-striped table-condensed" id="tbl_default_values" style="font-size:12px;">
								<thead>
									<th>Item Code</th>
									<th>Item Name</th>
									<th>Drawing #</th>
									<th>Quantity</th>
									<th>P/N</th>
									<th>P/N Code</th>
									<th>Order #</th>
									<th>Part #</th>
									<th>MM</th>
									<th>Customer PN</th>
									<th>Code</th>
									<th>Remarks</th>
									<th><i class="fa fa-cogs"></i></th>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal_add_new_default_values">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="fa fa-plus"> New</span></h4>
      </div>
		<form id="frm_new_default_values">
		  <div class="modal-body">
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Item Code</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="item_code" class="form-control" list="list_item_code" required autocomplete="off">
						<datalist id="list_item_code"></datalist>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Item Name</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="item_name" class="form-control" required autocomplete="off">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Quantity</label>
					</div>
					<div class="col-sm-8">
						<input type="number" name="quantity" class="form-control" required autocomplete="off">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Order #</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="order_no" class="form-control" autocomplete="off">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Remarks</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="remarks" class="form-control" autocomplete="off">
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="submit" class="btn btn-primary fa fa-save"> Save</button>
			<button type="button" class="btn btn-danger fa fa-remove" data-dismiss="modal">Close</button>
		  </div>
	  </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_view_edit_default_values">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="fa fa-plus"> New</span></h4>
      </div>
		<form id="frm_view_edit_default_values">
		  <div class="modal-body">
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Item Code</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="item_code" class="form-control" list="list_item_code" required autocomplete="off">
						<datalist id="list_item_code"></datalist>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Item Name</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="item_name" class="form-control" required autocomplete="off">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Quantity</label>
					</div>
					<div class="col-sm-8">
						<input type="number" name="quantity" class="form-control" required autocomplete="off">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Order #</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="order_no" class="form-control" autocomplete="off">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">P/N</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="pn" class="form-control" autocomplete="off">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">P/N Code</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="pn_code" class="form-control" autocomplete="off">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Order #</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="order_no" class="form-control" autocomplete="off">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Part #</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="part_no" class="form-control" autocomplete="off">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">MM</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="mm" class="form-control" autocomplete="off">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Customer P/N</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="customer_pn" class="form-control" autocomplete="off">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Code</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="code" class="form-control" autocomplete="off">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<label class="control-label">Remarks</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="remarks" class="form-control" autocomplete="off">
					</div>
				</div>
				
		  </div>
		  <div class="modal-footer">
			<button type="submit" class="btn btn-primary fa fa-save"> Update</button>
			<button type="button" class="btn btn-danger fa fa-remove" data-dismiss="modal">Close</button>
		  </div>
	  </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
var username = $('#hd_username').val();
get_sticker_alignment();
get_sticker_alignment_ul();

var dt_default_values = $('#tbl_default_values').DataTable({
	"aaSorting"	 : [],
	"bProcessing": true,
	"bServerSide": true,
	"sAjaxSource": "../server_side/settings_default_values.php"
});

$('#btn_new_default_values').click(function(){
	$('#modal_add_new_default_values').modal('show');
});

$('#frm_new_default_values input[name="item_code"]').keyup(function(e){
	var key = e.which;
	if( key == "38" || key == "40" ){
		return false;
	}
	var frm_id = 'frm_new_default_values';
	get_item_code($(this).val(),frm_id);
});

$('#frm_new_default_values input[name="item_code"]').change(function(){
	var frm_id = "frm_new_default_values";
	get_item_name($(this).val(),frm_id);
});

$('#frm_new_default_values').submit(function(e){
	e.preventDefault();
	var serialized_data = $(this).serialize();
	save_new_default_values(serialized_data);
});

$('#tbl_default_values tbody').on('click','tr .fa-edit',function(e){
	e.preventDefault();
	var id = $(this).attr('id');
	var frm_id = "frm_view_edit_default_values";
	get_default_value_details(id,frm_id);
	var modal_id = "modal_view_edit_default_values";
	$('#'+modal_id).data('id',id);
	$('#'+modal_id).modal('show');
});

$('#frm_view_edit_default_values').submit(function(e){
	e.preventDefault();
	var serialized_data = $(this).serialize();
	var modal_id = 'modal_view_edit_default_values';
	update_default_values(serialized_data,modal_id);
});

get_item_code("","frm_new_default_values");
function get_item_code(pattern,frm_id){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: "action=get_item_code&pattern="+pattern,
		url		: "../handler/handler.php",
		success	: function(result){
			// console.log(result);
			$('#'+frm_id+' #list_item_code').empty();
			$.each(result['item_code'],function(key, value){
				$('#'+frm_id+' #list_item_code').append('<option value="'+value+'">'+value+'</option>');
			});
		}
	});
}

function get_item_name(item_code,frm_id){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: "action=get_item_name&item_code="+item_code,
		url		: "../handler/handler.php",
		success	: function(result){
			// console.log(result);
			$('#'+frm_id+' input[name="item_name"]').val(result['item_name']);
		}
	});
}

function save_new_default_values(serialized_data){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: "action=save_new_default_values&username="+username+'&'+serialized_data,
		url		: "../handler/handler.php",
		success	: function(result){
			// console.log(result);
			if(result['exist']){
				alert("Record already exist!");
				return false;
			}
			dt_default_values.ajax.reload();
			$('.modal').modal('hide');
		}
	});
}

function get_default_value_details(id,frm_id){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: "action=get_default_value_details&id="+id,
		url		: "../handler/handler.php",
		success	: function(result){
			// console.log(result);
			$('#'+frm_id+' input[type="text"]').val("");	
			$('#'+frm_id+' input[type="text"]').val("0");	
			$('#'+frm_id+' textarea').val("");	
			$.each(result['data'],function(key,value){
				$('#'+frm_id+' input[name="'+key+'"]').val(value);	
				$('#'+frm_id+' textarea[name="'+key+'"]').val(value);	
			});			
		}
	});	
}

function update_default_values(serialized_data,modal_id){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: "action=update_default_values&id="+$('#'+modal_id).data("id")+"&username="+username+'&'+serialized_data,
		url		: "../handler/handler.php",
		success	: function(result){
			console.log(result);
			dt_default_values.ajax.reload();
			$('.modal').modal('hide');
		}
	});
}


function get_sticker_alignment(){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: "action=get_sticker_alignment&pc_ip="+$('#txt_pc_ip').val(),
		url		: "../handler/handler.php",
		success	: function(result){
			$('#btn_update_alignment').data('id', result['pkid']);
			$('#txt_left_space').val(result['left_space']);
			$('#txt_top_space').val(result['top_space']);
			$('#txt_font_name').val(result['font_style_name']);
		}
	});
}

function update_sticker_alignment(pkid){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: "action=update_sticker_alignment&pkid="+pkid+'&left_space='+$('#txt_left_space').val()+'&top_space='+$('#txt_top_space').val()+'&font_name='+$('#txt_font_name').val(),
		url		: "../handler/handler.php",
		success	: function(result){
			get_sticker_alignment();
		}
	});
}

function get_sticker_alignment_ul(){
	
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: "action=get_sticker_alignment_ul&pc_ip="+$('#txt_pc_ip').val(),
		url		: "../handler/handler.php",
		success	: function(result){
			console.log(result);
			$('#btn_update_alignment_ul').data('id', result['pkid']);
			$('#txt_left_space_ul').val(result['left_space']);
			$('#txt_top_space_ul').val(result['top_space']);
			$('#txt_font_name_ul').val(result['font_style_name']);
		},error	: function(result){
			console.log(result);
		}
			
	});
}

function update_sticker_alignment_ul(pkid){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: "action=update_sticker_alignment_ul&pkid="+pkid+'&left_space='+$('#txt_left_space_ul').val()+'&top_space='+$('#txt_top_space_ul').val()+'&font_name='+$('#txt_font_name_ul').val(),
		url		: "../handler/handler.php",
		success	: function(result){
			console.log(result);
			get_sticker_alignment_ul();
		}
	});
}

$('#btn_update_alignment').click(function(){ update_sticker_alignment( $(this).data('id') ) });
$('#btn_update_alignment_ul').click(function(){ update_sticker_alignment_ul( $(this).data('id') ) });

</script>