<?php
class WBS extends mysqli 
{
	private static $instance = null;
	
	public static function getInstance() {
		if(!self::$instance instanceof self) 
		{
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function __clone()
	{
		throw new Error('Clone is not allowed.');
	}
	
	public function __wakeup()
	{
		throw new Error('Deserializing is not allowed.');
	}
	
	private function __construct() {
		$db = '../db_config/db_wbs_subsystem.php';
		if(file_exists($db)) {
			include($db);
		} else if(file_exists($db)) {
			include('../'.$db);
		}
		// PHP 8.1+ throws on mysqli errors by default; callers expect false/warnings as in 5.3.
		mysqli_report(MYSQLI_REPORT_OFF);
		parent::__construct($server, $username, $password, $db_name);
		
		if(mysqli_connect_error())
		{
			error_log('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
			exit('Database connection failed.');
		}
		parent::set_charset('utf8mb4');
	}

	////////////////////////////////////UP TO HERE////////////////////////////////////////
	
	////////////////////////////////////PUBLIC FUNCTIONS STARTS HERE//////////////////////////////////////////////
	public function select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit){
		$query = "SELECT " . implode(", ", $array_fields) . " FROM {$table} {$joins} {$sql_where} {$sql_order} {$sql_limit};";
		return $this->query($query);
	}


    public function select_query_script($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit){
		$query = "<br>SELECT " . implode(", ", $array_fields) . " FROM {$table} {$joins} {$sql_where} {$sql_order} {$sql_limit};<br>";
		return $query;
	}
    
	public function insert_query($table,$array_fields,$array_values){
		$new_values = $this->add_quotations($array_values); 
		$query 		= "INSERT INTO {$table} (". implode(", ", $array_fields).") VALUES (". implode(",", $new_values) .");";
		$this->query($query);
		// $this->save_logs('1',$query);
		return "New record has been saved";
	}
    
	/* insert a query and get the pkid */
	public function insert_query_id($table,$array_fields,$array_values){
		$new_values = $this->add_quotations($array_values); 
		$query 		= "INSERT INTO {$table} (". implode(", ", $array_fields).") VALUES (". implode(",", $new_values) .");";
		$result = $this->query($query);
		$new_pkid = $this->insert_id;
		// $this->save_logs('1',$query);
		return $new_pkid;
	}
	
	public function insert_query_script($table,$array_fields,$array_values){
		$new_values = $this->add_quotations($array_values); 
		$query 		= "INSERT INTO {$table} (". implode(", ", $array_fields).") VALUES (". implode(",", $new_values) .");<br>";
       	return $query;
	}

	public function update_query($table,$array_fields,$array_values,$pkid){
		$pkid = $this->real_escape_string((string)$pkid);
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET ". implode(",", $update_array) ."WHERE `pkid`='{$pkid}';";
		$this->query($query);
		// $this->save_logs('2',$query);
		return "Record has been updated";
	}
	
	public function update_query_script($table,$array_fields,$array_values,$pkid){
		$pkid = $this->real_escape_string((string)$pkid);
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET ". implode(",", $update_array) ."WHERE `pkid`='{$pkid}'; <br>";
		return $query;
	}

	public function update_query_detailed($table,$array_fields,$array_values,$where){
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET ". implode(",", $update_array) .$where;
		$this->query($query);
		// $this->save_logs('2',$query);
		return "Record has been updated";
	}

	public function update_query_detailed_script($table,$array_fields,$array_values,$where){
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET ". implode(",", $update_array) .$where.' <br>';
		$this->query($query);
		return $query;
	}

	public function delete_query($table,$pkid){
		$pkid = $this->real_escape_string((string)$pkid);
		$query = "DELETE FROM {$table} WHERE `pkid` = '{$pkid}';";
		$this->query($query);
		// $this->save_logs('3',$query);
		return "Record has been deleted";
	}

	public function delete_query_details($table,$pkid){
		$pkid = $this->real_escape_string((string)$pkid);
		$query = "DELETE FROM {$table} WHERE `fkid_ot_main` = '{$pkid}';";
		$this->query($query);
		// $this->save_logs('3',$query);
		return "Record has been deleted";
	}
	
	public function add_quotations($array_values){
		$array_values_r = array();
		for($i=0;$i<count($array_values);$i++){
			if(isset($array_values[$i]) || $array_values[$i] != ''){
				$array_values[$i] = $this->real_escape_string((string)$array_values[$i]);
				$array_values_r[$i] = "'".$array_values[$i]."'";
			}else{
				$array_values_r[$i] = '';
			}
		}
		return $array_values_r;
	}

	public function create_update_param($array_fields,$array_values){
		$array_update = array();
		for($i=0;$i<count($array_fields);$i++){
			$array_values[$i] = $this->real_escape_string((string)$array_values[$i]);
			$array_update[$i] = "`".$array_fields[$i]."` = "."'".$array_values[$i]."' ";
		}
		return $array_update;
	}
	
	public function save_logs($type,$query){
		$date_today = date('Y-m-d H:i:s');
		$new_query = str_replace("'",'"',$query);
		$logs = "INSERT INTO `tbl_logs` (`type_of_query`,`query`,`date`) VALUES('".$type."','".$new_query."','".$date_today."');";
		$this->query($logs);
	}
	
		public function check_unset($variable){
		if(!isset($variable)){
			$new_variable = '';
		}else{
			$new_variable = $variable;
		}
		return $new_variable;
	}
	
	public function check_if_array($array){
		if(!is_array($array)){
			$new_array = array($array);
		}else{
			$new_array = $array;
		}
		return $new_array;
	}

	
}

// //THIS CLASS CONNECTS INTO THE YPICS SERVER OR MSSQL Server	4.0
// class YPICS4{
// 	//FUNCTION TO CONNECT TO MALACHI SERVER	
//     private function connect_DBM(){
// 		$path 		= '../';
// 		$db_config  = 'db_config/db_ypics4.php';
// 		if(file_exists($path.$db_config)){
// 			include($path.$db_config);
// 		}else{
// 			$path = '../../';
// 			if(file_exists($path.$db_config)){
// 				include($path.$db_config);
// 			}else{
// 				$path = '../../../';
// 				if(file_exists($path.$db_config)){
// 					include($path.$db_config);
// 				}else{
// 					exit;
// 				}
				
// 			}
// 		}
// 		$this->db_handleM = mssql_connect($server,$username,$password);
//         return mssql_select_db($db_name,$this->db_handleM);
//     }
   
//     //FUNCTION TO CLOSE MALACHI SERVER
//     private function close_DBM(){
//         if(isset($this->db_handleM)){
//             mssql_close($this->db_handleM);
//         }
//     }
	
// 	/////////////////////////////////PUBLIC FUNCTIONS///////////////////////////////////////////////	
// 	//FUNCTION TO LOAD PO NUM FROM MALACHI DATABASE
// 	public function select_query($array_fields,$table,$joins,$sql_where,$sql_order){ //sample
// 		$db_found = $this->connect_DBM();
// 		if($db_found){
// 			$array_fields = implode(",",$array_fields);
// 			$SQL = "SELECT $array_fields FROM {$table} {$joins} {$sql_where} {$sql_order};";
// 			$result = mssql_query($SQL);
// 			return $result;
// 			mssql_free_result($result);
// 		}
// 		else{
// 			$errorMsg = "Database not found, Please contact your administrator";
// 		}
// 		$this->close_DBM();
// 	}
// 	public function select_query_script($array_fields,$table,$joins,$sql_where,$sql_order){ //sample
// 		$db_found = $this->connect_DBM();
// 		if($db_found){
// 			$array_fields = implode(",",$array_fields);
// 			$SQL = "SELECT $array_fields FROM {$table} {$joins} {$sql_where} {$sql_order};";
// 			return $SQL;
// 			mssql_free_result($result);
// 		}
// 		else{
// 			$errorMsg = "Database not found, Please contact your administrator";
// 		}
// 		$this->close_DBM();
	// }
// }