<?php
	date_default_timezone_set('Asia/Manila');
	ob_start();
	ini_set('display_errors', '0');
	ini_set('log_errors', '1');
	error_reporting(E_ALL);
	set_exception_handler(function (Throwable $e) {
		error_log((string)$e);
		while (ob_get_level() > 0) {
			ob_end_clean();
		}
		http_response_code(500);
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode(array('error' => 'Server error'));
	});
	if(is_ajax()) {
		if(isset($_POST["action"]) && !empty($_POST["action"])) {
			$action = $_POST["action"];
			switch($action) {
				case "check_existing_item_name_and_lotno_format28"	: check_existing_item_name_and_lotno_format28(); break; 
				case "save_new_c3_label_format28"					: save_new_c3_label_format28(); break;
				case "load_selected_label_info_format28"			: load_selected_label_info_format28(); break;
				case "delete_label_format28"						: delete_label_format28(); break;
				case "reprint_label_format28"						: reprint_label_format28(); break;
				case "get_unique"									: get_unique(); break;
				case "get_cn_default_value"							: get_cn_default_value(); break;
				case "get_all_item_name"							: get_all_item_name(); break;
				case "search_item"									: search_item(); break;
				case "get_work_week"								: get_work_week(); break;
			}
		}
	}

	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}

	/* Next row from a YPICS result (PDOStatement), or false if the query failed. */
	function ypics_fetch($result){
		return $result instanceof PDOStatement ? $result->fetch(PDO::FETCH_BOTH) : false;
	}

	/* Escape a value for a quoted MySQL string (C3 connection). */
	function sql_esc($v){
		require_once('../class/c3.php');
		return C3::getInstance()->real_escape_string((string)$v);
	}

	/* Escape a value for a quoted MSSQL string. */
	function ypics_esc($v){
		return str_replace("'", "''", (string)$v);
	}

	

	// Old commented by -JD
	// function save_new_c3_label_format28(){
	// 	require_once('../class/c3.php');
	// 	$return 		= $_POST; 
	// 	// $print_qty      = $return['txt_print_qty'];
	// 	$max_row      	= $return['txt_max_row'];

	// 	/*
	// 		Get multiple input fields of Print Lot & Qty
	// 		Added by -JD
	// 	*/
	// 	$printLotArr = array();
	// 	$printLotQuantityArr = array();
	// 	array_push($printLotArr, $return['txt_print_lot']);
	// 	array_push($printLotQuantityArr, $return['txt_quantity']);
	// 	if($max_row > 0){
	// 		for ($i=2; $i <= $max_row; $i++) {
	// 			array_push($printLotArr, $return['txt_print_lot_'.$i]);
	// 			array_push($printLotQuantityArr, $return['txt_quantity_'.$i]);
	// 		}
	// 	}
	// 	$implodedPrintLots = implode(', ', $printLotArr);
	// 	$implodedQuantity = implode(', ', $printLotQuantityArr);

	// 	$return['query'] = '';
	// 	$return['label'] = array();
	// 	for($x=0;$x<$print_qty;$x++){
	// 		if($x==0){
	// 			$lotno_extension = $return['txt_lot_no_count'];
	// 		}else{
	// 			$lotno_extension = generate_new_lot_no_extension_format28($lotno_extension);
	// 		}
	// 		$result 		= "";
	// 		$table   		= "tbl_format_28_test"; //table name
	// 		$array_fields 	= array('item_code','pn','mpn','qty','date','lotno','lotno_extension','date_encoded','lastupdate','username','emp_number','partial','pats','format_no', 'print_lot', 'print_lot_quantity'); //table fields
	// 		$array_values 	= array($return['txt_item_code'],$return['txt_pn'],$return['txt_mpn'],$return['txt_qty'],$return['txt_date'],$return['txt_lot_no'],$lotno_extension,date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username'],strtoupper($return['txt_employee_number_scanner']),(($return['partial'])=='true'?1:0),(($return['pats'])=='true'?1:0),'6', $implodedPrintLots, $implodedQuantity); //values to be saved
	// 		$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
	// 		$return["result"] = json_encode($result); //return the the serialize values
	// 		/* generate zebra code format 6 */
	// 		$return['label'][] = generate_zebra_code_format28($return['txt_pn'],$return['txt_mpn'],$return['txt_qty'],$return['txt_date'],$return['txt_lot_no'],$lotno_extension);
	// 	}
	// 	$return['try_post'] = 404;
	// 	$return["msg"]  = 1;
	// 	echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	// }

	function save_new_c3_label_format28(){
		require_once('../class/c3.php');
		$return 				= $_POST;
		$max_row      			= $return['txt_max_row'];
		$print_qty      = $return['txt_print_qty'];
		/*
			Get multiple input fields of Print Lot & Qty
			Added by -JD
		*/
		$printLotArr = array();
		$printLotQuantityArr = array();
		if($max_row > 0){
			array_push($printLotArr, $return['txt_print_lot']);
			array_push($printLotQuantityArr, $return['txt_quantity']);
			for ($i=2; $i <= $max_row; $i++) {
				array_push($printLotArr, $return['txt_print_lot_'.$i]);
				array_push($printLotQuantityArr, $return['txt_quantity_'.$i]);
			}
		}
		$implodedPrintLots = implode(', ', $printLotArr);
		$implodedQuantity = implode(', ', $printLotQuantityArr);

		$return['query'] = '';
		$return['label'] = array();
		$sticker_details = '';

		// Get new unique number here 👇
		$return['txt_unique_new'] = get_unique_new(); // Will generate unique number upon saving

		for($x=0;$x<$print_qty;$x++){
			if($x==0){
				$lotno_extension = $return['txt_lot_no_count'];
			}else{
				$lotno_extension = generate_new_lot_no_extension_format28($lotno_extension);
			}
			
			// $table   		= "tbl_format_28_test"; //table name $pn,$mpn,$qty,$lotno,$lotno_extension, $device_code
			// $sticker_details = get_sticker_details($return['txt_item_code'],$return['txt_pn'],$return['txt_mpn'],$return['txt_qty'],$return['txt_lot_no'],$lotno_extension);
			// $array_values 	= array($return['txt_pn'],$return['txt_mpn'],$return['txt_qty'],$return['txt_date'],$return['txt_lot_no'],strtoupper($lotno_extension), date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username'],strtoupper($return['txt_employee_number_scanner']),(($return['partial'])=='true'?1:0),$return['pats'],'28', $implodedPrintLots, $implodedQuantity, $return['txt_item_code'], $return['txt_max_row'],  $return['txt_unique']); //values to be saved
			// $return['label'][] = generate_zebra_code_format28($return['txt_item_code'],$return['txt_pn'],$return['txt_mpn'],$return['txt_qty'],$return['txt_date'],$return['txt_lot_no'],strtoupper($lotno_extension), $max_row, $printLotArr, $printLotQuantityArr,  $return['txt_unique']);
			
			$result 			= "";
			$table   			= "tbl_format28"; //table name $pn,$mpn,$qty,$lotno,$lotno_extension, $device_code
			$array_fields 		= array('pn','mpn','qty','date','lotno','lotno_extension','date_encoded','lastupdate','username','emp_number','partial','pats','format_no', 'print_lot', 'print_lot_quantity','item_code', 'max_row', 'unique_number'); //table fields
			$array_values 		= array($return['txt_pn'],$return['txt_mpn'],$return['txt_qty'],$return['txt_date'],$return['txt_lot_no'],strtoupper($lotno_extension), date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username'],strtoupper($return['txt_employee_number_scanner']),(($return['partial'])=='true'?1:0),$return['pats'],'28', $implodedPrintLots, $implodedQuantity, $return['txt_item_code'], $return['txt_max_row'],  $return['txt_unique_new']); //values to be saved
			$result 			= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] 	= json_encode($result); //return the the serialize values
			$return['label'][]	= generate_zebra_code_format28($return['txt_item_code'],$return['txt_pn'],$return['txt_mpn'],$return['txt_qty'],$return['txt_date'],$return['txt_lot_no'],strtoupper($lotno_extension), $max_row, $printLotArr, $printLotQuantityArr,  $return['txt_unique_new']);
		}
		$return['try_post'] = 404;
		$return["msg"]  = 1;
		$return['ip'] = $_SERVER['REMOTE_ADDR'];
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function check_existing_item_name_and_lotno_format28(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$pn = sql_esc($return['pn'] ?? '');
		$lotno = sql_esc($return['lotno'] ?? '');
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format28_new';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `pn` = "'.$pn.'" AND `lotno` = "'.$lotno.'"';
		$sql_order 	= 'ORDER BY `lotno_extension` DESC LIMIT 0,1';
		$sql_limit 	= '';
		$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return['lotno_extension'] = '';
		while($row = mysqli_fetch_array($result)){
			$return['lotno_extension'] = $row['lotno_extension'];
		}

		/* 
			* If lot number does not exist after the queries on the top, then add a 001 lot number extension
			* else generate new lot extension format28
			? commented by Jannus
		*/
		if($return['lotno_extension'] == ''){
			$return['lotno_extension'] = '001';
		}else{
			$return['lotno_extension'] = generate_new_lot_no_extension_format28($return['lotno_extension']);
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}

	/*
		Get Unique Number
		Added by -CP
	*/
	function get_unique(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		// $pn = $return['pn'];
		// $lotno = $return['lotno'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'tbl_format28';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `logdel` = 0';
		$sql_order 	= 'ORDER BY `pkid` ASC';
		$sql_limit 	= '';
		$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		while($row = mysqli_fetch_array($result)){
			$return['unique_number'] = $row['unique_number'];
		}

		if($return['unique_number'] == null){
			$return['incremented_unique_id'] = 'YE00000001';
		}
		else{
			// SPLIT THE "YE" FROM "0000000"
			$numbers = preg_replace('/[^0-9]/', '', $return['unique_number']);
			$letters = preg_replace('/[^a-zA-Z]/', '', $return['unique_number']);

			//CODE TO RESET THE UNIQUE NUMBER WHEN IT MAX OUT TO 99999999. THE UNIQUE NUMBER WILL RESET TO 00000001
			if($numbers == 99999999){
				$numbers = 1;
			}
			else{
				$numbers = $numbers+1;
			}
			
			// ADD EIGHT 0 ON THE BEGINNING OF $numbers
			$return['number'] = str_pad($numbers, 8, '0', STR_PAD_LEFT);
			$return['letters'] = $letters;
			$return['incremented_unique_id'] = $return['letters'].$return['number'];
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}

	function get_unique_new(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		// $pn = $return['pn'];
		// $lotno = $return['lotno'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'tbl_format28';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `logdel` = 0';
		$sql_order 	= 'ORDER BY `pkid` ASC';
		$sql_limit 	= '';
		$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		while($row = mysqli_fetch_array($result)){
			$return['unique_number'] = $row['unique_number'];
		}

		if($return['unique_number'] == null){
			$return['incremented_unique_id'] = 'YE00000001';
			return $return['incremented_unique_id'];

		}
		else{
			// SPLIT THE "YE" FROM "0000000"
			$numbers = preg_replace('/[^0-9]/', '', $return['unique_number']);
			$letters = preg_replace('/[^a-zA-Z]/', '', $return['unique_number']);

			//CODE TO RESET THE UNIQUE NUMBER WHEN IT MAX OUT TO 99999999. THE UNIQUE NUMBER WILL RESET TO 00000001
			if($numbers == 99999999){
				$numbers = 1;
			}
			else{
				$numbers = $numbers+1;
			}
			
			// ADD EIGHT 0 ON THE BEGINNING OF $numbers
			$return['number'] = str_pad($numbers, 8, '0', STR_PAD_LEFT);
			$return['letters'] = $letters;
			$return['incremented_unique_id'] = $return['letters'].$return['number'];
			return $return['letters'].$return['number'];
			
		}
		// $return['result'] = json_encode($result);
		// echo json_encode($return);
		return $return['letters'].$return['number'];
	}

	function generate_new_lot_no_extension_format28($lot_extension){
		/*
			* preg_replace(pattern, replacement, input)
			? commented by Jannus
		*/
		$letters = preg_replace('/[0-9]/','',$lot_extension); // first is the pattern number from 0-9, second param will be use to replace the third param base on the pattern, third param is the string that will be remove

		$new_lot_no_extension = $lot_extension + 1;
		$new_lot_no_extension = str_pad($new_lot_no_extension.$letters, 3, "0", STR_PAD_LEFT);
		return $new_lot_no_extension;
	}
	
	function load_selected_label_info_format28(){
		require_once('../class/c3.php');
		$return = $_POST;
		$array_pkid = array_map('sql_esc', (array)($_POST['array_pkid'] ?? array()));
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format_28_new';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `pkid` = "'.$array_pkid[0].'"';
		for($x=1;$x<count($array_pkid);$x++){
			$sql_where .= ' OR `pkid` = "'.$array_pkid[$x].'"';
		}
		$sql_order 	= '';
		$sql_limit 	= '';
		$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return['html'] = '';
		while($row = mysqli_fetch_array($result)){
			$return['html'] .= '<tr>';
			$return['html'] .= '	<td>'.$row['pn'].'</td>';
			$return['html'] .= '	<td>'.$row['mpn'].'</td>';
			$return['html'] .= '	<td>'.$row['qty'].'</td>';
			$return['html'] .= '	<td>'.$row['date'].'</td>';
			$return['html'] .= '	<td>'.$row['lotno'].'-'.$row['lotno_extension'].'</td>';
			$return['html'] .= '	<td>'.$row['print_lot'].'</td>';
			$return['html'] .= '</tr>';
		}
		// $return['msg'] = $result;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label_format28(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format28";
			$array_fields = array('logdel');
			$array_values = array('1');
			$pkid = $array_pkid[$x];
			$result = C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
			// $return["result"] = json_encode($result); //return the the serialize values
			// $return['msg'] .= $result;
		}
		$return['msg'] = 'Label has been deleted!';
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function reprint_label_format28(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = array_map('sql_esc', (array)($_POST['array_pkid'] ?? array()));
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'tbl_format28';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `pkid` = "'.$array_pkid[0].'"';
		for($x=1;$x<count($array_pkid);$x++){
			$sql_where .= ' OR `pkid` = "'.$array_pkid[$x].'"';
		}
		$sql_order 	= '';
		$sql_limit 	= '';
		$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return['label'] = '';
		while($row = mysqli_fetch_array($result)){
			$label = regenerate_zebra_code_format28($row['item_code'],$row['pn'],$row['mpn'],$row['qty'],$row['date'],$row['lotno'],$row['lotno_extension'], $row['max_row'], $row['print_lot'],$row['print_lot_quantity'], $row['unique_number'], $row['pkid']);
			$array_values 	= array($return['txt_pn'],$return['txt_mpn'],$return['txt_qty'],$return['txt_date'],$return['txt_lot_no'],$lotno_extension, date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username'],strtoupper($return['txt_employee_number_scanner']),(($return['partial'])=='true'?1:0),$return['pats'],'28', $implodedPrintLots, $implodedQuantity, $return['txt_item_code'], $return['txt_max_row'],  $return['txt_unique']); //values to be saved
			$return['label'][] = $label;
		}
		// $return['msg'] = $result;
		$return['result'] = json_encode($result);
		$return['ip'] = $_SERVER['REMOTE_ADDR']; // 05/03/2023 added
		echo json_encode($return);
	}
	
	function generate_zebra_code_format28($item_code,$pn,$mpn,$qty,$date,$lotno,$lotno_extension, $max_row, $printLotArr, $printLotQuantityArr, $unique){
		$ip = $_SERVER['REMOTE_ADDR'];
		if( $ip == '192.168.15.241' || $ip == '192.168.14.74' || $ip == '192.168.102.110' || $ip == '192.168.100.64' || $ip == '192.168.100.66' || $ip == '192.168.102.126' ){ // common printer
			$space 		= get_sticker_alignment_printing();
			$left_space = $space['left_space'] + 7;
			$top_space 	= $space['top_space'];
			$font_style_name 	= $space['font_style_name'];
			$zebra_code  = '^XA';
			$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 40+ $top_space );
			$zebra_code .= '^CF 0,30';
			$zebra_code .= '^FD(1P) Manufacture P/N: '.$mpn;
			$zebra_code .= '^FS';
			
			$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 75+ $top_space );
			$zebra_code .= '^BY2';
			$zebra_code .= '^BCN, 26, N, N, N';
			$zebra_code .= '^^FD1P'.$mpn;
			$zebra_code .= '^FS';
			
			$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 120+ $top_space );
			$zebra_code .= '^CF 0,30';
			$zebra_code .= '^FD(Q) QTY: '.$qty;
			$zebra_code .= '^FS';
			
			$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 150+ $top_space );
			$zebra_code .= '^BY2';
			$zebra_code .= '^BCN, 26, N, N, N';
			$zebra_code .= '^FDQ'.$qty;
			$zebra_code .= '^FS';
			
			$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 197+ $top_space );
			$zebra_code .= '^CF 0,30';
			$zebra_code .= '^FD(10D) Oldest Lot Date: '.$date;
			$zebra_code .= '^FS';
			
			$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 227+ $top_space );
			$zebra_code .= '^BY2';
			$zebra_code .= '^BCN, 26, N, N, N';
			$zebra_code .= '^FD10D'.$date;
			$zebra_code .= '^FS';
			
			$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 275+ $top_space );
			$zebra_code .= '^CF 0,30';
			$zebra_code .= '^FD(1T) LOT No: '.$lotno.'-'.$lotno_extension;
			$zebra_code .= '^FS';
			
			$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 305+ $top_space );
			$zebra_code .= '^BY2';
			$zebra_code .= '^BCN, 26, N, N, N';
			$zebra_code .= '^FD1T'.$lotno.'-'.$lotno_extension;
			$zebra_code .= '^FS';

			/**
			 * QR Code contents
			 */
			$zebra_code .= '^FO'.( 465+ $left_space ).', '.( 115+ $top_space );
			$zebra_code .= '^BQN,2, 4^FH^'; // add ^FH^ to allow the "_0D_0A" to be used for new line or line breaks
			
			// Material Code
			$item_code_padded 	= str_pad($item_code, 18, " ", STR_PAD_RIGHT);

			// MPN - Manufacture P/N
			$mpn_padded = str_pad($mpn, 40, " ", STR_PAD_RIGHT);

			// PN - Customer P/N
			$pn_padded = str_pad($pn, 35, " ", STR_PAD_RIGHT);

			// Quantity
			$qty_padded = str_pad($qty, 7, "0", STR_PAD_LEFT);

			// Reel Lot Number
			$reel_lot_number_padded = str_pad($lotno.'-'.$lotno_extension, 10, " ", STR_PAD_RIGHT);

			// $max_row variable is the counter for print lot and print lot qty
			$printLotAndQtyForZebraCodeArr = array();
			$printLotArrExploded = explode(', ', $printLotArr);
			$printLotQuantityArrExploded = explode(', ', $printLotQuantityArr);
			if($max_row > 0){
				for ($i=0; $i < $max_row; $i++) {
					$printLotAndQtyForZebraCode = str_pad($printLotArrExploded[$i], 15, " ", STR_PAD_RIGHT) . str_pad($printLotQuantityArrExploded[$i], 5, "0", STR_PAD_LEFT);
					array_push($printLotAndQtyForZebraCodeArr, $printLotAndQtyForZebraCode);
				}
				
				$requiredPrintLots = 8;
				$currentPrintLots = $max_row;
				$remainingPrintLots = $requiredPrintLots - $currentPrintLots;
				$emptySpacesForPrintLots = "               ";
				$zerosForPrintLotQuantities = "00000";
				for ($i=1; $i <= $remainingPrintLots; $i++) {
					$remainingPrintLotAndQtyForZebraCode = str_pad($emptySpacesForPrintLots, 15, " ", STR_PAD_RIGHT) . str_pad($zerosForPrintLotQuantities, 5, "0", STR_PAD_LEFT);
					array_push($printLotAndQtyForZebraCodeArr, $remainingPrintLotAndQtyForZebraCode);
				}
				$printLotAndQtyForZebraCodeArrReplaced = str_replace(',', '', implode(',', $printLotAndQtyForZebraCodeArr));
			}

			$dataForZebraCode = $item_code_padded . $mpn_padded . $pn_padded . $qty_padded . $date . $reel_lot_number_padded . 'PH' . $unique . $printLotAndQtyForZebraCodeArrReplaced;
			/**
			 * Old code currently used as of 06-09-2022
			 */
			// $zebra_code .= '^FDM,' . $item_code .' ' . '_0D_0A'. $pn .' ' . "_0D_0A" . $mpn .' ' . "_0D_0A" . $qty .' ' . "_0D_0A" . $date . ' ' .'_0D_0A' . 'PH ' . '_0D_0A' . $lotno.'-'.$lotno_extension . ' ' . '_0D_0A' . $unique . ' ' . '_0D_0A' . $printLotAndQtyForZebraCodeArrReplaced;		
			// $zebra_code .= '^FDMM'.$dataForZebraCode;
			// $zebra_code .= '^FDM,' . $dataForZebraCode; // QR REPRINT NA WALANG ()
			$zebra_code .= '^FD,,' . $dataForZebraCode; // QR REPRINT NA MAY (). 
			$zebra_code .= '^FS';

			// Unique Number
			$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 354+ $top_space );
			$zebra_code .= '^FD'.$unique;
			$zebra_code .= '^FX - color (R)';
			$zebra_code .= '^CF 0,35'; // font size
			$zebra_code .= '^FS';
			
			$zebra_code .= '^XZ';
		}
		else{ // PARA SA PRINTER NA BOBO
			$space 		= get_sticker_alignment_printing();
			$left_space = $space['left_space'];
			$top_space 	= $space['top_space'];
			$font_style_name 	= $space['font_style_name'];
			
			/**
			 * Code for Production Printer only(this code is different and only use for printer in Production, since I don't want to go to production everytime, I use below code
			 * and be able to use it in Labelary for debugging/testing)
			 */
			$zebra_code  = '^XA';
			$zebra_code  = '^MMT';
			$zebra_code  = '^PW1140';
			$zebra_code  = '^LL750';
			$zebra_code  = '^LS0';

			$zebra_code  = '^FT65,115^A0N,47,38^FH\^CI28^FD(1P) Manufacture P/N: '.$mpn;
			$zebra_code .= '^FS^CI27';
			$zebra_code .= '^BY3,3,43^FT65,178^BCN,,N,N';
			$zebra_code .= '^FH\^FD> '.$mpn;
			$zebra_code .= '^FS';

			$zebra_code .= '^FT65,234^A0N,47,38^FH\^CI28^FD(Q) QTY: '.$qty;
			$zebra_code .= '^FS^CI27';
			$zebra_code .= '^BY3,3,43^FT65,292^BCN,,N,N';
			$zebra_code .= '^FH\^FD> '.$qty;
			$zebra_code .= '^FS';

			$zebra_code .= '^FT65,353^A0N,47,38^FH\^CI28^FD(10D) Oldest Lot Date: '.$date;
			$zebra_code .= '^FS^CI27';
			$zebra_code .= '^BY3,3,43^FT65,407^BCN,,N,N';
			$zebra_code .= '^FH\^FD> '.$date;
			$zebra_code .= '^FS';

			$zebra_code .= '^FT65,470^A0N,47,38^FH\^CI28^FD(1T) LOT No.: '.$lotno.'-'.$lotno_extension;
			$zebra_code .= '^FS^CI27';
			$zebra_code .= '^BY3,3,43^FT65,530^BCN,,N,N';
			$zebra_code .= '^FH\^FD> '.$lotno.'-'.$lotno_extension;
			$zebra_code .= '^FS';

			$zebra_code .= '^FT65,589^A0N,47,53^FH\^CI28^FD '.$unique;
			$zebra_code .= '^FS^CI27';

			// QR Code
			// $zebra_code .= '^FT675,570';
			$zebra_code .= '^FT685,560';
			$zebra_code .= '^BQN,2,6';

			/// Material Code
			$item_code_padded 	= str_pad($item_code, 18, " ", STR_PAD_RIGHT);

			// MPN - Manufacture P/N
			$mpn_padded = str_pad($mpn, 40, " ", STR_PAD_RIGHT);

			// PN - Customer P/N
			$pn_padded = str_pad($pn, 35, " ", STR_PAD_RIGHT);

			// Quantity
			$qty_padded = str_pad($qty, 7, "0", STR_PAD_LEFT);

			// Reel Lot Number
			$reel_lot_number_padded = str_pad($lotno.'-'.$lotno_extension, 10, " ", STR_PAD_RIGHT);

			// $max_row variable is the counter for print lot and print lot qty
			$printLotAndQtyForZebraCodeArr = array();
			if($max_row > 0){
				for ($i=0; $i < $max_row; $i++) {
					$printLotAndQtyForZebraCode = str_pad($printLotArr[$i], 15, " ", STR_PAD_RIGHT) . str_pad($printLotQuantityArr[$i], 5, "0", STR_PAD_LEFT);
					array_push($printLotAndQtyForZebraCodeArr, $printLotAndQtyForZebraCode);
				}
				
				$requiredPrintLots = 8;
				$currentPrintLots = $max_row;
				$remainingPrintLots = $requiredPrintLots - $currentPrintLots;
				$emptySpacesForPrintLots = "               ";
				$zerosForPrintLotQuantities = "00000";
				for ($i=1; $i <= $remainingPrintLots; $i++) {
					$remainingPrintLotAndQtyForZebraCode = str_pad($emptySpacesForPrintLots, 15, " ", STR_PAD_RIGHT) . str_pad($zerosForPrintLotQuantities, 5, "0", STR_PAD_LEFT);
					array_push($printLotAndQtyForZebraCodeArr, $remainingPrintLotAndQtyForZebraCode);
				}
				$printLotAndQtyForZebraCodeArrReplaced = str_replace(',', '', implode(',', $printLotAndQtyForZebraCodeArr));
			}

			$dataForZebraCode = $item_code_padded . $mpn_padded . $pn_padded . $qty_padded . $date . $reel_lot_number_padded . 'PH' . $unique . $printLotAndQtyForZebraCodeArrReplaced;

			$zebra_code .= '^FH\^FDLA,' . $dataForZebraCode;
			$zebra_code .= '^FS';
			$zebra_code .= '^PQ1,0,1,Y';
			$zebra_code .= '^XZ';
		}
		return $zebra_code;

		// Commented by chris - 102125 for new printing
		// $space 		= get_sticker_alignment_printing();
		// $left_space = $space['left_space'];
		// $top_space 	= $space['top_space'];
		// $font_style_name 	= $space['font_style_name'];
		
		// /**
		//  * Code for Production Printer only(this code is different and only use for printer in Production, since I don't want to go to production everytime, I use below code
		//  * and be able to use it in Labelary for debugging/testing)
		//  */
		// $zebra_code  = '^XA';
		// $zebra_code  = '^MMT';
		// $zebra_code  = '^PW1140';
		// $zebra_code  = '^LL750';
		// $zebra_code  = '^LS0';

		// $zebra_code  = '^FT65,115^A0N,47,38^FH\^CI28^FD(1P) Manufacture P/N: '.$mpn;
		// $zebra_code .= '^FS^CI27';
		// $zebra_code .= '^BY3,3,43^FT65,178^BCN,,N,N';
		// $zebra_code .= '^FH\^FD> '.$mpn;
		// $zebra_code .= '^FS';

		// $zebra_code .= '^FT65,234^A0N,47,38^FH\^CI28^FD(Q) QTY: '.$qty;
		// $zebra_code .= '^FS^CI27';
		// $zebra_code .= '^BY3,3,43^FT65,292^BCN,,N,N';
		// $zebra_code .= '^FH\^FD> '.$qty;
		// $zebra_code .= '^FS';

		// $zebra_code .= '^FT65,353^A0N,47,38^FH\^CI28^FD(10D) Oldest Lot Date: '.$date;
		// $zebra_code .= '^FS^CI27';
		// $zebra_code .= '^BY3,3,43^FT65,407^BCN,,N,N';
		// $zebra_code .= '^FH\^FD> '.$date;
		// $zebra_code .= '^FS';

		// $zebra_code .= '^FT65,470^A0N,47,38^FH\^CI28^FD(1T) LOT No.: '.$lotno.'-'.$lotno_extension;
		// $zebra_code .= '^FS^CI27';
		// $zebra_code .= '^BY3,3,43^FT65,530^BCN,,N,N';
		// $zebra_code .= '^FH\^FD> '.$lotno.'-'.$lotno_extension;
		// $zebra_code .= '^FS';

		// $zebra_code .= '^FT65,589^A0N,47,53^FH\^CI28^FD '.$unique;
		// $zebra_code .= '^FS^CI27';

		// // QR Code
		// // $zebra_code .= '^FT675,570';
		// $zebra_code .= '^FT685,560';
		// $zebra_code .= '^BQN,2,6';

		// /// Material Code
		// $item_code_padded 	= str_pad($item_code, 18, " ", STR_PAD_RIGHT);

		// // MPN - Manufacture P/N
		// $mpn_padded = str_pad($mpn, 40, " ", STR_PAD_RIGHT);

		// // PN - Customer P/N
		// $pn_padded = str_pad($pn, 35, " ", STR_PAD_RIGHT);

		// // Quantity
		// $qty_padded = str_pad($qty, 7, "0", STR_PAD_LEFT);

		// // Reel Lot Number
		// $reel_lot_number_padded = str_pad($lotno.'-'.$lotno_extension, 10, " ", STR_PAD_RIGHT);

		// // $max_row variable is the counter for print lot and print lot qty
		// $printLotAndQtyForZebraCodeArr = array();
		// if($max_row > 0){
		// 	for ($i=0; $i < $max_row; $i++) {
		// 		$printLotAndQtyForZebraCode = str_pad($printLotArr[$i], 15, " ", STR_PAD_RIGHT) . str_pad($printLotQuantityArr[$i], 5, "0", STR_PAD_LEFT);
		// 		array_push($printLotAndQtyForZebraCodeArr, $printLotAndQtyForZebraCode);
		// 	}
			
		// 	$requiredPrintLots = 8;
		// 	$currentPrintLots = $max_row;
		// 	$remainingPrintLots = $requiredPrintLots - $currentPrintLots;
		// 	$emptySpacesForPrintLots = "               ";
		// 	$zerosForPrintLotQuantities = "00000";
		// 	for ($i=1; $i <= $remainingPrintLots; $i++) {
		// 		$remainingPrintLotAndQtyForZebraCode = str_pad($emptySpacesForPrintLots, 15, " ", STR_PAD_RIGHT) . str_pad($zerosForPrintLotQuantities, 5, "0", STR_PAD_LEFT);
		// 		array_push($printLotAndQtyForZebraCodeArr, $remainingPrintLotAndQtyForZebraCode);
		// 	}
		// 	$printLotAndQtyForZebraCodeArrReplaced = str_replace(',', '', implode(',', $printLotAndQtyForZebraCodeArr));
		// }

		// $dataForZebraCode = $item_code_padded . $mpn_padded . $pn_padded . $qty_padded . $date . $reel_lot_number_padded . 'PH' . $unique . $printLotAndQtyForZebraCodeArrReplaced;

		// $zebra_code .= '^FH\^FDLA,' . $dataForZebraCode;
		// $zebra_code .= '^FS';
		// $zebra_code .= '^PQ1,0,1,Y';
		// $zebra_code .= '^XZ';
		

		// old code dont uncomment
		// $zebra_code  = '^XA';
		// $zebra_code .= '^FO'.( 40+ $left_space ).', '.( 40+ $top_space );
		// $zebra_code .= '^CF 0,30';
		// $zebra_code .= '^FD(1P) Manufacture P/N: '.$mpn;
		// $zebra_code .= '^FS';
		
		// $zebra_code .= '^FO'.( 40+ $left_space ).', '.( 75+ $top_space );
		// $zebra_code .= '^BY2';
		// $zebra_code .= '^BCN, 26, N, N, N';
		// $zebra_code .= '^^FD1P'.$mpn;
		// $zebra_code .= '^FS';
		
		// $zebra_code .= '^FO'.( 40+ $left_space ).', '.( 120+ $top_space );
		// $zebra_code .= '^CF 0,30';
		// $zebra_code .= '^FD(Q) QTY: '.$qty;
		// $zebra_code .= '^FS';
		
		// $zebra_code .= '^FO'.( 40+ $left_space ).', '.( 150+ $top_space );
		// $zebra_code .= '^BY2';
		// $zebra_code .= '^BCN, 26, N, N, N';
		// $zebra_code .= '^FDQ'.$qty;
		// $zebra_code .= '^FS';
		
		// $zebra_code .= '^FO'.( 40+ $left_space ).', '.( 197+ $top_space );
		// $zebra_code .= '^CF 0,30';
		// $zebra_code .= '^FD(10D) Oldest Lot Date: '.$date;
		// $zebra_code .= '^FS';
		
		// $zebra_code .= '^FO'.( 40+ $left_space ).', '.( 227+ $top_space );
		// $zebra_code .= '^BY2';
		// $zebra_code .= '^BCN, 26, N, N, N';
		// $zebra_code .= '^FD10D'.$date;
		// $zebra_code .= '^FS';
		
		// $zebra_code .= '^FO'.( 40+ $left_space ).', '.( 275+ $top_space );
		// $zebra_code .= '^CF 0,30';
		// $zebra_code .= '^FD(1T) LOT No: '.$lotno.'-'.$lotno_extension;
		// $zebra_code .= '^FS';
		
		// $zebra_code .= '^FO'.( 40+ $left_space ).', '.( 305+ $top_space );
		// $zebra_code .= '^BY2';
		// $zebra_code .= '^BCN, 26, N, N, N';
		// $zebra_code .= '^FD1T'.$lotno.'-'.$lotno_extension;
		// $zebra_code .= '^FS';

		// /**
		//  * QR Code contents
		//  */
		// $zebra_code .= '^FO'.( 465+ $left_space ).', '.( 115+ $top_space );
		// $zebra_code .= '^BQN,2, 4^FH^'; // add ^FH^ to allow the "_0D_0A" to be used for new line or line breaks

		// // Material Code
		// $item_code_padded 	= str_pad($item_code, 18, " ", STR_PAD_RIGHT);

		// // MPN - Manufacture P/N
		// $mpn_padded = str_pad($mpn, 40, " ", STR_PAD_RIGHT);

		// // PN - Customer P/N
		// $pn_padded = str_pad($pn, 35, " ", STR_PAD_RIGHT);

		// // Quantity
		// $qty_padded = str_pad($qty, 7, "0", STR_PAD_LEFT);

		// // Reel Lot Number
		// $reel_lot_number_padded = str_pad($lotno.'-'.$lotno_extension, 10, " ", STR_PAD_RIGHT);

		// // $max_row variable is the counter for print lot and print lot qty
		// $printLotAndQtyForZebraCodeArr = array();
		// if($max_row > 0){
		// 	for ($i=0; $i < $max_row; $i++) {
		// 		$printLotAndQtyForZebraCode = str_pad($printLotArr[$i], 15, " ", STR_PAD_RIGHT) . str_pad($printLotQuantityArr[$i], 5, "0", STR_PAD_LEFT);
		// 		array_push($printLotAndQtyForZebraCodeArr, $printLotAndQtyForZebraCode);
		// 	}
			
		// 	$requiredPrintLots = 8;
		// 	$currentPrintLots = $max_row;
		// 	$remainingPrintLots = $requiredPrintLots - $currentPrintLots;
		// 	$emptySpacesForPrintLots = "               ";
		// 	$zerosForPrintLotQuantities = "00000";
		// 	for ($i=1; $i <= $remainingPrintLots; $i++) {
		// 		$remainingPrintLotAndQtyForZebraCode = str_pad($emptySpacesForPrintLots, 15, " ", STR_PAD_RIGHT) . str_pad($zerosForPrintLotQuantities, 5, "0", STR_PAD_LEFT);
		// 		array_push($printLotAndQtyForZebraCodeArr, $remainingPrintLotAndQtyForZebraCode);
		// 	}
		// 	$printLotAndQtyForZebraCodeArrReplaced = str_replace(',', '', implode(',', $printLotAndQtyForZebraCodeArr));
		// }

		// $dataForZebraCode = $item_code_padded . $mpn_padded . $pn_padded . $qty_padded . $date . $reel_lot_number_padded . 'PH' . $unique . $printLotAndQtyForZebraCodeArrReplaced;

		// /**
		//  * Old code currently used as of 06-09-2022
		//  */
		// // $zebra_code .= '^FDM,' . $item_code .' ' . '_0D_0A'. $pn .' ' . "_0D_0A" . $mpn .' ' . "_0D_0A" . $qty .' ' . "_0D_0A" . $date . ' ' .'_0D_0A' . 'PH ' . '_0D_0A' . $lotno.'-'.$lotno_extension . ' ' . '_0D_0A' . $unique . ' ' . '_0D_0A' . $printLotAndQtyForZebraCodeArrReplaced;
		// $zebra_code .= '^FDM,'.$dataForZebraCode; // FDM means M-Manual, this will accept parentheses, numbers, letters -JD 06-13-2022
		// $zebra_code .= '^FS';

		// // Unique Number
		// $zebra_code .= '^FO'.( 40+ $left_space ).', '.( 354+ $top_space );
		// $zebra_code .= '^FD'.$unique;
		// $zebra_code .= '^FX - color (R)';
		// $zebra_code .= '^CF 0,35'; // font size
		// $zebra_code .= '^FS';
		
		// $zebra_code .= '^XZ';
		// return $zebra_code;
	} // End of generate_zebra_code_format28

	function regenerate_zebra_code_format28($item_code,$pn,$mpn,$qty,$date,$lotno,$lotno_extension, $max_row, $printLotArr, $printLotQuantityArr, $unique, $pkid){
		$space 		= get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$font_style_name 	= $space['font_style_name'];
		
		/**
		 * Code for Production Printer only(this code is different and only use for printer in Production, since I don't want to go to production everytime, I use below code
		 * and be able to use it in Labelary for debugging/testing)
		 */
		// $zebra_code  = '^XA';

		// $zebra_code  = '^MMT';
		// $zebra_code  = '^PW1140';
		// $zebra_code  = '^LL750';
		// $zebra_code  = '^LS0';

		// $zebra_code  = '^FT65,115^A0N,47,38^FH\^CI28^FD(1P) Manufacure P/N: '.$mpn;
		// $zebra_code .= '^FS^CI27';
		// $zebra_code .= '^BY3,3,43^FT92,178^BCN,,N,N';
		// $zebra_code .= '^FH\^FD> '.$mpn;
		// $zebra_code .= '^FS';

		// $zebra_code .= '^FT65,234^A0N,47,38^FH\^CI28^FD(Q) QTY: '.$qty;
		// $zebra_code .= '^FS^CI27';
		// $zebra_code .= '^BY3,3,43^FT92,292^BCN,,N,N';
		// $zebra_code .= '^FH\^FD> '.$qty;
		// $zebra_code .= '^FS';

		// $zebra_code .= '^FT65,353^A0N,47,38^FH\^CI28^FD(10D) Oldest Lot Date: '.$date;
		// $zebra_code .= '^FS^CI27';
		// $zebra_code .= '^BY3,3,43^FT92,407^BCN,,N,N';
		// $zebra_code .= '^FH\^FD> '.$date;
		// $zebra_code .= '^FS';

		// $zebra_code .= '^FT65,470^A0N,47,38^FH\^CI28^FD(1T) LOT No.: '.$lotno.'-'.$lotno_extension;
		// $zebra_code .= '^FS^CI27';
		// $zebra_code .= '^BY3,3,43^FT92,530^BCN,,N,N';
		// $zebra_code .= '^FH\^FD> '.$lotno.'-'.$lotno_extension;
		// $zebra_code .= '^FS';

		// $zebra_code .= '^FT65,589^A0N,47,53^FH\^CI28^FD '.$unique;
		// $zebra_code .= '^FS^CI27';

		// // QR Code
		// // $zebra_code .= '^FT675,570';
		// $zebra_code .= '^FT685,560';
		// $zebra_code .= '^BQN,2,6';

		// // Material Code
		// $item_code_padded 	= str_pad($item_code, 18, " ", STR_PAD_RIGHT);

		// // MPN - Manufacture P/N
		// $mpn_padded = str_pad($mpn, 40, " ", STR_PAD_RIGHT);

		// // PN - Customer P/N
		// $pn_padded = str_pad($pn, 35, " ", STR_PAD_RIGHT);

		// // Quantity
		// $qty_padded = str_pad($qty, 7, "0", STR_PAD_LEFT);

		// // Reel Lot Number
		// $reel_lot_number_padded = str_pad($lotno.'-'.$lotno_extension, 10, " ", STR_PAD_RIGHT);

		// // $max_row variable is the counter for print lot and print lot qty
		// $printLotAndQtyForZebraCodeArr = array();
		// $printLotArrExploded = explode(', ', $printLotArr);
		// $printLotQuantityArrExploded = explode(', ', $printLotQuantityArr);
		// if($max_row > 0){
		// 	for ($i=0; $i < $max_row; $i++) {
		// 		$printLotAndQtyForZebraCode = str_pad($printLotArrExploded[$i], 15, " ", STR_PAD_RIGHT) . str_pad($printLotQuantityArrExploded[$i], 5, "0", STR_PAD_LEFT);
		// 		array_push($printLotAndQtyForZebraCodeArr, $printLotAndQtyForZebraCode);
		// 	}
			
		// 	$requiredPrintLots = 8;
		// 	$currentPrintLots = $max_row;
		// 	$remainingPrintLots = $requiredPrintLots - $currentPrintLots;
		// 	$emptySpacesForPrintLots = "               ";
		// 	$zerosForPrintLotQuantities = "00000";
		// 	for ($i=1; $i <= $remainingPrintLots; $i++) {
		// 		$remainingPrintLotAndQtyForZebraCode = str_pad($emptySpacesForPrintLots, 15, " ", STR_PAD_RIGHT) . str_pad($zerosForPrintLotQuantities, 5, "0", STR_PAD_LEFT);
		// 		array_push($printLotAndQtyForZebraCodeArr, $remainingPrintLotAndQtyForZebraCode);
		// 	}
		// 	$printLotAndQtyForZebraCodeArrReplaced = str_replace(',', '', implode(',', $printLotAndQtyForZebraCodeArr));
		// }

		// $dataForZebraCode = $item_code_padded . $mpn_padded . $pn_padded . $qty_padded . $date . $reel_lot_number_padded . 'PH' . $unique . $printLotAndQtyForZebraCodeArrReplaced;

		// $zebra_code .= '^FH\^FDLA,' . $dataForZebraCode;
		// $zebra_code .= '^FS';
		// $zebra_code .= '^PQ1,0,1,Y';
		// $zebra_code .= '^XZ';
		// return $zebra_code;

		/**
		 * For common bigger printer only like PPC & Packing Printer
		 */
		$zebra_code  = '^XA';
		$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 40+ $top_space );
		$zebra_code .= '^CF 0,30';
		$zebra_code .= '^FD(1P) Manufacture P/N: '.$mpn;
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 75+ $top_space );
		$zebra_code .= '^BY2';
		$zebra_code .= '^BCN, 26, N, N, N';
		$zebra_code .= '^^FD1P'.$mpn;
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 120+ $top_space );
		$zebra_code .= '^CF 0,30';
		$zebra_code .= '^FD(Q) QTY: '.$qty;
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 150+ $top_space );
		$zebra_code .= '^BY2';
		$zebra_code .= '^BCN, 26, N, N, N';
		$zebra_code .= '^FDQ'.$qty;
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 197+ $top_space );
		$zebra_code .= '^CF 0,30';
		$zebra_code .= '^FD(10D) Oldest Lot Date: '.$date;
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 227+ $top_space );
		$zebra_code .= '^BY2';
		$zebra_code .= '^BCN, 26, N, N, N';
		$zebra_code .= '^FD10D'.$date;
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 275+ $top_space );
		$zebra_code .= '^CF 0,30';
		$zebra_code .= '^FD(1T) LOT No: '.$lotno.'-'.$lotno_extension;
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 305+ $top_space );
		$zebra_code .= '^BY2';
		$zebra_code .= '^BCN, 26, N, N, N';
		$zebra_code .= '^FD1T'.$lotno.'-'.$lotno_extension;
		$zebra_code .= '^FS';

		/**
		 * QR Code contents
		 */
		$zebra_code .= '^FO'.( 465+ $left_space ).', '.( 115+ $top_space );
		$zebra_code .= '^BQN,2, 4^FH^'; // add ^FH^ to allow the "_0D_0A" to be used for new line or line breaks
		
		// Material Code
		$item_code_padded 	= str_pad($item_code, 18, " ", STR_PAD_RIGHT);

		// MPN - Manufacture P/N
		$mpn_padded = str_pad($mpn, 40, " ", STR_PAD_RIGHT);

		// PN - Customer P/N
		$pn_padded = str_pad($pn, 35, " ", STR_PAD_RIGHT);

		// Quantity
		$qty_padded = str_pad($qty, 7, "0", STR_PAD_LEFT);

		// Reel Lot Number
		$reel_lot_number_padded = str_pad($lotno.'-'.$lotno_extension, 10, " ", STR_PAD_RIGHT);

		// $max_row variable is the counter for print lot and print lot qty
		$printLotAndQtyForZebraCodeArr = array();
		$printLotArrExploded = explode(', ', $printLotArr);
		$printLotQuantityArrExploded = explode(', ', $printLotQuantityArr);
		if($max_row > 0){
			for ($i=0; $i < $max_row; $i++) {
				$printLotAndQtyForZebraCode = str_pad($printLotArrExploded[$i], 15, " ", STR_PAD_RIGHT) . str_pad($printLotQuantityArrExploded[$i], 5, "0", STR_PAD_LEFT);
				array_push($printLotAndQtyForZebraCodeArr, $printLotAndQtyForZebraCode);
			}
			
			$requiredPrintLots = 8;
			$currentPrintLots = $max_row;
			$remainingPrintLots = $requiredPrintLots - $currentPrintLots;
			$emptySpacesForPrintLots = "               ";
			$zerosForPrintLotQuantities = "00000";
			for ($i=1; $i <= $remainingPrintLots; $i++) {
				$remainingPrintLotAndQtyForZebraCode = str_pad($emptySpacesForPrintLots, 15, " ", STR_PAD_RIGHT) . str_pad($zerosForPrintLotQuantities, 5, "0", STR_PAD_LEFT);
				array_push($printLotAndQtyForZebraCodeArr, $remainingPrintLotAndQtyForZebraCode);
			}
			$printLotAndQtyForZebraCodeArrReplaced = str_replace(',', '', implode(',', $printLotAndQtyForZebraCodeArr));
		}

		$dataForZebraCode = $item_code_padded . $mpn_padded . $pn_padded . $qty_padded . $date . $reel_lot_number_padded . 'PH' . $unique . $printLotAndQtyForZebraCodeArrReplaced;
		/**
		 * Old code currently used as of 06-09-2022
		 */
		// $zebra_code .= '^FDM,' . $item_code .' ' . '_0D_0A'. $pn .' ' . "_0D_0A" . $mpn .' ' . "_0D_0A" . $qty .' ' . "_0D_0A" . $date . ' ' .'_0D_0A' . 'PH ' . '_0D_0A' . $lotno.'-'.$lotno_extension . ' ' . '_0D_0A' . $unique . ' ' . '_0D_0A' . $printLotAndQtyForZebraCodeArrReplaced;		
		// $zebra_code .= '^FDMM'.$dataForZebraCode;
		// $zebra_code .= '^FDM,' . $dataForZebraCode; // QR REPRINT NA WALANG ()
		$zebra_code .= '^FD,,' . $dataForZebraCode; // QR REPRINT NA MAY (). 
		$zebra_code .= '^FS';

		// Unique Number
		$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 354+ $top_space );
		$zebra_code .= '^FD'.$unique;
		$zebra_code .= '^FX - color (R)';
		$zebra_code .= '^CF 0,35'; // font size
		$zebra_code .= '^FS';
		
		$zebra_code .= '^XZ';
		return $zebra_code;
	}// End of regenerate_zebra_code_format28



	// function regenerate_zebra_code_format28($item_code,$pn,$mpn,$qty,$date,$lotno,$lotno_extension, $max_row, $printLotArr, $printLotQuantityArr, $unique, $pkid){
	// 	$space 		= get_sticker_alignment_printing();
	// 	$left_space = $space['left_space'];
	// 	$top_space 	= $space['top_space'];
	// 	$font_style_name 	= $space['font_style_name'];
		
	// 	/**
	// 	 * Code for Production Printer only(this code is different and only use for printer in Production, since I don't want to go to production everytime, I use below code
	// 	 * and be able to use it in Labelary for debugging/testing)
	// 	 */
	// 	// $zebra_code  = '^XA';

	// 	// $zebra_code  = '^MMT';
	// 	// $zebra_code  = '^PW1140';
	// 	// $zebra_code  = '^LL750';
	// 	// $zebra_code  = '^LS0';

	// 	// $zebra_code  = '^FT89,115^A0N,47,38^FH\^CI28^FD(1P) Manufacure P/N: '.$mpn;
	// 	// $zebra_code .= '^FS^CI27';

	// 	// $zebra_code .= '^BY3,3,43^FT92,178^BCN,,N,N';
	// 	// $zebra_code .= '^FH\^FD> '.$mpn;
	// 	// $zebra_code .= '^FS';

	// 	// $zebra_code .= '^FT89,234^A0N,47,38^FH\^CI28^FD(Q) QTY: '.$qty;
	// 	// $zebra_code .= '^FS^CI27';
	// 	// $zebra_code .= '^BY3,3,43^FT92,292^BCN,,N,N';
	// 	// $zebra_code .= '^FH\^FD> '.$qty;
	// 	// $zebra_code .= '^FS';

	// 	// $zebra_code .= '^FT92,353^A0N,47,38^FH\^CI28^FD(10D) Oldest Lot Date: '.$date;
	// 	// $zebra_code .= '^FS^CI27';
	// 	// $zebra_code .= '^BY3,3,43^FT92,407^BCN,,N,N';
	// 	// $zebra_code .= '^FH\^FD> '.$date;
	// 	// $zebra_code .= '^FS';

	// 	// $zebra_code .= '^FT92,470^A0N,47,38^FH\^CI28^FD(1T) LOT No.: '.$lotno.'-'.$lotno_extension;
	// 	// $zebra_code .= '^FS^CI27';
	// 	// $zebra_code .= '^BY3,3,43^FT92,530^BCN,,N,N';
	// 	// $zebra_code .= '^FH\^FD> '.$lotno.'-'.$lotno_extension;
	// 	// $zebra_code .= '^FS';

	// 	// $zebra_code .= '^FT89,589^A0N,47,53^FH\^CI28^FD '.$unique;
	// 	// $zebra_code .= '^FS^CI27';

	// 	// // QR Code
	// 	// $zebra_code .= '^FT675,570';
	// 	// $zebra_code .= '^BQN,2,6';

	// 	// $printLotAndQtyForZebraCodeArr = array();
	// 	// $printLotArrExploded = explode(', ', $printLotArr);
	// 	// $printLotQuantityArrExploded = explode(', ', $printLotQuantityArr);
	// 	// if($max_row > 0){
	// 	// 	for ($i=0; $i < $max_row; $i++) {
	// 	// 		$printLotAndQtyForZebraCode = $printLotArrExploded[$i] . ' ' .  '\0D\0A'. $printLotQuantityArrExploded[$i] . ' ' . '\0D\0A';
	// 	// 		array_push($printLotAndQtyForZebraCodeArr, $printLotAndQtyForZebraCode);
	// 	// 	}
	// 	// 	$printLotAndQtyForZebraCodeArrReplaced = str_replace(',', '', implode(',', $printLotAndQtyForZebraCodeArr));
	// 	// }

	// 	// $zebra_code .= '^FH\^FDLA,' . $item_code .'\0D\0A'. $pn .' '.'\0D\0A' . $mpn .' '.'\0D\0A' . $qty .' '.'\0D\0A' . $date . ' '.'\0D\0A' . 'PH ' . '\0D\0A' . $lotno.'-'.$lotno_extension . ' ' . '\0D\0A' . $unique. ' ' . '\0D\0A' . $printLotAndQtyForZebraCodeArrReplaced;
	// 	// $zebra_code .= '^FS';
	// 	// $zebra_code .= '^PQ1,0,1,Y';
		
	// 	// $zebra_code .= '^XZ';

	// 	$zebra_code  = '^XA';
	// 	$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 40+ $top_space );
	// 	$zebra_code .= '^CF 0,30';
	// 	$zebra_code .= '^FD(1P) Manufacture P/N: '.$mpn;
	// 	$zebra_code .= '^FS';
		
	// 	$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 75+ $top_space );
	// 	$zebra_code .= '^BY2';
	// 	$zebra_code .= '^BCN, 26, N, N, N';
	// 	$zebra_code .= '^^FD1P'.$mpn;
	// 	$zebra_code .= '^FS';
		
	// 	$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 120+ $top_space );
	// 	$zebra_code .= '^CF 0,30';
	// 	$zebra_code .= '^FD(Q) QTY: '.$qty;
	// 	$zebra_code .= '^FS';
		
	// 	$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 150+ $top_space );
	// 	$zebra_code .= '^BY2';
	// 	$zebra_code .= '^BCN, 26, N, N, N';
	// 	$zebra_code .= '^FDQ'.$qty;
	// 	$zebra_code .= '^FS';
		
	// 	$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 197+ $top_space );
	// 	$zebra_code .= '^CF 0,30';
	// 	$zebra_code .= '^FD(10D) Oldest Lot Date: '.$date;
	// 	$zebra_code .= '^FS';
		
	// 	$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 227+ $top_space );
	// 	$zebra_code .= '^BY2';
	// 	$zebra_code .= '^BCN, 26, N, N, N';
	// 	$zebra_code .= '^FD10D'.$date;
	// 	$zebra_code .= '^FS';
		
	// 	$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 275+ $top_space );
	// 	$zebra_code .= '^CF 0,30';
	// 	$zebra_code .= '^FD(1T) LOT No: '.$lotno.'-'.$lotno_extension;
	// 	$zebra_code .= '^FS';
		
	// 	$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 305+ $top_space );
	// 	$zebra_code .= '^BY2';
	// 	$zebra_code .= '^BCN, 26, N, N, N';
	// 	$zebra_code .= '^FD1T'.$lotno.'-'.$lotno_extension;
	// 	$zebra_code .= '^FS';

	// 	/**
	// 	 * QR Code contents
	// 	 */
	// 	$zebra_code .= '^FO'.( 465+ $left_space ).', '.( 115+ $top_space );
	// 	// $zebra_code .= '^BQN,2, 4^FH^'; // add ^FH^ to allow the "_0D_0A" to be used for new line or line breaks
	// 	$zebra_code .= '^BQN,2,4'; // add ^FH^ to allow the "_0D_0A" to be used for new line or line breaks
		

	// 	$space_for_pad = ' ';

	// 	$mpn_minus_fourty = (40 - (int)strlen($mpn));
	// 	$reps = str_repeat(' ',$mpn_minus_fourty);
	// 	// MPN - Manufacture P/N
	// 	$mpn_padded = str_pad($mpn, 40, $space_for_pad, STR_PAD_RIGHT);

	// 	// PN - Customer P/N
	// 	$pn_padded = str_pad($pn, 35, $space_for_pad, STR_PAD_RIGHT);

	// 	// Quantity
	// 	$qty_padded = str_pad($qty, 7, "0", STR_PAD_LEFT);


	// 	$item_code_padded 	= str_pad($item_code, 18, " ", STR_PAD_RIGHT);
	// 	// echo $item_code_padded;
	// 	// echo "<br>"; 
	// 	// return;
	// 	// exit(0);
		
	// 	$dataForZebraCode = $item_code_padded . $mpn_padded . $pn_padded . $qty_padded . $date . $lotno.'-'.$lotno_extension . 'PH' . $unique . ' ' . '_0D_0A' . $printLotAndQtyForZebraCodeArrReplaced;
		
	// 	// $item_code_padded = str_pad($item_code, 18, ' ', STR_PAD_RIGHT);
	// 	// $dataForZebraCode = $item_code_padded . ($mpn_padded . $reps) . $pn_padded[0] . $qty_padded . $date . $lotno.'-'.$lotno_extension . 'PH' . $unique . ' ' . '_0D_0A' . $printLotAndQtyForZebraCodeArrReplaced;
	// 	// $table   		= "tbl_format_28_test"; //table name $pn,$mpn,$qty,$lotno,$lotno_extension, $device_code
	// 	// $array_fields 	= array('zebra_code'); //table fields
	// 	// $array_values 	= array($dataForZebraCode); //values to be saved
	// 	// $result 		= C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
	// 	// echo $dataForZebraCode;
	// 	// echo "<br>"; 
	// 	// return;
	// 	// exit(0);
		
	// 	// $resultSelect = "";
	// 	// $array_fieldsSelect = array('*');
	// 	// $tableSelect 	   	= 'vw_format_28_test';
	// 	// $joinsSelect 	   	= '';
	// 	// $sql_whereSelect 	= 'WHERE `pkid` = "'.$pkid.'"';
	// 	// $sql_orderSelect 	= '';
	// 	// $sql_limitSelect 	= '';
	// 	// $resultSelect = C3::getInstance()->select_query($array_fieldsSelect,$tableSelect,$joinsSelect,$sql_whereSelect,$sql_orderSelect,$sql_limitSelect);
	// 	// $row = mysqli_fetch_array($resultSelect);
	// 	// $zebra = $row['zebra_code'];
		
	// 	// $max_row variable is the counter for print lot and print lot qty
	// 	$printLotAndQtyForZebraCodeArr = array();
	// 	if($max_row > 0){
	// 		for ($i=0; $i < $max_row; $i++) {
	// 			$printLotAndQtyForZebraCode = $printLotArr[$i] . ' ' .  '_0D_0A'. $printLotQuantityArr[$i] . ' ' . '_0D_0A';
	// 			array_push($printLotAndQtyForZebraCodeArr, $printLotAndQtyForZebraCode);
	// 		}
	// 		$printLotAndQtyForZebraCodeArrReplaced = str_replace(',', '', implode(',', $printLotAndQtyForZebraCodeArr));
	// 	}

	// 	// $zebra_code .= '^FDM,' .'10'.'7580401'. '_0D_0A'. $pn . '---------------------------' . "_0D_0A" . $mpn . "_0D_0A" . $qty . '--' . "_0D_0A" . $date .'_0D_0A' . 'PH' . '_0D_0A' . $lotno.'-'.$lotno_extension . '_0D_0A' . 'YE00000001' . '_0D_0A'. '210914 56G-----' .'_0D_0A'. '00120' . '_0D_0A'. '210614 56G-----' . '_0D_0A' .'00120'.  '_0D_0A'. '210915 56G-----' .'_0D_0A' . '00120 ' . '_0D_0A'. '210914 56G-----' .'_0D_0A'. '00120' . '_0D_0A'. '210914 56G-----' .'_0D_0A'. '00120' . '_0D_0A'. '210914 56G-----' .'_0D_0A'. '00120' . '_0D_0A'. '210914 56G-----' .'_0D_0A'. '00120'. '_0D_0A'. '210914 56G-----' .'_0D_0A'. '00120';

	// 	/**
	// 	 * Old code currently used as of 06-09-2022
	// 	 */
	// 	// $zebra_code .= '^FDM,' . $item_code .' ' . '_0D_0A'. $pn .' ' . "_0D_0A" . $mpn .' ' . "_0D_0A" . $qty .' ' . "_0D_0A" . $date . ' ' .'_0D_0A' . 'PH ' . '_0D_0A' . $lotno.'-'.$lotno_extension . ' ' . '_0D_0A' . $unique . ' ' . '_0D_0A' . $printLotAndQtyForZebraCodeArrReplaced;		
		
	// 	/**
	// 	 * Required format
	// 	 * 107486601         CN201S-320-0001(H1)                     14200564                           00006002205052512-01X  PHYE00000037220505 R7      00554220507 R7      00046               00000               00000               00000               00000               00000               00000
	// 	 */
	// 	// $zebra_code .= '^FDM,' . $item_code .' ' . '_0D_0A'. ($mpn_padded . $reps) . $pn_padded . $qty_padded . $date . $lotno.'-'.$lotno_extension . 'PH' . $unique . ' ' . '_0D_0A' . $printLotAndQtyForZebraCodeArrReplaced;		
	// 	$zebra_code .= "^FD,,".$dataForZebraCode;		
	// 	$zebra_code .= "^FS";

	// 	// Unique Number
	// 	$zebra_code .= '^FO'.( 40+ $left_space ).', '.( 354+ $top_space );
	// 	$zebra_code .= '^FD'.$unique;
	// 	$zebra_code .= '^FX - color (R)';
	// 	$zebra_code .= '^CF 0,35'; // font size
	// 	$zebra_code .= '^FS';
		
	// 	$zebra_code .= '^XZ';
	// 	// return '<input type="text" id="zebra_code" value="'.$zebra_code.'">';
	// 	return $zebra_code;
	// }	


	/* Default Values */
	function get_cn_default_value(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'tbl_cn_default_values';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `item_name` = "'.sql_esc($_POST['item_name'] ?? '').'"';
		$sql_order 	= '';
		$sql_limit 	= '';
		$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return['data'] = array();
        while($row = mysqli_fetch_assoc($result)){
			$return['data'] = $row;
			$return['item_name'] 		    = $row['item_name'];
		}
		// $return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function get_sticker_alignment_printing(){
		require_once('../class/c3.php'); 
		$return = array();
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'tbl_sticker_alignment';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `pc_ip` ="'.$_SERVER['REMOTE_ADDR'].'"';
		$sql_order 	= '';
		$sql_limit 	= '';
		$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$ctr = 0;
		while($row = mysqli_fetch_array($result)){
			$return['pkid'] 		    = $row['pkid'];
			$return['left_space'] 		= $row['left_space'];
			$return['top_space'] 		= $row['top_space'];
			$return['top_item_name'] 	= $row['top_item_name'];
			$return['top_qty'] 			= $row['top_qty'];
			$return['top_orderno'] 		= $row['top_orderno'];
			$return['top_lotno'] 		= $row['top_lotno'];
			$return['font_style_name'] 	= $row['font_style_name'];
			$ctr++;
		}
		/* no existing record - insert new row with 0 as default left and top space */
		if($ctr == 0){
			$table   		= "tbl_sticker_alignment"; //table name
			$array_fields 	= array('pc_ip','left_space','top_space'); //table fields
			$array_values 	= array($_SERVER['REMOTE_ADDR'],'0','0'); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return = $_POST;
			$result = "";
			$array_fields = array('*');
			$table 	   	= 'tbl_sticker_alignment';
			$joins 	   	= '';
			$sql_where 	= 'WHERE `pc_ip` ="'.$_SERVER['REMOTE_ADDR'].'"';
			$sql_order 	= '';
			$sql_limit 	= '';
			$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
			$ctr = 0;
			while($row = mysqli_fetch_array($result)){
				$return['pkid'] 		    = $row['pkid'];
				$return['left_space'] 		= $row['left_space'];
				$return['top_space'] 		= $row['top_space'];
				$return['font_style_name'] 	= $row['font_style_name'];
			}
		}
		return $return;
	}
	
	/* YPICS CN_Ypics1 */
	function get_all_item_name(){
		require_once('../class/cn_ypics1.php');
		$CNYPICS = new CNYPICS;
		$p = $_POST;
		$return = array();
		$fields = array('NAME');
		$table_name = "XHEAD";
		$where = "";
		$order = "";
		$result = $CNYPICS->select_record($fields,$table_name,$where,$order);
		while($row = ypics_fetch($result)){
			$return['item_name'][] = $row['NAME'];
		}
		echo json_encode($return);
	}
	
	function search_item(){
		require_once('../class/cn_ypics1.php');
		require_once('../class/c3.php');
		$CNYPICS = new CNYPICS;
		// // $p = $_POST;
		$search_category = $_POST['search_category'];
		$search_pattern  = $_POST['search_pattern'];
		if($search_category == 'PONo'){
			$search_category = 'XRECE.SORDER';
		}
		if(!in_array($search_category, array('XRECE.SORDER', 'CODE'), true)){
			http_response_code(422);
			echo json_encode(array('exist' => 0, 'error' => 'Invalid search category'));
			return;
		}
		$search_pattern = ypics_esc($search_pattern);
		$return = array();
		$fields = array('XHEAD.NAME','SORDER as PONo', 'XHEAD.CODE AS DeviceCode');
		$table_name = "XRECE INNER JOIN XHEAD ON XRECE.CODE = XHEAD.CODE";
		$where = "WHERE ".$search_category." ='".$search_pattern."'";
		$order = "";
		$result = $CNYPICS->select_record($fields,$table_name,$where,$order);
		$exist = 0;
		while($row = ypics_fetch($result)){
			$return['item_code'][] = $row['DeviceCode'];
			$return['item_name'][] = $row['NAME'];
			$return['PONo'][] = $row['PONo'];
			$exist = 1;
		}
		$return['result'] = null;
		$return['search_category'] = $search_category;
		$return['exist'] = $exist;
		echo json_encode($return);


		// $return 			= $_POST; 
		// $wbsResult 			= "";
		// $array_fields 		= array("
		// 		po_no, 
		// 		device_name,
		// 		device_code
		// 	");
		// $table 				= "tbl_wbs_material_kitting";
		// $joins 				= "";
		// $sql_where 			= "WHERE po_no = '".$search_pattern."' ";
		// $sql_order 			= "";
		// $sql_limit			= "LIMIT 0,10";
		// $wbsResult 			= WBS::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		// $ctr 				= 0;
		// // while($row = mysqli_fetch_array($wbsResult)){
		// // 	$return['po_no'] 		= $row['po_no'];
		// // 	$return['device_code'] 		= $row['device_code'];
		// // 	$return['device_name'] 		= $row['device_name'];
		// // 	$ctr++;
		// // }
		// // $return['ctr'] 		= $ctr;
		// $return["result"] 	= json_encode($wbsResult); //return the serialize values
		// echo json_encode($wbsResult);
	}
	
	function get_work_week(){
		$return = array();
		$now 		    = strtotime( date('Y-m-d') ); // or your date as well
		// $now 		    = strtotime( '2016-08-08' ); // for testing
		$fy_start		= date('Y')."-01-01";
		$fy_start		= strtotime($fy_start);
		$datediff		= $now - $fy_start;
		$one_day  	= (60 * 60) * 24;
		$one_week 	= $one_day * 7;
		$new_year_day_start = date ( 'D', $fy_start );
  
		  switch ($new_year_day_start){
			case "Mon"	: $additional_day = ($one_day * 0); break;
			case "Tue"	: $additional_day = ($one_day * 1); break;
			case "Wed"	: $additional_day = ($one_day * 2); break;
			case "Thu"	: $additional_day = ($one_day * 3); break;
			case "Fri"	: $additional_day = ($one_day * 4); break;
			case "Sat"	: $additional_day = ($one_day * 5); break;
			case "Sun"	: $additional_day = ($one_day * 6); break;
		  }

		$datediff = $datediff + $additional_day;
		// $return['work_week'] = date('y'). str_pad( ( floor($datediff / $one_week) + 1 ),2,0, STR_PAD_LEFT );
		// $return['work_week'] = date('y'). str_pad( ( floor($datediff / $one_week) ),2,0, STR_PAD_LEFT );
		//---- added 2020-7-22 novs req by mam helen
        $datecode_date = date('Y-m-d H:i:s');
        $datecode_ww = date("W",strtotime($datecode_date));

  		//$date_code = date('y',strtotime(date('Y-m-d'))). str_pad( ( floor($datecode_ww) ),2,0, STR_PAD_LEFT );
		// $return['work_week'] = $date_code;
        //-----
		$day_current = date('Y-m-d');
		$day_start_ww1 = date('Y-01-01',strtotime($day_current));
		$day_end_ww1=$day_start_ww1;
		for ($day_end_ww1=$day_start_ww1; date('w',strtotime($day_end_ww1)) != 6; $day_end_ww1 = date('Y-m-d',strtotime($day_end_ww1.'+ 1 day'))) { 
		}
		$ww = 1;
		for ($day_ctr=$day_end_ww1; $day_ctr < $day_current; $day_ctr = date('Y-m-d',strtotime($day_ctr.'+ 7 days'))) { 
			$ww++;
		}
		if($ww>5){
			if( date('m',strtotime($day_ctr))==1 ){
				$ww--;
			}
		}
        $date_code = date('y',strtotime(date('Y-m-d'))). str_pad( ( floor($ww) ),2,0, STR_PAD_LEFT );
		$return['work_week'] = $date_code;
        //-----

		echo json_encode($return);
	}
