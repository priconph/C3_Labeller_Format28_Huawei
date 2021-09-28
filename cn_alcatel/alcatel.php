<html>

<head>
	
	<title>CN Label Print Module</title>
	
	<style>	
		body{
			background-image: url("vis.jpg");
			background-color: #ffffff;
			background-size: 100% 100%;
		}
	</style>

	<?php
	// include ('handler.php');
	// include ('handler2.php');
	include ('../libraries/includes.php');
	?>
	
</head>

<body>
	<section id="container" class="">
		<div class="row">
			<section class="wrapper"> 
				<form method="POST" name="prtForm" id="prtForm">
					<div class="modal-dialog">
						<div class="modal-content">
						
							<div class="modal-header">
								<h3 class="modal-title">Print Label</h3>
							</div>
							
							<div class="modal-body">
								Parts Name:
								<select class="form-control" class="form-group" name="pnSelect">
									<option value="0004">Mecha Set 2 - 0004</option>
									<option value="0005">Mecha Set 2 - 0005</option>
									<option value="0007">Single Clip</option>
								</select>
					
								<br>
								<div class="form-group">
									Shipment Quantity:<input type="number" class="form-control" name="shipQty_input" autocomplete="off" required>
								</div>
								
								<div class="form-group">
									<!--Quantity Per Package:<input type="number" class="form-control" name="maxQty_input" autocomplete="off" required>-->
									Sticker Quantity:<input type="number" class="form-control" name="maxQty_input" autocomplete="off" required>
								</div>
								
								<div class="form-group"> 
									Shipment Date:<input  type="date" class="form-control" name="dateMFD_input" id="datepicker"  required>
								</div>

								<div class="modal-footer">
									<button type="submit" class="btn btn-success" name="submitBtn" >Print</button>
								</div>
					
							</div>
						</div>
					</div>
				</form>
			</section>
		</div>
	</section>
</body>

</html>

<script>
$(document).ready(function(){
	$('#prtForm').submit(function(e){
		e.preventDefault();
		$.ajax({
			type	: "post",
			dataType: "json",
			data	: $(this).serialize(),
			url		: "create_zpl_cn_alcatel.php",
			success	: function(result){
				var array_label = result['zpl'];
				findPrinter('ZT220',array_label);
			}
		});
	});
});

// $(function() {
	// $("#datepicker").datepicker({
	// dateFormat: 'dd-M-yy',
	// showButtonPanel: true,
	// minDate: 0,
	// maxDate: '+30Y',
	// }).datepicker("setDate", "0");
// });
</script>

<script type="text/javascript" src="../LabelPrinter/js/deployJava.js"></script>
<script type="text/javascript" src="../js/zpl_print_script.js"></script>
	
