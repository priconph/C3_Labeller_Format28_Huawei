<?php
//Set Class name here, it's a good practice to Capitalize the first letter, I've just read it somewhere on the internet... so its up to you if will follow...
class Training extends mysqli 
{
	private static $instance = null;
	
	//db connection config variables
	// private $user = "ojt";	//Username
	// private $pass = "ojt1234"; //Password
	// private $dbName = "db_training"; //db_name Note: if you are going to use multiple database just place one here.. use sql to call the other one just in case, for example : database2.tablename
	// private $dbHost = "localhost"; //host
	
	
	//NO NEED TO CHANGE HERE 
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
		$path 		= '../';
		$db_config  = 'db_config/config.php';
		if(file_exists($path.$db_config)){
			include($path.$db_config);
		}else{
			$path = '../../';
			if(file_exists($path.$db_config)){
				include($path.$db_config);
			}else{
				$path = '../../../';
				if(file_exists($path.$db_config)){
					include($path.$db_config);
				}else{
					exit;
				}
				
			}
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
		$query = "SELECT " . implode(", ", $array_fields) . " FROM {$table} {$joins} {$sql_where} {$sql_order} {$sql_limit};";
		return ($query);
	}
		
	public function insert_query($table,$array_fields,$array_values){
		$new_values = $this->add_quotations($array_values); 
		$query 		= "INSERT INTO {$table} (". implode(", ", $array_fields).") VALUES (". implode(",", $new_values) .");";
		$this->query($query);
		$this->save_logs('1',$query);
		return "New record has been saved";
	}

	public function update_query($table,$array_fields,$array_values,$pkid){
		$pkid = $this->real_escape_string((string)$pkid);
		$update_array =  $this->create_update_param($array_fields,$array_values);
		$query 		  = "UPDATE {$table} SET ". implode(",", $update_array) ."WHERE `pkid`='{$pkid}';";
		$this->query($query);
		$this->save_logs('2',$query);
		return "Record has been updated";
	}

	public function delete_query($table,$pkid){
		$pkid = $this->real_escape_string((string)$pkid);
		$query = "DELETE FROM {$table} WHERE `pkid` = '{$pkid}';";
		$this->query($query);
		$this->save_logs('3',$query);
		return "Record has been deleted";
	}
	
	public function add_quotations($array_values){
		$array_values_r = array();
		for($i=0;$i<count($array_values);$i++){
			$array_values_r[$i] = "'".$this->real_escape_string((string)$array_values[$i])."'";
		}
		return $array_values_r;
	}

	public function create_update_param($array_fields,$array_values){
		$array_update = array();
		for($i=0;$i<count($array_fields);$i++){
			$array_update[$i] = "`".$array_fields[$i]."` = "."'".$this->real_escape_string((string)$array_values[$i])."' ";
		}
		return $array_update;
	}
	
	public function save_logs($type,$query){
		$date_today = date('Y-m-d H:i:s');
		$new_query = $this->real_escape_string(str_replace("'",'"',$query));
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

//THIS CLASS CONNECTS INTO THE YPICS SERVER OR MSSQL Server	
class YPICS{
	//MALACHIXD CONNECTION INFO
	private $serverM = "192.168.3.251\MSSQLSERVER"; //MSSQL Server of ypics
	private $userM ="builder";  //username
	private $passM = ""; //password
	private $databaseM = ""; //database
	private ?PDO $db_handleM = null; //handler 
	
	//FUNCTION TO CONNECT TO MALACHI SERVER	
    private function connect_DBM(){
        try {
            $dsn = 'sqlsrv:Server=' . $this->serverM . ($this->databaseM !== '' ? ';Database=' . $this->databaseM : '') . ';CharacterSet=UTF-8;Encrypt=no';
            $this->db_handleM = new PDO($dsn, $this->userM, $this->passM, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
   
    //FUNCTION TO CLOSE MALACHI SERVER
    private function close_DBM(){
        $this->db_handleM = null;
    }
	
	/////////////////////////////////PUBLIC FUNCTIONS///////////////////////////////////////////////	
	//FUNCTION TO LOAD PO NUM FROM MALACHI DATABASE
	public function selectPoNum(){ //sample
		$db_found = $this->connect_DBM();
		if($db_found){
			$SQL = "SELECT * FROM VwProdSchedMaster ORDER BY PONum";
			try {
				return $this->db_handleM->query($SQL);
			} catch (PDOException $e) {
				error_log($e->getMessage());
				return false;
			}
		}
		else{
			$errorMsg = "Database not found, Please contact your administrator";
		}
		$this->close_DBM();
	}

}
