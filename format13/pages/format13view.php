<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../libraries/includes.php');

?>

<div class="container">
<div class="row" id="main_container">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<h3 class="page-header">Format 13</h3>
		<!-- <div class="pull-left page-header">
			pn: <input type="text" name="pn" id="pn" ><br>
			mm_no: <input type="text" name="mm_no" id="mm_no"><br>
			<button class="btn btn-primary btn-sm glyphicon glyphicon-plus" id="btn_add" value="New Record"> Add</button>

		</div><br><br><br> -->
		<div class="card">
		  <div class="card-header">
		     <h5 >Add Record</h5>
		  </div>
		  <div class="card-body">
		    <!-- <h5 class="card-title">Special title treatment</h5>
		    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
		     -->
		   <label>PN_YPICS</label><br>
		   <input type="text" name="pn_ypics" id="pn_ypics" ><br>
		   <label>P/N</label><br>
		   <input type="text" name="pn" id="pn" ><br>
		   <label>Drawing Number (MM)</label><br>
		   <input type="text" name="mm_no" id="mm_no"><br><br>

			<button class="btn btn-primary btn-sm glyphicon glyphicon-plus" id="btn_add" value="New Record"> Add</button>
		  </div>
		</div>
		<div class="card">
		  <div class="card-header">
		     <h5 >Data List</h5>
		  </div>
		  <div class="card-body">
		    <!-- <h5 class="card-title">Special title treatment</h5>
		    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
		     -->
		    <div id="">
			<table class="table table-striped table-bordered table-condensed" id="tbl_for_format13">
				<thead>
					<tr>
						<th>Action</th>
						<th>ID</th>
						<th>PN_YPICS</th>
						<th>PN</th>
						<th>MM_NO</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>		
		</div> 
		  </div>
		</div>
		<!-- <div id="">
			<table class="table table-striped table-bordered table-condensed" id="tbl_for_format13">
				<thead>
					<tr>
						<th>Action</th>
						<th>ID</th>
						<th>PN</th>
						<th>MM_NO</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>		
		</div> -->
		
	  </div>

</div>
</div>
<script src="../format13/js/format13view.js" language="javascript"></script>