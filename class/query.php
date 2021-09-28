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
		trigger_error('Clone is not allowed.',E_USER_ERROR);
	}
	
	public function __wakeup()
	{
		trigger_error('Deserializing is not allowed.',E_USER_ERROR);
	}
	
	private function __construct() {
		parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
		if(mysqli_connect_error())
		{
			exit('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
		}
		parent::set_charset('utf-8');
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
			$query .= "'".$array_values[$ctr]."'";
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
		$query .= "WHERE `pkid`='".$pkid."';";
		return $this->query($query);
		//return $query;
	}
	
	//ADD A FUNCTION HERE
	public function update_record($table_name,$pkid,$array_fields,$array_values){
		//query then return
		$query  = "UPDATE `".$table_name."` SET"; 
		$query .= " ";
		
		for($ctr=0;$ctr<count($array_fields);$ctr++){
			$query .= "`".$array_fields[$ctr]."` = '".$array_values[$ctr]."'";
			if( ($ctr+1) != count($array_fields) ){
				$query .= ",";
			}
		}
		
		$query .= " ";
		$query .= "WHERE pkid='".$pkid."';";
		$this->query($query);
		return "New record has been added!";
		//return $query;
	}
	
	//function for deleting a record
	public function delete_record($table_name,$pkid){
		$query = "DELETE FROM `".$table_name."` WHERE `pkid` = '".$pkid."'";
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
	private $db_handleM =""; //handler 
	
	//FUNCTION TO CONNECT TO MALACHI SERVER	
    private function connect_DBM(){
        $this->db_handleM = mssql_connect($this->serverM,$this->userM,$this->passM);
            return mssql_select_db($this->databaseM,$this->db_handleM);
    }
   
    //FUNCTION TO CLOSE MALACHI SERVER
    private function close_DBM(){
        if(isset($this->db_handleM)){
            mssql_close($this->db_handleM);
        }
    }
	
	/////////////////////////////////PUBLIC FUNCTIONS///////////////////////////////////////////////	
	//FUNCTION TO LOAD PO NUM FROM MALACHI DATABASE
	public function selectPoNum(){ //sample
		$db_found = $this->connect_DBM();
		if($db_found){
			$SQL = "SELECT * FROM VwProdSchedMaster ORDER BY PONum";
			$result = mssql_query($SQL);
			return $result;
			mssql_free_result($result);
		}
		else{
			$errorMsg = "Database not found, Please contact your administrator";
		}
		$this->close_DBM();
	}

}
?>
