<?php require_once ('../libraries/includes.php'); ?>
<div class="row">
	<form id="frm_change_code">
		<div class="col-sm-6">
			<label>Old Code: </label>
			<textarea rows="25" name="txt_old_code" class="form-control"></textarea>
		</div>
		<div class="col-sm-6">
			<label>New Code: </label>
			<textarea rows="25" name="txt_new_code" id="txt_new_code" class="form-control"></textarea>
		</div>
		<div class="col-sm-12">
			<center style="padding-top:20px;">
				<input type="radio" name="radio_quotation_used" value="1" required> Single Quotation (')
				<input type="radio" name="radio_quotation_used" value="2" required> Double Quotation (")
				<br>
				<input type="submit" class="btn btn-primary fa fa-code" value="Recode">
			</center>
		</div>
	</form>
</div>

<script>
$('#frm_change_code').submit(function(e){
	e.preventDefault();
	var data = $(this).serialize();
	data = "action=test&"+data;
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: "ajax_generate_new_code.php",
		success	: function(result){
			console.log(result);
			$('#txt_new_code').val(result['new_code']);
		}
	});
});
</script>

