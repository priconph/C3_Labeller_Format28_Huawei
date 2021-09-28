<?php
	if(is_ajax()) {
		if(isset($_POST["action"]) && !empty($_POST["action"])) {
			$action = $_POST["action"];
			switch($action) {
				case "load_format13_info" 		: load_format13_info(); break; //switch case, in using ajax an action must be set in order to choose the specific function to use
				case "add_new_record" 		: add_new_record(); break; //switch case, in using ajax an action must be set in order to choose the specific function to use			
				case "update_record" 		: update_record(); break; //switch case, in using ajax an action must be set in order to choose the specific function to use
				case "search_mmno"			: search_mmno(); break;
			}
		}
	}

	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}
	

	/* function for displaying record */
	function load_format13_info(){
		require_once('../class/oop.php'); //OOP Path
		$return = $_POST;
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'tbl_for_format13';
		$joins 	   	= '';
		$sql_where 	= '';
		$sql_order 	= 'ORDER BY pkid';
		$sql_limit 	= '';
		$result = Training::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$ctr = 0;
		while($row = mysqli_fetch_array($result)){
			$return['pkid'][$ctr] 		= $row['pkid'];
			$return['pn_ypics'][$ctr] 		= $row['pn_ypics'];
			$return['pn'][$ctr] 		= $row['pn'];
			$return['mm_no'][$ctr] 	= $row['mm_no'];
			$ctr++;
		}
		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	/* function for adding record */
	function add_new_record(){
		require_once('../class/oop.php'); //OOP Path
		$return 		= $_POST; 
		$result 		= "";
		$pn 			= $return['pn'];
		$mm_no			= $return['mm_no'];
		$pn_ypics		= $return['pn_ypics'];
		$table   		= "tbl_for_format13"; //table name
		$array_fields 	= array('pn_ypics','pn','mm_no'); //table fields
		$array_values 	= array($pn_ypics,$pn,$mm_no); //values to be saved
		$result 		= Training::getInstance()->insert_query($table,$array_fields,$array_values);
		$return["result"] = json_encode($result); //return the the serialize values
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	// /* function for updating record */
	function update_record(){
		require_once('../class/oop.php'); //OOP Path
		$return = $_POST; 
		$result = "";
		$table        = "tbl_for_format13";
		$array_fields = array('pn_ypics','pn','mm_no');
		$array_values = array($return['pn_ypics'],$return['txt_pn'],$return['txt_mm']);
		$pkid = $return['pkid'];
		$result = Training::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$return["result"] = json_encode($result); //return the the serialize values
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}

	function search_mmno(){
		require_once('../class/oop.php'); //OOP Path
		$return = $_POST;
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'tbl_for_format13';
		$joins 	   	= '';
		$sql_where 	= 'WHERE pn_ypics = "'.$return['pn2'].'"';
		$sql_order 	= 'ORDER BY pkid';
		$sql_limit 	= '';
		$result = Training::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$ctr = 0;
		while($row = mysqli_fetch_array($result)){
			$return['pkid'][$ctr] 		= $row['pkid'];
			$return['mm_no'][$ctr] 		= $row['mm_no'];
			$return['pn'][$ctr] 		= $row['pn'];
			$return['pn_ypics'][$ctr] 	= $row['pn_ypics'];
			$ctr++;
		}
		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}

?>