<?php
//Set Class name here, it's a good practice to Capitalize the first letter, I've just read it somewhere on the internet... so its up to you if will follow...
class Training extends mysqli 
{
	private static $instance = null;
	
	//db connection config variables
	private $user = "root";	//Username
	private $pass = "r@p1d0nl1n3"; //Password
	private $dbName = "db_training"; //db_name Note: if you are going to use multiple database just place one here.. use sql to call the other one just in case, for example : database2.tablename
	private $dbHost = "localhost"; //host
	
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
		// PHP 8.1+ throws on mysqli errors by default; callers expect false/warnings as in 5.3.
		mysqli_report(MYSQLI_REPORT_OFF);
		parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
		if(mysqli_connect_error())
		{
			error_log('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
			exit('Database connection failed.');
		}
		parent::set_charset('utf8mb4');
	}

	////////////////////////////////////UP TO HERE////////////////////////////////////////
	
	////////////////////////////////////PUBLIC FUNCTIONS STARTS HERE//////////////////////////////////////////////
	//ADD A FUNCTION HERE
	public function select_all_record(){
		//query then return
		$query = "SELECT * FROM `tbl_records`;";
		return $this->query($query);
	}
	
	//ADD A FUNCTION HERE
	public function add_new_record($table_name,$array_fields,$array_values){
		//query then return
		$query = "";
		$query  = "INSERT INTO `".$table_name."` "; 
		$query .= "(";
		
		for($ctr=0;$ctr<count($array_fields);$ctr++){
			$query .= "`".$array_fields[$ctr]."`";
			if( ($ctr+1) != count($array_fields) ){
				$query .= ",";
			}
		}
		
		$query .= ") ";
		$query .= "VALUES (";
		for($ctr=0;$ctr<count($array_values);$ctr++){
			$query .= "'".$this->real_escape_string((string)$array_values[$ctr])."'";
			if( ($ctr+1) != count($array_values) ){
				$query .= ",";
			}
		}
		$query .= ");";
		
		$this->query($query);
		return "New record has been added!";
		//return $query;
	}
	
	public function fetch_record($tbl_name,$pkid){
		$query  = "SELECT * FROM `".$tbl_name."` ";
		$query .= "WHERE `pkid`='".$this->real_escape_string((string)$pkid)."';";
		return $this->query($query);
		//return $query;
	}
	
	//ADD A FUNCTION HERE
	public function update_record($table_name,$pkid,$array_fields,$array_values){
		//query then return
		$query  = "UPDATE `".$table_name."` SET"; 
		$query .= " ";
		
		for($ctr=0;$ctr<count($array_fields);$ctr++){
			$query .= "`".$array_fields[$ctr]."` = '".$this->real_escape_string((string)$array_values[$ctr])."'";
			if( ($ctr+1) != count($array_fields) ){
				$query .= ",";
			}
		}
		
		$query .= " ";
		$query .= "WHERE `pkid`='".$this->real_escape_string((string)$pkid)."';";
		$this->query($query);
		return "New record has been added!";
		//return $query;
	}
	
	//function for deleting a record
	public function delete_record($table_name,$pkid){
		$query = "DELETE FROM `".$table_name."` WHERE `pkid` = '".$this->real_escape_string((string)$pkid)."'";
		$this->query($query);
		return "Record has been deleted!";
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