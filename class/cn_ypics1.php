<?php
//THIS CLASS CONNECTS INTO YPICS SERVER OR MSSQL Server	
class CNYPICS{
	//MALACHIXD CONNECTION INFO
	// private $serverM = "192.168.3.251\MSSQLSERVER"; //MSSQL Server of ypics
	// private $userM ="builder";  //username
	// private $passM = ""; //password
	// private $databaseM = "CN_Ypics1"; //database
	// private $db_handleM =""; //handler 
	//MALACHIXD CONNECTION INFO
	private $serverM = "192.168.3.247"; //MSSQL Server of ypics
	private $userM ="sa";  //username
	private $passM = "Pr1c0N"; //password
	private $databaseM = "cn_v4"; //database
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
	public function select_record($fields,$table_name,$where,$order){ //sample
		$db_found = $this->connect_DBM();
		if($db_found){
			$SQL = "SELECT ".implode(",",$fields)." FROM ".$table_name."";
			if($where != ""){
				$SQL .= " ".$where;
			}
			if($order != ""){
				$SQL .= " ".$order;
			}
			$SQL .= ";";
			// return $SQL;
			$result = mssql_query($SQL);
			return $result;
			mssql_free_result($result);
		}
		else{
			$errorMsg = "Database not found, Please contact your administrator";
		}
		$this->close_DBM();
	}
	
	public function select_record_test($fields,$table_name,$where,$order){ //sample
		$db_found = $this->connect_DBM();
		if($db_found){
			$SQL = "SELECT ".implode(",",$fields)." FROM ".$table_name."";
			if($where != ""){
				$SQL .= " ".$where;
			}
			if($order != ""){
				$SQL .= " ".$order;
			}
			$SQL .= ";";
			// return $SQL;
			// $result = mssql_query($SQL);
			return $SQL;
			mssql_free_result($result);
		}
		else{
			$errorMsg = "Database not found, Please contact your administrator";
		}
		$this->close_DBM();
	}

}