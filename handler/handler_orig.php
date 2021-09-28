<?php
	if(is_ajax()) {
		if(isset($_POST["action"]) && !empty($_POST["action"])) {
			$action = $_POST["action"];
			switch($action) {
				/* c3 */
				/* all format */
				case "check_existing_item_name_and_lotno"		: check_existing_item_name_and_lotno(); break; 
				
				/* format1 */
				case "save_new_c3_label"						: save_new_c3_label(); break; 
				case "load_selected_label_info"					: load_selected_label_info(); break;
				case "delete_label"								: delete_label(); break;
				case "reprint_label"							: reprint_label(); break;
				
				/* format2 */
				case "save_new_c3_label_format2"				: save_new_c3_label_format2(); break;
				case "load_selected_label_info_format2"			: load_selected_label_info_format2(); break;
				case "delete_label_format2"						: delete_label_format2(); break;
				case "reprint_label_format2"					: reprint_label_format2(); break;
								
				/* YPICS CN_Ypics1 */
				case "get_all_item_name"						: get_all_item_name(); break;
				
				/* do not edit below */
				case "load_records" 							: load_records(); break; 
				case "add_new_record" 							: add_new_record(); break; 
				case "update_fetch_record" 						: update_fetch_record(); break; 
				case "update_record" 							: update_record(); break; 
				case "delete_record" 							: delete_record(); break; 
			}
		}
	}

	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}
	
	/* C3 */
	/* format1 */
	function check_existing_item_name_and_lotno(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$item_name = $return['item_name'];
		$lotno = explode("-",$return['lotno']);
		$lotno = $lotno[0];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format1';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `item_name` = "'.$item_name.'" AND `lotno` = "'.$lotno.'"';
		$sql_order 	= 'ORDER BY `lotno_extension` DESC LIMIT 0,1';
		$sql_limit 	= '';
		$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return['lotno_extension'] = '';
		while($row = mysqli_fetch_array($result)){
			$return['lotno_extension'] = $row['lotno_extension'];
		}
		/* if lot number does not exist add a 01A */
		if($return['lotno_extension'] == ''){
			$return['lotno_extension'] = '01A';
		}else{
			$return['lotno_extension'] = generate_new_lot_no_extension($return['lotno_extension']);
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_new_lot_no_extension($lot_extension){
		$new_lot_no_extension = $lot_extension[0].$lot_extension[1];
		$letter_end = $lot_extension[2];
		$new_lot_no_extension = str_pad(($new_lot_no_extension + 1), 2, "0", STR_PAD_LEFT); 
		$new_lot_no_extension .= $letter_end;
		return $new_lot_no_extension;
	}
	
	function save_new_c3_label(){
		require_once('../class/c3.php');
		$return 		= $_POST; 
		$print_qty      = $return['txt_print_qty'];
		$return['query'] = '';
		$return['label'] = array();
		for($x=0;$x<$print_qty;$x++){
			if($x==0){
				$lotno_extension = $return['txt_lot_no_count'];
			}else{
				$lotno_extension = generate_new_lot_no_extension($lotno_extension);
			}
			$result 		= "";
			$table   		= "tbl_format1"; //table name
			$array_fields 	= array('item_name','qty','lotno','lotno_extension','order_no','remarks','date_encoded','lastupdate','username'); //table fields
			$array_values 	= array($return['txt_itemname'],$return['txt_qty'],$return['txt_lot_no'],$lotno_extension,$return['txt_order_no'],$return['txt_remarks'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			/* generate zebra code format 1 */
			$return['label'][] = generate_zebra_code_format1($return['txt_itemname'],$return['txt_qty'],$return['txt_lot_no'],$lotno_extension,$return['txt_order_no'],$return['txt_remarks']);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format1';
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
			$return['html'] .= '	<td>'.$row['item_name'].'</td>';
			$return['html'] .= '	<td>'.$row['qty'].'</td>';
			$return['html'] .= '	<td>'.$row['order_no'].'</td>';
			$return['html'] .= '	<td>'.$row['lotno'].'-'.$row['lotno_extension'].'</td>';
			$return['html'] .= '	<td>'.$row['remarks'].'</td>';
			$return['html'] .= '</tr>';
		}
		// $return['msg'] = $result;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format1";
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
	
	function reprint_label(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format1';
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
			$label = generate_zebra_code_format1($row['item_name'],$row['qty'],$row['lotno'],$row['lotno_extension'],$row['order_no'],$row['remarks']);
			$return['label'][] = $label;
		}
		// $return['msg'] = $result;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format1($item_name,$qty,$lotno,$lotno_extension,$order_no,$remarks){
		/*
		************* zebra start command ^XA - NOTE: ZPL code always start with this. *******************
		*/
		$zebra_code  = '^XA';
		/*
		************* IMAGES *******************
		*/
		$zebra_code .= '^FO12,21^GFA,986,986,17,,::::N0DFC8P0C,M07FFC8O01C,M03C038P0C,M03801CO01F,M038018O0183FC,M038018O01007,M03801CO0300F,M03801CO0600E,M03IFCN01F61C,M07FC3CN01CC38,M078018N0383F,M078Q0403C,M028P01C01C,L08R030038,L08FC00CM060058FC,L0CFF0IFO03IF8,L0C020C03N01C0038,L0C020C03N0EI01C,L0C021C03M03A6001C,L0C020C03M07060018,L0C020C038J01FC060018,L0C030C03K01F0060018,L0E030E03O07003C,L0IF0IFO07IFC,L0EE70E1FO0730FC,K01C020403O07001C,gH07,,:::::::::::::::::::::::::^FS';
		$zebra_code .= '^FO12,90^GFA,986,986,17,,::M03C07P0C003,L063DC78O0JF8,L07B9C78O0JF8,L03BB87P0E0038,L01BF0EP0JF8,L01BE0EP0JF8,L0JFE06N0E0038,L0JFC0FN0JF8,M07E1IFN0JF98,M0FF9IFN0E0033E,L01FBB87M01LFE,L03B9FC7M01LFE,L07386C7N01JFC,K01E38EC6N01JFC,K01C3CCEEN01C1C38,M03C66EN01JF8,L0JFEEN01JF8,L0KFCN01C1C38,M0E383CN01C1C38,L01C383CN01JF8,L01FF07EN01JFE,L03FF0FFN07KF8,L039F8EF8M07KF8,M03FBC7EO01C018,M0F9F83EO01C03E,L03E1F01EM0LFE,L0F87CP0LFE,L0E07,,::::::::::::::::::::::::::^FS';
		$zebra_code .= '^FO12,160^GFA,986,986,17,,::M06,K0F078K06,K0F03CK06,K0361CK060707C7C07F,L0E0C601KF87C7C0FF8,L0JF01KF83E300E38,J018JFI060E003E301C1C,J01FC18J060E0037301C1C,K0F818J060E0037301C1C,K07818J070C0033B01C1C,K03818CI031C0033B01C0C,K03019EI039C0031F01C0C,K033FFEI01F80031F01C1C,K073FFEI01F80031F01C1C,J01E018K0FI030F01C1C,J01E018K0F80030F01C1C,K06018J03FE0030700E180E,K060183I079F8030700F380E,K060187801F0FF07C3007F00E,K07JF81FC03F07C3003E00E,K07JF81FI0E,K06,,::::::::::::::::::::::::::::::::^FS'; 
		$zebra_code .= '^FO12,230^GFA,986,986,17,,::gH0C,L01839CQ0E,L03C39CQ0E,L03C39C6P0E338,L03839CFP0E7F8,L07KF8M0KF,L077JF8M0JFE,L07039CQ0E3C,L0E679C7P0E783,L0F7JF8O0EF078,K01F7JF8L03LFC,K01E7Q03LFC,K03E7700EP078,K03E77IFO07F1F,K07E77IFO07IF8,K0EE7738EO07IF8,K0CE77FFEN01FE,L0E77FFEN03F0018,L0E7738EN0F7IFC,L0E7738EM01E7IFE,L0E77FFEM0186001E,L0E77FFEO060018,L0E7738ER038,L0EE738ER038,L0EE738ER078,L0EC73FEQ07F,L0FC73FEQ07F,L0F8738EQ03E,L0F06,,:::::::::::::::::::::::::^FS'; 
		$zebra_code .= '^FO370,95^GFA,928,928,16,,:::::::O0F8001FC07FF,O0F8003FE07FF,O07I038E0673,O07I07070673,O07I0707007,::O07I0703007,:O07I0707007,:::O07060386007,O070E03CE007,O0FFE01FC01F8,O0FFE00F801F8,,::::::::::N01F1F01FC,N01F1F03FE,O0F8C038E,O0F8C0707,O0DCC0707,:O0CEC0707,O0CEC0703,O0C7C0703,O0C7C0707,:O0C3C0707,:O0C1C0386038,O0C1C03CE038,N01F0C01FC038,N01F0C00F8038,,::::^FS'; 
		$zebra_code .= '^FO585,232^GFA,986,986,17,,:::::I06038O0EO01C,I06078O0EN0CFD83,I0607CO0C07L0FF9FF8,I060EEL01KF8K0F81FF8,I06CE7L01KF8K0C0183,007FFC38M03FN0C0183,007FF87EM07FCM0C0183,I067FFEM0FDFM0C1D83,I0EEFF6L01CC7CL0IF83,I0FC18M078C3FL0IF83,I0JFCL0KFL0C0183,001JFCK03CIFM0C0183,001E318CK038C06M0C0183,003E338CM0FFEM0C0F83,00363FFCM0FFEM0IF83,00763FFCM0C06M0IF83,006633CN0FFEM0C018F,I0637EN0FFEM0C018F,I060E7N0C067L0C018,I061C3EK03KF8K0C018,I06781EK03KF8M018,I06F00CY018,J0C,,::::::::::::::::::::::::::::^FS'; 
		$zebra_code .= '^FO5,320^GFA,5184,5184,72,,::::::::::::::::::::::K0FFE,J07IF8,I01JFE,I03F3E3F,I07C3F0F8,I0F87F87C,001F0FF83E,001E0F381E001EI0703C0038I018007I08007FF9CI0E18J0IF0CI03FFC00MFE3IF8003FF801I0181006FFC0IFCL03FFCN06N03,003C0F380FI0FI0F07E007CI07C00FC01E03IF3CI0E3CI03IF9EI07FFE07NF7JF007FFC078001C380IFE3IFEL0IFCN0EI06J07,003C0F38078007801C06600FEI0FC01FC03E0FF1F1EI0E3CI078I0E001FF860FJ07FE67JF81F87E07C003C781FA0078N03EQ0EI06J03,00780E3C03800380180E700FEI0FC01DC03E0F8I0EI0E3CI0FJ0E003FI01EJ01F003800783C01707E007C783EI07O078Q06I06J03,00700F1C03C003C0700C38062001FC038E03E1EI01EI0E3C001CJ0E0038I03CK0E0038003C78003873803C783J06O0ER06I0EJ07,0073KF3C001E0E018180430031C070603E38I03CI0E38003CJ0C0078I038K0E003C0018FI03861C01C786J06N01EK07FK06007FE07FF,0077KFBCI0F1E0381C0430031C0F0703E38I01CI0E380038J0E0078I07L0E003C0038FI03C61E03C78EJ07N01CJ03FFCJ06007FE1IF,0077KF9CI079C0700C0638031C0E0303E3CI01E001E38003CJ0E0078I07L0E003C0031CI03C70F07C78EJ078M01CJ07C3EJ06003F03E4F,00770E1C39CI03F80700C0718061C0E0383E3CI03JFE38003JF0C00FF5FC7L0E003IFE1CI03C70787C78EJ03IFK01CJ0F00FJ06I0E03807,00778E1C7BCI01F806006070C0E1C1C01C3E3CI01JFE38003JF0C00IF1E7L0E003IFC1CI03C70383C78EJ01IFCJ01CI01E00F8I06I0E07007,00778E1C7BCJ0F00F006070C0E1C3C01C3E38I01JFE38003C7FE0C00E3E0C3L0E003IF81CI03C701C3C78EK07FFEJ01CI01C00F8I06I0607007,00739E1C7BCJ0F01FB0F070E1C1C3C19C1E38I01CI0E380038J0C006J03L0E00380181CI03C700E1C78EM01FJ01CI01C0078I06I0607007,007B9E1E7BCJ0F01JF070F181C7IFE1E3CI01CI0E38003CJ0E006J038K0E00380070EI038700738786N0F8I01CI01C0078I07I0607007,003B9E0FF78J0F03C007CF07781CF1C3F1E1CI01CI0E38001CJ0E007J038K0E00380038E800787003F8787N078J0EJ0E00F8I07I06070038,003FFC0IF8J0F07I03CF07F81CEI078E1EI01CI0E3C001EJ0F0038I01CK0E00780038F800B07001F87878M0FK0FJ0E00FJ078006070038,001FFC07FFK0F07I01CF03F01CEI038E0F8001CI0E3C001FJ0F803CI01EK0E007I0387C00E07001F87C3EL01FK07CI0F00E39C07C00707C0F98,001FF807FEJ01E0FI01FF01E01FCI03FE03FE51CI0E3CI07EFF07CF7EJ0FBFC00E0078003C3CC3C07I0FC7C0IFC3IFCK01FFDC7FBE7EE03FFC7E1IF9C,I0FE001FCJ01E0EJ0FE01E01FCI01FE00IF1CI0E3CI01IF81FFC7FFE07IF00E0038003C1IF807I0787803FFE3IF8L03FFC1FF839C003FC1E07FF18,I07CI0F8K0C0CQ038J0FJ0181CI0E38J0102001N0406004T02I0183g08036I0C,I07E001F,I01FC0FE,J07IFC,J03IF,K0FFC,K03F8,,::::::::::::::::^FS'; 
		/*
		************* FONTS UNDER IMAGES *******************
		*/
		$zebra_code .= '^FO45,60,'; 
		$zebra_code .= '^CF 0,26'; 
		$zebra_code .= '^FDITEM'; 
		$zebra_code .= '^FS'; 
		
		$zebra_code .= '^FO45,130,'; 
		$zebra_code .= '^CF 0,26';
		$zebra_code .= "^FDQ' TY";
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO12,200,';
		$zebra_code .= '^CF 0,26';
		$zebra_code .= '^FDORDER NO.';
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO18,270,';
		$zebra_code .= '^CF 0,26';
		$zebra_code .= '^FDREMARKS';
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO583,271,';
		$zebra_code .= '^CF 0,26';
		$zebra_code .= '^FDINSPECTION';
		$zebra_code .= '^FS';
		/*
		************* Borders *******************
		*/
		$zebra_code .= '^FO2,14';
		$zebra_code .= '^GB 140,73,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF0,20';
		
		$zebra_code .= '^FO2,85';
		$zebra_code .= '^GB 140,73,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO2,156';
		$zebra_code .= '^GB 140,74,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO2,228';
		$zebra_code .= '^GB 140,75,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO2,301';
		$zebra_code .= '^GB 550,110,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO140,14';
		$zebra_code .= '^GB 609,73,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO140,85';
		$zebra_code .= '^GB 214,74,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO352,85';
		$zebra_code .= '^GB 150,74,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO500,85';
		$zebra_code .= '^GB 249,74,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO140,157';
		$zebra_code .= '^GB 609,73,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO140,228';
		$zebra_code .= '^GB 412,75,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO550,228';
		$zebra_code .= '^GB 199,68,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO550,294';
		$zebra_code .= '^GB 199,117,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		/*
		************* Value *******************
		*/
        /* Do not delete - Used to check all the available FNT in the printer */
		//$zebra_code .= '^WDR:.FNT*'; 
		
		/* Select font from all the available fonts in the computer */
		$zebra_code .= '^CWA,E:L.FNT';
                
		$zebra_code .= '^FO180,60,';
		$zebra_code .= '^AAN,36,0';
		$zebra_code .= '^FD'.$item_name;
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO180,133,';
		$zebra_code .= '^AAN,36,0';
		$zebra_code .= '^FD'.$qty.'pcs';
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO530,133,';
		$zebra_code .= '^AAN,36,0';
		$zebra_code .= '^FD'.$lotno.'-'.$lotno_extension;
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO180,206,';
		$zebra_code .= '^AAN,36,0';
		$zebra_code .= '^FD'.$order_no;
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO180,279,';
		$zebra_code .= '^AAN,36,0';
		$zebra_code .= '^FD'.$remarks;
		$zebra_code .= '^FS';
		/*
		************* zebra end command ^XZ - NOTE: ZPL code always end with this. *******************
		*/
		$zebra_code .= '^XZ';
		return $zebra_code;
	}
	
	/* format 2 */
	function save_new_c3_label_format2(){
		require_once('../class/c3.php');
		$return 		= $_POST; 
		$print_qty      = $return['txt_print_qty'];
		$return['query'] = '';
		$return['label'] = array();
		for($x=0;$x<$print_qty;$x++){
			if($x==0){
				$lotno_extension = $return['txt_lot_no_count'];
			}else{
				$lotno_extension = generate_new_lot_no_extension($lotno_extension);
			}
			$result 		= "";
			$table   		= "tbl_format2"; //table name
			$array_fields 	= array('pn','qty','remarks','date_encoded','lastupdate','username'); //table fields
			$array_values 	= array($return['txt_pn'],$return['txt_qty'],$return['txt_remarks'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			/* generate zebra code format 1 */
			$return['label'][] = generate_zebra_code_format2($return['txt_pn'],$return['txt_qty'],$return['txt_remarks']);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info_format2(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format2';
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
			$return['html'] .= '	<td>'.$row['qty'].'</td>';
			$return['html'] .= '	<td>'.$row['remarks'].'</td>';
			$return['html'] .= '</tr>';
		}
		// $return['msg'] = $result;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label_format2(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format2";
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
	
	function reprint_label_format2(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format2';
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
			$label = generate_zebra_code_format2($row['pn'],$row['qty'],$row['remarks']);
			$return['label'][] = $label;
		}
		// $return['msg'] = $result;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format2($pn,$qty,$remarks){
		/*
		************* zebra start command ^XA - NOTE: ZPL code always start with this. *******************
		*/
		$zebra_code  = '^XA';
		/*
		************* IMAGES *******************
		*/
		$zebra_code .= '^FO12,21^GFA,986,986,17,,::::N0DFC8P0C,M07FFC8O01C,M03C038P0C,M03801CO01F,M038018O0183FC,M038018O01007,M03801CO0300F,M03801CO0600E,M03IFCN01F61C,M07FC3CN01CC38,M078018N0383F,M078Q0403C,M028P01C01C,L08R030038,L08FC00CM060058FC,L0CFF0IFO03IF8,L0C020C03N01C0038,L0C020C03N0EI01C,L0C021C03M03A6001C,L0C020C03M07060018,L0C020C038J01FC060018,L0C030C03K01F0060018,L0E030E03O07003C,L0IF0IFO07IFC,L0EE70E1FO0730FC,K01C020403O07001C,gH07,,:::::::::::::::::::::::::^FS';
		$zebra_code .= '^FO12,90^GFA,986,986,17,,::M03C07P0C003,L063DC78O0JF8,L07B9C78O0JF8,L03BB87P0E0038,L01BF0EP0JF8,L01BE0EP0JF8,L0JFE06N0E0038,L0JFC0FN0JF8,M07E1IFN0JF98,M0FF9IFN0E0033E,L01FBB87M01LFE,L03B9FC7M01LFE,L07386C7N01JFC,K01E38EC6N01JFC,K01C3CCEEN01C1C38,M03C66EN01JF8,L0JFEEN01JF8,L0KFCN01C1C38,M0E383CN01C1C38,L01C383CN01JF8,L01FF07EN01JFE,L03FF0FFN07KF8,L039F8EF8M07KF8,M03FBC7EO01C018,M0F9F83EO01C03E,L03E1F01EM0LFE,L0F87CP0LFE,L0E07,,::::::::::::::::::::::::::^FS';
		$zebra_code .= '^FO12,200^GFA,986,986,17,,::gH0C,L01839CQ0E,L03C39CQ0E,L03C39C6P0E338,L03839CFP0E7F8,L07KF8M0KF,L077JF8M0JFE,L07039CQ0E3C,L0E679C7P0E783,L0F7JF8O0EF078,K01F7JF8L03LFC,K01E7Q03LFC,K03E7700EP078,K03E77IFO07F1F,K07E77IFO07IF8,K0EE7738EO07IF8,K0CE77FFEN01FE,L0E77FFEN03F0018,L0E7738EN0F7IFC,L0E7738EM01E7IFE,L0E77FFEM0186001E,L0E77FFEO060018,L0E7738ER038,L0EE738ER038,L0EE738ER078,L0EC73FEQ07F,L0FC73FEQ07F,L0F8738EQ03E,L0F06,,:::::::::::::::::::::::::^FS'; 
		$zebra_code .= '^FO50,330^GFA,440,440,8,,:::K01FF8,J01JF,J07JFC,I01LF,I03F8003F8,I0FE07807E,001F80FC03F,003F01FE00F8,007C01FF007C,007803EF003E,00F003C7801E,01E003C7800F,01E00783C0078,03C00783C0078,03C00783C003C,03800783C003C,07800783C001E,07I0783C001E,0FI0701C001E,0FI0703CI0E,0E3NF8E,::0E3C0F01C078E,0E3C0F01E078E,:0E3C0F01E070E,:0F1E0F01E0F0E,0F1E1E01E0F1E,071E1E00E0F1E,079E1E00F0F1E,078F1E00F1E1C,038F3C0079E3C,03CFFC007FE78,01E7FC003FC78,01E3F8003FCF,00F3FI01F9F,0078CK03E,007CL07C,003EL0F8,001F8J01F,I0FCJ07E,I03F8001FC,I01FF01FF,J07JFC,J01JF,K03FF8,,::^FS'; 
		$zebra_code .= '^FO110,325^GFA,4104,4104,72,,:::::::::::::::::007CI0F800FC001FCI07E001F8003C0IFC7CI0F3CK07IFEK0IFC0IFC7JFEJFC007FC007C003EF03IF03IFCK03IF8Q0FJ078J06,007C001F800FC001FCI0FE001F8003C0IFE7C001F7CK07JFK0IFC0IFC7JFEJFE007FE007C003EF03IF03IFCK03IF8Q0FJ078J06,003C001F001FE001FCI0FE003FC003C7IFE7CI0F3CJ01JFEJ07IFC7IFC7JFEKF01IF807E003EF1JF1JFCK0JF8Q0FJ078J078,003E003E001FE001FE001FE003FC003C7EI07CI0F3CJ03F801EJ0FFI07EK07E00F801F83F0FC07E003CF1F8001FN01FCT0FJ078J078,001F007C001FF001FE001FE007FE003CFEI07CI0F3CJ07F001EJ0FEI0FEK03C00F800F87C07E07F003CF3F8003EN03F8T0FJ078J078,I0F80FC003CF001FF001FE0079E003CF8I07CI0F3CJ0FC001EI01FI01F8K03C00F800F8F801F07F803CF3EI03CN03EU0FJ078J078,I0F80F8003CF801FF003FE007BF003CFJ07CI0F3CJ0F8001EI01FI01FL03C00F80079F001F07FC03CF3CI03CN03EU0FI03FFCI078,I07C1FI0787801FF003DE00F9F003DFJ07CI0F3CI01FI01EI03EI01FL03C00F8007BEI0F87BC03CF7CI03CN07CU0FI07FFEI0F8,I03E3EI0783C01E7803DE00F0F003FEJ07CI0F3CI01FI01EI03EI03EL03C00F800F9CI07879E03CFF8I03CN078J01FFN0FI07FFC0IF8,I03F3EI0F83C01F78079E01F0F803FEJ07CI0F3CI01FI01EI03CI03EL03C00F801F3CI07C79F03CFF8I03EN078J07FFCM0FJ07803IF8,I01FFCI0F01C01E78079E01E0F803FEJ07E003F3CI01FI01EI03E0013EL03C00F803F3CI03C78F03CFF8I03F004K078J0FC7EM0FJ07807F0F8,J0FF8I0F03E01E7C0F9E01E07C03FEJ07KF3CI01KFEI03KFEL03C00JFE3CI03C78F83CFF8I01JFK0F8I01F83FM0FJ07807C078,J07FI01E01E01E3E0F1E03C07C03FEJ07KF3CI01KFEI03KFEL03C00JF03CI03C787C3CFF8J0JFCJ0F8I01F01FM0FJ0780F8078,J07FI01E01F01E3E1F1E03C03E03FEJ07C001F3CI01FI01EI03EI03EL03C00F80F83CI03C783E3CFF8L01FCJ0F8I03E00F8L0FJ0780F8078,J03EI01E01F01E1E1E3E07C03E03FEJ07C001F3CI01FI01EI03CI03EL03C00F807C3CI03C781E3CFF8M0FEJ0F8I03C00F8L0FJ0780F0078,J03EI03JF81E1F1E3E07IFE03FEJ07C001F3CI01FI01EI03EI03EL03C00F801E3CI03C781F3CFF8M03EJ078I03C00F8L0FJ0780F0078,J03EI07JF81E0F3E3E0KF03FEJ07C001F3CI01FI01EI03EI03EL03C00F801F1CI03C780F3CFF8M01EJ078I03C0078L0FJ0781F0078,J03EI07JF81E0FFC3E0KF03DFJ07C001F3CJ0FI01EI03EI03FL03C00F800F1EI0787807BCF7CM01FJ07CI03C00F8L0FJ0780F0078,J03EI078007C1E073C3E0FI0F83CFJ07C001F3CJ0F8001EI01FI01FL03C00F800F9FI0F87803FCF3CM01EJ07CI03E00F8L0FJ0780F0078,J03EI0F8003C1E07FC3E1FI0783EF8I07C001F3CJ078001EI01FI01F8K03C00F800F8F801F87803FCFFEM01EJ03EI03E00FM0FJ0780F0078,J03EI0FI03E1E07F83E1EI07C3CFCI07C001F3CJ07EI0FJ0FCI0FCK03C00F800F8FC03F07801FCF3FM03EJ03F8001F03FM0FJ07C0F8078,J03EI0FI01E1E03F83E3EI03C3C7EI07C001F3CJ03FI0FJ0FEI07EK03C00F800F87E07E07800FCF1F8L03EJ01FCI0F83EM078I07C07C078,J03E001FI01E1E03F03E3EI03C3C3IFC7C001F3CJ01IFC78I07IFC3IFC003C00F800F81IFC07800FCF0JF1JFCK0JF8IFE3BEJ03CI07FC7IF8,J03E003EJ0F1F01F03E7CI01E3C0IFE7C001F7CK07FFE1FFE01IFC0IFE003C00F800FC07FE0078007DF03IF3JF8K01IF83FF83BEK0IF03FE1IF8,J01E001EJ0F1E01E01C38I01E3C03FFC38I0F3CK07FFC0FFE00IF803FFC003C00FI07803FC0078003CF00IF3JFM0IF00FF019CK07FF01FC0IF8,lG0C,l018,:l01,:,::::::::^FS'; 
		/*
		************* FONTS UNDER IMAGES *******************
		*/
		$zebra_code .= '^FO55,60,'; 
		$zebra_code .= '^CF 0,26'; 
		$zebra_code .= '^FDPN'; 
		$zebra_code .= '^FS'; 
		
		$zebra_code .= '^FO45,130,'; 
		$zebra_code .= '^CF 0,26';
		$zebra_code .= "^FDQ' TY";
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO25,240,';
		$zebra_code .= '^CF 0,26';
		$zebra_code .= '^FDREMARKS';
		$zebra_code .= '^FS';
	

		/*
		************* Borders *******************
		*/
		$zebra_code .= '^FO2,14';
		$zebra_code .= '^GB 140,73,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF0,20';
		
		$zebra_code .= '^FO2,85';
		$zebra_code .= '^GB 140,73,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO2,156';
		$zebra_code .= '^GB 140,147,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO2,301';
		$zebra_code .= '^GB 747,110,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO140,14';
		$zebra_code .= '^GB 609,73,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO140,85';
		$zebra_code .= '^GB 609,74,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO140,157';
		$zebra_code .= '^GB 609,146,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		/*
		************* Value *******************
		*/
        /* Do not delete - Used to check all the available FNT in the printer */
		//$zebra_code .= '^WDR:.FNT*'; 
		
		/* Select font from all the available fonts in the computer */
		$zebra_code .= '^CWA,E:L.FNT';
                
		$zebra_code .= '^FO180,60,';
		$zebra_code .= '^AAN,36,0';
		$zebra_code .= '^FD'.$pn;
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO180,133,';
		$zebra_code .= '^AAN,36,0';
		$zebra_code .= '^FD'.$qty.'pcs';
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO180,238,';
		$zebra_code .= '^AAN,36,0';
		$zebra_code .= '^FD'.$remarks;
		$zebra_code .= '^FS';
		/*
		************* zebra end command ^XZ - NOTE: ZPL code always end with this. *******************
		*/
		$zebra_code .= '^XZ';
		return $zebra_code;
	}
	
	/* YPICS CN_Ypics1 */
	function get_all_item_name(){
		require_once('../class/cn_ypics1.php');
		$CNYPICS = new CNYPICS;
		$p = $_POST;
		$return = array();
		$fields = array('NAME');
		$table_name = "vw_c3_label";
		$where = "";
		$order = "";
		$result = $CNYPICS->select_record($fields,$table_name,$where,$order);
		while($row = mssql_fetch_array($result)){
			$return['item_name'][] = $row['NAME'];
		}
		echo json_encode($return);
	}
	
	function encodeURIComponent($str) {
		$revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
		return strtr(rawurlencode($str), $revert);
	}
    
	/* function for displaying record */
	function load_records(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'tbl_records';
		$joins 	   	= '';
		$sql_where 	= '';
		$sql_order 	= 'ORDER BY pkid';
		$sql_limit 	= '';
		$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$ctr = 0;
		while($row = mysqli_fetch_array($result)){
			$return['pkid'][$ctr] 		= $row['pkid'];
			$return['name'][$ctr] 		= $row['name'];
			$return['lastname'][$ctr] 	= $row['lastname'];
			$return['address'][$ctr] 	= $row['address'];
			$return['remarks'][$ctr] 	= $row['remarks'];
			$ctr++;
		}
		$return['ctr']	  = $ctr;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	/* function for adding record */
	function add_new_record(){
		require_once('../class/c3.php'); 
		$return 		= $_POST; 
		$result 		= "";
		$table   		= "tbl_records"; //table name
		$array_fields 	= array('name','lastname','address','remarks'); //table fields
		$array_values 	= array($return['txt_name'],$return['txt_lastname'],$return['txt_address'],$return['txt_remarks']); //values to be saved
		$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
		$return["result"] = json_encode($result); //return the the serialize values
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	/* function for fetching record */
	function update_fetch_record(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'tbl_records';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `pkid` ='.$return['pkid'];
		$sql_order 	= 'ORDER BY pkid';
		$sql_limit 	= '';
		$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$ctr = 0;
		while($row = mysqli_fetch_array($result)){
			$return['pkid2'][$ctr] 		= $row['pkid'];
			$return['name'][$ctr] 		= $row['name'];
			$return['lastname'][$ctr] 	= $row['lastname'];
			$return['address'][$ctr] 	= $row['address'];
			$return['remarks'][$ctr] 	= $row['remarks'];
			$ctr++;
		}
		$return['ctr'] = $ctr;
		$return["result"] = json_encode($result); //return the the serialize values
		echo json_encode($return);//json encode since I used a dataType json before passing the serialized values here
	}
	
	/* function for updating record */
	function update_record(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$result = "";
		$table        = "tbl_records";
		$array_fields = array('name','lastname','address','remarks');
		$array_values = array($return['txt_name_update'],$return['txt_lastname_update'],$return['txt_address_update'],$return['txt_remarks_update']);
		$pkid = $return['txt_pkid'];
		$result = C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$return["result"] = json_encode($result); //return the the serialize values
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	/* function for deleting a record */
	function delete_record(){
		require_once('../class/c3.php'); 
		$return 	= $_POST;
		$result 	= "";
		$table   	= "tbl_records";
		$pkid 		= $return['pkid'];
		$result 	= C3::getInstance()->delete_query($table,$pkid);
		$return["result"] = json_encode($result); //return the the serialize values
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
?>