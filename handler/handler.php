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
				case "get_sticker_alignment"						: get_sticker_alignment(); break; 
				case "get_sticker_alignment_ul"						: get_sticker_alignment_ul(); break; 
				case "update_sticker_alignment_ul"					: update_sticker_alignment_ul(); break; 
				case "update_sticker_alignment"						: update_sticker_alignment(); break; 
				case "get_item_code"								: get_item_code(); break;
				case "get_item_name"								: get_item_name(); break;
				case "save_new_default_values"						: save_new_default_values(); break;
				case "get_default_value_details"					: get_default_value_details(); break;
				case "update_default_values"						: update_default_values(); break;
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
	
	/* settings */
	function get_sticker_alignment(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		if(!filter_var($return['pc_ip'] ?? '', FILTER_VALIDATE_IP)){
			http_response_code(422);
			echo json_encode(array('error' => 'Invalid IP'));
			return;
		}
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'tbl_sticker_alignment';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `pc_ip` ="'.$return['pc_ip'].'"';
		$sql_order 	= '';
		$sql_limit 	= '';
		$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$ctr = 0;
		while($row = mysqli_fetch_array($result)){
			$return['pkid'] 		    = $row['pkid'];
			$return['left_space'] 		= $row['left_space'];
			$return['top_space'] 		= $row['top_space'];
			$return['top_item_name'] 	= $row['top_item_name'];
			$return['top_qty'] 		= $row['top_qty'];
			$return['top_lotno'] 	= $row['top_lotno'];
			$return['top_orderno'] 		= $row['top_orderno'];
			$return['font_style_name'] 	= $row['font_style_name'];
			$ctr++;
		}
		/* no existing record - insert new row with 0 as default left and top space */
		if($ctr == 0){
			$table   		= "tbl_sticker_alignment"; //table name
			$array_fields 	= array('pc_ip','left_space', 'top_space', 'top_item_name', 'top_qty', 'top_lotno', 'top_orderno'); //table fields
			$array_values 	= array($return['pc_ip'],'0','0','60','133','133','206'); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return = $_POST;
			$result = "";
			$array_fields = array('*');
			$table 	   	= 'tbl_sticker_alignment';
			$joins 	   	= '';
			$sql_where 	= 'WHERE `pc_ip` ="'.$return['pc_ip'].'"';
			$sql_order 	= '';
			$sql_limit 	= '';
			$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
			$ctr = 0;
			while($row = mysqli_fetch_array($result)){
				$return['pkid'] 		    = $row['pkid'];
				$return['left_space'] 		= $row['left_space'];
				$return['top_space'] 		= $row['top_space'];
				$return['top_item_name'] 	= $row['top_item_name'];
				$return['top_qty'] 		= $row['top_qty'];
				$return['font_style_name'] 	= $row['font_style_name'];
				$ctr++;
			}
		}
		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function update_sticker_alignment(){
		require_once('../class/c3.php'); 
		$return 	  = $_POST;
		$result 	  = "";
		$table        = "tbl_sticker_alignment";
		$array_fields = array('left_space', 'top_space', 'top_item_name', 'top_qty', 'top_lotno', 'top_orderno','font_style_name'); //table fields
		$array_values = array($return['left_space'], $return['top_space'], $return['top_item_name'], $return['top_qty'], $return['top_lotno'], $return['top_orderno'], $return['font_name']);
		$pkid = $return['pkid'];
		$result = C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$return["result"] = json_encode($result); //return the the serialize values
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function get_sticker_alignment_ul(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		if(!filter_var($return['pc_ip'] ?? '', FILTER_VALIDATE_IP)){
			http_response_code(422);
			echo json_encode(array('error' => 'Invalid IP'));
			return;
		}
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'tbl_sticker_alignment_ul';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `pc_ip` ="'.$return['pc_ip'].'"';
		$sql_order 	= '';
		$sql_limit 	= '';
		$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$ctr = 0;
		while($row = mysqli_fetch_array($result)){
			$return['pkid'] 		    = $row['pkid'];
			$return['left_space'] 		= $row['left_space'];
			$return['top_space'] 		= $row['top_space'];
			$return['font_style_name'] 	= $row['font_style_name'];
			$ctr++;
		}
		/* no existing record - insert new row with 0 as default left and top space */
		if($ctr == 0){
			$table   		= "tbl_sticker_alignment_ul"; //table name
			$array_fields 	= array('pc_ip','left_space','top_space'); //table fields
			$array_values 	= array($return['pc_ip'],'0','0'); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return = $_POST;
			$result = "";
			$array_fields = array('*');
			$table 	   	= 'tbl_sticker_alignment';
			$joins 	   	= '';
			$sql_where 	= 'WHERE `pc_ip` ="'.$return['pc_ip'].'"';
			$sql_order 	= '';
			$sql_limit 	= '';
			$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
			$ctr = 0;
			while($row = mysqli_fetch_array($result)){
				$return['pkid'] 		    = $row['pkid'];
				$return['left_space'] 		= $row['left_space'];
				$return['top_space'] 		= $row['top_space'];
				$return['font_style_name'] 		= $row['font_style_name'];
				$ctr++;
			}
		}
		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function update_sticker_alignment_ul(){
		require_once('../class/c3.php'); 
		$return 	  = $_POST;
		$result 	  = "";
		$table        = "tbl_sticker_alignment_ul";
		$array_fields = array('left_space','top_space','font_style_name'); //table fields
		$array_values = array($return['left_space'], $return['top_space'], $return['font_name']);
		$pkid = $return['pkid'];
		$result = C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$return["result"] = json_encode($result); //return the the serialize values
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function get_item_code(){
		require_once('../class/cn_ypics1.php');
		$CNYPICS = new CNYPICS;
		$p = $_POST;
		$pattern = ypics_esc($_POST['pattern'] ?? '');
		$return = array();
		$fields = array('TOP 10 CODE');
		$table_name = "XHEAD";
		$where = "WHERE CODE LIKE '%$pattern%' ";
		$order = "";
		$result = $CNYPICS->select_record($fields,$table_name,$where,$order);
		$return['item_code'] = array();
		while($row = ypics_fetch($result)){
			$return['item_code'][] = $row['CODE'];
		}
		echo json_encode($return);
	}
	
	function get_item_name(){
		require_once('../class/cn_ypics1.php');
		$CNYPICS = new CNYPICS;
		$p = $_POST;
		$item_code = ypics_esc($_POST['item_code'] ?? '');
		$return = array();
		$fields = array('NAME');
		$table_name = "XHEAD";
		$where = "WHERE CODE = '$item_code' ";
		$order = "";
		$result = $CNYPICS->select_record($fields,$table_name,$where,$order);
		$return['item_name'] = '';
		while($row = ypics_fetch($result)){
			$return['item_name'] = $row['NAME'];
		}
		echo json_encode($return);
	}
	
	function save_new_default_values(){
		require_once('../class/c3.php'); 
		/* check for existing record */
		$item_name 			= sql_esc($_POST['item_name'] ?? ''); 
		$array_fields 		= array('*');
		$table				= 'tbl_cn_default_values';
		$joins				= '';
		$sql_where			= '';
		$sql_order			= 'WHERE item_name = "'.$item_name.'" and logdel = "0" ';
		$sql_limit			= '';
		$result 			= C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return['exist']	= false;
		if($result->num_rows != 0){
			$return['exist'] = true;
			echo json_encode($return);
			exit;			
		}
		/* insert record if not exist */
		$table				= "tbl_cn_default_values";
		$data 				= get_fields_and_values($_POST, array("action","username"));
		$array_fields		= $data["array_fields"];
		$array_values		= $data["array_values"];
		$array_fields[]		= "lastupdate"; $array_values[] = date('Y-m-d H:i:s');
		$array_fields[]		= "username"; 	$array_values[] = $_POST['username'];
		$result 			= C3::getInstance()->insert_query($table,$array_fields,$array_values);
		$return['data']		= $data;
		echo json_encode($return);
	}
	
	function get_default_value_details(){
		require_once('../class/c3.php'); 
		/* check for existing record */
		$id					= sql_esc($_POST["id"] ?? '');
		$array_fields 		= array('*');
		$table				= 'tbl_cn_default_values';
		$joins				= '';
		$sql_where			= '';
		$sql_order			= 'WHERE pkid = "'.$id.'"';
		$sql_limit			= '';
		$result 			= C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		while($row = mysqli_fetch_assoc($result)){
			$return['data'] = $row;
		}
		$return['exist']	= false;
		echo json_encode($return);
	}
	
	function update_default_values(){
		require_once('../class/c3.php'); 
		/* check for existing record */
		$table 				= "tbl_cn_default_values";
		$data 				= get_fields_and_values($_POST, array("action","username","id"));
		$array_fields		= $data["array_fields"];
		$array_values		= $data["array_values"];
		$pkid				= $_POST['id'];
		$result 			= C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$return 			= array();
		echo json_encode($return);
	}
	
	function get_fields_and_values($parameter,$exempt){
		$data = array();
        $data["array_fields"] = array();
        $data["array_values"] = array();
		foreach($parameter as $key => $value){
			if(!in_array($key,$exempt)){
				$data["array_fields"][] = $key;
				$data["array_values"][] = $value;
			}			
		}
		return $data;
	}
