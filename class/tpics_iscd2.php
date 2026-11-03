<?php
//THIS CLASS CONNECTS INTO YPICS SERVER OR MSSQL Server	
class TSYPICS{
	//MALACHIXD CONNECTION INFO
	private $serverM = "192.168.3.247"; //MSSQL Server of ypics
	private $userM ="sa";  //username
	private $passM = "Pr1c0N"; //password
	private $databaseM = "bu2_v4"; //database
	private ?PDO $db_handleM = null; //handler 
	
	//FUNCTION TO CONNECT TO MALACHI SERVER	
    private function connect_DBM(){
        try {
            $this->db_handleM = new PDO('sqlsrv:Server=' . $this->serverM . ';Database=' . $this->databaseM . ';CharacterSet=UTF-8;Encrypt=no', $this->userM, $this->passM, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
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

	public function select_record_script($fields,$table_name,$where,$order){ //sample
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
			return $SQL;
			// $result = mssql_query($SQL);
			// return $result;
		}
		else{
			$errorMsg = "Database not found, Please contact your administrator";
		}
		$this->close_DBM();
	}

}