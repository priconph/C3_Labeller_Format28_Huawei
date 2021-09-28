<?php
	if(is_ajax()) {
		if(isset($_POST["action"]) && !empty($_POST["action"])) {
			$action = $_POST["action"];
			switch($action) {
				/* c3 */
				/* all format */
				case "check_existing_item_name_and_lotno"			: check_existing_item_name_and_lotno(); break; 
				
				/* format1 */
				case "save_new_c3_label"							: save_new_c3_label(); break; 
				case "load_selected_label_info"						: load_selected_label_info(); break;
				case "delete_label"									: delete_label(); break;
				case "reprint_label"								: reprint_label(); break;
				
				/* format2 */
				case "save_new_c3_label_format2"					: save_new_c3_label_format2(); break;
				case "load_selected_label_info_format2"				: load_selected_label_info_format2(); break;
				case "delete_label_format2"							: delete_label_format2(); break;
				case "reprint_label_format2"						: reprint_label_format2(); break;
				
				/* format3 */
				case "save_new_c3_label_format3"					: save_new_c3_label_format3(); break;
				case "load_selected_label_info_format3"				: load_selected_label_info_format3(); break;
				case "delete_label_format3"							: delete_label_format3(); break;
				case "reprint_label_format3"						: reprint_label_format3(); break;
				
				/* format4 */
				case "check_existing_item_name_and_lotno_format4"	: check_existing_item_name_and_lotno_format4(); break; 
				case "save_new_c3_label_format4"					: save_new_c3_label_format4(); break; 
				case "load_selected_label_info_format4"				: load_selected_label_info_format4(); break;
				case "delete_label_format4"							: delete_label_format4(); break;
				case "reprint_label_format4"						: reprint_label_format4(); break;
				
				/* format5 */
				case "check_existing_item_name_and_lotno_format5"	: check_existing_item_name_and_lotno_format5(); break; 
				case "save_new_c3_label_format5"					: save_new_c3_label_format5(); break; 
				case "load_selected_label_info_format5"				: load_selected_label_info_format5(); break;
				case "delete_label_format5"							: delete_label_format5(); break;
				case "reprint_label_format5"						: reprint_label_format5(); break;
				
				/* format 6 */
				case "check_existing_item_name_and_lotno_format6"	: check_existing_item_name_and_lotno_format6(); break; 
				case "save_new_c3_label_format6"					: save_new_c3_label_format6(); break;
				case "load_selected_label_info_format6"				: load_selected_label_info_format6(); break;
				case "delete_label_format6"							: delete_label_format6(); break;
				case "reprint_label_format6"						: reprint_label_format6(); break;
				
				/* format7 */
				case "check_existing_item_name_and_lotno_format7"	: check_existing_item_name_and_lotno_format7(); break; 
				case "save_new_c3_label_format7"					: save_new_c3_label_format7(); break; 
				case "load_selected_label_info_format7"				: load_selected_label_info_format7(); break;
				case "delete_label_format7"							: delete_label_format7(); break;
				case "reprint_label_format7"						: reprint_label_format7(); break;

				/* format7 */
				case "save_new_c3_label_format7_2"					: save_new_c3_label_format7_2(); break; 
				case "reprint_label_format7_2"						: reprint_label_format7_2(); break;

				
				/* format8 */
				case "check_existing_item_name_and_lotno_format8"	: check_existing_item_name_and_lotno_format8(); break; 
				case "save_new_c3_label_format8"					: save_new_c3_label_format8(); break; 
				case "load_selected_label_info_format8"				: load_selected_label_info_format8(); break;
				case "delete_label_format8"							: delete_label_format8(); break;
				case "reprint_label_format8"						: reprint_label_format8(); break;
				
				/* format9 */
				case "check_existing_item_name_and_lotno_format9"	: check_existing_item_name_and_lotno_format9(); break; 
				case "save_new_c3_label_format9"					: save_new_c3_label_format9(); break; 
				case "load_selected_label_info_format9"				: load_selected_label_info_format9(); break;
				case "delete_label_format9"							: delete_label_format9(); break;
				case "reprint_label_format9"						: reprint_label_format9(); break;
				
				/* format10 */
				case "check_existing_item_name_and_lotno_format10"	: check_existing_item_name_and_lotno_format10(); break; 
				case "save_new_c3_label_format10"					: save_new_c3_label_format10(); break; 
				case "load_selected_label_info_format10"			: load_selected_label_info_format10(); break;
				case "delete_label_format10"						: delete_label_format10(); break;
				case "reprint_label_format10"						: reprint_label_format10(); break;
				
				/* format11 */
				case "check_existing_item_name_and_lotno_format11"	: check_existing_item_name_and_lotno_format11(); break; 
				case "save_new_c3_label_format11"					: save_new_c3_label_format11(); break; 
				case "load_selected_label_info_format11"			: load_selected_label_info_format11(); break;
				case "delete_label_format11"						: delete_label_format11(); break;
				case "reprint_label_format11"						: reprint_label_format11(); break;
				
				/* format13 */
				case "check_existing_item_name_and_lotno_format13"	: check_existing_item_name_and_lotno_format13(); break;
				case "save_new_c3_label_format13"					: save_new_c3_label_format13(); break; 
				case "load_selected_label_info_format13"			: load_selected_label_info_format13(); break;
				case "delete_label_format13"						: delete_label_format13(); break;
				case "reprint_label_format13"						: reprint_label_format13(); break;
				
				/* format14 */
				case "check_existing_item_name_and_lotno14"			: check_existing_item_name_and_lotno14(); break;
				case "save_new_c3_label14"							: save_new_c3_label14(); break; 
				case "load_selected_label_info14"					: load_selected_label_info14(); break;
				case "delete_label14"								: delete_label14(); break;
				case "reprint_label14"								: reprint_label14(); break;
				
				/* format15 */
				case "check_existing_item_name_and_lotno15"			: check_existing_item_name_and_lotno15(); break;
				case "save_new_c3_label15"							: save_new_c3_label15(); break; 
				case "load_selected_label_info15"					: load_selected_label_info15(); break;
				case "delete_label15"								: delete_label15(); break;
				case "reprint_label15"								: reprint_label15(); break;

				/* format16 */
				case "check_existing_item_name_and_lotno16"			: check_existing_item_name_and_lotno16(); break;
				case "save_new_c3_label16"							: save_new_c3_label16(); break; 
				case "load_selected_label_info16"					: load_selected_label_info16(); break;
				case "delete_label16"								: delete_label16(); break;
				case "reprint_label16"								: reprint_label16(); break;

				/* format17 */
				case "check_existing_item_name_and_lotno17"			: check_existing_item_name_and_lotno17(); break;
				case "save_new_c3_label17"							: save_new_c3_label17(); break; 
				case "load_selected_label_info17"					: load_selected_label_info17(); break;
				case "delete_label17"								: delete_label17(); break;
				case "reprint_label17"								: reprint_label17(); break;
				
				/* format18 - UL Label Format (70mm x 20mm) */
				case "check_existing_item_name_and_lotno18"			: check_existing_item_name_and_lotno18(); break;
				case "save_new_c3_label18"							: save_new_c3_label18(); break; 
				case "load_selected_label_info18"					: load_selected_label_info18(); break;
				case "delete_label18"								: delete_label18(); break;
				case "reprint_label18"								: reprint_label18(); break;
				
				
				/* format19 */
				case "save_new_c3_label19"							: save_new_c3_label19(); break; 
				case "delete_label"									: delete_label(); break;
				case "reprint_label"								: reprint_label(); break;
				
				/* format20 */
				case "check_existing_item_name_and_lotno_format20"	: check_existing_item_name_and_lotno_format20(); break; 
				case "save_new_c3_label_format20"					: save_new_c3_label_format20(); break; 
				case "load_selected_label_info_format20"			: load_selected_label_info_format20(); break;
				case "delete_label_format20"						: delete_label_format20(); break;
				case "reprint_label_format20"						: reprint_label_format20(); break;

				
				/* CN Default Values */
				case "get_cn_default_value"							: get_cn_default_value(); break;
				
				
				/* settings */
				case "get_sticker_alignment"						: get_sticker_alignment(); break; 
				case "get_sticker_alignment_ul"						: get_sticker_alignment_ul(); break; 
				case "update_sticker_alignment_ul"					: update_sticker_alignment_ul(); break; 
				case "update_sticker_alignment"						: update_sticker_alignment(); break; 
				case "get_sticker_alignment_printing"				: get_sticker_alignment_printing(); break; 
				
				/* YPICS CN_Ypics1 */
				case "get_all_item_name"							: get_all_item_name(); break;
				case "get_item_code"								: get_item_code(); break;
				case "get_item_name"								: get_item_name(); break;
				case "save_new_default_values"						: save_new_default_values(); break;
				case "get_default_value_details"					: get_default_value_details(); break;
				case "update_default_values"						: update_default_values(); break;
				case "search_item"									: search_item(); break;
				case "search_item_ts"								: search_item_ts(); break;
				case "search_item_cn"								: search_item_cn(); break;
				case "get_work_week"								: get_work_week(); break;
				case "get_all_item_name_by_po"						: get_all_item_name_by_po(); break;
				
				/* do not edit below */
				case "load_records" 								: load_records(); break; 
				case "add_new_record" 								: add_new_record(); break; 
				case "update_fetch_record" 							: update_fetch_record(); break; 
				case "update_record" 								: update_record(); break; 
				case "delete_record" 								: delete_record(); break; 
			}
		}
	}

	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}
	
	/* C3 */
	
	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 1      *********************/
	/***************************************************************/
	/***************************************************************/

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
	
	function generate_alternate_lot_no_extension($number,$lot_extension){
		/* remove all numbers in lot number */
		$letter 	   = preg_replace('/[0-9]/i','',$lot_extension);
		$number_ctr	   = preg_replace('/[^0-9]/','',$lot_extension);
		if($number%2 ==0){
			$letter++;
		}
		if($number != 1){
			$number_ctr = $number_ctr + ($number-1);
		}
		$new_lot_no_extension = str_pad(($number_ctr.$letter), 3, "0", STR_PAD_LEFT);
		return $new_lot_no_extension;
	}
	
	function save_new_c3_label(){
		require_once('../class/c3.php');
		$return 		= $_POST; 
		$print_qty      = $return['txt_print_qty'];
		$return['query'] = '';
		$return['label'] = array();
		for($x=0;$x<$print_qty;$x++){
			if(isset($return['chk_alternate_lot'])){
				$lotno_extension     = generate_alternate_lot_no_extension( $x+1, $return['txt_lot_no_count'] );
			}else{
				if($x==0){
					$lotno_extension = $return['txt_lot_no_count'];
				}else{
					$lotno_extension = generate_new_lot_no_extension($lotno_extension);
				}
			}
			$return['checking']['lotno_extension'][] 	= $lotno_extension;
			$result 		= "";
			$table   		= "tbl_format1"; //table name
			$array_fields 	= array('item_name','qty','lotno','lotno_extension','order_no','remarks','date_encoded','lastupdate','username'); //table fields
			$array_values 	= array($return['txt_itemname'],$return['txt_qty'],$return['txt_lot_no'],$lotno_extension,$return['txt_order_no'],$return['txt_remarks'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			// $script 		= C3::getInstance()->insert_query_test($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			// $return["script"] = $script; //return the the serialize values
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
		// $array_pkid = array('54511');
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
		// $array_pkid = array('54511');
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
		$space 			= get_sticker_alignment_printing();
		$left_space 	= $space['left_space'];
		$top_space 		= $space['top_space'];
		$top_item_name 	= $space['top_item_name'];
		$top_qty 		= $space['top_qty'];
		$top_orderno	= $space['top_orderno'];
		$top_lotno 		= $space['top_lotno'];
		$font_style_name = $space['font_style_name'];
		
		/*
		************* zebra start command ^XA - NOTE: ZPL code always start with this. *******************
		*/
		$zebra_code  = '^XA';
		/*
		************* IMAGES *******************
		*/
		$zebra_code .= '^FO'.(12+$left_space).','.(21+$top_space).'^GFA,986,986,17,,::::N0DFC8P0C,M07FFC8O01C,M03C038P0C,M03801CO01F,M038018O0183FC,M038018O01007,M03801CO0300F,M03801CO0600E,M03IFCN01F61C,M07FC3CN01CC38,M078018N0383F,M078Q0403C,M028P01C01C,L08R030038,L08FC00CM060058FC,L0CFF0IFO03IF8,L0C020C03N01C0038,L0C020C03N0EI01C,L0C021C03M03A6001C,L0C020C03M07060018,L0C020C038J01FC060018,L0C030C03K01F0060018,L0E030E03O07003C,L0IF0IFO07IFC,L0EE70E1FO0730FC,K01C020403O07001C,gH07,,:::::::::::::::::::::::::^FS';
		$zebra_code .= '^FO'.(12+$left_space).','.(90+$top_space).'^GFA,986,986,17,,::M03C07P0C003,L063DC78O0JF8,L07B9C78O0JF8,L03BB87P0E0038,L01BF0EP0JF8,L01BE0EP0JF8,L0JFE06N0E0038,L0JFC0FN0JF8,M07E1IFN0JF98,M0FF9IFN0E0033E,L01FBB87M01LFE,L03B9FC7M01LFE,L07386C7N01JFC,K01E38EC6N01JFC,K01C3CCEEN01C1C38,M03C66EN01JF8,L0JFEEN01JF8,L0KFCN01C1C38,M0E383CN01C1C38,L01C383CN01JF8,L01FF07EN01JFE,L03FF0FFN07KF8,L039F8EF8M07KF8,M03FBC7EO01C018,M0F9F83EO01C03E,L03E1F01EM0LFE,L0F87CP0LFE,L0E07,,::::::::::::::::::::::::::^FS';
		$zebra_code .= '^FO'.(12+$left_space).','.(160+$top_space).'^GFA,986,986,17,,::M06,K0F078K06,K0F03CK06,K0361CK060707C7C07F,L0E0C601KF87C7C0FF8,L0JF01KF83E300E38,J018JFI060E003E301C1C,J01FC18J060E0037301C1C,K0F818J060E0037301C1C,K07818J070C0033B01C1C,K03818CI031C0033B01C0C,K03019EI039C0031F01C0C,K033FFEI01F80031F01C1C,K073FFEI01F80031F01C1C,J01E018K0FI030F01C1C,J01E018K0F80030F01C1C,K06018J03FE0030700E180E,K060183I079F8030700F380E,K060187801F0FF07C3007F00E,K07JF81FC03F07C3003E00E,K07JF81FI0E,K06,,::::::::::::::::::::::::::::::::^FS'; 
		$zebra_code .= '^FO'.(12+$left_space).','.(230+$top_space).'^GFA,986,986,17,,::gH0C,L01839CQ0E,L03C39CQ0E,L03C39C6P0E338,L03839CFP0E7F8,L07KF8M0KF,L077JF8M0JFE,L07039CQ0E3C,L0E679C7P0E783,L0F7JF8O0EF078,K01F7JF8L03LFC,K01E7Q03LFC,K03E7700EP078,K03E77IFO07F1F,K07E77IFO07IF8,K0EE7738EO07IF8,K0CE77FFEN01FE,L0E77FFEN03F0018,L0E7738EN0F7IFC,L0E7738EM01E7IFE,L0E77FFEM0186001E,L0E77FFEO060018,L0E7738ER038,L0EE738ER038,L0EE738ER078,L0EC73FEQ07F,L0FC73FEQ07F,L0F8738EQ03E,L0F06,,:::::::::::::::::::::::::^FS'; 
		$zebra_code .= '^FO'.(370+$left_space).','.(95+$top_space).'^GFA,928,928,16,,:::::::O0F8001FC07FF,O0F8003FE07FF,O07I038E0673,O07I07070673,O07I0707007,::O07I0703007,:O07I0707007,:::O07060386007,O070E03CE007,O0FFE01FC01F8,O0FFE00F801F8,,::::::::::N01F1F01FC,N01F1F03FE,O0F8C038E,O0F8C0707,O0DCC0707,:O0CEC0707,O0CEC0703,O0C7C0703,O0C7C0707,:O0C3C0707,:O0C1C0386038,O0C1C03CE038,N01F0C01FC038,N01F0C00F8038,,::::^FS'; 
		$zebra_code .= '^FO'.(585+$left_space).','.(232+$top_space).'^GFA,986,986,17,,:::::I06038O0EO01C,I06078O0EN0CFD83,I0607CO0C07L0FF9FF8,I060EEL01KF8K0F81FF8,I06CE7L01KF8K0C0183,007FFC38M03FN0C0183,007FF87EM07FCM0C0183,I067FFEM0FDFM0C1D83,I0EEFF6L01CC7CL0IF83,I0FC18M078C3FL0IF83,I0JFCL0KFL0C0183,001JFCK03CIFM0C0183,001E318CK038C06M0C0183,003E338CM0FFEM0C0F83,00363FFCM0FFEM0IF83,00763FFCM0C06M0IF83,006633CN0FFEM0C018F,I0637EN0FFEM0C018F,I060E7N0C067L0C018,I061C3EK03KF8K0C018,I06781EK03KF8M018,I06F00CY018,J0C,,::::::::::::::::::::::::::::^FS'; 
		$zebra_code .= '^FO'.(5+$left_space).','.(320+$top_space).'^GFA,5184,5184,72,,::::::::::::::::::::::K0FFE,J07IF8,I01JFE,I03F3E3F,I07C3F0F8,I0F87F87C,001F0FF83E,001E0F381E001EI0703C0038I018007I08007FF9CI0E18J0IF0CI03FFC00MFE3IF8003FF801I0181006FFC0IFCL03FFCN06N03,003C0F380FI0FI0F07E007CI07C00FC01E03IF3CI0E3CI03IF9EI07FFE07NF7JF007FFC078001C380IFE3IFEL0IFCN0EI06J07,003C0F38078007801C06600FEI0FC01FC03E0FF1F1EI0E3CI078I0E001FF860FJ07FE67JF81F87E07C003C781FA0078N03EQ0EI06J03,00780E3C03800380180E700FEI0FC01DC03E0F8I0EI0E3CI0FJ0E003FI01EJ01F003800783C01707E007C783EI07O078Q06I06J03,00700F1C03C003C0700C38062001FC038E03E1EI01EI0E3C001CJ0E0038I03CK0E0038003C78003873803C783J06O0ER06I0EJ07,0073KF3C001E0E018180430031C070603E38I03CI0E38003CJ0C0078I038K0E003C0018FI03861C01C786J06N01EK07FK06007FE07FF,0077KFBCI0F1E0381C0430031C0F0703E38I01CI0E380038J0E0078I07L0E003C0038FI03C61E03C78EJ07N01CJ03FFCJ06007FE1IF,0077KF9CI079C0700C0638031C0E0303E3CI01E001E38003CJ0E0078I07L0E003C0031CI03C70F07C78EJ078M01CJ07C3EJ06003F03E4F,00770E1C39CI03F80700C0718061C0E0383E3CI03JFE38003JF0C00FF5FC7L0E003IFE1CI03C70787C78EJ03IFK01CJ0F00FJ06I0E03807,00778E1C7BCI01F806006070C0E1C1C01C3E3CI01JFE38003JF0C00IF1E7L0E003IFC1CI03C70383C78EJ01IFCJ01CI01E00F8I06I0E07007,00778E1C7BCJ0F00F006070C0E1C3C01C3E38I01JFE38003C7FE0C00E3E0C3L0E003IF81CI03C701C3C78EK07FFEJ01CI01C00F8I06I0607007,00739E1C7BCJ0F01FB0F070E1C1C3C19C1E38I01CI0E380038J0C006J03L0E00380181CI03C700E1C78EM01FJ01CI01C0078I06I0607007,007B9E1E7BCJ0F01JF070F181C7IFE1E3CI01CI0E38003CJ0E006J038K0E00380070EI038700738786N0F8I01CI01C0078I07I0607007,003B9E0FF78J0F03C007CF07781CF1C3F1E1CI01CI0E38001CJ0E007J038K0E00380038E800787003F8787N078J0EJ0E00F8I07I06070038,003FFC0IF8J0F07I03CF07F81CEI078E1EI01CI0E3C001EJ0F0038I01CK0E00780038F800B07001F87878M0FK0FJ0E00FJ078006070038,001FFC07FFK0F07I01CF03F01CEI038E0F8001CI0E3C001FJ0F803CI01EK0E007I0387C00E07001F87C3EL01FK07CI0F00E39C07C00707C0F98,001FF807FEJ01E0FI01FF01E01FCI03FE03FE51CI0E3CI07EFF07CF7EJ0FBFC00E0078003C3CC3C07I0FC7C0IFC3IFCK01FFDC7FBE7EE03FFC7E1IF9C,I0FE001FCJ01E0EJ0FE01E01FCI01FE00IF1CI0E3CI01IF81FFC7FFE07IF00E0038003C1IF807I0787803FFE3IF8L03FFC1FF839C003FC1E07FF18,I07CI0F8K0C0CQ038J0FJ0181CI0E38J0102001N0406004T02I0183g08036I0C,I07E001F,I01FC0FE,J07IFC,J03IF,K0FFC,K03F8,,::::::::::::::::^FS'; 
		/*
		************* FONTS UNDER IMAGES *******************
		*/
		$zebra_code .= '^FO'.(45+$left_space).','.(60+$top_space);
		$zebra_code .= '^CF 0,26'; 
		$zebra_code .= '^FDITEM'; 
		$zebra_code .= '^FS'; 
		
		$zebra_code .= '^FO'.(45+$left_space).','.(130+$top_space); 
		$zebra_code .= '^CF 0,26';
		$zebra_code .= "^FDQ' TY";
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO'.(12+$left_space).','.(200+$top_space);
		$zebra_code .= '^CF 0,26';
		$zebra_code .= '^FDORDER NO.';
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO'.(18+$left_space).','.(270+$top_space);
		$zebra_code .= '^CF 0,26';
		$zebra_code .= '^FDREMARKS';
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO'.(583+$left_space).','.(271+$top_space);
		$zebra_code .= '^CF 0,26';
		$zebra_code .= '^FDINSPECTION';
		$zebra_code .= '^FS';
		/*
		************* Borders *******************
		*/
		$zebra_code .= '^FO'.(2+$left_space).','.(14+$top_space);
		$zebra_code .= '^GB 140,73,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF0,20';
		
		$zebra_code .= '^FO'.(2+$left_space).','.(85+$top_space);
		$zebra_code .= '^GB 140,73,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO'.(2+$left_space).','.(156+$top_space);
		$zebra_code .= '^GB 140,74,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO'.(2+$left_space).','.(228+$top_space);
		$zebra_code .= '^GB 140,75,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO'.(2+$left_space).','.(301+$top_space);
		$zebra_code .= '^GB 550,110,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		/************** Right Side **************/
		$zebra_code .= '^FO'.(140+$left_space).','.(14+$top_space);
		$zebra_code .= '^GB 599,73,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO'.(140+$left_space).','.(85+$top_space);
		$zebra_code .= '^GB 214,74,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO'.(352+$left_space).','.(85+$top_space);
		$zebra_code .= '^GB 150,74,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO'.(500+$left_space).','.(85+$top_space);
		$zebra_code .= '^GB 239,74,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO'.(140+$left_space).','.(157+$top_space);
		$zebra_code .= '^GB 599,73,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO'.(140+$left_space).','.(228+$top_space);
		$zebra_code .= '^GB 412,75,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO'.(550+$left_space).','.(228+$top_space);
		$zebra_code .= '^GB 189,68,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO'.(550+$left_space).','.(294+$top_space);
		$zebra_code .= '^GB 189,117,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		/*
		************* Value *******************
		*/
        /* Do not delete - Used to check all the available FNT in the printer */
		//$zebra_code .= '^WDR:.FNT*'; 
		
		/* Select font from all the available fonts in the computer */
		$zebra_code .= '^CWA,E:'.$font_style_name.'.FNT';
                
		// $zebra_code .= '^FO'.(180+$left_space).','.(60+$top_space);
		$zebra_code .= '^FO'.(180+$left_space).','.($top_item_name+$top_space);
		$zebra_code .= '^AAN,41,0';
		$zebra_code .= '^FD'.$item_name;
		$zebra_code .= '^CFA,35';
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO'.(180+$left_space).','.(133+$top_space);
		// $zebra_code .= '^FO'.(180+$left_space).','.($top_qty+$top_space);
		$zebra_code .= '^AAN,36,0';
		$zebra_code .= '^FD'.$qty.'pcs';
		$zebra_code .= '^FS';
		
		// $zebra_code .= '^FO'.(530+$left_space).','.(133+$top_space);
		$zebra_code .= '^FO'.(530+$left_space).','.($top_lotno+$top_space);
		$zebra_code .= '^AAN,36,0';
		$zebra_code .= '^FD'.$lotno.'-'.$lotno_extension;
		$zebra_code .= '^FS';
		
		// $zebra_code .= '^FO'.(180+$left_space).','.(206+$top_space);
		$zebra_code .= '^FO'.(180+$left_space).','.($top_orderno+$top_space);
		$zebra_code .= '^AAN,36,0';
		$zebra_code .= '^FD'.$order_no;
		$zebra_code .= '^FS';
		if($remarks == "R-Pb" || $remarks == "FTPb"){
			$zebra_code .= "
							^FO ".( 175 + $left_space ).",".( 235 + $top_space )."
							^GB 90,60,2,B
							^FS
							^CF 0,20
						   ";
		}
		if($remarks == "K1NA09E00148 1AV4J11B9690G"){
			$top_space = $top_space - 25;
			$left_space = $left_space - 20;
			$zebra_code .= '^FO'.(180+$left_space).','.(279+$top_space);
		    $zebra_code .= '^AAN,36,0';
		    $zebra_code .= '^FDK1NA09E00148';
            $zebra_code .= '^FS';

		    $zebra_code .= '^FO'.(180+$left_space).','.(310+$top_space);
		    $zebra_code .= '^AAN,36,0';
		    $zebra_code .= '^FD1AV4J11B9690G';
		    $zebra_code .= '^FS';
			
			// $top_space = $top_space - 25;
			// $left_space = $left_space - 20;
			// $zebra_code .= '^FO'.(180+$left_space).','.(261+$top_space);
		    // $zebra_code .= '^AAN,36,0';
		    // $zebra_code .= '^FDK1NA09E00148';
            // $zebra_code .= '^FS';

		    // $zebra_code .= '^FO'.(180+$left_space).','.(292+$top_space);
		    // $zebra_code .= '^AAN,36,0';
		    // $zebra_code .= '^FD1AV4J11B9690G';
		    // $zebra_code .= '^FS';
		}else{
            // $zebra_code .= '^FO'.(180+$left_space).','.(279+$top_space);
		    // $zebra_code .= '^AAN,36,0';
		    // $zebra_code .= '^FD'.$remarks;
		    // $zebra_code .= '^FS';
			
            $zebra_code .= '^FO'.(180+$left_space).','.(261+$top_space);
		    $zebra_code .= '^AAN,36,0';
		    $zebra_code .= '^FD'.$remarks;
		    $zebra_code .= '^FS';
		}
		
		
		
		
		/*
		************* zebra end command ^XZ - NOTE: ZPL code always end with this. *******************
		*/
		$zebra_code .= '^XZ';
		return $zebra_code;
	}
	
	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 2      *********************/
	/***************************************************************/
	/***************************************************************/
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
		$space 		= get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$font_style_name 	= $space['font_style_name'];
		/*
		************* zebra start command ^XA - NOTE: ZPL code always start with this. *******************
		*/
		$zebra_code  = '^XA';
		/*
		************* IMAGES *******************
		*/
		$zebra_code .= '^FO'.(12+$left_space).','.(21+$top_space).'^GFA,986,986,17,,::::N0DFC8P0C,M07FFC8O01C,M03C038P0C,M03801CO01F,M038018O0183FC,M038018O01007,M03801CO0300F,M03801CO0600E,M03IFCN01F61C,M07FC3CN01CC38,M078018N0383F,M078Q0403C,M028P01C01C,L08R030038,L08FC00CM060058FC,L0CFF0IFO03IF8,L0C020C03N01C0038,L0C020C03N0EI01C,L0C021C03M03A6001C,L0C020C03M07060018,L0C020C038J01FC060018,L0C030C03K01F0060018,L0E030E03O07003C,L0IF0IFO07IFC,L0EE70E1FO0730FC,K01C020403O07001C,gH07,,:::::::::::::::::::::::::^FS';
		$zebra_code .= '^FO'.(12+$left_space).','.(90+$top_space).'^GFA,986,986,17,,::M03C07P0C003,L063DC78O0JF8,L07B9C78O0JF8,L03BB87P0E0038,L01BF0EP0JF8,L01BE0EP0JF8,L0JFE06N0E0038,L0JFC0FN0JF8,M07E1IFN0JF98,M0FF9IFN0E0033E,L01FBB87M01LFE,L03B9FC7M01LFE,L07386C7N01JFC,K01E38EC6N01JFC,K01C3CCEEN01C1C38,M03C66EN01JF8,L0JFEEN01JF8,L0KFCN01C1C38,M0E383CN01C1C38,L01C383CN01JF8,L01FF07EN01JFE,L03FF0FFN07KF8,L039F8EF8M07KF8,M03FBC7EO01C018,M0F9F83EO01C03E,L03E1F01EM0LFE,L0F87CP0LFE,L0E07,,::::::::::::::::::::::::::^FS';
		$zebra_code .= '^FO'.(12+$left_space).','.(200+$top_space).'^GFA,986,986,17,,::gH0C,L01839CQ0E,L03C39CQ0E,L03C39C6P0E338,L03839CFP0E7F8,L07KF8M0KF,L077JF8M0JFE,L07039CQ0E3C,L0E679C7P0E783,L0F7JF8O0EF078,K01F7JF8L03LFC,K01E7Q03LFC,K03E7700EP078,K03E77IFO07F1F,K07E77IFO07IF8,K0EE7738EO07IF8,K0CE77FFEN01FE,L0E77FFEN03F0018,L0E7738EN0F7IFC,L0E7738EM01E7IFE,L0E77FFEM0186001E,L0E77FFEO060018,L0E7738ER038,L0EE738ER038,L0EE738ER078,L0EC73FEQ07F,L0FC73FEQ07F,L0F8738EQ03E,L0F06,,:::::::::::::::::::::::::^FS'; 
		$zebra_code .= '^FO'.(50+$left_space).','.(330+$top_space).'^GFA,440,440,8,,:::K01FF8,J01JF,J07JFC,I01LF,I03F8003F8,I0FE07807E,001F80FC03F,003F01FE00F8,007C01FF007C,007803EF003E,00F003C7801E,01E003C7800F,01E00783C0078,03C00783C0078,03C00783C003C,03800783C003C,07800783C001E,07I0783C001E,0FI0701C001E,0FI0703CI0E,0E3NF8E,::0E3C0F01C078E,0E3C0F01E078E,:0E3C0F01E070E,:0F1E0F01E0F0E,0F1E1E01E0F1E,071E1E00E0F1E,079E1E00F0F1E,078F1E00F1E1C,038F3C0079E3C,03CFFC007FE78,01E7FC003FC78,01E3F8003FCF,00F3FI01F9F,0078CK03E,007CL07C,003EL0F8,001F8J01F,I0FCJ07E,I03F8001FC,I01FF01FF,J07JFC,J01JF,K03FF8,,::^FS'; 
		$zebra_code .= '^FO'.(110+$left_space).','.(325+$top_space).'^GFA,4104,4104,72,,:::::::::::::::::007CI0F800FC001FCI07E001F8003C0IFC7CI0F3CK07IFEK0IFC0IFC7JFEJFC007FC007C003EF03IF03IFCK03IF8Q0FJ078J06,007C001F800FC001FCI0FE001F8003C0IFE7C001F7CK07JFK0IFC0IFC7JFEJFE007FE007C003EF03IF03IFCK03IF8Q0FJ078J06,003C001F001FE001FCI0FE003FC003C7IFE7CI0F3CJ01JFEJ07IFC7IFC7JFEKF01IF807E003EF1JF1JFCK0JF8Q0FJ078J078,003E003E001FE001FE001FE003FC003C7EI07CI0F3CJ03F801EJ0FFI07EK07E00F801F83F0FC07E003CF1F8001FN01FCT0FJ078J078,001F007C001FF001FE001FE007FE003CFEI07CI0F3CJ07F001EJ0FEI0FEK03C00F800F87C07E07F003CF3F8003EN03F8T0FJ078J078,I0F80FC003CF001FF001FE0079E003CF8I07CI0F3CJ0FC001EI01FI01F8K03C00F800F8F801F07F803CF3EI03CN03EU0FJ078J078,I0F80F8003CF801FF003FE007BF003CFJ07CI0F3CJ0F8001EI01FI01FL03C00F80079F001F07FC03CF3CI03CN03EU0FI03FFCI078,I07C1FI0787801FF003DE00F9F003DFJ07CI0F3CI01FI01EI03EI01FL03C00F8007BEI0F87BC03CF7CI03CN07CU0FI07FFEI0F8,I03E3EI0783C01E7803DE00F0F003FEJ07CI0F3CI01FI01EI03EI03EL03C00F800F9CI07879E03CFF8I03CN078J01FFN0FI07FFC0IF8,I03F3EI0F83C01F78079E01F0F803FEJ07CI0F3CI01FI01EI03CI03EL03C00F801F3CI07C79F03CFF8I03EN078J07FFCM0FJ07803IF8,I01FFCI0F01C01E78079E01E0F803FEJ07E003F3CI01FI01EI03E0013EL03C00F803F3CI03C78F03CFF8I03F004K078J0FC7EM0FJ07807F0F8,J0FF8I0F03E01E7C0F9E01E07C03FEJ07KF3CI01KFEI03KFEL03C00JFE3CI03C78F83CFF8I01JFK0F8I01F83FM0FJ07807C078,J07FI01E01E01E3E0F1E03C07C03FEJ07KF3CI01KFEI03KFEL03C00JF03CI03C787C3CFF8J0JFCJ0F8I01F01FM0FJ0780F8078,J07FI01E01F01E3E1F1E03C03E03FEJ07C001F3CI01FI01EI03EI03EL03C00F80F83CI03C783E3CFF8L01FCJ0F8I03E00F8L0FJ0780F8078,J03EI01E01F01E1E1E3E07C03E03FEJ07C001F3CI01FI01EI03CI03EL03C00F807C3CI03C781E3CFF8M0FEJ0F8I03C00F8L0FJ0780F0078,J03EI03JF81E1F1E3E07IFE03FEJ07C001F3CI01FI01EI03EI03EL03C00F801E3CI03C781F3CFF8M03EJ078I03C00F8L0FJ0780F0078,J03EI07JF81E0F3E3E0KF03FEJ07C001F3CI01FI01EI03EI03EL03C00F801F1CI03C780F3CFF8M01EJ078I03C0078L0FJ0781F0078,J03EI07JF81E0FFC3E0KF03DFJ07C001F3CJ0FI01EI03EI03FL03C00F800F1EI0787807BCF7CM01FJ07CI03C00F8L0FJ0780F0078,J03EI078007C1E073C3E0FI0F83CFJ07C001F3CJ0F8001EI01FI01FL03C00F800F9FI0F87803FCF3CM01EJ07CI03E00F8L0FJ0780F0078,J03EI0F8003C1E07FC3E1FI0783EF8I07C001F3CJ078001EI01FI01F8K03C00F800F8F801F87803FCFFEM01EJ03EI03E00FM0FJ0780F0078,J03EI0FI03E1E07F83E1EI07C3CFCI07C001F3CJ07EI0FJ0FCI0FCK03C00F800F8FC03F07801FCF3FM03EJ03F8001F03FM0FJ07C0F8078,J03EI0FI01E1E03F83E3EI03C3C7EI07C001F3CJ03FI0FJ0FEI07EK03C00F800F87E07E07800FCF1F8L03EJ01FCI0F83EM078I07C07C078,J03E001FI01E1E03F03E3EI03C3C3IFC7C001F3CJ01IFC78I07IFC3IFC003C00F800F81IFC07800FCF0JF1JFCK0JF8IFE3BEJ03CI07FC7IF8,J03E003EJ0F1F01F03E7CI01E3C0IFE7C001F7CK07FFE1FFE01IFC0IFE003C00F800FC07FE0078007DF03IF3JF8K01IF83FF83BEK0IF03FE1IF8,J01E001EJ0F1E01E01C38I01E3C03FFC38I0F3CK07FFC0FFE00IF803FFC003C00FI07803FC0078003CF00IF3JFM0IF00FF019CK07FF01FC0IF8,lG0C,l018,:l01,:,::::::::^FS'; 
		/*
		************* FONTS UNDER IMAGES *******************
		*/
		$zebra_code .= '^FO'.(55+$left_space).','.(60+$top_space); 
		$zebra_code .= '^CF 0,26'; 
		$zebra_code .= '^FDPN'; 
		$zebra_code .= '^FS'; 
		
		$zebra_code .= '^FO'.(45+$left_space).','.(130+$top_space); 
		$zebra_code .= '^CF 0,26';
		$zebra_code .= "^FDQ' TY";
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO'.(25+$left_space).','.(230+$top_space);
		$zebra_code .= '^CF 0,26';
		$zebra_code .= '^FDREMARKS';
		$zebra_code .= '^FS';
	

		/*
		************* Borders *******************
		*/
		$zebra_code .= '^FO'.(2+$left_space).','.(14+$top_space);
		$zebra_code .= '^GB 140,73,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF0,20';
		
		$zebra_code .= '^FO'.(2+$left_space).','.(85+$top_space);
		$zebra_code .= '^GB 140,73,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO'.(2+$left_space).','.(156+$top_space);
		$zebra_code .= '^GB 140,147,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO'.(2+$left_space).','.(301+$top_space);
		$zebra_code .= '^GB 747,110,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO'.(140+$left_space).','.(14+$top_space);
		$zebra_code .= '^GB 609,73,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO'.(140+$left_space).','.(85+$top_space);
		$zebra_code .= '^GB 609,74,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		$zebra_code .= '^FO'.(140+$left_space).','.(157+$top_space);
		$zebra_code .= '^GB 609,146,2,B';
		$zebra_code .= '^FS';
		$zebra_code .= '^CF 0,20';
		
		/*
		************* Value *******************
		*/
        /* Do not delete - Used to check all the available FNT in the printer */
		//$zebra_code .= '^WDR:.FNT*'; 
		
		/* Select font from all the available fonts in the computer */
		$zebra_code .= '^CWA,E:'.$font_style_name.'.FNT';
                
		$zebra_code .= '^FO'.(180+$left_space).','.(60+$top_space);
		$zebra_code .= '^AAN,36,0';
		$zebra_code .= '^FD'.$pn;
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO'.(180+$left_space).','.(133+$top_space);
		$zebra_code .= '^AAN,36,0';
		$zebra_code .= '^FD'.$qty.'pcs';
		$zebra_code .= '^FS';
		
		$zebra_code .= '^FO'.(180+$left_space).','.(238+$top_space);
		$zebra_code .= '^AAN,36,0';
		$zebra_code .= '^FD'.$remarks;
		$zebra_code .= '^FS';
		/*
		************* zebra end command ^XZ - NOTE: ZPL code always end with this. *******************
		*/
		$zebra_code .= '^XZ';
		return $zebra_code;
	}
	
	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 3      *********************/
	/***************************************************************/
	/***************************************************************/
	function save_new_c3_label_format3(){
		require_once('../class/c3.php');
		$return 		= $_POST; 
		$print_qty      = $return['txt_print_qty'];
		$return['query'] = '';
		$return['label'] = array();
		for($x=0;$x<$print_qty;$x++){
			$result 		= "";
			$table   		= "tbl_format3"; //table name
			$array_fields 	= array('pn','desk_pn','msl','date_encoded','lastupdate','username'); //table fields
			$array_values 	= array($return['txt_pn'],$return['txt_desk_pn'],$return['txt_msl'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			/* generate zebra code format 3 */
			$return['label'][] = generate_zebra_code_format3($return['txt_pn'],$return['txt_desk_pn'],$return['txt_msl']);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info_format3(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format3';
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
			$return['html'] .= '	<td>'.$row['desk_pn'].'</td>';
			$return['html'] .= '	<td>'.$row['msl'].'</td>';
			$return['html'] .= '</tr>';
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label_format3(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format3";
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
	
	function reprint_label_format3(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format3';
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
			$label = generate_zebra_code_format3($row['pn'],$row['desk_pn'],$row['msl']);
			$return['label'][] = $label;
		}
		// $return['msg'] = $result;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format3($pn,$desk_pn,$msl){
		$space 		= get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$font_style_name 	= $space['font_style_name'];
		
		$zebra_code = "^XA
						^FO".( 20+ $left_space ).",".( 0+ $top_space )."^GFA,17080,17080,40,,:::::::::::::::::::::::T0E,R03KF,P03NFC,O01QF,O03RF8,O0TF8,N01UF,N07UFE,N0WFC,N0XF8,M01YF,M03gF,M07gF8,M07gGF,M0gHFE,M0gIFC,L01gIFE,L01gJFC,L01gKF,L03gKFE,L03gLF8,L03gLFE,L03gMF8,L03gMFE,L03gNF8,L03gNFE,L03gOF8,L03gOFE,L03gPF,L03gPFC,L03gQF,L03gQFC,L03gQFE,L03gRF8,L03gRFE,L03gSF8,L03gSFC,L03gTF,L01gTF8,L01gUF,L01gUF8,L01gUFC,L01gVF,M0gVF8,M07gUFE,M07gVF,M07gVFC,M07gVFE,M03gWF8,M03gWFE,M03gXF,M03gXFC,M01gXFE,M01gYFC,:N0gYFE,N0hF8,N07gYFC,N07hF,N03hF8,N03hFC,N01hGF,N01hGF8,O0hGFE,O0VFEJ0gGF,O0UFCM07XF8,O07SFEN01XFE,O07SFQ01WF,O03RFCR07VF8,O03RFT07UFE,O01RFU0VF,P0QFCV0UF8,P0QF8W07SFC,P07PFX03TF,P07OFEX03TF8,P03OFCY01SFC,P01OFCg03RFE,P01OFCg01SF8,Q0OF8gG03RFC,Q07NF8gH0RFE,Q07MFEgI01RF,Q03MFEgI01RF8,Q03MFEgJ03QFE,Q01MFEgK07QF,R0MFEgK07QF8,R0MFEgL0QFC,R07LFCgL03PFE,R07LFCgM07PF,R03LFCgM03PF8,R01LFCgN07OFC,S0LFCgN01PF,S07KFCgO07OF8,S07KFCgP0OFC,S03KFCgP07NFE,S01KFCgP01OF,T0KFCgQ0OF8,T0KFCgQ01NFC,T07JFEgQ01NFE,T03JFEgR03NF8,T01JFEgR01NFC,U0JFEgS03MFE,U0JFEgS01NF,U07IFEgT07MF8,U03IFEgT01MFC,U01JF8gT0MFE,V0JF8gT03MF,V0JF8gU0MF8,V07IF8gU07LFC,V03IF8gU03LFE,V01IFCgV07LF,W0IFCgV07LF8,W07FFCgV01LFC,W03FFCgW0LFE,W01FFCgW03LF,W01FFEgW01LF,X0FFEgX07KF8,X07FFgX03KFC,X03FFgY0KFE,X01FF8gX07KF,Y0FFCgX01KF8,Y07FCgY0KF8,Y03FCgY03JFC,Y01FEgY01JFE,g0FFh07JF,g07Fh03JF,g03Fh01JF8,g01F8h07IFC,gG07Ch03IFE,N01NFCI01Ch01JF,N01NFEJ04hG07IF8,N07QFC1AhG03IF8,O07SFEh01IFC,Q0SFhG07FFE,P01TF8gY03IF,Q01TFCgX01IF8,R01UFgX0IF8,S01TF8gW07FFC,T0UF8gV03FFE,U0UFEgU01FFE,V0TFEgV0IF,W0TFCgU03FF8,W01TFEgT01FFC,X03TFEgT0FFC,X01UFgT07FE,Y03TFEgS03FE,g07TFEgR01FF,gG07TFCgR0FF8,gG07UFgR07F8,gH03TFCgQ03FC,gI0UFEgP01FC,gI03UFgQ0FE,gI01UFEgP07F,gJ01UFCgO01F,gL0UF8gO0F8,gL0UFCgO03C,gL03UF8gN01C,gM07UFgO0E,gN0UFEgN06,gN07UFgN03,gN037TFC,gO07UF8,gP0VF8,gP01UF8,Q038W01UFE,Q03FX03UFE,Q03FFX07UF8,Q03IFW03UFC,Q03IFEV03UFE,Q03JFEV01UFE,Q03KFEV07UF,Q03LFCU07UF8,Q03MFCU0UFE,Q03NFCT0VFC,Q03OF8T0VF,Q03FC7LFET07UF,Q03FC0LFET03UFE,Q03FC00KFEU0VF,Q03FCI0JFEU07UFC,Q03FCI01IFEU03VF,Q03FCJ01FFEV0VFC,Q03FCK01FEV03UFC,Q03FCL03EV03VF,Q023CM02W0VFC,Q018gL01VF8,Q038gL01VF8,Q03FCgL0VFE,Q03FFEgK03UFE,Q01IFEgK07UFC,Q03IFEgK07UFE,Q03KFgK0UFE,Q03LFgJ07UFC,Q01MFCgH03VF,Q01MFCgH01VF8,Q01F9MFgH0VFA,Q03F847KFCgG01VF,Q03F800KFCgG01VF8,Q03F800KFCgH0VF8,Q03F800KFCgH07VF,Q03F800FC37FCgH03VF,Q03F800F807FCgH01VFC,Q03F800F800FCgI07VF,Q03F800F800FCgI03VF8,Q03F800F800FCgJ0VF8,Q01F800F8007CgJ0VFC,R03I0F8007CT07FCM07VF8,Q01CI0F800FCS0JFCL01VFC,Q01EI07800FCR01JFEM0VFC,Q01FC003800FCR0LFEL07UFD,Q01FF8K0FCQ01LFEL03VF8,Q01FFEK0FCP01NFCK01VFE,Q01IFK0FEP01NFCL0VFE,Q01IFCJ07EP03OFL07VF8,R07IF8U07OFCK03VFC,S0IFEU0PFEK01VFE,S0JF8T0PFEL0VFE,S01IFDS01QFL07VF8,T03IFS01QFL03VFC,T03IF4R03QF8K03VFC,T03JF8Q03QF8K01VFE,T03KFQ0RFCL07VF8,T03E7IF8P0RFEL01VF8,T03E7IFCP0RFEL01VFE,T03E0JF8O0RFEM0WF,T03E01IFCN01SFM07VF,R0607E003FFCN01SFM07VF8,Q01KFC3FFCN01SFM03VF8,Q01OFCN01SFM01VFE,Q01OFCN01SFN0WF,Q01OFCN01SFN0WF8,Q01OFCN01SFN03VFC,Q01OFCN01SFN01VFE,S011DKFCN01SFN01VFE,gG0CN01SFO0VFE,gP01SFO07VF8,Q01FCV01SFO07VF8,Q03FFEU01SFO01VFC,:Q01IFCT01SFO01WF,Q01JFBS01RFEP0WF,Q01LF8R0RFEP0WF8,Q01LF8R0RFEP03VF8,Q01MFCQ0RFCP07VFC,Q01NFCP03QF8P01VFC,Q01F8MF8O03QF8P01VFE,Q01F807KFCO01QFR0WF,Q01F803KFCO01QFR0WF,Q01F8003JFCO01PFER07VF8,Q01FCI01IFCP07OFCR0WF8,Q01FCK0FFCP03OF8R07VF8,Q01F8K07FCP03OFS07VF8,Q01FEL07CP01OFS07VFC,Q01FEL07CQ03MFT07VFC,R0FEL07CQ01LFET03VFC,R0FF8K07CQ01LFET03VFE,R07FEK07CR01JFEU03WF,R07FFBJ0FCR01JFEU03WF,R07JFI0FET07FCV03WF,R07KF80FEgS01WF8,R03KF80FEgS01WFC,R03NFCgT0WFC,S03MFCgT0WFC,T03LFCgT0WFC,U07KFCgT0WFC,U07KFCgS01WFC,W0JF8gS01WFC,X0IF8gS01WFC,Y0FF8gS01WFC,U07C007FgT01WFC,U07CgX03WFC,::::U07CgX07WFC,U07CgX07WF8,U07CgX0XF,::U07CgW03WFC,U07CgW07WFC,:U038gW07WF8,Q01EhG0XF8,Q03FEgY03XF,Q01FFgY03XF,Q01IFgW01XFC,Q01JFCgU03XF8,Q01KFCgT0YF8,Q03KFCgT0YF,Q01MF4gQ03XFE,R077KFEgQ0YF8,S03LF7gO01YF,S03MF8gM01YFE,T023KFCgL04gF,U01KFCgK03gGF,V0FDIFCgJ017gFC,V0FC47FCgK03gF,V0FC03FCgK01YFC,V0FC00FCgM03VFE,V0FC00FCgO03TF8,V0FC00FCgQ03QF8,V0FC00FCgR01OF,V0FC00FCgT07LF,Q018I0FC00FC,Q01CI01800FC,Q01FEL0FC,Q01IFK0FC,Q01IFEJ0FC,Q01JF2I0FE,Q01KF9007E,R0LF8,R0LFD,S0MFE,T0MF8,U07KFC,:V07JFC,:V07C07FC,V07E07FC,Q01CI07F00FC,Q03FE007E00FC,Q01FF00FE007C,Q01IF8FE007C,Q01KFE007C,Q01KFE00FC,Q01LF00FC,Q01LFC0FE,R01NFC,S0NFC,T07FEJFC,Q01F00107IFC,Q01F8I07IFC,Q01FFC007IFC,Q01IFC00IFC,Q01JFE007F8,Q01KF,Q01LF,Q01MF8,Q01NFC,Q01F8LFC,Q01F87LFC,Q01F80LFC,Q01F800KFE,Q01F800KFC,:Q01F800FC1FFC,Q01F800FC01FC,Q01F800FC00FC,:R03800FC00FC,R01800FC00FC,R01I0FC00FC,Q01F8007800FC,Q01FCL07C,Q01FFCK07E,Q01IFEJ07E,Q01KFI07E,:Q01LF003C,Q01MF8,Q01FBLFC,Q01F87LFC,Q01F807KFE,Q01F800KFE,Q01F800KFC,Q01F800FC3FFC,Q01F800FC1FFC,Q01F800FC00FC,::Q01F800FC007C,R03800FC007C,V0FC007C,V07C007C,V038007C,g07C,:::g038,,:::::::::::::::::::::^FS

						^FO".( 600+ $left_space ).", ".( 20+ $top_space )."
						^BY2
						^BCR, 100, N, N, N
						^FD".$pn."
						^FS

						^FO".( 520+ $left_space ).", ".( 10+ $top_space )."
						^AAR,36,0
						^FDP/N:
						^FS

						^FO".( 450+ $left_space ).", ".( 10+ $top_space )."
						^AAR,36,0
						^FDDESK P/N:
						^FS

						^FO".( 340+ $left_space ).", ".( 10+ $top_space )."
						^AAR,36,0
						^FDMSL =
						^FS

						^FO".( 520+ $left_space ).", ".( 80+ $top_space )."
						^AAR,36,0
						^FD".$pn."
						^FS

						^FO".( 400+ $left_space ).", ".( 30+ $top_space )."
						^AAR,36,0
						^FD".$desk_pn."
						^FS

						^FO".( 340+ $left_space ).", ".( 120+ $top_space )."
						^AAR,36,0
						^FD".$msl."
						^FS

						^XZ";
		return $zebra_code;
	}
	
	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 4      *********************/
	/***************************************************************/
	/***************************************************************/
	function check_existing_item_name_and_lotno_format4(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$pn_code = $return['pn_code'];
		$lotno = $return['lotno'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format4';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `pn_code` = "'.$pn_code.'" AND `lotno` = "'.$lotno.'"';
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
	
	function save_new_c3_label_format4(){
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
			$table   		= "tbl_format4"; //table name
			$array_fields 	= array('pn_code','qty','yec_pn','lotno','lotno_extension','date_encoded','lastupdate','username'); //table fields
			$array_values 	= array($return['txt_pn_code'],$return['txt_qty'],$return['txt_yec_pn'],$return['txt_lot_no'],$lotno_extension,date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			/* generate zebra code format 4 */
			$return['label'][] = generate_zebra_code_format4($return['txt_pn_code'],$return['txt_qty'],$return['txt_yec_pn'],$return['txt_lot_no'],$lotno_extension);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info_format4(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format4';
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
			$return['html'] .= '	<td>'.$row['pn_code'].'</td>';
			$return['html'] .= '	<td>'.$row['qty'].'</td>';
			$return['html'] .= '	<td>'.$row['yec_pn'].'</td>';
			$return['html'] .= '	<td>'.$row['lotno'].'-'.$row['lotno_extension'].'</td>';
			$return['html'] .= '</tr>';
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label_format4(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format4";
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
	
	function reprint_label_format4(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format4';
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
			$label = generate_zebra_code_format4($row['pn_code'],$row['qty'],$row['yec_pn'],$row['lotno'],$row['lotno_extension']);
			$return['label'][] = $label;
		}
		// $return['msg'] = $result;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format4($pn_code,$qty,$yec_pn,$lotno,$lotno_extension){
		$space 		= get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$font_style_name 	= $space['font_style_name'];
		$zebra_code = "^XA
							^FO".( 10+ $left_space ).", ".( 12+ $top_space )."^GFA,1232,1232,16,,::::::::::::::N018,00FF8I038W07,00FFCI0384V03838,00C18I07FEV0309C,00C18I060CV030EC,00C18I0E1CI083F8O0307,00FF8001F38I0IFCO0303,00FF8001BFJ0781802M03,00C080071EL0180300FFI03E,008J0E0CL01803JF800378,0FF7F818381K03001F801I031C,0FF7FC007FF8J03P030E,0C361800F0180183F8O0304,0C361803F01800IF8O03,0C36180F301800FR03,0C3618183018U03,0FF7F8003FF8U03,:0C0208003018U03,N01,,::::::M018,001FC001839EK0F80380FC03FE,001FE003839EJ03F80FE0FF03FE,I0C700301CCJ03B80EE0670186,I0C300701CCJ071C1C70638186,I0C300601ECJ060C1830618198,I0C700E01ECJ060C1830618198,I0FE00C01ECJ060018306181F8,I0FC01C01FCJ060018306181F8,I0C001801BCJ06001830618198,I0C003801BCJ06001830618198,I0C003001BCJ060C183061818,I0C0070019CJ070C1C70638186,I0C0060019CJ039C0EE0670186,001E00E003CCJ03F80FE0FF03FE,001E00C003CCK0F00380FC03FE,L0C,,:::::::::::::::::^FS

							^FO".( 12+ $left_space ).", ".( 90+ $top_space )."^GFA,986,986,17,,::M03C07P0C003,L063DC78O0JF8,L07B9C78O0JF8,L03BB87P0E0038,L01BF0EP0JF8,L01BE0EP0JF8,L0JFE06N0E0038,L0JFC0FN0JF8,M07E1IFN0JF98,M0FF9IFN0E0033E,L01FBB87M01LFE,L03B9FC7M01LFE,L07386C7N01JFC,K01E38EC6N01JFC,K01C3CCEEN01C1C38,M03C66EN01JF8,L0JFEEN01JF8,L0KFCN01C1C38,M0E383CN01C1C38,L01C383CN01JF8,L01FF07EN01JFE,L03FF0FFN07KF8,L039F8EF8M07KF8,M03FBC7EO01C018,M0F9F83EO01C03E,L03E1F01EM0LFE,L0F87CP0LFE,L0E07,,::::::::::::::::::::::::::^FS

							^FO".( 370+ $left_space ).", ".( 95+ $top_space )."^GFA,928,928,16,,:::::::O0F8001FC07FF,O0F8003FE07FF,O07I038E0673,O07I07070673,O07I0707007,::O07I0703007,:O07I0707007,:::O07060386007,O070E03CE007,O0FFE01FC01F8,O0FFE00F801F8,,::::::::::N01F1F01FC,N01F1F03FE,O0F8C038E,O0F8C0707,O0DCC0707,:O0CEC0707,O0CEC0703,O0C7C0703,O0C7C0707,:O0C3C0707,:O0C1C0386038,O0C1C03CE038,N01F0C01FC038,N01F0C00F8038,,::::^FS

							^FO".( 9+ $left_space ).", ".( 153+ $top_space )."^GFA,1232,1232,16,,:::::::::::gK02,X08L06,K0EQ01FFCJ07,K0EQ01FDCJ0FDC,K0EQ01C0CJ0FFE,I020CQ0180CI01C3C,I060E06O0180CI01838,I060E06O01C1CI03C7,I060E06O01FFCI07F7,I060E06L0E001C0CI0E7E,I060E0601KFI08J01C3C,I060E0601JFEI08J03838,I060E06N01FF3FE0607FF,I060E06N01FF3FEI0IF8,I060E06N01C730E003E038,I060C06N018730E00FE03,I060E06N018730E01E603,I060E0EN018730E070603,I07IFEN01C738EI0603,I06I0EN01FF3FEI07FF,I06I04N01C630CI0787,I06R01802K0603,gK04,,:::::gJ04,gJ06,0078707FC003L0FFJ0C0C0E,0078F07FE01FEK0FFCI0C1E1E,0038E038603CEK071C00180F0C,0038C03020306K070E0018070C,0018C03020707K070E0030078C,001C8030806M070E0030078C,001D803180EM070E006005CC,I0F803F80EM071C006004CC,I0F003F80EM07F800C004EC,I07003180EM07FI0C0046C,I07003080EM07I01C0047C,I06003I0EM07I0180043C,I07003I0603K07I03I043C,I06003030706K07I03I041C,I0700307030EK07I02I0C1C,I0F0079E01FCK0FI06I0E0C,I0F807FE00FL0F800E001E0C,gH0C,:,::::::::::::::^FS

							^FO".( 50+ $left_space ).", ".( 250+ $top_space )."^GFA,7776,7776,54,,::::::::::::::::::::::V07IF,V0JF8,T03MF,S01NFE,S03OF,R01PFE,R03QF,R0RFE,Q07KFI0KF8,Q0KFCI03JFC,P01IFE001C003JF,P03IFC003EI07IF,P07FFE001FF8001IF8,O01IF8003FFEI03FFE,O03IFI03FFEI03IF,O03FFCI0JF8I07FF8I07FCK01FE07FFJ01FFEL0IFJ07FFJ03FCI03JFC7FCK07F07F8,O07FFJ0JF8I03FFCI07FEK03FF07FFJ03IFL0IFJ07FFJ03FC003KFE7FCK07F87F8,O0FFEI01JFCI01FFCI07FEK07FE07FF8I03IFK01IFJ0IFJ03FC00LFE7FCK0FF8FF8,N01FFCI01JFCJ0IFI03FFK07FC0IF8I03IFK01IFJ0IF8I03FC03LFE7FCK0FF8FF8,N03FF8I03JFEJ07FFI01FF8J0FFC0IFCI03IF8J01IFI01IF8I03FC07LFE7FCK0FF87F8,N07FFJ07FF3FFJ03FF8001FF8I01FF81IFCI03IF8J03IFI01IFCI03FC0MFE7FCK0FF87F8,N07FEJ07FE3FFJ01FFCI0FFCI03FF01IFEI03IF8J03IFI01IFCI03FC1IFCJ07FCK0FF87F8,N0FFCJ07FE1FFK0FFEI07FEI03FF01IFEI03IFCJ07IFI03IFEI03FC1FFEK07FCK0FF87F8,M01FF8J07FC0FF8J07FEI07FEI07FE03JFI03IFCJ07IFI03IFEI03FC3FF8K07FCK0FF87F8,M01FF8J07FC0FF8J03FFI03FFI0FFC03JFI03IFEJ07IFI07JFI03FC3FFL07FCK0FF87F8,M03FEJ01FF80FFCJ01FF8003FF800FF807FDFFI03IFEJ0JFI07FDFFI03FC7FEL07FCK0FF87F8,M03FCJ01FF80FFCJ01FF8001FF801FF807FCFF8003IFEJ0JFI0FF9FF8003FC7FCL07FCK0FF87F8,M07FCJ01FF807FCK0FF8I0FFC03FF00FF8FF8003JFJ0JFI0FF8FF8003FCFFCL07FCK0FF87F8,M0FFCJ01FF807FCK07FCI07FE07FF00FF8FFC003JFI01JFI0FF0FF8003FCFFCL07FCK0FF87F8,M0FF8J01FF007FCK03FEI07FE07FE00FF07FC003JF8001JF001FF07FC003FCFF8L07FCK0FF87F8,M0FFK01FE007FEK03FEI03FF0FFC01FF07FE003FEFF8003JF001FF07FC003FCFF8L07FCK0FF87F8,L01FFK01FE007FEK01FEI01FF9FF801FF03FE003FEFF8003FCFF003FE07FE003FCFF8L07FCK07F87F8,L03FFK01FE007FEK01FFI01FFBFF803FE03FE003FE7FC003FCFF003FC03FE003FCFFM07FCK0FF87F8,L03FEK03FE007FEL0FFJ0KF003FE01FF003FE7FC007FCFF003FC03FE003JFM07OF87F8,L03FCK03FE003FEL0FFJ07IFE003FC01FF003FE3FC007FCFF007FC03FF003JFM07OF87F8,L07FCK03FE003FEL0FFJ07IFE007FC01FF803FE3FE00FF8FF007FC01FF003JFM07OF87F8,L07FCK03FE003FEL07F8I03IFC007F800FF803FE3FE00FF8FF00FF801FF803JFM07OF87F8,L07FCK03FE003FEL03FCI01IF800FF800FFC03FE1FF00FF0FF00FF800FF803JFM07OF87F8,L07F8K03FE003FEL03FCI01IF800FF800FFC03FE1FF01FF0FF00FFI0FFC03JFM07OF87F8,L07F8K03FE001FEL03FCJ0IF001FFI07FC03FE0FF01FE0FF01FFI0FFC03JFM07OF87F8,L07F8K03FE001FEL03FCJ07FE001FFI07FE03FE0FF83FE0FF01FFI07FC03JFM07FEJ01FF87F8,L07F87WF03FCJ07FE001MFE03FE0FF83FE0FF03MFE03JFM07FCK0FF87F8,L0FF8XF83FCJ03FC003NF03FE07FC7FC0FF03MFE03FCFF8L07FCK0FF87F8,K01FF8XF83FEJ03FC003NF03FE07FC7FC0FF07NF03FCFF8L07FCK0FF87F8,K01FF0XF81FEJ03FC007NF03FE03FC7F80FF07NF03FCFF8L07FCK0FF87F8,K01FE0XF81FEJ03FC007NF83FE03FE7F80FF07NF83FCFFCL07FCK0FF87F8,K01FE0XF81FEJ03FC007NF83FE03JF80FF0OF83FCFFCL07FCK0FF87F8,K01FE0XF81FEJ03FC00OFC3FE01JF00FF0OF83FC7FEL07FCK0FF87F8,K01FE0RFE7JF81FEJ03FC00FF8J0FFC3FE01JF00FF1FF8J0FFC3FC7FEL07FCK0FF87F8,K01FE0FFC007FC001FEI0FF81FEJ03FC00FFK07FE3FE01JF00FF1FFK07FC3FC7FFL07FCK0FF87F8,K01FE07FC003FC001FEI0FF81FEJ03FC01FFK03FE3FE00IFE00FF1FFK07FE3FC3FFCK07FCK0FF87F8,K01FE07FC003FC001FFI0FF81FEJ03FC01FFK03FE3FE00IFE00FF3FEK03FE3FC3IFK07FCK0FF87F8,K01FE07FC003FC001FF801FF81FEJ03FC03FEK01FF3FE007FFC00FF3FEK03FE3FC1JF81FC7FCK0FF87F8,K01FE03FC003FC001FF801FF81FEJ03FC03FEK01FF3FE007FFC00FF3FCK01FF3FC0MFE7FCK0FF87F8,K01FE03FC007FC001FF801FF81FEJ03FC07FCL0FFBFE003FFC00FF7FCK01FF3FC07LFE7FCK0FF87F8,K01FE03FC00FFC001FF801FF81FEJ03FC07FCL0FFBFE003FF800JFCL0FFBFC03LFE7FCK0FF87F8,K01FF03FC00FFC001FF801FF83FEJ03FC07FCL07IFE003FF800JF8L0JFC00LFE7FCK0FF8FF8,L0FF83FC00FFC001FF801FF03FCJ03FC0FF8L07IFE001FFI0JF8L07IFC007KFE7FCK0FF8FF8,L07F83FE00FFC001FF801FF03FCJ03FC0FF8L03IFE001FFI0JFM07IFCI07JFE7FCK0FF87F8,L07F83FE00FFC001FF801FF03FC,L07F83FF00FF8I0FF801FF03FC,L07F83FF00FFJ07F801FF03FC,L07F83FF00FFJ07F801FE03FC,L07FC1FF00FFJ07FC01FE03FCI03IF00F8J03FFEI0IFC03JFE0JF8I01FFC003F803E0F8007FFC007IFC,L03FC1FF01FFJ07FE03FE07F8001JF00F8I01IFE003IFC03JFE0JFCI03IF003F803E0F803IFC00JFC,L03FC0FF03FFJ07FE07FE0FFI01JF00F8I01IFE007IF803JFE0JFEI07IF003F803E0F807IFC00JFC,L03FC1FF83FFJ07FE07FE0FFI01JF00F8I01IFE007FJ03JFE0F801FI0FC1FC03FC03E0F803FJ03JFC,L03FE0FF83FFJ03FE07FE0FFI03IFE00F8I03IFE007EJ01JFE0F801F801F80FC03FE03E0F807EJ03JF8,L01FF0FF83FFJ03FF07FC1FFI07FCJ0F8I07F8J0FCL03EI0F801FC03F007E03FF03E0F80FCJ03F8,M0FF07FC7FEJ03FF0FFC3FEI07EK0F8I07CK0F8L03EI0F801FC07E003E03FF03E0F80F8J03E,M0FF07FE7FCJ01FF1FF83FCI07CK0F8I07CK0FM03EI0F801FC0FE003F03FF03E0F80F8J03E,M0FFC7JFEK0KF87FCI07IFE00F8I07IFE00FM03EI0F803FC0FE003F83FF83E0F80F8J03F8,M07FC3JFCK0KF0FFCI07JF00F8I07IFE00FM03EI0KF80FC001F83FFC3E0F80F8J03JF,M03FE1JF8K0KF0FF8I07JF00F8I07IFE00FM03EI0KF00F8I0F83E7E3E0F80F8J03JF,M03FE1JF8K07JF1FF8I07JF00F8I07IFE00FM03EI0JFE00F8I0F83E7F1E0F80F8K0JFC,M03FF1JFL03IFE1FFJ07IFE00F8I07IFE00FM03EI0JFC00F8I0F83E7F9E0F80F8K0JFC,M01FF8IFEL01IFC7FEJ07CK0F8I07CK0FM03EI0JFC00F8I0F83E3F9E0F80F8K07JF,N0FFC7FFCM0IF87FEJ07CK0F8I07CK0FM03EI0FC1FC00F8001F83E1FFE0F80F8N0FF,N0FFE3FF8M07FF0FFCJ07CK0F8I07CK0F8L03EI0F80FE00F8003F83E0FFE0F80F8N07F,N07FF0FFN01F81FFCJ07CK0F8I07CJ01FCL03EI0F807F00FE003F03E0FFE0F80FCN03F,N03FF87EO0103FF8J07EK0F8I07EK0FEL03EI0F803F007E003E03E0FFE0F80FEN01F,N03FFCS07FFK07FK0F8I07FK07FL03EI0F801F003F007E03E07FE0F807FN01F,O0FFES0FFEK03F8J0FCI03F8J07IF8I03EI0F801F001FC0FC03E01FE0F807IF8K0FF,O0IFR01FFCK01FCJ0FEI01FCJ07IFCI03EI0F801FI0FC1FC03E01FE0F803IFCJ01FF,O07FFCQ07FF8K01IFE007IF01IFE001IFCI03EI0F801FC007IF003E007E0F801IFC03JFC,O03FFEP01IFM0JF003IF01IFE001IFCI03EI0F800FC003IF003E007E0F800IFC03JF8,O01IFP03IFM03IF001IF003FFEI0IFCI03EI0F8007C001FFC003E007E0F8007FFC03JF,P07FFEO0IFC,P07IFN01IF8,P01JFM0JF,Q0JF8K01IFE,Q07JFEI0KF8,Q01RFE,R0RFC,R01QF,S0PFE,S01OF,T01MF,U0LFE,V03IF,:,:::::::::::::::::::^FS

							^FO".( 2+ $left_space ).", ".( 14+ $top_space )."
							^GB 140,73,2,B
							^FS
							^CF 0,20

							^FO".( 2+ $left_space ).", ".( 85+ $top_space )."
							^GB 140,73,2,B
							^FS
							^CF 0,20

							^FO".( 2+ $left_space ).", ".( 156+ $top_space )."
							^GB 140,74,2,B
							^FS
							^CF 0,20

							^FO".( 2+ $left_space ).", ".( 228+ $top_space )."
							^GB 550,183,2,B
							^FS
							^CF 0,20

							^FO".( 140+ $left_space ).", ".( 14+ $top_space )."
							^GB 609,73,2,B
							^FS
							^CF 0,20

							^FO".( 140+ $left_space ).", ".( 85+ $top_space )."
							^GB 214,74,2,B
							^FS
							^CF 0,20

							^FO".( 352+ $left_space ).", ".( 85+ $top_space )."
							^GB 150,74,2,B
							^FS
							^CF 0,20

							^FO".( 500+ $left_space ).", ".( 85+ $top_space )."
							^GB 249,74,2,B
							^FS
							^CF 0,20

							^FO".( 140+ $left_space ).", ".( 157+ $top_space )."
							^GB 609,73,2,B
							^FS
							^CF 0,20

							^FO".( 550+ $left_space ).", ".( 228+ $top_space )."
							^GB 199,183,2,B
							^FS
							^CF 0,20

							^FO".( 45+ $left_space ).", ".( 130+ $top_space )."
							^CF 0,26
							^FDQ' TY
							^FS

							^CWA,E:".$font_style_name.".FNT

							^FO".( 180+ $left_space ).", ".( 60+ $top_space )."
							^AAN 0,36
							^FD".$pn_code."
							^FS

							^FO".( 180+ $left_space ).", ".( 133+ $top_space )."
							^AAN 0,36
							^FD".$qty."pcs
							^FS

							^FO".( 530+ $left_space ).", ".( 133+ $top_space )."
							^AAN 0,36
							^FD".$lotno."-".$lotno_extension."
							^FS

							^FO".( 180+ $left_space ).", ".( 206+ $top_space )."
							^AAN 0,36
							^FD".$yec_pn."
							^FS

							^FO".( 570+ $left_space ).", ".( 235+ $top_space )."
							^BQN,2, 5
							^FD".$yec_pn." ".$pn_code." ".$lotno."-".$lotno_extension."
							^FS

							^XZ
							";
		return $zebra_code;
	}
	
	
	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 5      *********************/
	/***************************************************************/
	/***************************************************************/
	function check_existing_item_name_and_lotno_format5(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$pn_code = $return['pn_code'];
		$lotno = $return['lotno'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format5';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `pn_code` = "'.$pn_code.'" AND `lotno` = "'.$lotno.'"';
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
	
	function save_new_c3_label_format5(){
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
			$table   		= "tbl_format5"; //table name
			$array_fields 	= array('pn_code','qty','yec_pn','lotno','lotno_extension','date_encoded','lastupdate','username'); //table fields
			$array_values 	= array($return['txt_pn_code'],$return['txt_qty'],$return['txt_yec_pn'],$return['txt_lot_no'],$lotno_extension,date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			/* generate zebra code format 5 */
			$return['label'][] = generate_zebra_code_format5($return['txt_pn_code'],$return['txt_qty'],$return['txt_yec_pn'],$return['txt_lot_no'],$lotno_extension);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info_format5(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format5';
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
			$return['html'] .= '	<td>'.$row['pn_code'].'</td>';
			$return['html'] .= '	<td>'.$row['qty'].'</td>';
			$return['html'] .= '	<td>'.$row['yec_pn'].'</td>';
			$return['html'] .= '	<td>'.$row['lotno'].'-'.$row['lotno_extension'].'</td>';
			$return['html'] .= '</tr>';
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label_format5(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format5";
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
	
	function reprint_label_format5(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format5';
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
			$label = generate_zebra_code_format5($row['pn_code'],$row['qty'],$row['yec_pn'],$row['lotno'],$row['lotno_extension']);
			$return['label'][] = $label;
		}
		// $return['msg'] = $result;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format5($pn_code,$qty,$yec_pn,$lotno,$lotno_extension){
			$space 		= get_sticker_alignment_printing();
			$left_space = $space['left_space'];
			$top_space 	= $space['top_space'];
			$font_style_name 	= $space['font_style_name'];
			$zebra_code = "^XA

								^FO".( 50+ $left_space ).", ".( 25+ $top_space )."^GFA,2304,2304,24,,::::::::::::::::::::::::::::::::::S03,I06O03C,I07IFL03CgL03C,I07IFL07818gJ03E01C,I0700EL07FFCgJ01E01F,I0700EL0IFEgJ01C0C78,I0700EL0E03EgJ01C0F38,I0700EK01E078gJ01C0798,I0700EK03C07K07001FCT01C03C,I0700EK03F0FK07JFCT01C01C,I07FFEK07F9EK03JFCT01C,I07FFEK0E3FCK01C00380018P01C,I0700EJ01C1F8O038001CJ01CJ01FC,I07M0381FP038I0LFEJ01FF8,I06M0701EP038I0MFJ01CFC,01C0C701801E03CP03J07FFC01FJ01C3E,01IF7FFC01C07IF8M03J03P01C0F,01IF7FFCJ0JF8M07U01C07,01C0E7038I01F0038M07U01C07,01C0E7038I07F0038I071IFCT01C,01C0E7038I0F70038I07JFCT01C,01C0E7038003C70038I03FC00CT01C,01C0E703801F870038I018X01C,01C0E703801E070038gI01C,01C0E7038J070038gI01C,01FFE7FF8J07IF8gI01C,:01C0C7038J070038gI01C,01C007M07003,S07,,::::::::::::::::::::::::::::::^FS

								^FO".( 50+ $left_space ).", ".( 105+ $top_space )."^GFA,2304,2304,24,,::::::::::::::::::::::::::::::::::N07006K0FY06,L018738EK0F0078K0CO078,L01E738EK0E0078K0IFEL078,M0F770EK0E007L0IFEL0F03,M07760C0CI0E007L0E01CL0IF8,M077F9C1FI0E707L0E01CK01IFC,L03IFDIF00IF87L0E01CK01C07C,L03IFDIF00IF87L0E01CK03C0F,L03B79FC7J01E07L0E01CK0780E,L03BFDFE6J01C07L0E01CK07E1E,L03BIF7EJ0380707J0IFCK0FF3C,L03B7FE3EJ079JF8I0IFCJ01C7F8,L03F77C3CJ0F1JF8I0E01CJ0383F,L03E77C3EJ0E007L0EM0703E,L03E7FCFF8001FC07L0CM0E03C,L03C7FDE7F003FF07J03818E03003C078,L03873FE3F007EF07J03FFEIF80380JF,L0307E7E0C00EE707J03FFEIF8I01JF,N01E0E0C00CE307J0381CE07J03E007,N01C0E1EI0E007J0381CE07J0FE007,L03MFI0E007J0381CE07I01EE007,L03MFI0E007J0381CE07I078E007,N03C0EK0E007J0381CE07003F0E007,N0380EK0E007J0381CE07003C0E007,N0780EK0E0070380381CE07K0E007,N0F00EK0E7JFC03FFCIFK0JF,M01E00EK0E7JFC03FFCIFK0JF,M07C00EK0EM03818E07K0E007,L03FI0EK0EM03800EM0E006,L03CI0EK0EY0E,,::::::::::::::::::::::::::::::^FS

								^FO".( 90+ $left_space ).", ".( 190+ $top_space )."^GFA,2304,2304,24,,:::::::::::::::::::::::::::::::::::V06,T01870078J03800E,T01C738F8J03JF,U0E778EK03JF,U0I70EK03800E,U077E0EK03IFE,U037DDCK03IFE,T03JFC0EI03800E,T03MFI03IFE,U01FC3IFI03IFE3,U03FE387J03800E78,U07FF787I0MFC,U0FI787I0MFC,T01E73F86J07I07,T03C71D8EJ07JF8,T070719CEJ07JF8,T060F00CEJ070707,V0E0EFCJ07JF,T03KFCJ07JF,T03JF78J070707,U0387078J07JF,U038F078J07JF,U07FE0FCJ070707C,U0FFE0FFI01LF,U0E3F1CF8001LF,V07F787EK07003,U01E3F03EK070078,U07C3E01E007LFC,T03F0F800C007LFC,T03C0E,,:::::::::::::::::::::::::::::^FS

								^FO".( 45+ $left_space ).", ".( 268+ $top_space )."^GFA,2592,2592,27,,:::::::::::::::::::::::::::::::::::::U078,R01E078O0E,I0FN01F038I03003FFEQ03E07E003E,I0FCN0F03J03LFL0FJ03F07E00FF8,I03EN0603J01IF03FL0FK0F01801E3C,J0FN0603K0F8007CL07K0F81801C1E,J07I03J0603N01FK0787K0F81803C0E,N07J0603M073EK07C7K0FC180380E,N0EJ0603M07F8K03C7K0DC180380F,007CI01CJ0603M03EL0387K0DE180780F,007EI038J0603M038L038700180CE1807807,001FI07K0603M038L078700780CF1807807,I0F001EK0603M07M070700F00C71807807,I07003CK0E03M07M070701E00C79807807,L078K0E07M07M0E0703C00C39807807,L0FL0E07M0FM0E070F800C3D807807,K03EL0607M0EL01C071EI0C1D807807,K07CN0EL01EL01C077CI0C1F80780F,J01FO0EL01CL03807F8I0C0F80380F,00183EN01CL03CL0780FEJ0C0F80380E,0018FCN03CL078L0700FCJ0C07803C1E00E,001FFO078L0FM0E007K0C07801C1C01F,I0FEN01FL01EL01C003K0C03800F7801F,I07CN03CL03CL038M03F018007F001F,I038N0F8L03M03N03F018001EI0E,R03E,R038,,::::::::::::::::::::::::::::::^FS

								// ^FO".( 160+ $left_space ).", ".( 350+ $top_space )."^GFA,3840,3840,40,,::::::::::::::::::::::::::::::::gU06K06Q01CM07L01E,gM0FJ0E0678CI07801EM01CM07CK01E00F,L078T01KFJ0E0778EI07801EM01CEL0FCK01C00F,L078T01KFJ0E0F71EI0701DCM01CFK01FCK01C00E,L07U0600EL0E0E718I0701DCM01C78J01EEK01C00E,L07U07LFI0E7C73BI0703DC18K01C3F8I03C7K01CE0E,L07U07LF800FF9FF380073B9C3C00MFCI07878I01IF0E,I03E0700FR0E00E00F80IFBFF7807LFC00MFCI0F03EI01IF0E,I03E0700FQ01FFEIFE00IFBF7F007LFCK01CK01E01F8J03C0E,I0380700EQ01FFEIF8001E1F73EI07071CM01CK03C007EJ0380E,I0380700EQ01C0CE03I01E1F71FI07071CM01CK0F001BF8I0700E0E,I0380700ER03FEIF8001E0E71B80070E1CM01CJ01JFDFCI0F3JF,I0380700EN03C003FEIF8001E1DF7FC00F8C1C1CJ01CCJ07DIFC7C001E3JF,I0380700E003LFEK0EK03F1BIFC00FEKF00IFEEJ07K03I01C00E,I0380700E003LFE00300C06I03FBIF8C00MF00IFEET03F80E,I0380700ER03KF8003FFEFFC001F783EK0380ET07FE0E,I0380700ER03KF8007FF0F9FC01F387FK0380FP07I0FDE0E,I0380700ER0381C07I07E7JFC03F187FK03807J07LF801DCE0E,I0380700ER03KFI06E7JFC03F00FF8J038078I07LF8019C60E,I0380700ER03KFI0EE0E1CF007701DDCJ038038K01CL01C00E,I0380700ER0381C07001CE0E1CF006703DDEJ0383BC0CI03CL01C00E,I0380700ER0381C070018E0F1FE0067079CFJ03BF9E0CI03818J01C00E,I0380700ER03KF3I0E1FCFC60070F1C78I07FE1F0CI0381EJ01C00E,I03KFER03KF3I0E1DC78E0071E1C7C00IF00F9CI0700FJ01C00E,I03KFER0381C073I0E3DCFCC0073C1C3E00FFI07F8I06007CI01C00E07,I038J0ER0381C003I0E38DFEC007701C1E0078I03F801KFCI01CKF8,I038J0ER0381JF800E703DFC007601C0C003J01FC01KFEI01CKF8,I038J0CT01JF800FE0F07E007001CP07C01FC001EI01C,I038Y01JF800FC1E01E007001CT0CJ0EI01C,I038gM0C018K07gI06I01C,,::::::::::::::::::::::::::::::::^FS

								^CWA,E:".$font_style_name.".FNT

								^FO".( 250+ $left_space ).", ".( 83+ $top_space )."
								^AAN 0,36
								^FD:
								^FS

								^FO".( 280+ $left_space ).", ".( 83+ $top_space )."
								^AAN 0,36
								^FD".$pn_code."
								^FS

								^FO".( 250+ $left_space ).", ".( 163+ $top_space )."
								^AAN 0,36
								^FD:
								^FS

								^FO".( 280+ $left_space ).", ".( 163+ $top_space )."
								^FB390,4,,
								^AAN 0,36
								^FD".$yec_pn."
								^FS

								^FO".( 250+ $left_space ).", ".( 243+ $top_space )."
								^AAN 0,36
								^FD:
								^FS

								^FO".( 280+ $left_space ).", ".( 243+ $top_space )."
								^FB390,4,,
								^AAN 0,36
								^FD".$qty."pcs
								^FS

								^FO".( 250+ $left_space ).", ".( 323+ $top_space )."
								^AAN 0,36
								^FD:
								^FS

								^FO".( 280+ $left_space ).", ".( 323+ $top_space )."
								^FB390,4,,
								^AAN 0,36
								^FD".$lotno."-".$lotno_extension."
								^FS

								^FO".( 550+ $left_space ).", ".( 235+ $top_space )."
								^BQN,2, 6
								^FD".add_backslash_reserve_words($yec_pn)." ".$pn_code." ".$lotno."-".$lotno_extension."
								^FS

						  ^XZ";
		return $zebra_code;
	}
	
	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 6      *********************/
	/***************************************************************/
	/***************************************************************/
	
	function save_new_c3_label_format6(){
		require_once('../class/c3.php');
		$return 		= $_POST; 
		$print_qty      = $return['txt_print_qty'];
		$return['query'] = '';
		$return['label'] = array();
		for($x=0;$x<$print_qty;$x++){
			if($x==0){
				$lotno_extension = $return['txt_lot_no_count'];
			}else{
				$lotno_extension = generate_new_lot_no_extension_format6($lotno_extension);
			}
			$result 		= "";
			$table   		= "tbl_format6"; //table name
			$array_fields 	= array('pn','mpn','qty','date','lotno','lotno_extension','date_encoded','lastupdate','username'); //table fields
			$array_values 	= array($return['txt_pn'],$return['txt_mpn'],$return['txt_qty'],$return['txt_date'],$return['txt_lot_no'],$lotno_extension,date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			/* generate zebra code format 6 */
			$return['label'][] = generate_zebra_code_format6($return['txt_pn'],$return['txt_mpn'],$return['txt_qty'],$return['txt_date'],$return['txt_lot_no'],$lotno_extension);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function check_existing_item_name_and_lotno_format6(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$pn = $return['pn'];
		$lotno = $return['lotno'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format6';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `pn` = "'.$pn.'" AND `lotno` = "'.$lotno.'"';
		$sql_order 	= 'ORDER BY `lotno_extension` DESC LIMIT 0,1';
		$sql_limit 	= '';
		$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return['lotno_extension'] = '';
		while($row = mysqli_fetch_array($result)){
			$return['lotno_extension'] = $row['lotno_extension'];
		}
		/* if lot number does not exist add a 001 */
		if($return['lotno_extension'] == ''){
			$return['lotno_extension'] = '001';
		}else{
			$return['lotno_extension'] = generate_new_lot_no_extension_format6($return['lotno_extension']);
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_new_lot_no_extension_format6($lot_extension){
		$letters = preg_replace('/[0-9]/','',$lot_extension);
		$new_lot_no_extension = $lot_extension + 1;
		$new_lot_no_extension = str_pad($new_lot_no_extension.$letters, 3, "0", STR_PAD_LEFT); 
		return $new_lot_no_extension;
	}
	
	function load_selected_label_info_format6(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format6';
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
			$return['html'] .= '</tr>';
		}
		// $return['msg'] = $result;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label_format6(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format6";
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
	
	function reprint_label_format6(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format6';
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
			$label = generate_zebra_code_format6($row['pn'],$row['mpn'],$row['qty'],$row['date'],$row['lotno'],$row['lotno_extension']);
			$return['label'][] = $label;
		}
		// $return['msg'] = $result;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format6($pn,$mpn,$qty,$date,$lotno,$lotno_extension){
		$space 		= get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$font_style_name 	= $space['font_style_name'];
		$zebra_code = "^XA
						^FO".( 100+ $left_space ).", ".( 40+ $top_space )."
						^CF 0,30
						^FD(P) Customer P/N: ".$pn."
						^FS

						^FO".( 100+ $left_space ).", ".( 65+ $top_space )."
						^BY2
						^BCN, 26, N, N, N
						^FDP".$pn."
						^FS

						^FO".( 100+ $left_space ).", ".( 95+ $top_space )."
						^CF 0,30
						^FD(1P) Manufacture P/N: ".$mpn."
						^FS

						^FO".( 100+ $left_space ).", ".( 120+ $top_space )."
						^BY2
						^BCN, 26, N, N, N
						^FD1P".$mpn."
						^FS

						^FO".( 100+ $left_space ).", ".( 150+ $top_space )."
						^CF 0,30
						^FD(Q) QTY: ".$qty."
						^FS

						^FO".( 100+ $left_space ).", ".( 175+ $top_space )."
						^BY2
						^BCN, 26, N, N, N
						^FDQ".$qty."
						^FS

						^FO".( 100+ $left_space ).", ".( 205+ $top_space )."
						^CF 0,30
						^FD(10D) Date Code: ".$date."
						^FS

						^FO".( 100+ $left_space ).", ".( 227+ $top_space )."
						^BY2
						^BCN, 26, N, N, N
						^FD10D".$date."
						^FS

						^FO".( 100+ $left_space ).", ".( 255+ $top_space )."
						^CF 0,30
						^FD(4L) Country of Origin : PHILIPPINES
						^FS

						^FO".( 100+ $left_space ).", ".( 280+ $top_space )."
						^BY2
						^BCN, 26, N, N, N
						^FD4LPHILIPPINES
						^FS

						^FO".( 100+ $left_space ).", ".( 310+ $top_space )."
						^CF 0,30
						^FD(1T) LOT No: ".$lotno."-".$lotno_extension."
						^FS

						^FO".( 100+ $left_space ).", ".( 335+ $top_space )."
						^BY2
						^BCN, 26, N, N, N
						^FD1T".$lotno."-".$lotno_extension."
						^FS

						^FO".( 100+ $left_space ).", ".( 368+ $top_space )."
						^CF 0,30
						^FDManufacture: YAMAICHI Electronics
						^FS

						^FO".( 100+ $left_space ).", ".( 395+ $top_space )."
						^CF 0,30
						^FDVendor: YAMAICHI Electronics
						^FS


					^XZ
					";
		return $zebra_code;
	}	

	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 7      *********************/
	/***************************************************************/
	/***************************************************************/
	function check_existing_item_name_and_lotno_format7(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$pn_code = $return['spec'];
		$lotno = $return['lotno'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format7';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `spec` = "'.$pn_code.'" AND `lotno` = "'.$lotno.'"';
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
	
	function save_new_c3_label_format7(){
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
			$table   		= "tbl_format7"; //table name
			$array_fields 	= array('pn_code',
									'qty',
									'contractor_code',
									'lotno',
									'lotno_extension',
									'spec',
									'p',
									'date_encoded',
									'lastupdate',
									'username'); //table fields
			if( !isset($return['chk_p']) ){
				$p = 0;
			}else{
				$p = $return['chk_p'];
			}
			$array_values 	= array($return['txt_pn_code'],
									$return['txt_qty'],
									$return['txt_contractor_code'],
									$return['txt_lot_no'],
									$lotno_extension,
									$return['txt_spec'],
									$p,
									date('Y-m-d H:i:s'),
									date('Y-m-d H:i:s'),
									$return['username']); //values to be saved
			$result 			= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["query"]  	= C3::getInstance()->insert_query_test($table,$array_fields,$array_values);
			/* generate zebra code format 11 */
			$return['label'][] = generate_zebra_code_format7($return['txt_pn_code'],$return['txt_qty'],$return['txt_contractor_code'],$return['txt_lot_no'],$lotno_extension,$return['txt_spec'],$p);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}

	function save_new_c3_label_format7_2(){
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
			$table   		= "tbl_format7"; //table name
			$array_fields 	= array('pn_code',
									'qty',
									'contractor_code',
									'lotno',
									'lotno_extension',
									'spec',
									'p',
									'date_encoded',
									'lastupdate',
									'username'); //table fields
			if( !isset($return['chk_p']) ){
				$p = 0;
			}else{
				$p = $return['chk_p'];
			}
			$array_values 	= array($return['txt_pn_code'],
									$return['txt_qty'],
									$return['txt_contractor_code'],
									$return['txt_lot_no'],
									$lotno_extension,
									$return['txt_spec'],
									$p,
									date('Y-m-d H:i:s'),
									date('Y-m-d H:i:s'),
									$return['username']); //values to be saved
			$result 			= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["query"]  	= C3::getInstance()->insert_query_test($table,$array_fields,$array_values);
			/* generate zebra code format 11 */
			$return['label'][] = generate_zebra_code_format7_2($return['txt_pn_code'],$return['txt_qty'],$return['txt_contractor_code'],$return['txt_lot_no'],$lotno_extension,$return['txt_spec'],$p);

		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info_format7(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format7';
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
			$return['html'] .= '	<td>'.$row['pn_code'].'</td>';
			$return['html'] .= '	<td>'.$row['qty'].'</td>';
			$return['html'] .= '	<td>'.$row['contractor_code'].'</td>';
			$return['html'] .= '	<td>'.$row['lotno'].'-'.$row['lotno_extension'].'</td>';
			$return['html'] .= '	<td>'.$row['spec'].'</td>';
			$return['html'] .= '</tr>';
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label_format7(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format7";
			$array_fields = array('logdel');
			$array_values = array('1');
			$pkid = $array_pkid[$x];
			$result = C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		}
		$return['msg'] = 'Label has been deleted!';
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function reprint_label_format7(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format7';
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
			$label = generate_zebra_code_format7($row['pn_code'],$row['qty'],$row['contractor_code'],$row['lotno'],$row['lotno_extension'],$row['spec'],$row['p']);
			$return['label'][] = $label;
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}

	function reprint_label_format7_2(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format7';
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
			$label = generate_zebra_code_format7_2($row['pn_code'],$row['qty'],$row['contractor_code'],$row['lotno'],$row['lotno_extension'],$row['spec'],$row['p']);
			$return['label'][] = $label;
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}

	function generate_zebra_code_format7($pn_code,$qty,$contractor_code,$lotno,$lotno_extension,$spec,$p){
		$space 		= get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$top_space = $top_space-20;
		$font_style_name	= $space['font_style_name'];
		if($p == '1'){
			$print_p = 'P';
		}else{
			$print_p = '';
		}
		$zebra_code = "^XA

						^FX  JAPANESE IMAGES ^FS

						^FO".( 30+ $left_space ).", ".( 10+ $top_space )."^GFA,2304,2304,24,,::::::::::::::::::::::::::::::::::S03,I06O03C,I07IFL03CgL03C,I07IFL07818gJ03E01C,I0700EL07FFCgJ01E01F,I0700EL0IFEgJ01C0C78,I0700EL0E03EgJ01C0F38,I0700EK01E078gJ01C0798,I0700EK03C07K07001FCT01C03C,I0700EK03F0FK07JFCT01C01C,I07FFEK07F9EK03JFCT01C,I07FFEK0E3FCK01C00380018P01C,I0700EJ01C1F8O038001CJ01CJ01FC,I07M0381FP038I0LFEJ01FF8,I06M0701EP038I0MFJ01CFC,01C0C701801E03CP03J07FFC01FJ01C3E,01IF7FFC01C07IF8M03J03P01C0F,01IF7FFCJ0JF8M07U01C07,01C0E7038I01F0038M07U01C07,01C0E7038I07F0038I071IFCT01C,01C0E7038I0F70038I07JFCT01C,01C0E7038003C70038I03FC00CT01C,01C0E703801F870038I018X01C,01C0E703801E070038gI01C,01C0E7038J070038gI01C,01FFE7FF8J07IF8gI01C,:01C0C7038J070038gI01C,01C007M07003,S07,,::::::::::::::::::::::::::::::^FS

						^FO".( 80+ $left_space ).", ".( 70+ $top_space )."^GFA,3840,3840,40,,:::::::::::::::::::::::::::::::::::gU01J018O03L018K0E,gN01CI0C19C6001E01CL03L03EK0E01C,Q0FS0JFCI0C1DCE001C01CL0338J07EK0C01C,Q0ER0100EK0C398C001C0DCL033CJ07EK0C018,Q0ER01KF800CF199001C1DC2K031F8I0E3K0CE1C,Q0ER01KFC00FE7FB801DD9C7007KFC001C38I07FF1C,N01E0E038O0300E03C0FFEFFB80LF007KFC003C1EI07FF1C,N01E0E038O07FEIF007FEFBF00LFK03K0780F8I01C1C,N0180E03P070EE0C001C3D9F001C31CL03K0E003EI03818,N0180E03Q0FEFFE001C398F801C71CL03J03IFDF80073IF8,N0180E03M03801FEFFE001C37BFC03C61C3J03BJ0JFC7800E3IF8,N0180E03007KFCJ0CJ03E2IFC03F7IFC07FF98I0EJ02I0E01C,N0180E03003KFC0180C18003F7FFCC03KFC07FFB8Q01F81C,N0180E03P01JFE003FFBFE007DC3EJ03038Q03FE1C,N0180E03P01C1C1C007EE7FFC07CC7EJ0301CI07KF007CE1C,N0180E03P01JFC006CJFC07C07FJ0301CI0LF00CC61C,N0180E03P01JFC00EC38E700DC0DF8I0300EK06L0C01C,N0180E03P01C1C0C01CC18E7009C1D9CI0306F04I0EL0C01C,N0180E03P01C1C1C008C3C7E009C39DEI03FE784I0C08J0C01C,N01C0E07P01JFCC00C3F3C601C71CFI07F87CCI0C0EJ0C01C,N01KFP01C1C1CC00C773CC01CE1C7807F003FC0018078I0C01818,N01CI07P01C1C00C00C637EC01D81C38038001F803JFCI0CJFC,N018I03P01C1IFC00CE0EFC01D01C1001J0FC03JFCI0CJFC,N018I02R01IFC00FC383E01C01CN03C03F001CI0C,N018V01IFC00F8701C01C018Q01J0CI0E,N018gI0806J01CY04I0C,,:::::::::::::::::::::::::::::::::^FS

						^FO".( 440+ $left_space ).", ".( 70+ $top_space )."^GFA,2304,2304,24,,:::::::::::::::::::::::::::::::::::V06,T01870078J03800E,T01C738F8J03JF,U0E778EK03JF,U0I70EK03800E,U077E0EK03IFE,U037DDCK03IFE,T03JFC0EI03800E,T03MFI03IFE,U01FC3IFI03IFE3,U03FE387J03800E78,U07FF787I0MFC,U0FI787I0MFC,T01E73F86J07I07,T03C71D8EJ07JF8,T070719CEJ07JF8,T060F00CEJ070707,V0E0EFCJ07JF,T03KFCJ07JF,T03JF78J070707,U0387078J07JF,U038F078J07JF,U07FE0FCJ070707C,U0FFE0FFI01LF,U0E3F1CF8001LF,V07F787EK07003,U01E3F03EK070078,U07C3E01E007LFC,T03F0F800C007LFC,T03C0E,,:::::::::::::::::::::::::::::^FS

						^FO".( 50+ $left_space ).", ".( 140+ $top_space )."^GFA,1848,1848,24,,:::::::::::::::::::::::K03S018,J01FC003806L01818g06,I03FFC003E078K0183Eg078,007FFBJ0E03CK01BBEg03807,00FF838I06C1CI01JF8g03867800F1C38I07C1C7001JFgG0387B80038C7J01JF8I019EgG0383D8019CC7I061JF8I01BC380063FFCR0381E,019CCE1807B818I07KFC007IFCR0380E,01KFC03B018I07KFC007F818006O038,01KFC01B018K01EN018006J06J03E,038I07001F018K03CN038007KF8I03FC,078I06I06018J01IFM038003KF8I03BF,07JF8I06018FI03IFM038003F80018I038F8,037IF8I0E7IFI07C03M03S0383C,I0E07J0C7IF001FC03M03S0381C,I070EI07C018I07CC03J0C3FFCR038,I039CI07C018I0F0IFJ0JFCR038,I01FCI01C018I0C0IFJ07EU038,J0FJ01C018K0C03gG038,I01FCI01C01838I0C03gG038,I07FF8001C0187CI0C03gG038,003F0FFC01KFCI0IFgG038,03FC03FC01KFCI0IFgG038,03EI070018N0C,,:::::::::::::::::::::::::::^FS

						^FO".( 380+ $left_space ).", ".( 130+ $top_space )."^GFA,2592,2592,27,,:::::::::::::::::::::::::::::::::::::V03C,T03C1CM038,L078L03C18I0C07FF8O0F87C01F,L01EM0C18I07FF0FCJ038I03818079C,M07M0818I03C00FK038I03C18070E,M03I0CI0818L03CJ0E18I03C180E0E,P018I0818K0778J0F18I03E180E0E,P03J0818K03EK0718I02E180E0F,K01FI06J0818K038K061803027181E07,L07800CJ0818K03L0E1807027181E07,L038038J0818K07L0C180E023981E07,L01807J01818K07L0C181C023981E07,O0EJ01838K07K01C1838021D81E07,N03CJ01838K0EK03818E0021D81E07,N078L03L0EK0381BC0020F81E07,M01EM03K01CK0703F80020F80E0F,L043EM06K03CK0703EI020780E0E,L06F8M0EK078K0E03CI020780E0E038,L07FM03CK0FK01C018I0203803BC03C,L03EM07K01EK038L0F81801F803C,L01CL01EK018K03M0F81800F0018,T078,T07,,::::::::::::::::::::::::::::::::::^FS

						^FO".( (-10) + $left_space ).", ".( 360+ $top_space )."^GFA,2304,2304,24,,::::::::::::::::::::::::::::::::::N07006K0FY06,L018738EK0F0078K0CO078,L01E738EK0E0078K0IFEL078,M0F770EK0E007L0IFEL0F03,M07760C0CI0E007L0E01CL0IF8,M077F9C1FI0E707L0E01CK01IFC,L03IFDIF00IF87L0E01CK01C07C,L03IFDIF00IF87L0E01CK03C0F,L03B79FC7J01E07L0E01CK0780E,L03BFDFE6J01C07L0E01CK07E1E,L03BIF7EJ0380707J0IFCK0FF3C,L03B7FE3EJ079JF8I0IFCJ01C7F8,L03F77C3CJ0F1JF8I0E01CJ0383F,L03E77C3EJ0E007L0EM0703E,L03E7FCFF8001FC07L0CM0E03C,L03C7FDE7F003FF07J03818E03003C078,L03873FE3F007EF07J03FFEIF80380JF,L0307E7E0C00EE707J03FFEIF8I01JF,N01E0E0C00CE307J0381CE07J03E007,N01C0E1EI0E007J0381CE07J0FE007,L03MFI0E007J0381CE07I01EE007,L03MFI0E007J0381CE07I078E007,N03C0EK0E007J0381CE07003F0E007,N0380EK0E007J0381CE07003C0E007,N0780EK0E0070380381CE07K0E007,N0F00EK0E7JFC03FFCIFK0JF,M01E00EK0E7JFC03FFCIFK0JF,M07C00EK0EM03818E07K0E007,L03FI0EK0EM03800EM0E006,L03CI0EK0EY0E,,::::::::::::::::::::::::::::::^FS

						^FX FIXED VALUES ^FS
						^FO".( 610+ $left_space ).", ".( 415+ $top_space )."
						^CF 0,26
						^FD[EIAJ C-3]
						^FS

						^FX BARCODE ^FS

						^FO".( 15+ $left_space ).", ".( 248+ $top_space )."
						^BY1
						^B3N, N, 50, N, N
						^FD3N 1 ".$pn_code."
						^FS

						^FO".( 15+ $left_space ).", ".( 335+ $top_space )."
						^BY1
						^B3N, N, 50, N, N
						^FD3N 2 ".$qty." ".$lotno."-".$lotno_extension." ".$contractor_code."
						^FS

						^FO".( 580+ $left_space ).", ".( 115+ $top_space )."
						^A0N20,100
						^FD".$print_p."
						^FS

						^FX BARCODE TEXT ^FS
						^FX  ######## Select Font ######## ^FS

						^FO".( 30+ $left_space ).", ".( 220+ $top_space )."
						^CF 0,26
						^FD(3N) 1 ".$pn_code."
						^FS

						^FO".( 30+ $left_space ).", ".( 305+ $top_space )."
						^CF 0,26
						^FD(3N) 2 ".$qty." ".$lotno."-".$lotno_extension." ".$contractor_code."
						^FS

						^FX VALUES ^FS

						^FO".( 230+ $left_space ).", ".( 65+ $top_space )."
						^AAN0,40
						^FD:".$pn_code."
						^FS

						^FO".( 580+ $left_space ).", ".( 120+ $top_space )."
						^AAN0,30
						^FD:".$qty."pcs
						^FS

						^FO".( 240+ $left_space ).", ".( 178+ $top_space )."
						^AAN0,30
						^FD:".$contractor_code."
						^FS

						^FO".( 580+ $left_space ).", ".( 183+ $top_space )."
						^AAN0,30
						^FD:".$lotno."-".$lotno_extension."
						^FS

						^FO".( 159+ $left_space ).", ".( 415+ $top_space )."
						^AAN0,30
						^FD:".$spec."
						^FS


						^XZ";
		return $zebra_code;
	}


	function generate_zebra_code_format7_2($pn_code,$qty,$contractor_code,$lotno,$lotno_extension,$spec,$p){
		$space 		= get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$top_space = $top_space-20;
		$font_style_name	= $space['font_style_name'];
		if($p == '1'){
			$print_p = 'P';
		}else{
			$print_p = '';
		}
		$zebra_code = "^XA

						^FX  JAPANESE IMAGES ^FS

						^FO".( 30+ $left_space ).", ".( 10+ $top_space )."^GFA,2304,2304,24,,::::::::::::::::::::::::::::::::::S03,I06O03C,I07IFL03CgL03C,I07IFL07818gJ03E01C,I0700EL07FFCgJ01E01F,I0700EL0IFEgJ01C0C78,I0700EL0E03EgJ01C0F38,I0700EK01E078gJ01C0798,I0700EK03C07K07001FCT01C03C,I0700EK03F0FK07JFCT01C01C,I07FFEK07F9EK03JFCT01C,I07FFEK0E3FCK01C00380018P01C,I0700EJ01C1F8O038001CJ01CJ01FC,I07M0381FP038I0LFEJ01FF8,I06M0701EP038I0MFJ01CFC,01C0C701801E03CP03J07FFC01FJ01C3E,01IF7FFC01C07IF8M03J03P01C0F,01IF7FFCJ0JF8M07U01C07,01C0E7038I01F0038M07U01C07,01C0E7038I07F0038I071IFCT01C,01C0E7038I0F70038I07JFCT01C,01C0E7038003C70038I03FC00CT01C,01C0E703801F870038I018X01C,01C0E703801E070038gI01C,01C0E7038J070038gI01C,01FFE7FF8J07IF8gI01C,:01C0C7038J070038gI01C,01C007M07003,S07,,::::::::::::::::::::::::::::::^FS

						^FO".( 80+ $left_space ).", ".( 70+ $top_space )."^GFA,3840,3840,40,,:::::::::::::::::::::::::::::::::::gU01J018O03L018K0E,gN01CI0C19C6001E01CL03L03EK0E01C,Q0FS0JFCI0C1DCE001C01CL0338J07EK0C01C,Q0ER0100EK0C398C001C0DCL033CJ07EK0C018,Q0ER01KF800CF199001C1DC2K031F8I0E3K0CE1C,Q0ER01KFC00FE7FB801DD9C7007KFC001C38I07FF1C,N01E0E038O0300E03C0FFEFFB80LF007KFC003C1EI07FF1C,N01E0E038O07FEIF007FEFBF00LFK03K0780F8I01C1C,N0180E03P070EE0C001C3D9F001C31CL03K0E003EI03818,N0180E03Q0FEFFE001C398F801C71CL03J03IFDF80073IF8,N0180E03M03801FEFFE001C37BFC03C61C3J03BJ0JFC7800E3IF8,N0180E03007KFCJ0CJ03E2IFC03F7IFC07FF98I0EJ02I0E01C,N0180E03003KFC0180C18003F7FFCC03KFC07FFB8Q01F81C,N0180E03P01JFE003FFBFE007DC3EJ03038Q03FE1C,N0180E03P01C1C1C007EE7FFC07CC7EJ0301CI07KF007CE1C,N0180E03P01JFC006CJFC07C07FJ0301CI0LF00CC61C,N0180E03P01JFC00EC38E700DC0DF8I0300EK06L0C01C,N0180E03P01C1C0C01CC18E7009C1D9CI0306F04I0EL0C01C,N0180E03P01C1C1C008C3C7E009C39DEI03FE784I0C08J0C01C,N01C0E07P01JFCC00C3F3C601C71CFI07F87CCI0C0EJ0C01C,N01KFP01C1C1CC00C773CC01CE1C7807F003FC0018078I0C01818,N01CI07P01C1C00C00C637EC01D81C38038001F803JFCI0CJFC,N018I03P01C1IFC00CE0EFC01D01C1001J0FC03JFCI0CJFC,N018I02R01IFC00FC383E01C01CN03C03F001CI0C,N018V01IFC00F8701C01C018Q01J0CI0E,N018gI0806J01CY04I0C,,:::::::::::::::::::::::::::::::::^FS

						^FO".( 440+ $left_space ).", ".( 70+ $top_space )."^GFA,2304,2304,24,,:::::::::::::::::::::::::::::::::::V06,T01870078J03800E,T01C738F8J03JF,U0E778EK03JF,U0I70EK03800E,U077E0EK03IFE,U037DDCK03IFE,T03JFC0EI03800E,T03MFI03IFE,U01FC3IFI03IFE3,U03FE387J03800E78,U07FF787I0MFC,U0FI787I0MFC,T01E73F86J07I07,T03C71D8EJ07JF8,T070719CEJ07JF8,T060F00CEJ070707,V0E0EFCJ07JF,T03KFCJ07JF,T03JF78J070707,U0387078J07JF,U038F078J07JF,U07FE0FCJ070707C,U0FFE0FFI01LF,U0E3F1CF8001LF,V07F787EK07003,U01E3F03EK070078,U07C3E01E007LFC,T03F0F800C007LFC,T03C0E,,:::::::::::::::::::::::::::::^FS

						^FO".( 50+ $left_space ).", ".( 140+ $top_space )."^GFA,1848,1848,24,,:::::::::::::::::::::::K03S018,J01FC003806L01818g06,I03FFC003E078K0183Eg078,007FFBJ0E03CK01BBEg03807,00FF838I06C1CI01JF8g03867800F1C38I07C1C7001JFgG0387B80038C7J01JF8I019EgG0383D8019CC7I061JF8I01BC380063FFCR0381E,019CCE1807B818I07KFC007IFCR0380E,01KFC03B018I07KFC007F818006O038,01KFC01B018K01EN018006J06J03E,038I07001F018K03CN038007KF8I03FC,078I06I06018J01IFM038003KF8I03BF,07JF8I06018FI03IFM038003F80018I038F8,037IF8I0E7IFI07C03M03S0383C,I0E07J0C7IF001FC03M03S0381C,I070EI07C018I07CC03J0C3FFCR038,I039CI07C018I0F0IFJ0JFCR038,I01FCI01C018I0C0IFJ07EU038,J0FJ01C018K0C03gG038,I01FCI01C01838I0C03gG038,I07FF8001C0187CI0C03gG038,003F0FFC01KFCI0IFgG038,03FC03FC01KFCI0IFgG038,03EI070018N0C,,:::::::::::::::::::::::::::^FS

						^FO".( 380+ $left_space ).", ".( 130+ $top_space )."^GFA,2592,2592,27,,:::::::::::::::::::::::::::::::::::::V03C,T03C1CM038,L078L03C18I0C07FF8O0F87C01F,L01EM0C18I07FF0FCJ038I03818079C,M07M0818I03C00FK038I03C18070E,M03I0CI0818L03CJ0E18I03C180E0E,P018I0818K0778J0F18I03E180E0E,P03J0818K03EK0718I02E180E0F,K01FI06J0818K038K061803027181E07,L07800CJ0818K03L0E1807027181E07,L038038J0818K07L0C180E023981E07,L01807J01818K07L0C181C023981E07,O0EJ01838K07K01C1838021D81E07,N03CJ01838K0EK03818E0021D81E07,N078L03L0EK0381BC0020F81E07,M01EM03K01CK0703F80020F80E0F,L043EM06K03CK0703EI020780E0E,L06F8M0EK078K0E03CI020780E0E038,L07FM03CK0FK01C018I0203803BC03C,L03EM07K01EK038L0F81801F803C,L01CL01EK018K03M0F81800F0018,T078,T07,,::::::::::::::::::::::::::::::::::^FS

						^FO".( (-10) + $left_space ).", ".( 360+ $top_space )."^GFA,2304,2304,24,,::::::::::::::::::::::::::::::::::N07006K0FY06,L018738EK0F0078K0CO078,L01E738EK0E0078K0IFEL078,M0F770EK0E007L0IFEL0F03,M07760C0CI0E007L0E01CL0IF8,M077F9C1FI0E707L0E01CK01IFC,L03IFDIF00IF87L0E01CK01C07C,L03IFDIF00IF87L0E01CK03C0F,L03B79FC7J01E07L0E01CK0780E,L03BFDFE6J01C07L0E01CK07E1E,L03BIF7EJ0380707J0IFCK0FF3C,L03B7FE3EJ079JF8I0IFCJ01C7F8,L03F77C3CJ0F1JF8I0E01CJ0383F,L03E77C3EJ0E007L0EM0703E,L03E7FCFF8001FC07L0CM0E03C,L03C7FDE7F003FF07J03818E03003C078,L03873FE3F007EF07J03FFEIF80380JF,L0307E7E0C00EE707J03FFEIF8I01JF,N01E0E0C00CE307J0381CE07J03E007,N01C0E1EI0E007J0381CE07J0FE007,L03MFI0E007J0381CE07I01EE007,L03MFI0E007J0381CE07I078E007,N03C0EK0E007J0381CE07003F0E007,N0380EK0E007J0381CE07003C0E007,N0780EK0E0070380381CE07K0E007,N0F00EK0E7JFC03FFCIFK0JF,M01E00EK0E7JFC03FFCIFK0JF,M07C00EK0EM03818E07K0E007,L03FI0EK0EM03800EM0E006,L03CI0EK0EY0E,,::::::::::::::::::::::::::::::^FS

						^FX FIXED VALUES ^FS
						^FO".( 610+ $left_space ).", ".( 415+ $top_space )."
						^CF 0,26
						^FD[EIAJ C-3]
						^FS

						^FX BARCODE ^FS

						^FO".( 15+ $left_space ).", ".( 248+ $top_space )."
						^BY1
						^B3N, N, 50, N, N
						^FD3N 1 ".$pn_code."
						^FS

						^FO".( 15+ $left_space ).", ".( 335+ $top_space )."
						^BY1
						^B3N, N, 50, N, N
						^FD3N 2 ".$qty." ".$lotno."-".$lotno_extension." ".$contractor_code."
						^FS

						^FO".( 580+ $left_space ).", ".( 115+ $top_space )."
						^A0N20,100
						^FD".$print_p."
						^FS

						^FX BARCODE TEXT ^FS
						^FX  ######## Select Font ######## ^FS

						^FO".( 30+ $left_space ).", ".( 220+ $top_space )."
						^CF 0,26
						^FD3N 1 ".$pn_code."
						^FS

						^FO".( 30+ $left_space ).", ".( 305+ $top_space )."
						^CF 0,26
						^FD3N 2 ".$qty." ".$lotno."-".$lotno_extension." ".$contractor_code."
						^FS

						^FX VALUES ^FS

						^FO".( 230+ $left_space ).", ".( 65+ $top_space )."
						^AAN0,40
						^FD:".$pn_code."
						^FS

						^FO".( 580+ $left_space ).", ".( 120+ $top_space )."
						^AAN0,30
						^FD:".$qty."pcs
						^FS

						^FO".( 240+ $left_space ).", ".( 178+ $top_space )."
						^AAN0,30
						^FD:".$contractor_code."
						^FS

						^FO".( 580+ $left_space ).", ".( 183+ $top_space )."
						^AAN0,30
						^FD:".$lotno."-".$lotno_extension."
						^FS

						^FO".( 159+ $left_space ).", ".( 415+ $top_space )."
						^AAN0,30
						^FD:".$spec."
						^FS


						^XZ";
		echo $zebra_code;
	}
	
	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 8      *********************/
	/***************************************************************/
	/***************************************************************/
	function check_existing_item_name_and_lotno_format8(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$pn_code = $return['pn_code'];
		$lotno = $return['lotno'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format8';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `pn_code` = "'.$pn_code.'" AND `lotno` = "'.$lotno.'"';
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
	
	function save_new_c3_label_format8(){
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
			$table   		= "tbl_format8"; //table name
			$array_fields 	= array('pn_code','qty','yec_pn','lotno','lotno_extension','date_encoded','lastupdate','username'); //table fields
			$array_values 	= array($return['txt_pn_code'],$return['txt_qty'],$return['txt_yec_pn'],$return['txt_lot_no'],$lotno_extension,date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			/* generate zebra code format 8 */
			$return['label'][] = generate_zebra_code_format8($return['txt_pn_code'],$return['txt_qty'],$return['txt_yec_pn'],$return['txt_lot_no'],$lotno_extension);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info_format8(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format8';
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
			$return['html'] .= '	<td>'.$row['pn_code'].'</td>';
			$return['html'] .= '	<td>'.$row['qty'].'</td>';
			$return['html'] .= '	<td>'.$row['yec_pn'].'</td>';
			$return['html'] .= '	<td>'.$row['lotno'].'-'.$row['lotno_extension'].'</td>';
			$return['html'] .= '</tr>';
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label_format8(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format8";
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
	
	function reprint_label_format8(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format8';
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
			$label = generate_zebra_code_format8($row['pn_code'],$row['qty'],$row['yec_pn'],$row['lotno'],$row['lotno_extension']);
			$return['label'][] = $label;
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format8($pn_code,$qty,$yec_pn,$lotno,$lotno_extension){
		$space 		= get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$font_style_name 	= $space['font_style_name'];
		$zebra_code = "^XA
							^FO".( 10+ $left_space ).", ".( 12+ $top_space )."^GFA,1232,1232,16,,::::::::::::::N018,00FF8I038W07,00FFCI0384V03838,00C18I07FEV0309C,00C18I060CV030EC,00C18I0E1CI083F8O0307,00FF8001F38I0IFCO0303,00FF8001BFJ0781802M03,00C080071EL0180300FFI03E,008J0E0CL01803JF800378,0FF7F818381K03001F801I031C,0FF7FC007FF8J03P030E,0C361800F0180183F8O0304,0C361803F01800IF8O03,0C36180F301800FR03,0C3618183018U03,0FF7F8003FF8U03,:0C0208003018U03,N01,,::::::M018,001FC001839EK0F80380FC03FE,001FE003839EJ03F80FE0FF03FE,I0C700301CCJ03B80EE0670186,I0C300701CCJ071C1C70638186,I0C300601ECJ060C1830618198,I0C700E01ECJ060C1830618198,I0FE00C01ECJ060018306181F8,I0FC01C01FCJ060018306181F8,I0C001801BCJ06001830618198,I0C003801BCJ06001830618198,I0C003001BCJ060C183061818,I0C0070019CJ070C1C70638186,I0C0060019CJ039C0EE0670186,001E00E003CCJ03F80FE0FF03FE,001E00C003CCK0F00380FC03FE,L0C,,:::::::::::::::::^FS

							^FO".( 12+ $left_space ).", ".( 90+ $top_space )."^GFA,986,986,17,,::M03C07P0C003,L063DC78O0JF8,L07B9C78O0JF8,L03BB87P0E0038,L01BF0EP0JF8,L01BE0EP0JF8,L0JFE06N0E0038,L0JFC0FN0JF8,M07E1IFN0JF98,M0FF9IFN0E0033E,L01FBB87M01LFE,L03B9FC7M01LFE,L07386C7N01JFC,K01E38EC6N01JFC,K01C3CCEEN01C1C38,M03C66EN01JF8,L0JFEEN01JF8,L0KFCN01C1C38,M0E383CN01C1C38,L01C383CN01JF8,L01FF07EN01JFE,L03FF0FFN07KF8,L039F8EF8M07KF8,M03FBC7EO01C018,M0F9F83EO01C03E,L03E1F01EM0LFE,L0F87CP0LFE,L0E07,,::::::::::::::::::::::::::^FS

							^FO".( 370+ $left_space ).", ".( 95+ $top_space )."^GFA,928,928,16,,:::::::O0F8001FC07FF,O0F8003FE07FF,O07I038E0673,O07I07070673,O07I0707007,::O07I0703007,:O07I0707007,:::O07060386007,O070E03CE007,O0FFE01FC01F8,O0FFE00F801F8,,::::::::::N01F1F01FC,N01F1F03FE,O0F8C038E,O0F8C0707,O0DCC0707,:O0CEC0707,O0CEC0703,O0C7C0703,O0C7C0707,:O0C3C0707,:O0C1C0386038,O0C1C03CE038,N01F0C01FC038,N01F0C00F8038,,::::^FS

							^FO".( 9+ $left_space ).", ".( 170+ $top_space )."^GFA,1232,1232,16,,:::::::::::gK02,X08L06,K0EQ01FFCJ07,K0EQ01FDCJ0FDC,K0EQ01C0CJ0FFE,I020CQ0180CI01C3C,I060E06O0180CI01838,I060E06O01C1CI03C7,I060E06O01FFCI07F7,I060E06L0E001C0CI0E7E,I060E0601KFI08J01C3C,I060E0601JFEI08J03838,I060E06N01FF3FE0607FF,I060E06N01FF3FEI0IF8,I060E06N01C730E003E038,I060C06N018730E00FE03,I060E06N018730E01E603,I060E0EN018730E070603,I07IFEN01C738EI0603,I06I0EN01FF3FEI07FF,I06I04N01C630CI0787,I06R01802K0603,gK04,,:::::gJ04,gJ06,0078707FC003L0FFJ0C0C0E,0078F07FE01FEK0FFCI0C1E1E,0038E038603CEK071C00180F0C,0038C03020306K070E0018070C,0018C03020707K070E0030078C,001C8030806M070E0030078C,001D803180EM070E006005CC,I0F803F80EM071C006004CC,I0F003F80EM07F800C004EC,I07003180EM07FI0C0046C,I07003080EM07I01C0047C,I06003I0EM07I0180043C,I07003I0603K07I03I043C,I06003030706K07I03I041C,I0700307030EK07I02I0C1C,I0F0079E01FCK0FI06I0E0C,I0F807FE00FL0F800E001E0C,gH0C,:,::::::::::::::^FS

							^FO".( 50+ $left_space ).", ".( 270+ $top_space )."^GFA,7776,7776,54,,::::::::::::::::::::::V07IF,V0JF8,T03MF,S01NFE,S03OF,R01PFE,R03QF,R0RFE,Q07KFI0KF8,Q0KFCI03JFC,P01IFE001C003JF,P03IFC003EI07IF,P07FFE001FF8001IF8,O01IF8003FFEI03FFE,O03IFI03FFEI03IF,O03FFCI0JF8I07FF8I07FCK01FE07FFJ01FFEL0IFJ07FFJ03FCI03JFC7FCK07F07F8,O07FFJ0JF8I03FFCI07FEK03FF07FFJ03IFL0IFJ07FFJ03FC003KFE7FCK07F87F8,O0FFEI01JFCI01FFCI07FEK07FE07FF8I03IFK01IFJ0IFJ03FC00LFE7FCK0FF8FF8,N01FFCI01JFCJ0IFI03FFK07FC0IF8I03IFK01IFJ0IF8I03FC03LFE7FCK0FF8FF8,N03FF8I03JFEJ07FFI01FF8J0FFC0IFCI03IF8J01IFI01IF8I03FC07LFE7FCK0FF87F8,N07FFJ07FF3FFJ03FF8001FF8I01FF81IFCI03IF8J03IFI01IFCI03FC0MFE7FCK0FF87F8,N07FEJ07FE3FFJ01FFCI0FFCI03FF01IFEI03IF8J03IFI01IFCI03FC1IFCJ07FCK0FF87F8,N0FFCJ07FE1FFK0FFEI07FEI03FF01IFEI03IFCJ07IFI03IFEI03FC1FFEK07FCK0FF87F8,M01FF8J07FC0FF8J07FEI07FEI07FE03JFI03IFCJ07IFI03IFEI03FC3FF8K07FCK0FF87F8,M01FF8J07FC0FF8J03FFI03FFI0FFC03JFI03IFEJ07IFI07JFI03FC3FFL07FCK0FF87F8,M03FEJ01FF80FFCJ01FF8003FF800FF807FDFFI03IFEJ0JFI07FDFFI03FC7FEL07FCK0FF87F8,M03FCJ01FF80FFCJ01FF8001FF801FF807FCFF8003IFEJ0JFI0FF9FF8003FC7FCL07FCK0FF87F8,M07FCJ01FF807FCK0FF8I0FFC03FF00FF8FF8003JFJ0JFI0FF8FF8003FCFFCL07FCK0FF87F8,M0FFCJ01FF807FCK07FCI07FE07FF00FF8FFC003JFI01JFI0FF0FF8003FCFFCL07FCK0FF87F8,M0FF8J01FF007FCK03FEI07FE07FE00FF07FC003JF8001JF001FF07FC003FCFF8L07FCK0FF87F8,M0FFK01FE007FEK03FEI03FF0FFC01FF07FE003FEFF8003JF001FF07FC003FCFF8L07FCK0FF87F8,L01FFK01FE007FEK01FEI01FF9FF801FF03FE003FEFF8003FCFF003FE07FE003FCFF8L07FCK07F87F8,L03FFK01FE007FEK01FFI01FFBFF803FE03FE003FE7FC003FCFF003FC03FE003FCFFM07FCK0FF87F8,L03FEK03FE007FEL0FFJ0KF003FE01FF003FE7FC007FCFF003FC03FE003JFM07OF87F8,L03FCK03FE003FEL0FFJ07IFE003FC01FF003FE3FC007FCFF007FC03FF003JFM07OF87F8,L07FCK03FE003FEL0FFJ07IFE007FC01FF803FE3FE00FF8FF007FC01FF003JFM07OF87F8,L07FCK03FE003FEL07F8I03IFC007F800FF803FE3FE00FF8FF00FF801FF803JFM07OF87F8,L07FCK03FE003FEL03FCI01IF800FF800FFC03FE1FF00FF0FF00FF800FF803JFM07OF87F8,L07F8K03FE003FEL03FCI01IF800FF800FFC03FE1FF01FF0FF00FFI0FFC03JFM07OF87F8,L07F8K03FE001FEL03FCJ0IF001FFI07FC03FE0FF01FE0FF01FFI0FFC03JFM07OF87F8,L07F8K03FE001FEL03FCJ07FE001FFI07FE03FE0FF83FE0FF01FFI07FC03JFM07FEJ01FF87F8,L07F87WF03FCJ07FE001MFE03FE0FF83FE0FF03MFE03JFM07FCK0FF87F8,L0FF8XF83FCJ03FC003NF03FE07FC7FC0FF03MFE03FCFF8L07FCK0FF87F8,K01FF8XF83FEJ03FC003NF03FE07FC7FC0FF07NF03FCFF8L07FCK0FF87F8,K01FF0XF81FEJ03FC007NF03FE03FC7F80FF07NF03FCFF8L07FCK0FF87F8,K01FE0XF81FEJ03FC007NF83FE03FE7F80FF07NF83FCFFCL07FCK0FF87F8,K01FE0XF81FEJ03FC007NF83FE03JF80FF0OF83FCFFCL07FCK0FF87F8,K01FE0XF81FEJ03FC00OFC3FE01JF00FF0OF83FC7FEL07FCK0FF87F8,K01FE0RFE7JF81FEJ03FC00FF8J0FFC3FE01JF00FF1FF8J0FFC3FC7FEL07FCK0FF87F8,K01FE0FFC007FC001FEI0FF81FEJ03FC00FFK07FE3FE01JF00FF1FFK07FC3FC7FFL07FCK0FF87F8,K01FE07FC003FC001FEI0FF81FEJ03FC01FFK03FE3FE00IFE00FF1FFK07FE3FC3FFCK07FCK0FF87F8,K01FE07FC003FC001FFI0FF81FEJ03FC01FFK03FE3FE00IFE00FF3FEK03FE3FC3IFK07FCK0FF87F8,K01FE07FC003FC001FF801FF81FEJ03FC03FEK01FF3FE007FFC00FF3FEK03FE3FC1JF81FC7FCK0FF87F8,K01FE03FC003FC001FF801FF81FEJ03FC03FEK01FF3FE007FFC00FF3FCK01FF3FC0MFE7FCK0FF87F8,K01FE03FC007FC001FF801FF81FEJ03FC07FCL0FFBFE003FFC00FF7FCK01FF3FC07LFE7FCK0FF87F8,K01FE03FC00FFC001FF801FF81FEJ03FC07FCL0FFBFE003FF800JFCL0FFBFC03LFE7FCK0FF87F8,K01FF03FC00FFC001FF801FF83FEJ03FC07FCL07IFE003FF800JF8L0JFC00LFE7FCK0FF8FF8,L0FF83FC00FFC001FF801FF03FCJ03FC0FF8L07IFE001FFI0JF8L07IFC007KFE7FCK0FF8FF8,L07F83FE00FFC001FF801FF03FCJ03FC0FF8L03IFE001FFI0JFM07IFCI07JFE7FCK0FF87F8,L07F83FE00FFC001FF801FF03FC,L07F83FF00FF8I0FF801FF03FC,L07F83FF00FFJ07F801FF03FC,L07F83FF00FFJ07F801FE03FC,L07FC1FF00FFJ07FC01FE03FCI03IF00F8J03FFEI0IFC03JFE0JF8I01FFC003F803E0F8007FFC007IFC,L03FC1FF01FFJ07FE03FE07F8001JF00F8I01IFE003IFC03JFE0JFCI03IF003F803E0F803IFC00JFC,L03FC0FF03FFJ07FE07FE0FFI01JF00F8I01IFE007IF803JFE0JFEI07IF003F803E0F807IFC00JFC,L03FC1FF83FFJ07FE07FE0FFI01JF00F8I01IFE007FJ03JFE0F801FI0FC1FC03FC03E0F803FJ03JFC,L03FE0FF83FFJ03FE07FE0FFI03IFE00F8I03IFE007EJ01JFE0F801F801F80FC03FE03E0F807EJ03JF8,L01FF0FF83FFJ03FF07FC1FFI07FCJ0F8I07F8J0FCL03EI0F801FC03F007E03FF03E0F80FCJ03F8,M0FF07FC7FEJ03FF0FFC3FEI07EK0F8I07CK0F8L03EI0F801FC07E003E03FF03E0F80F8J03E,M0FF07FE7FCJ01FF1FF83FCI07CK0F8I07CK0FM03EI0F801FC0FE003F03FF03E0F80F8J03E,M0FFC7JFEK0KF87FCI07IFE00F8I07IFE00FM03EI0F803FC0FE003F83FF83E0F80F8J03F8,M07FC3JFCK0KF0FFCI07JF00F8I07IFE00FM03EI0KF80FC001F83FFC3E0F80F8J03JF,M03FE1JF8K0KF0FF8I07JF00F8I07IFE00FM03EI0KF00F8I0F83E7E3E0F80F8J03JF,M03FE1JF8K07JF1FF8I07JF00F8I07IFE00FM03EI0JFE00F8I0F83E7F1E0F80F8K0JFC,M03FF1JFL03IFE1FFJ07IFE00F8I07IFE00FM03EI0JFC00F8I0F83E7F9E0F80F8K0JFC,M01FF8IFEL01IFC7FEJ07CK0F8I07CK0FM03EI0JFC00F8I0F83E3F9E0F80F8K07JF,N0FFC7FFCM0IF87FEJ07CK0F8I07CK0FM03EI0FC1FC00F8001F83E1FFE0F80F8N0FF,N0FFE3FF8M07FF0FFCJ07CK0F8I07CK0F8L03EI0F80FE00F8003F83E0FFE0F80F8N07F,N07FF0FFN01F81FFCJ07CK0F8I07CJ01FCL03EI0F807F00FE003F03E0FFE0F80FCN03F,N03FF87EO0103FF8J07EK0F8I07EK0FEL03EI0F803F007E003E03E0FFE0F80FEN01F,N03FFCS07FFK07FK0F8I07FK07FL03EI0F801F003F007E03E07FE0F807FN01F,O0FFES0FFEK03F8J0FCI03F8J07IF8I03EI0F801F001FC0FC03E01FE0F807IF8K0FF,O0IFR01FFCK01FCJ0FEI01FCJ07IFCI03EI0F801FI0FC1FC03E01FE0F803IFCJ01FF,O07FFCQ07FF8K01IFE007IF01IFE001IFCI03EI0F801FC007IF003E007E0F801IFC03JFC,O03FFEP01IFM0JF003IF01IFE001IFCI03EI0F800FC003IF003E007E0F800IFC03JF8,O01IFP03IFM03IF001IF003FFEI0IFCI03EI0F8007C001FFC003E007E0F8007FFC03JF,P07FFEO0IFC,P07IFN01IF8,P01JFM0JF,Q0JF8K01IFE,Q07JFEI0KF8,Q01RFE,R0RFC,R01QF,S0PFE,S01OF,T01MF,U0LFE,V03IF,:,:::::::::::::::::::^FS

							^FO".( 2+ $left_space ).", ".( 14+ $top_space )."
							^GB 140,73,2,B
							^FS
							^CF 0,20

							^FO".( 2+ $left_space ).", ".( 85+ $top_space )."
							^GB 140,73,2,B
							^FS
							^CF 0,20

							^FO".( 2+ $left_space ).", ".( 156+ $top_space )."
							^GB 140,102,2,B
							^FS
							^CF 0,20

							^FO".( 2+ $left_space ).", ".( 256+ $top_space )."
							^GB 550,175,2,B
							^FS
							^CF 0,20

							^FO".( 140+ $left_space ).", ".( 14+ $top_space )."
							^GB 609,73,2,B
							^FS
							^CF 0,20

							^FO".( 140+ $left_space ).", ".( 85+ $top_space )."
							^GB 214,74,2,B
							^FS
							^CF 0,20

							^FO".( 352+ $left_space ).", ".( 85+ $top_space )."
							^GB 150,74,2,B
							^FS
							^CF 0,20

							^FO".( 500+ $left_space ).", ".( 85+ $top_space )."
							^GB 249,74,2,B
							^FS
							^CF 0,20

							^FO".( 140+ $left_space ).", ".( 157+ $top_space )."
							^GB 609,102,2,B
							^FS
							^CF 0,20

							^FO".( 550+ $left_space ).", ".( 256+ $top_space )."
							^GB 199,175,2,B
							^FS
							^CF 0,20

							^FO".( 45+ $left_space ).", ".( 130+ $top_space )."
							^CF 0,26
							^FDQ' TY
							^FS

							^CWA,E:".$font_style_name.".FNT

							^FO".( 180+ $left_space ).", ".( 60+ $top_space )."
							^AAN 0,36
							^FD".$pn_code."
							^FS

							^FO".( 180+ $left_space ).", ".( 133+ $top_space )."
							^AAN 0,36
							^FD".$qty."pcs
							^FS

							^FO".( 530+ $left_space ).", ".( 133+ $top_space )."
							^AAN 0,36
							^FD".$lotno."-".$lotno_extension."
							^FS

							^FO".( 180+ $left_space ).", ".( 195+ $top_space )."
							^BY2
							^BCN, 60, N, N, N
							^FD".$yec_pn."
							^FS

							^FO".( 180+ $left_space ).", ".( 183+ $top_space )."
							^AAN 0,36
							^FD".$yec_pn."
							^FS

							^FO".( 570+ $left_space ).", ".( 265+ $top_space )."
							^BQN,2, 5
							^FD".add_backslash_reserve_words($yec_pn)." ".$pn_code." ".$lotno."-".$lotno_extension."
							^FS


						^XZ";
		return $zebra_code;
	}
	
	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 9      *********************/
	/***************************************************************/
	/***************************************************************/
	function check_existing_item_name_and_lotno_format9(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$pn_code = $return['iac_part_no'];
		$lotno = $return['lotno'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format9';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `iac_partno` = "'.$pn_code.'" AND `lotno` = "'.$lotno.'"';
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
	
	function save_new_c3_label_format9(){
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
			$table   		= "tbl_format9"; //table name
			$array_fields 	= array('iac_partno',
									'qty',
									'part_no',
									'lotno',
									'lotno_extension',
									'date_encoded',
									'lastupdate',
									'username'); //table fields
			$array_values 	= array($return['txt_iac_part_no'],
									$return['txt_qty'],
									$return['txt_part_no'],
									$return['txt_lot_no'],
									$lotno_extension,
									date('Y-m-d H:i:s'),
									date('Y-m-d H:i:s'),
									$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			/* generate zebra code format 9 */
			$return['label'][] = generate_zebra_code_format9($return['txt_iac_part_no'],$return['txt_qty'],$return['txt_part_no'],$return['txt_lot_no'],$lotno_extension);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info_format9(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format9';
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
			$return['html'] .= '	<td>'.$row['iac_partno'].'</td>';
			$return['html'] .= '	<td>'.$row['qty'].'</td>';
			$return['html'] .= '	<td>'.$row['lotno'].'-'.$row['lotno_extension'].'</td>';
			$return['html'] .= '	<td>'.$row['part_no'].'</td>';
			$return['html'] .= '</tr>';
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label_format9(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format9";
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
	
	function reprint_label_format9(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format9';
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
			$label = generate_zebra_code_format9($row['iac_partno'],$row['qty'],$row['part_no'],$row['lotno'],$row['lotno_extension']);
			$return['label'][] = $label;
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format9($iac_partno,$qty,$part_no,$lotno,$lotno_extension){
		$space 		= get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$font_style_name 	= $space['font_style_name'];
		$zebra_code = "^XA
						^FX ~~CODE FOR FORMAT 9~~ ^FS

						^FX##### IMAGES #####^FS

						^FO".( 40+ $left_space ).", ".( 338+ $top_space )."^GFA,675,675,9,,::::::M0FFC,L0JFE,K03KF8,K0LFE,J03MF8,J0IFC03FFE,I01FF80C07FF,I
						03FE03F00FF8,I0FF807F803FE,I0FF00FFC00FE,001FC01FFE007F,003F801FFE003F8,007F003FBF
						001FC,00FE003F3FI0FE,00FC003F1F8007E,01F8007E1F8003F,01FI07E1F8003F,03FI07E0F8001F8,0
						3EI07C0FCI0F8,07EI07C0FCI0FC,07CI0FC0FCI07C,0FCI0FC0FCI07C,0FCI0FC0FCI03E,0F8I0FC
						0FCI03E,0F8I0FC07CI03E,0F9PFE3E,1F9PFE3F,1F1PFE1F,:1F1MFDFFE1F,1F1F80F807C03E1F,1F
						1F80F807E07E1F,1F0F80F807E07E1F,1F0F81F807E07E1F,1F8F81F807E07E3F,0F8FC1F807E07E3E,:
						0F8FC1F003E07E3E,0FCFC1F003F07C3E,07C7C3F003F0FC7C,07C7E3F003F0FC7C,07E7E3F001F
						8FCFC,03E3F7E001F9F8F8,03F3FFEI0IF9F8,01F9FFCI0IF3F,01F9FFCI07FF3F,00FCFF8I03FE7E,0
						0FE7FJ01FCFE,007F3EK0F1FC,003F8M03F8,001FCM07F,001FFL01FE,I07F8K03FE,I03FEK0FF8,I
						01FFCI03FF,J0IFC07FFE,J03MF8,K0LFE,K03KF8,L07IFC,M07FC,,::::::^FS
						^FO120,325^GFA,7776,7776,72,,::::::::::::::::::::::::::::::::::::::3CI03C001F8001F8I03EI07EI0780IFC3CI078EL0
						IFDEK07FFC03IF0KFC7IFCI0FFI0FI03CF01IF80JFL03IF8Q01CJ03,1EI03C001F8001FCI03FI07EI0
						781IFC3CI078EK01IFDEK0IFE07IF8KFC7IFE003FFI0F8003CF03IF81JFL07IF8Q01CJ078,1EI07800
						3F8001FCI07FI0FEI0787IFC3CI079EK03IF9EJ01IFC1JF07JFC7JF807FFE00F8003CF0JF87JFK01JF
						R01CJ03K01C0FI0FI03FC001FCI07EI0FFI0787CI03CI079EK07E001EJ03FI01F8K038007800781F01
						F00FC003CF0F8I07O01F8T01CJ03K01C07800EI03BE001FEI0FEI0EFI078FJ03CI079EK0F8001EJ07
						8I03EL038007I03C3E00780FE003CF1EJ0EO03CU01CJ03K01C07801EI079E001FEI0FE001E780079EJ
						03CI079EK0FI01EJ0FJ03CL0380078003C7C00380FE003CF3CI01EO03CU01CJ03K01C03C03CI079E
						001FF001FE001C380079EJ03CI079EJ01EI01EJ0FJ07CL0380078003C78003C0FF003CF3CI01EO078U
						01CI07FFCI01C01E078I070F001FF001EE003C3C007BCJ03CI079EJ01CI01EJ0EJ078L038007I03CFI0
						1E0E7803CF78I01EO078U01CI07FFCI07C00F078I0F03001E7801EE00383C007FCJ03CI079EJ03CI01
						EI01EJ07M038007I03CEI01E0E3C03CFF8I01EO0FL0FFN01CI07FFC07FFC00F0FJ0E03801E7803C
						E00781E007FCJ03CI039EJ03CI01EI01EJ0FM038007I07DEJ0E0E1C03CFF8J0FO0FK03FFCM01CJ07
						800IFC0079EI01E03801E38038E00781E007FCJ03CI079EJ03CI01EI01EJ0FM038007800F9EJ0F0E1E0
						3CFF8J0F8N0FK07FFEM01CJ03001EFFC003FCI01C03801E38038E00700E007FCJ03KF9EJ03JFDEI
						01JFCFM038007JF1EJ070E0F03CFFK07IF8K0FK0F81FM01CJ03003C01C001FCI01C03C01E1C078
						E00700F007FCJ03KF9EJ03JFDEI01JFEFM038007IF81EJ070E0783CFFK07IFEK0FK0F00FM01CJ030
						07801C001F8I03803C01E1E070E00E007007FCJ03CJF9EJ03EIF9EI01E7FFCFM0380079F7C1EJ070E
						0783CFFK01FF3FK0FJ01E0038L01CJ03007801CI0FJ03801E01E1E0F0E00E007807FCJ03CI079EJ03
						CI01EI01EJ0FM038007003E1EJ070E03C3CFFN01FK0FJ01E003CL01CJ03007001CI0FJ07IFE01E0E0
						F0E01JF807FCJ03CI079EJ03CI01EI01EJ0FM038007001F1EJ070E01C3CFF8N0F8J0FJ01C003CL01C
						J0300F001CI0FJ07IFE01E0F0E0E01JF807FCJ03CI079EJ01CI01EI01EJ0FM038007I070EJ0F0E00E3C
						FF8N078J0FJ01C003CL01CJ0300F001CI0FJ0KF01E071E0E03JFC07FCJ03CI079EJ01CI01EI01EJ07
						M038007I078EJ0E0E00F3CFF8N038J07J01C003CL01CJ0300F001CI0FJ0EI0F01E071C0E038003C079
						EJ03CI079EJ01EI01EJ0FJ078L038007I0787I01E0E007FCF3CN038J078I01E003CL01CJ03007001CI0F
						J0EI0381E03BC0E038I0E079EJ03CI079EK0EI01EJ0FJ03CL038007I07878001E0E003FCF3CN038J07C
						I01E0038L01CJ03007001CI0FI01EI0381E03F80E078I0E079FJ03CI079EK0FJ0EJ078I03CL038007I038
						3C007C0E003FCF3CN078J03CJ0E0078L01CJ03007801CI0FI01CI03C1E03F80F07J0F078FCI03CI079
						EK07CI0EJ07EI01FL038007I0381F00F80E001FCF1F8M078J01FJ0F00F8M0EJ07803C01CI0FI03CI01
						C1E01F80F0FJ070787CI03CI079EK03EI07J03FI01F8K038007I0380F00F00EI0F8F0F8M0FK01F8I07
						C3FN0FJ03E03C03CI0FI038I01C1E01F00F0EJ070783IFC3CI079EK01IFC78I01IFE0JF80038007I03C
						07FFE00EI078F07IF8KFL0JF83FFE0E7K078I03FC1IFCI0FI078J0E1E00F00F1EJ0387807FFC3CI078
						EL0IFC1FFE007FFE01IF80038007I03C01FF800EI078F00IF8JFEL01IF80FFC0E7K01FFE01FC07FF
						CI06I078J0E0C0060061CJ0383003FFC38I030CL03FF807FE003FFC00IFI038007I01800FEI0CI038600
						7FF8JF8M0IF007F00C6L07FE00FC07FFClK02,,:::::::::::::::::::::::::::::::::::::::::^FS

						^FO".( 160+ $left_space ).", ".( 15+ $top_space )."
						^GBO,320,2
						^FS

						^FO".( 2+ $left_space ).", ".( 115+ $top_space )."
						^GB743,0,2
						^FS

						^FO".( 2+ $left_space ).", ".( 175+ $top_space )."
						^GB743,0,2
						^FS

						^FO".( 2+ $left_space ).", ".( 265+ $top_space )."
						^GB743,0,2
						^FS

						^FO".( 2+ $left_space ).", ".( 335+ $top_space )."
						^GB743,0,2
						^FS

						^FO".( 2+ $left_space ).", ".( 14+ $top_space )."
						^GB 746,400,2,B
						^FS
						^CF 0,20

						^FX #####Text Labels ##### ^FS

						^FO".( 45+ $left_space ).", ".( 35+ $top_space )."
						^A0N,35,0
						^FDI A C.
						^FS

						^FO".( 35+ $left_space ).", ".( 70+ $top_space )."
						^A0N,35,0
						^FDPart No.
						^FS

						^FO".( 30+ $left_space ).", ".( 135+ $top_space )."
						^A0N,35,0
						^FDQuantity
						^FS

						^FO".( 30+ $left_space ).", ".( 207+ $top_space )."
						^A0N,35,0
						^FDLOT No.
						^FS

						^FO".( 30+ $left_space ).", ".( 290+ $top_space )."
						^A0N,35,0
						^FDPart No.
						^FS

						^FO".( 175+ $left_space ).", ".( 87+ $top_space )."
						^A0N,30,0
						^FD".$iac_partno."
						^FS

						^FO".( 175+ $left_space ).", ".( 135+ $top_space )."
						^A0N,35,0
						^FD".$qty." pcs
						^FS

						^FO".( 175+ $left_space ).", ".( 205+ $top_space )."
						^A0N,40,0
						^FD".$lotno."-".$lotno_extension."
						^FS

						^FO".( 175+ $left_space ).", ".( 287+ $top_space )."
						^A0N,35,0
						^FD".$part_no."
						^FS

						^FX ##### Barcodes ##### ^FS

						^FO".( 175+ $left_space ).", ".( 22+ $top_space )."
						^BY2
						^B3N,N,60,N,N
						^FD".$iac_partno."
						^FS

						^FO".( 390+ $left_space ).", ".( 190+ $top_space )."
						^BY2
						^B3N,N,60,N,N
						^FD".$lotno."-".$lotno_extension."
						^FS


						^XZ";
		return $zebra_code;
	}
	
	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 10     *********************/
	/***************************************************************/
	/***************************************************************/
	function check_existing_item_name_and_lotno_format10(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$pn_code = $return['spec'];
		$lotno = $return['lotno'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format10';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `spec` = "'.$pn_code.'" AND `lotno` = "'.$lotno.'"';
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
	
	function save_new_c3_label_format10(){
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
			$table   		= "tbl_format10"; //table name
			$array_fields 	= array('pn_code',
									'qty',
									'contractor_code',
									'lotno',
									'lotno_extension',
									'spec',
									'p',
									'date_encoded',
									'lastupdate',
									'username'); //table fields
			if( !isset($return['chk_p']) ){
				$p = 0;
			}else{
				$p = $return['chk_p'];
			}
			$array_values 	= array($return['txt_pn_code'],
									$return['txt_qty'],
									$return['txt_contractor_code'],
									$return['txt_lot_no'],
									$lotno_extension,
									$return['txt_spec'],
									$p,
									date('Y-m-d H:i:s'),
									date('Y-m-d H:i:s'),
									$return['username']); //values to be saved
			$result 			= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["query"]  	= C3::getInstance()->insert_query_test($table,$array_fields,$array_values);
			/* generate zebra code format 11 */
			$return['label'][] = generate_zebra_code_format10($return['txt_pn_code'],$return['txt_qty'],$return['txt_contractor_code'],$return['txt_lot_no'],$lotno_extension,$return['txt_spec'],$p);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info_format10(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format10';
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
			$return['html'] .= '	<td>'.$row['pn_code'].'</td>';
			$return['html'] .= '	<td>'.$row['qty'].'</td>';
			$return['html'] .= '	<td>'.$row['contractor_code'].'</td>';
			$return['html'] .= '	<td>'.$row['lotno'].'-'.$row['lotno_extension'].'</td>';
			$return['html'] .= '	<td>'.$row['spec'].'</td>';
			$return['html'] .= '</tr>';
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label_format10(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format10";
			$array_fields = array('logdel');
			$array_values = array('1');
			$pkid = $array_pkid[$x];
			$result = C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		}
		$return['msg'] = 'Label has been deleted!';
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function reprint_label_format10(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format10';
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
			$label = generate_zebra_code_format10($row['pn_code'],$row['qty'],$row['contractor_code'],$row['lotno'],$row['lotno_extension'],$row['spec']);
			$return['label'][] = $label;
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format10($pn_code,$qty,$contractor_code,$lotno,$lotno_extension,$spec){
		$space 		= get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$font_style_name	= $space['font_style_name'];
		
		$array_hidden_label = array( "1-822-411-21",
									 "1-822-837-31"
									);
		if(in_array($pn_code,$array_hidden_label)){
			$barcode_3N1 	= "3N1".$pn_code;
			$barcode_3N2 	= "3N2 ".$qty." ".$lotno."-".$lotno_extension." ".$contractor_code;
			$text_3N1		= "";
			$text_3N2		= "";
		}else{
			$barcode_3N1 	= "3N 1 ".$pn_code." ".$qty;
			$barcode_3N2 	= "3N 2 ".$lotno."-".$lotno_extension." ".$contractor_code;
			$text_3N1		= "(3N) 1 ".$pn_code." ".$qty;
			$text_3N2		= "(3N) 2 ".$lotno."-".$lotno_extension." ".$contractor_code;
		}

		$zebra_code = "^XA

						^FX  JAPANESE IMAGES ^FS

						^FO".( 30+ $left_space ).", ".( 10+ $top_space )."^GFA,2304,2304,24,,::::::::::::::::::::::::::::::::::S03,I06O03C,I07IFL03CgL03C,I07IFL07818gJ03E01C,I0700EL07FFCgJ01E01F,I0700EL0IFEgJ01C0C78,I0700EL0E03EgJ01C0F38,I0700EK01E078gJ01C0798,I0700EK03C07K07001FCT01C03C,I0700EK03F0FK07JFCT01C01C,I07FFEK07F9EK03JFCT01C,I07FFEK0E3FCK01C00380018P01C,I0700EJ01C1F8O038001CJ01CJ01FC,I07M0381FP038I0LFEJ01FF8,I06M0701EP038I0MFJ01CFC,01C0C701801E03CP03J07FFC01FJ01C3E,01IF7FFC01C07IF8M03J03P01C0F,01IF7FFCJ0JF8M07U01C07,01C0E7038I01F0038M07U01C07,01C0E7038I07F0038I071IFCT01C,01C0E7038I0F70038I07JFCT01C,01C0E7038003C70038I03FC00CT01C,01C0E703801F870038I018X01C,01C0E703801E070038gI01C,01C0E7038J070038gI01C,01FFE7FF8J07IF8gI01C,:01C0C7038J070038gI01C,01C007M07003,S07,,::::::::::::::::::::::::::::::^FS

						^FO".( 80+ $left_space ).", ".( 70+ $top_space )."^GFA,3840,3840,40,,:::::::::::::::::::::::::::::::::::gU01J018O03L018K0E,gN01CI0C19C6001E01CL03L03EK0E01C,Q0FS0JFCI0C1DCE001C01CL0338J07EK0C01C,Q0ER0100EK0C398C001C0DCL033CJ07EK0C018,Q0ER01KF800CF199001C1DC2K031F8I0E3K0CE1C,Q0ER01KFC00FE7FB801DD9C7007KFC001C38I07FF1C,N01E0E038O0300E03C0FFEFFB80LF007KFC003C1EI07FF1C,N01E0E038O07FEIF007FEFBF00LFK03K0780F8I01C1C,N0180E03P070EE0C001C3D9F001C31CL03K0E003EI03818,N0180E03Q0FEFFE001C398F801C71CL03J03IFDF80073IF8,N0180E03M03801FEFFE001C37BFC03C61C3J03BJ0JFC7800E3IF8,N0180E03007KFCJ0CJ03E2IFC03F7IFC07FF98I0EJ02I0E01C,N0180E03003KFC0180C18003F7FFCC03KFC07FFB8Q01F81C,N0180E03P01JFE003FFBFE007DC3EJ03038Q03FE1C,N0180E03P01C1C1C007EE7FFC07CC7EJ0301CI07KF007CE1C,N0180E03P01JFC006CJFC07C07FJ0301CI0LF00CC61C,N0180E03P01JFC00EC38E700DC0DF8I0300EK06L0C01C,N0180E03P01C1C0C01CC18E7009C1D9CI0306F04I0EL0C01C,N0180E03P01C1C1C008C3C7E009C39DEI03FE784I0C08J0C01C,N01C0E07P01JFCC00C3F3C601C71CFI07F87CCI0C0EJ0C01C,N01KFP01C1C1CC00C773CC01CE1C7807F003FC0018078I0C01818,N01CI07P01C1C00C00C637EC01D81C38038001F803JFCI0CJFC,N018I03P01C1IFC00CE0EFC01D01C1001J0FC03JFCI0CJFC,N018I02R01IFC00FC383E01C01CN03C03F001CI0C,N018V01IFC00F8701C01C018Q01J0CI0E,N018gI0806J01CY04I0C,,:::::::::::::::::::::::::::::::::^FS

						^FO".( 440+ $left_space ).", ".( 70+ $top_space )."^GFA,2304,2304,24,,:::::::::::::::::::::::::::::::::::V06,T01870078J03800E,T01C738F8J03JF,U0E778EK03JF,U0I70EK03800E,U077E0EK03IFE,U037DDCK03IFE,T03JFC0EI03800E,T03MFI03IFE,U01FC3IFI03IFE3,U03FE387J03800E78,U07FF787I0MFC,U0FI787I0MFC,T01E73F86J07I07,T03C71D8EJ07JF8,T070719CEJ07JF8,T060F00CEJ070707,V0E0EFCJ07JF,T03KFCJ07JF,T03JF78J070707,U0387078J07JF,U038F078J07JF,U07FE0FCJ070707C,U0FFE0FFI01LF,U0E3F1CF8001LF,V07F787EK07003,U01E3F03EK070078,U07C3E01E007LFC,T03F0F800C007LFC,T03C0E,,:::::::::::::::::::::::::::::^FS

						^FO".( 50+ $left_space ).", ".( 140+ $top_space )."^GFA,1848,1848,24,,:::::::::::::::::::::::K03S018,J01FC003806L01818g06,I03FFC003E078K0183Eg078,007FFBJ0E03CK01BBEg03807,00FF838I06C1CI01JF8g03867800F1C38I07C1C7001JFgG0387B80038C7J01JF8I019EgG0383D8019CC7I061JF8I01BC380063FFCR0381E,019CCE1807B818I07KFC007IFCR0380E,01KFC03B018I07KFC007F818006O038,01KFC01B018K01EN018006J06J03E,038I07001F018K03CN038007KF8I03FC,078I06I06018J01IFM038003KF8I03BF,07JF8I06018FI03IFM038003F80018I038F8,037IF8I0E7IFI07C03M03S0383C,I0E07J0C7IF001FC03M03S0381C,I070EI07C018I07CC03J0C3FFCR038,I039CI07C018I0F0IFJ0JFCR038,I01FCI01C018I0C0IFJ07EU038,J0FJ01C018K0C03gG038,I01FCI01C01838I0C03gG038,I07FF8001C0187CI0C03gG038,003F0FFC01KFCI0IFgG038,03FC03FC01KFCI0IFgG038,03EI070018N0C,,:::::::::::::::::::::::::::^FS

						^FO".( 380+ $left_space ).", ".( 130+ $top_space )."^GFA,2592,2592,27,,:::::::::::::::::::::::::::::::::::::V03C,T03C1CM038,L078L03C18I0C07FF8O0F87C01F,L01EM0C18I07FF0FCJ038I03818079C,M07M0818I03C00FK038I03C18070E,M03I0CI0818L03CJ0E18I03C180E0E,P018I0818K0778J0F18I03E180E0E,P03J0818K03EK0718I02E180E0F,K01FI06J0818K038K061803027181E07,L07800CJ0818K03L0E1807027181E07,L038038J0818K07L0C180E023981E07,L01807J01818K07L0C181C023981E07,O0EJ01838K07K01C1838021D81E07,N03CJ01838K0EK03818E0021D81E07,N078L03L0EK0381BC0020F81E07,M01EM03K01CK0703F80020F80E0F,L043EM06K03CK0703EI020780E0E,L06F8M0EK078K0E03CI020780E0E038,L07FM03CK0FK01C018I0203803BC03C,L03EM07K01EK038L0F81801F803C,L01CL01EK018K03M0F81800F0018,T078,T07,,::::::::::::::::::::::::::::::::::^FS

						^FO".( 50+ $left_space ).", ".( 340+ $top_space )."^GFA,2304,2304,24,,::::::::::::::::::::::::::::::::::N07006K0FY06,L018738EK0F0078K0CO078,L01E738EK0E0078K0IFEL078,M0F770EK0E007L0IFEL0F03,M07760C0CI0E007L0E01CL0IF8,M077F9C1FI0E707L0E01CK01IFC,L03IFDIF00IF87L0E01CK01C07C,L03IFDIF00IF87L0E01CK03C0F,L03B79FC7J01E07L0E01CK0780E,L03BFDFE6J01C07L0E01CK07E1E,L03BIF7EJ0380707J0IFCK0FF3C,L03B7FE3EJ079JF8I0IFCJ01C7F8,L03F77C3CJ0F1JF8I0E01CJ0383F,L03E77C3EJ0E007L0EM0703E,L03E7FCFF8001FC07L0CM0E03C,L03C7FDE7F003FF07J03818E03003C078,L03873FE3F007EF07J03FFEIF80380JF,L0307E7E0C00EE707J03FFEIF8I01JF,N01E0E0C00CE307J0381CE07J03E007,N01C0E1EI0E007J0381CE07J0FE007,L03MFI0E007J0381CE07I01EE007,L03MFI0E007J0381CE07I078E007,N03C0EK0E007J0381CE07003F0E007,N0380EK0E007J0381CE07003C0E007,N0780EK0E0070380381CE07K0E007,N0F00EK0E7JFC03FFCIFK0JF,M01E00EK0E7JFC03FFCIFK0JF,M07C00EK0EM03818E07K0E007,L03FI0EK0EM03800EM0E006,L03CI0EK0EY0E,,::::::::::::::::::::::::::::::^FS

						^FX FIXED VALUES ^FS
						^FO".( 610+ $left_space ).", ".( 390+ $top_space )."
						^CF 0,26
						^FD[EIAJ C-3]
						^FS

						^FX BARCODE ^FS

						^FO".( 15+ $left_space ).", ".( 230+ $top_space )."
						^BY1
						^B3N, N, 50, N, N
						^FD".$barcode_3N1."
						^FS

						^FO".( 15+ $left_space ).", ".( 310+ $top_space )."
						^BY1
						^B3N, N, 50, N, N
						^FD".$barcode_3N2."
						^FS

						^FX BARCODE TEXT ^FS
						^FX  ######## Select Font ######## ^FS

						^FO".( 30+ $left_space ).", ".( 210+ $top_space )."
						^CF 0,26
						^FD".$text_3N1."
						^FS

						^FO".( 30+ $left_space ).", ".( 290+ $top_space )."
						^CF 0,26
						^FD".$text_3N2."
						^FS

						^FX VALUES ^FS

						^FO".( 230+ $left_space ).", ".( 63+ $top_space )."
						^AAN0,40
						^FD:".$pn_code."
						^FS

						^FO".( 580+ $left_space ).", ".( 133+ $top_space )."
						^AAN0,30
						^FD:".$qty."pcs
						^FS

						^FO".( 240+ $left_space ).", ".( 188+ $top_space )."
						^AAN0,30
						^FD:".$contractor_code."
						^FS

						^FO".( 580+ $left_space ).", ".( 188+ $top_space )."
						^AAN0,30
						^FD:".$lotno."-".$lotno_extension."
						^FS
						
						^FO".( 230+ $left_space ).", ".( 400+ $top_space )."
						^AAN0,30
						^FD: ".$spec."
						^FS
						
						^XZ";
		return $zebra_code;
	}
	
	
	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 11     *********************/
	/***************************************************************/
	/***************************************************************/
	function check_existing_item_name_and_lotno_format11(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$pn_code = $return['partno'];
		$lotno = $return['lotno'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format11';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `partno` = "'.$pn_code.'" AND `lotno` = "'.$lotno.'"';
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
	
	function save_new_c3_label_format11(){
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
			$table   		= "tbl_format11"; //table name
			$array_fields 	= array('partno',
									'lotno',
									'lotno_extension',
									'qty',
									'vendor',
									'spec',
									'date_encoded',
									'lastupdate',
									'username'); //table fields
			$array_values 	= array($return['txt_partno'],
									$return['txt_lot_no'],
									$lotno_extension,
									$return['txt_qty'],
									$return['txt_vendor'],
									$return['txt_spec'],
									date('Y-m-d H:i:s'),
									date('Y-m-d H:i:s'),
									$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			/* generate zebra code format 11 */
			$return['label'][] = generate_zebra_code_format11($return['txt_partno'],$return['txt_qty'],$return['txt_vendor'],$return['txt_spec'],$return['txt_lot_no'],$lotno_extension);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info_format11(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format11';
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
			$return['html'] .= '	<td>'.$row['partno'].'</td>';
			$return['html'] .= '	<td>'.$row['lotno'].'-'.$row['lotno_extension'].'</td>';
			$return['html'] .= '	<td>'.$row['qty'].'</td>';
			$return['html'] .= '	<td>'.$row['vendor'].'</td>';
			$return['html'] .= '	<td>'.$row['spec'].'</td>';
			$return['html'] .= '</tr>';
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label_format11(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format11";
			$array_fields = array('logdel');
			$array_values = array('1');
			$pkid = $array_pkid[$x];
			$result = C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		}
		$return['msg'] = 'Label has been deleted!';
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function reprint_label_format11(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format11';
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
			$label = generate_zebra_code_format11($row['partno'],$row['qty'],$row['vendor'],$row['spec'],$row['lotno'],$row['lotno_extension']);
			$return['label'][] = $label;
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format11($partno,$qty,$vendor,$spec,$lotno,$lotno_extension){
		$space = get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$font_style_name 	= $space['font_style_name'];
		
		$zebra_code = "^XA
						^FX ~~CODE FOR FORMAT 11~~ ^FS

						^FX #####Text Labels ##### ^FS

						^FO".( 17+ $left_space ).", ".( 85+ $top_space )."
						^A0N,35,0
						^FDPart No.
						^FS

						^FO".( 140+ $left_space ).", ".( 85+ $top_space )."
						^A0N,35,0
						^FD".$partno."
						^FS

						^FO".( 17+ $left_space ).", ".( 185+ $top_space )."
						^A0N,35,0
						^FDDate:
						^FS

						^FO".( 100+ $left_space ).", ".( 185+ $top_space )."
						^A0N,35,0
						^FD".$lotno."-".$lotno_extension."
						^FS

						^FO".( 450+ $left_space ).", ".( 185+ $top_space )."
						^A0N,35,0
						^FDQuantity:
						^FS

						^FO".( 580+ $left_space ).", ".( 185+ $top_space )."
						^A0N,35,0
						^FD".$qty." pcs
						^FS

						^FO".( 17+ $left_space ).", ".( 285+ $top_space )."
						^A0N,35,0
						^FDVendor:
						^FS

						^FO".( 130+ $left_space ).", ".( 285+ $top_space )."
						^A0N,35,0
						^FD".$vendor."
						^FS

						^FO".( 280+ $left_space ).", ".( 285+ $top_space )."
						^A0N,35,0
						^FD(YAMAICHI-ELECTRONICS)
						^FS

						^FO".( 17+ $left_space ).", ".( 385+ $top_space )."
						^A0N,35,0
						^FDSpec:
						^FS

						^FO".( 100+ $left_space ).", ".( 385+ $top_space )."
						^A0N,35,0
						^FD".$spec."
						^FS

						^FX ##### Barcodes ##### ^FS

						^FO".( 17+ $left_space ).", ".( 22+ $top_space )."
						^BY2
						^B3N,N,55,N,N
						^FD".$partno."
						^FS

						^FO".( 17+ $left_space ).", ".( 120+ $top_space )."
						^BY2
						^B3N,N,55,N,N
						^FD".$lotno."-".$lotno_extension."
						^FS

						^FO".( 17+ $left_space ).", ".( 120+ $top_space )."
						^BY2
						^B3N,N,55,N,N
						^FD".$lotno."-".$lotno_extension."
						^FS

						^FO".( 17+ $left_space ).", ".( 220+ $top_space )."
						^BY2
						^B3N,N,55,N,N
						^FD".$vendor."
						^FS

						^FO".( 17+ $left_space ).", ".( 320+ $top_space )."
						^BY2
						^B3N,N,55,N,N
						^FD".$spec."
						^FS

						^FO".( 450+ $left_space ).", ".( 120+ $top_space )."
						^BY2
						^B3N,N,55,N,N
						^FD".$qty." pcs
						^FS

						^XZ
						";
		return $zebra_code;
	}
	
	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 13     *********************/
	/***************************************************************/
	/***************************************************************/
	function check_existing_item_name_and_lotno_format13(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$pn_code = $return['pn'];
		$lotno = $return['lotno'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format13';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `pn` = "'.$pn_code.'" AND `lotno` = "'.$lotno.'"';
		$sql_order 	= 'ORDER BY `lotno_extension` DESC LIMIT 0,1';
		$sql_limit 	= '';
		$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		// $query = C3::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		// $return['query'] 		   = $query;
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
	
	function save_new_c3_label_format13(){
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
			$table   		= "tbl_format13"; //table name
			$array_fields 	= array('pn',
									'qty',
									'lotno',
									'lotno_extension',
									'mmno',
									'date_code',
									'date_encoded',
									'lastupdate',
									'username'); //table fields
			$array_values 	= array($return['txt_pn'],
									$return['txt_qty'],
									$return['txt_lot_no'],
									$lotno_extension,
									$return['txt_mmno'],
									$return['txt_date_code'],					
									date('Y-m-d H:i:s'),
									date('Y-m-d H:i:s'),
									$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			/* generate zebra code format 9 */
			$return['label'][] = generate_zebra_code_format13($return['txt_pn'],$return['txt_qty'],$return['txt_lot_no'],$lotno_extension,$return['txt_mmno'],$return['txt_date_code']);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info_format13(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format13';
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
			$return['html'] .= '	<td>'.$row['lotno'].'-'.$row['lotno_extension'].'</td>';
			$return['html'] .= '	<td>'.$row['mmno'].'</td>';
			$return['html'] .= '	<td>'.$row['date_code'].'</td>';
			$return['html'] .= '</tr>';
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label_format13(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format13";
			$array_fields = array('logdel');
			$array_values = array('1');
			$pkid = $array_pkid[$x];
			$result = C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		}
		$return['msg'] = 'Label has been deleted!';
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function reprint_label_format13(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format13';
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
			$label = generate_zebra_code_format13($row['pn'],$row['qty'],$row['lotno'],$row['lotno_extension'],$row['mmno'],$row['date_code']);
			$return['label'][] = $label;
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format13($pn,$qty,$lotno,$lotno_extension,$mmno,$date_code){
		$space = get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$font_style_name 	= $space['font_style_name'];
		$zebra_code = "^XA

						^FX ~~CODE FOR FORMAT 13~~ ^FS

						^FX #####Text Labels ##### ^FS

						^FO".( 17+ $left_space ).", ".( 42+ $top_space )."
						^A0N,30,0
						^FDSupp:
						^FS

						^FO".( 85+ $left_space ).", ".( 42+ $top_space )."
						^A0N,30,0
						^FDYAMAICHI ELECTRONICS
						^FS

						^FO".( 17+ $left_space ).", ".( 110+ $top_space )."
						^A0N,30,0
						^FDP/N:
						^FS

						^FO".( 75+ $left_space ).", ".( 110+ $top_space )."
						^A0N,30,0
						^FD".$pn."
						^FS

						^FO".( 17+ $left_space ).", ".( 180+ $top_space )."
						^A0N,30,0
						^FDQ'ty:
						^FS

						^FO".( 75+ $left_space ).", ".( 180+ $top_space )."
						^A0N,30,0
						^FD".$qty."pcs/reel
						^FS

						^FO".( 350+ $left_space ).", ".( 180+ $top_space )."
						^A0N,30,0
						^FDLOT No:
						^FS

						^FO".( 450+ $left_space ).", ".( 180+ $top_space )."
						^A0N,30,0
						^FD".$lotno."-".$lotno_extension."
						^FS

						^FO".( 17+ $left_space ).", ".( 250+ $top_space )."
						^A0N,30,0
						^FDMM's No:
						^FS

						^FO".( 140+ $left_space ).", ".( 250+ $top_space )."
						^A0N,30,0
						^FD".$mmno."
						^FS

						^FO".( 17+ $left_space ).", ".( 330+ $top_space )."
						^A0N,30,0
						^FDDATE CODE:
						^FS

						^FO".( 175+ $left_space ).", ".( 330+ $top_space )."
						^A0N,30,0
						^FD".date('Y/m/d', strtotime($date_code))."
						^FS

						^FX ##### Barcodes ##### ^FS

						^FO".( 17+ $left_space ).", ".( 68+ $top_space )."
						^BY2
						^B3N,N,40,N,N
						^FDYAMAICHI ELECTRONICS
						^FS

						^FO".( 17+ $left_space ).", ".( 135+ $top_space )."
						^BY2
						^B3N,N,40,N,N
						^FD".$pn."
						^FS

						^FO".( 17+ $left_space ).", ".( 205+ $top_space )."
						^BY2
						^B3N,N,40,N,N
						^FD".$qty."
						^FS

						^FO".( 350+ $left_space ).", ".( 205+ $top_space )."
						^BY2
						^B3N,N,40,N,N
						^FD".$lotno."-".$lotno_extension."
						^FS

						^FO".( 17+ $left_space ).", ".( 282+ $top_space )."
						^BY2
						^B3N,N,40,N,N
						^FD".$mmno."
						^FS

						^FO".( 17+ $left_space ).", ".( 355+ $top_space )."
						^BY2
						^B3N,N,40,N,N
						^FD".date('Y/m/d', strtotime($date_code))."
						^FS

						^XZ";
		return $zebra_code;
	}

	//lot number value before is 440 which overlaps the Lot No: label so I changed it to 450 - Novs 2019-06-15
	
	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 14     *********************/
	/***************************************************************/
	/***************************************************************/
	
	function check_existing_item_name_and_lotno14(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$item_name = $return['item_name'];
		$lotno = explode("-",$return['lotno']);
		$lotno = $lotno[0];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format14';
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
	
	function save_new_c3_label14(){
		require_once('../class/c3.php');
		$return 		= $_POST; 
		$print_qty      = $return['txt_print_qty'];
		$return['query'] = '';
		$return['label'] = array();
		for($x=0;$x<$print_qty;$x++){
			if(isset($return['chk_alternate_lot'])){
				$lotno_extension     = generate_alternate_lot_no_extension( $x+1, $return['txt_lot_no_count'] );
			}else{
				if($x==0){
					$lotno_extension = $return['txt_lot_no_count'];
				}else{
					$lotno_extension = generate_new_lot_no_extension($lotno_extension);
				}
			}
			$result 		= "";
			$table   		= "tbl_format14"; //table name
			$array_fields 	= array('item_name','qty','lotno','lotno_extension','product_name','remarks','date_encoded','lastupdate','username'); //table fields
			$array_values 	= array($return['txt_itemname'],$return['txt_qty'],$return['txt_lot_no'],$lotno_extension,$return['txt_product_name'],$return['txt_remarks'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			/* generate zebra code format 1 */
			$return['label'][] = generate_zebra_code_format14($return['txt_itemname'],$return['txt_qty'],$return['txt_lot_no'],$lotno_extension,$return['txt_product_name'],$return['txt_remarks']);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info14(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format14';
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
			$return['html'] .= '	<td>'.$row['product_name'].'</td>';
			$return['html'] .= '	<td>'.$row['lotno'].'-'.$row['lotno_extension'].'</td>';
			$return['html'] .= '	<td>'.$row['remarks'].'</td>';
			$return['html'] .= '</tr>';
		}
		// $return['msg'] = $result;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label14(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format14";
			$array_fields = array('logdel');
			$array_values = array('1');
			$pkid = $array_pkid[$x];
			$result = C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		}
		$return['msg'] = 'Label has been deleted!';
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function reprint_label14(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format14';
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
			$label = generate_zebra_code_format14($row['item_name'],$row['qty'],$row['lotno'],$row['lotno_extension'],$row['product_name'],$row['remarks']);
			$return['label'][] = $label;
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format14($item_name,$qty,$lotno,$lotno_extension,$product_name,$remarks){
		$space = get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$font_style_name = $space['font_style_name'];
		
		$zebra_code = '^XA

						^FX###### ITEM #######
						^FO'.( 12+ $left_space ).', '.( 28^GFA+ $top_space ).'^GFA,986,986,17,,::::N0DFC8P0C,M07FFC8O01C,M03C038P0C,M03801CO01F,M038018O0183FC,M038018O01007,M03801CO0300F,M03801CO0600E,M03IFCN01F61C,M07FC3CN01CC38,M078018N0383F,M078Q0403C,M028P01C01C,L08R030038,L08FC00CM060058FC,L0CFF0IFO03IF8,L0C020C03N01C0038,L0C020C03N0EI01C,L0C021C03M03A6001C,L0C020C03M07060018,L0C020C038J01FC060018,L0C030C03K01F0060018,L0E030E03O07003C,L0IF0IFO07IFC,L0EE70E1FO0730FC,K01C020403O07001C,gH07,,:::::::::::::::::::::::::^FS

						^FO'.( 18+ $left_space ).', '.( 95^GFA+ $top_space ).'^GFA,504,504,14,,::::I098003S07,I0F8073J0IFCK06,00198063J0IFCK0IF,003FFC63J0C00CK0IFC,007FFC63J0C00CJ01C038,I018063J0C00CJ03807,00JF63J0C00CJ0380F,00JF63J0C00CJ0781E,I018063J0C00CI01FE3C,003FFC63J0IFCI03CF78,003FFC63J0IFCI0F83F,00318C63J0C00CI0601E,00319C0FS03C,00319C0FS0F,I0186K0FF87FEI01IFE,K06K0FF87FEI07IFE,00LFC00C18606003FC006,00LFC00C1860600FEC006,J0760CI0C186060078C006,J0E31EI0C186060040C006,I07C1BCI0C18606J0C006,003FC0FJ0C18606J0C006,00FCC07J0FF87FEJ0C006,00E0DF3CI0FF87FEJ0IFE,I0IF1FC00C18606J0IFE,I0FE007C00C18606J0C006,I04J0C,,:::^FS

						^FX###### QTY #######
						^FO'.( 12+ $left_space ).', '.( 163^GFA+ $top_space ).'^GFA,986,986,17,,::M03C07P0C003,L063DC78O0JF8,L07B9C78O0JF8,L03BB87P0E0038,L01BF0EP0JF8,L01BE0EP0JF8,L0JFE06N0E0038,L0JFC0FN0JF8,M07E1IFN0JF98,M0FF9IFN0E0033E,L01FBB87M01LFE,L03B9FC7M01LFE,L07386C7N01JFC,K01E38EC6N01JFC,K01C3CCEEN01C1C38,M03C66EN01JF8,L0JFEEN01JF8,L0KFCN01C1C38,M0E383CN01C1C38,L01C383CN01JF8,L01FF07EN01JFE,L03FF0FFN07KF8,L039F8EF8M07KF8,M03FBC7EO01C018,M0F9F83EO01C03E,L03E1F01EM0LFE,L0F87CP0LFE,L0E07,,::::::::::::::::::::::::::^FS

						^FX###### REMARKS #######
						^FO'.( 12+ $left_space ).', '.( 300^GFA+ $top_space ).'^GFA,986,986,17,,::gH0C,L01839CQ0E,L03C39CQ0E,L03C39C6P0E338,L03839CFP0E7F8,L07KF8M0KF,L077JF8M0JFE,L07039CQ0E3C,L0E679C7P0E783,L0F7JF8O0EF078,K01F7JF8L03LFC,K01E7Q03LFC,K03E7700EP078,K03E77IFO07F1F,K07E77IFO07IF8,K0EE7738EO07IF8,K0CE77FFEN01FE,L0E77FFEN03F0018,L0E7738EN0F7IFC,L0E7738EM01E7IFE,L0E77FFEM0186001E,L0E77FFEO060018,L0E7738ER038,L0EE738ER038,L0EE738ER078,L0EC73FEQ07F,L0FC73FEQ07F,L0F8738EQ03E,L0F06,,:::::::::::::::::::::::::^FS

						^FX###### YAMAICHI LOGO #######
						^FO'.( 50+ $left_space ).', '.( 345^GFA+ $top_space ).'^GFA,675,675,9,,::::::M0FFC,L0JFE,K03KF8,K0LFE,J03MF8,J0IFC03FFE,I01FF80C07FF,I03FE03F00FF8,I0FF807F803FE,I0FF00FFC00FE,001FC01FFE007F,003F801FFE003F8,007F003FBF001FC,00FE003F3FI0FE,00FC003F1F8007E,01F8007E1F8003F,01FI07E1F8003F,03FI07E0F8001F8,03EI07C0FCI0F8,07EI07C0FCI0FC,07CI0FC0FCI07C,0FCI0FC0FCI07C,0FCI0FC0FCI03E,0F8I0FC0FCI03E,0F8I0FC07CI03E,0F9PFE3E,1F9PFE3F,1F1PFE1F,:1F1MFDFFE1F,1F1F80F807C03E1F,1F1F80F807E07E1F,1F0F80F807E07E1F,1F0F81F807E07E1F,1F8F81F807E07E3F,0F8FC1F807E07E3E,:0F8FC1F003E07E3E,0FCFC1F003F07C3E,07C7C3F003F0FC7C,07C7E3F003F0FC7C,07E7E3F001F8FCFC,03E3F7E001F9F8F8,03F3FFEI0IF9F8,01F9FFCI0IF3F,01F9FFCI07FF3F,00FCFF8I03FE7E,00FE7FJ01FCFE,007F3EK0F1FC,003F8M03F8,001FCM07F,001FFL01FE,I07F8K03FE,I03FEK0FF8,I01FFCI03FF,J0IFC07FFE,J03MF8,K0LFE,K03KF8,L07IFC,M07FC,,::::::^FS

						^FX###### YAMAICHI FONT #######
						^FO'.( 120+ $left_space ).', '.( 350^GFA+ $top_space ).'^GFA,4104,4104,72,,:::::::::::::::::007CI0F800FC001FCI07E001F8003C0IFC7CI0F3CK07IFEK0IFC0IFC7JFEJFC007FC007C003EF03IF03IFCK03IF8Q0FJ078J06,007C001F800FC001FCI0FE001F8003C0IFE7C001F7CK07JFK0IFC0IFC7JFEJFE007FE007C003EF03IF03IFCK03IF8Q0FJ078J06,003C001F001FE001FCI0FE003FC003C7IFE7CI0F3CJ01JFEJ07IFC7IFC7JFEKF01IF807E003EF1JF1JFCK0JF8Q0FJ078J078,003E003E001FE001FE001FE003FC003C7EI07CI0F3CJ03F801EJ0FFI07EK07E00F801F83F0FC07E003CF1F8001FN01FCT0FJ078J078,001F007C001FF001FE001FE007FE003CFEI07CI0F3CJ07F001EJ0FEI0FEK03C00F800F87C07E07F003CF3F8003EN03F8T0FJ078J078,I0F80FC003CF001FF001FE0079E003CF8I07CI0F3CJ0FC001EI01FI01F8K03C00F800F8F801F07F803CF3EI03CN03EU0FJ078J078,I0F80F8003CF801FF003FE007BF003CFJ07CI0F3CJ0F8001EI01FI01FL03C00F80079F001F07FC03CF3CI03CN03EU0FI03FFCI078,I07C1FI0787801FF003DE00F9F003DFJ07CI0F3CI01FI01EI03EI01FL03C00F8007BEI0F87BC03CF7CI03CN07CU0FI07FFEI0F8,I03E3EI0783C01E7803DE00F0F003FEJ07CI0F3CI01FI01EI03EI03EL03C00F800F9CI07879E03CFF8I03CN078J01FFN0FI07FFC0IF8,I03F3EI0F83C01F78079E01F0F803FEJ07CI0F3CI01FI01EI03CI03EL03C00F801F3CI07C79F03CFF8I03EN078J07FFCM0FJ07803IF8,I01FFCI0F01C01E78079E01E0F803FEJ07E003F3CI01FI01EI03E0013EL03C00F803F3CI03C78F03CFF8I03F004K078J0FC7EM0FJ07807F0F8,J0FF8I0F03E01E7C0F9E01E07C03FEJ07KF3CI01KFEI03KFEL03C00JFE3CI03C78F83CFF8I01JFK0F8I01F83FM0FJ07807C078,J07FI01E01E01E3E0F1E03C07C03FEJ07KF3CI01KFEI03KFEL03C00JF03CI03C787C3CFF8J0JFCJ0F8I01F01FM0FJ0780F8078,J07FI01E01F01E3E1F1E03C03E03FEJ07C001F3CI01FI01EI03EI03EL03C00F80F83CI03C783E3CFF8L01FCJ0F8I03E00F8L0FJ0780F8078,J03EI01E01F01E1E1E3E07C03E03FEJ07C001F3CI01FI01EI03CI03EL03C00F807C3CI03C781E3CFF8M0FEJ0F8I03C00F8L0FJ0780F0078,J03EI03JF81E1F1E3E07IFE03FEJ07C001F3CI01FI01EI03EI03EL03C00F801E3CI03C781F3CFF8M03EJ078I03C00F8L0FJ0780F0078,J03EI07JF81E0F3E3E0KF03FEJ07C001F3CI01FI01EI03EI03EL03C00F801F1CI03C780F3CFF8M01EJ078I03C0078L0FJ0781F0078,J03EI07JF81E0FFC3E0KF03DFJ07C001F3CJ0FI01EI03EI03FL03C00F800F1EI0787807BCF7CM01FJ07CI03C00F8L0FJ0780F0078,J03EI078007C1E073C3E0FI0F83CFJ07C001F3CJ0F8001EI01FI01FL03C00F800F9FI0F87803FCF3CM01EJ07CI03E00F8L0FJ0780F0078,J03EI0F8003C1E07FC3E1FI0783EF8I07C001F3CJ078001EI01FI01F8K03C00F800F8F801F87803FCFFEM01EJ03EI03E00FM0FJ0780F0078,J03EI0FI03E1E07F83E1EI07C3CFCI07C001F3CJ07EI0FJ0FCI0FCK03C00F800F8FC03F07801FCF3FM03EJ03F8001F03FM0FJ07C0F8078,J03EI0FI01E1E03F83E3EI03C3C7EI07C001F3CJ03FI0FJ0FEI07EK03C00F800F87E07E07800FCF1F8L03EJ01FCI0F83EM078I07C07C078,J03E001FI01E1E03F03E3EI03C3C3IFC7C001F3CJ01IFC78I07IFC3IFC003C00F800F81IFC07800FCF0JF1JFCK0JF8IFE3BEJ03CI07FC7IF8,J03E003EJ0F1F01F03E7CI01E3C0IFE7C001F7CK07FFE1FFE01IFC0IFE003C00F800FC07FE0078007DF03IF3JF8K01IF83FF83BEK0IF03FE1IF8,J01E001EJ0F1E01E01C38I01E3C03FFC38I0F3CK07FFC0FFE00IF803FFC003C00FI07803FC0078003CF00IF3JFM0IF00FF019CK07FF01FC0IF8,lG0C,l018,:l01,:,::::::::^FS

						^FX###### LABEL LEFT 1 ########
						^FO'.( 45+ $left_space ).', '.( 60+ $top_space ).'
						^CF 0,26
						^FD
						^FS

						^FX###### LABEL LEFT 2 ########
						^FO'.( 45+ $left_space ).', '.( 130+ $top_space ).'
						^CF 0,26
						^FD
						^FS

						^FX###### LABEL LEFT 3 ########
						^FO'.( 12+ $left_space ).', '.( 200+ $top_space ).'
						^CF 0,26
						^FD
						^FS

						^FX###### LABEL LEFT 4 ########
						^FO'.( 30+ $left_space ).', '.( 244+ $top_space ).'
						^CF 0,35
						^FDLOT No.
						^FS

						^FX###### BOX LEFT 1 ########

						^FO'.( 2+ $left_space ).', '.( 14+ $top_space ).'
						^GB 140,68,2,B
						^FS
						^CF 0,20

						^FX###### BOX LEFT 2 ########
						^FO'.( 2+ $left_space ).', '.( 80+ $top_space ).'
						^GB 140,65,B
						^FS
						^CF 0,20

						^FX###### BOX LEFT 3 ########
						^FO'.( 2+ $left_space ).', '.( 143+ $top_space ).'
						^GB 140,68,2,B
						^FS
						^CF 0,20

						^FX###### BOX LEFT 4 ########
						^FO'.( 2+ $left_space ).', '.( 209+ $top_space ).'
						^GB 140,80,2,B
						^FS
						^CF 0,20

						^FX###### BOX LEFT 5 ########
						^FO'.( 2+ $left_space ).', '.( 286+ $top_space ).'
						^GB 140,65,2,B
						^FS
						^CF 0,20

						^FX###### BOX LEFT 6 ########
						^FO'.( 2+ $left_space ).', '.( 349+ $top_space ).'
						^GB 732,69,2,B
						^FS
						^CF 0,20

						^FX###### BOX RIGHT 1 ########
						^FO'.( 140+ $left_space ).', '.( 14+ $top_space ).'
						^GB 594,68,2,B
						^FS
						^CF 0,20

						^FX###### BOX RIGHT 2 ########
						^FO'.( 140+ $left_space ).', '.( 80+ $top_space ).'
						^GB 594,65,2,B
						^FS
						^CF 0,20

						^FX###### BOX RIGHT 3 ########
						^FO'.( 140+ $left_space ).', '.( 143+ $top_space ).'
						^GB 594,68,2,B
						^FS
						^CF 0,20

						^FX###### BOX RIGHT 4 ########
						^FO'.( 140+ $left_space ).', '.( 209+ $top_space ).'
						^GB 594,80,2,B
						^FS
						^CF 0,20

						^FX###### BOX RIGHT 5 ########
						^FO'.( 140+ $left_space ).', '.( 286+ $top_space ).'
						^GB 594,65,2,B
						^FS
						^CF 0,20

						^CWA,E:'.$font_style_name.'.FNT
						
						^FX##### VALUE 1 ##########
						^FO'.( 180+ $left_space ).', '.( 37+ $top_space ).'
						^CF 0,36
						^FD'.$item_name.'
						^FS

						^FX##### VALUE 2 ##########
						^FO'.( 180+ $left_space ).', '.( 105+ $top_space ).'
						^CF 0,36
						^FD'.$product_name.'
						^FS

						^FO'.( 180+ $left_space ).', '.( 170+ $top_space ).'
						^CF 0,36
						^FD750pcs
						^FS

						^FO'.( 180+ $left_space ).', '.( 238+ $top_space ).'
						^CF 0,36
						^FD'.$lotno.'-'.$lotno_extension.'
						^FS

						^FO'.( 360+ $left_space ).', '.( 215+ $top_space ).'
						^B3N, N, 70, N, N
						^FD'.$lotno.'-'.$lotno_extension.'
						^FS
						
						^FO'.( 180+ $left_space ).', '.( 306+ $top_space ).'
						^CF 0,36
						^FD'.$remarks.'
						^FS

						^XZ
						';
		return $zebra_code;
	}
	
	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 15     *********************/
	/***************************************************************/
	/***************************************************************/
	
	function check_existing_item_name_and_lotno15(){
		// require_once('../class/c3.php'); 
		// $return = $_POST;
		// $item_name = $return['item_name'];
		// $lotno = explode("-",$return['lotno']);
		// $lotno = $lotno[0];
		// $result = "";
		// $array_fields = array('*');
		// $table 	   	= 'vw_format14';
		// $joins 	   	= '';
		// $sql_where 	= 'WHERE `item_name` = "'.$item_name.'" AND `lotno` = "'.$lotno.'"';
		// $sql_order 	= 'ORDER BY `lotno_extension` DESC LIMIT 0,1';
		// $sql_limit 	= '';
		// $result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		// $return['lotno_extension'] = '';
		// while($row = mysqli_fetch_array($result)){
			// $return['lotno_extension'] = $row['lotno_extension'];
		// }
		// /* if lot number does not exist add a 01A */
		// if($return['lotno_extension'] == ''){
			// $return['lotno_extension'] = '01A';
		// }else{
			// $return['lotno_extension'] = generate_new_lot_no_extension($return['lotno_extension']);
		// }
		// $return['result'] = json_encode($result);
		// echo json_encode($return);
	}
	
	function save_new_c3_label15(){
		require_once('../class/c3.php');
		$return 		= $_POST; 
		$print_qty      = $return['txt_print_qty'];
		$return['query'] = '';
		$return['label'] = array();
		for($x=0;$x<$print_qty;$x++){
			$result 		= "";
			$table   		= "tbl_format15"; //table name
			$array_fields 	= array('ponum','partcode','partname',
									'qty','lotno','date_encoded',
									'lastupdate','username'); //table fields
			$array_values 	= array($return['txt_pono'],$return['txt_partcode'],$return['txt_partname'],
									$return['txt_qty'],$return['txt_lot_no'],date('Y-m-d H:i:s'),
									date('Y-m-d H:i:s'),$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			/* generate zebra code format 15 */
			$return['label'][] = generate_zebra_code_format15($return['txt_pono'],$return['txt_partcode'],$return['txt_partname'],
															  $return['txt_qty'],$return['txt_lot_no']);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info15(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format15';
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
			$return['html'] .= '	<td>'.$row['ponum'].'</td>';
			$return['html'] .= '	<td>'.$row['partcode'].'</td>';
			$return['html'] .= '	<td>'.$row['partname'].'</td>';
			$return['html'] .= '	<td>'.$row['qty'].'</td>';
			$return['html'] .= '	<td>'.$row['lotno'].'</td>';
			$return['html'] .= '</tr>';
		}
		// $return['msg'] = $result;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label15(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format15";
			$array_fields = array('logdel');
			$array_values = array('1');
			$pkid = $array_pkid[$x];
			$result = C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		}
		$return['msg'] = 'Label has been deleted!';
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function reprint_label15(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format15';
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
			// $label = generate_zebra_code_format15($row['ponum'],$row['partcode'],$row['partname'],$row['qty'],$row['lotno']);
			$return['label'][] = $label;
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format15($ponum,$partcode,$partname,$qty,$lotno){
		$space = get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$font_style_name = $space['font_style_name'];
		
		$zebra_code = '^XA

						^FX###########################
						^FX########## BOX ############
						^FX###########################

						^FX###### BOX LEFT 1 ########
						^FO'.( 10+ $left_space ).', '.( 17+ $top_space ).'
						^GB 172,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX LEFT 2 ########
						^FO'.( 10+ $left_space ).', '.( 55+ $top_space ).'
						^GB 172,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX LEFT 3 ########
						^FO'.( 10+ $left_space ).', '.( 93+ $top_space ).'
						^GB 172,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX LEFT 4 ########
						^FO'.( 10+ $left_space ).', '.( 131+ $top_space ).'
						^GB 172,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX LEFT 5 ########
						^FO'.( 10+ $left_space ).', '.( 169+ $top_space ).'
						^GB 172,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX LEFT 6 ########
						^FO'.( 10+ $left_space ).', '.( 220+ $top_space ).'
						^GB 172,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX LEFT 7 ########
						^FO'.( 10+ $left_space ).', '.( 258+ $top_space ).'
						^GB 172,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX LEFT 8 ########
						^FO'.( 10+ $left_space ).', '.( 296+ $top_space ).'
						^GB 172,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX LEFT 9 ########
						^FO'.( 10+ $left_space ).', '.( 334+ $top_space ).'
						^GB 172,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX LEFT 10 ########
						^FO'.( 10+ $left_space ).', '.( 372+ $top_space ).'
						^GB 172,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX RIGHT 1 ########
						^FO'.( 180+ $left_space ).', '.( 17+ $top_space ).'
						^GB 560,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX RIGHT 2 ########
						^FO'.( 180+ $left_space ).', '.( 55+ $top_space ).'
						^GB 560,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX RIGHT 3 ########
						^FO'.( 180+ $left_space ).', '.( 93+ $top_space ).'
						^GB 560,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX RIGHT 4 ########
						^FO'.( 180+ $left_space ).', '.( 131+ $top_space ).'
						^GB 560,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX RIGHT 5 ########
						^FO'.( 180+ $left_space ).', '.( 169+ $top_space ).'
						^GB 560,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX RIGHT 6 ########
						^FO'.( 180+ $left_space ).', '.( 220+ $top_space ).'
						^GB 560,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX RIGHT 7 ########
						^FO'.( 180+ $left_space ).', '.( 258+ $top_space ).'
						^GB 560,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX RIGHT 8 ########
						^FO'.( 180+ $left_space ).', '.( 296+ $top_space ).'
						^GB 560,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX RIGHT 9 ########
						^FO'.( 180+ $left_space ).', '.( 334+ $top_space ).'
						^GB 560,40,2,B
						^FS
						^CF 0,20

						^FX###### BOX RIGHT 10 ########
						^FO'.( 180+ $left_space ).', '.( 372+ $top_space ).'
						^GB 560,40,2,B
						^FS
						^CF 0,20

						^FX###########################
						^FX########## LABEL ##########
						^FX###########################

						^FX###### LABEL LEFT 1 ########
						^FO'.( 20+ $left_space ).', '.( 28+ $top_space ).'
						^CF 0,30
						^FDP.O. No.
						^FS

						^FX###### LABEL LEFT 2 ########
						^FO'.( 20+ $left_space ).', '.( 68+ $top_space ).'
						^CF 0,30
						^FDPart Code
						^FS

						^FX###### LABEL LEFT 3 ########
						^FO'.( 20+ $left_space ).', '.( 106+ $top_space ).'
						^CF 0,30
						^FDPart Name
						^FS

						^FX###### LABEL LEFT 4 ########
						^FO'.( 20+ $left_space ).', '.( 143+ $top_space ).'
						^CF 0,30
						^FDQuantity
						^FS

						^FX###### LABEL LEFT 5 ########
						^FO'.( 20+ $left_space ).', '.( 183+ $top_space ).'
						^CF 0,30
						^FDLot No.
						^FS

						^FX###### LABEL LEFT 6 ########
						^FO'.( 20+ $left_space ).', '.( 233+ $top_space ).'
						^CF 0,30
						^FDP.O. No.
						^FS

						^FX###### LABEL LEFT 7 ########
						^FO'.( 20+ $left_space ).', '.( 270+ $top_space ).'
						^CF 0,30
						^FDPart Code
						^FS

						^FX###### LABEL LEFT 8 ########
						^FO'.( 20+ $left_space ).', '.( 310+ $top_space ).'
						^CF 0,30
						^FDPart Name
						^FS

						^FX###### LABEL LEFT 9 ########
						^FO'.( 20+ $left_space ).', '.( 348+ $top_space ).'
						^CF 0,30
						^FDQuantity
						^FS

						^FX###### LABEL LEFT 10 ########
						^FO'.( 20+ $left_space ).', '.( 385+ $top_space ).'
						^CF 0,30
						^FDLot No.
						^FS

						^FX###########################
						^FX########## VALUE ##########
						^FX###########################

						^FX##### VALUE 1 ##########
						^FO'.( 190+ $left_space ).', '.( 28+ $top_space ).'
						^CF 0,30
						^FD'.$ponum.'
						^FS

						^FX##### VALUE 2 ##########
						^FO'.( 190+ $left_space ).', '.( 68+ $top_space ).'
						^CF 0,30
						^FD'.$partcode.'
						^FS

						^FX##### VALUE 3 ##########
						^FO'.( 190+ $left_space ).', '.( 106+ $top_space ).'
						^CF 0,30
						^FD'.$partname.'
						^FS

						^FX##### VALUE 4 ##########
						^FO'.( 190+ $left_space ).', '.( 143+ $top_space ).'
						^CF 0,30
						^FD'.$qty.'
						^FS

						^FX##### VALUE 5 ##########
						^FO'.( 190+ $left_space ).', '.( 183+ $top_space ).'
						^CF 0,30
						^FD'.$lotno.'
						^FS

						^FX##### VALUE 6 ##########
						^FO'.( 190+ $left_space ).', '.( 233+ $top_space ).'
						^CF 0,30
						^FD'.$ponum.'
						^FS

						^FX##### VALUE 7 ##########
						^FO'.( 190+ $left_space ).', '.( 270+ $top_space ).'
						^CF 0,30
						^FD'.$partcode.'
						^FS

						^FX###### LABEL LEFT 8 ########
						^FO'.( 190+ $left_space ).', '.( 310+ $top_space ).'
						^CF 0,30
						^FD'.$partname.'
						^FS

						^FX###### LABEL LEFT 9 ########
						^FO'.( 190+ $left_space ).', '.( 348+ $top_space ).'
						^CF 0,30
						^FD'.$qty.'
						^FS

						^FX###### LABEL LEFT 10 ########
						^FO'.( 190+ $left_space ).', '.( 385+ $top_space ).'
						^CF 0,30
						^FD'.$lotno.'
						^FS

						^XZ
						';
		return $zebra_code;
	}

	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 16     *********************/
	/***************************************************************/
	/***************************************************************/
	function check_existing_item_name_and_lotno16(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$item_name = $return['item_name'];
		$lotno = explode("-",$return['lotno']);
		$lotno = $lotno[0];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format16';
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
	
	function save_new_c3_label16(){
		require_once('../class/c3.php');
		$return 		= $_POST; 
		$print_qty      = $return['txt_print_qty'];
		$return['query'] = '';
		$return['label'] = array();
		for($x=0;$x<$print_qty;$x++){
			if(isset($return['chk_alternate_lot'])){
				$lotno_extension     = generate_alternate_lot_no_extension( $x+1, $return['txt_lot_no_count'] );
			}else{
				if($x==0){
					$lotno_extension = $return['txt_lot_no_count'];
				}else{
					$lotno_extension = generate_new_lot_no_extension($lotno_extension);
				}
			}
			$result 		= "";
			$table   		= "tbl_format16"; //table name
			$array_fields 	= array('item_name','qty','lotno','lotno_extension','order_no','remarks','date_encoded','lastupdate','username'); //table fields
			$array_values 	= array($return['txt_itemname'],$return['txt_qty'],$return['txt_lot_no'],$lotno_extension,$return['txt_order_no'],$return['txt_remarks'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			/* generate zebra code format 1 */
			$return['label'][] = generate_zebra_code_format16($return['txt_itemname'],$return['txt_qty'],$return['txt_lot_no'],$lotno_extension,$return['txt_order_no'],$return['txt_remarks']);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info16(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format16';
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
	
	function delete_label16(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format16";
			$array_fields = array('logdel');
			$array_values = array('1');
			$pkid = $array_pkid[$x];
			$result = C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		}
		$return['msg'] = 'Label has been deleted!';
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function reprint_label16(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format16';
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
			$label = generate_zebra_code_format16($row['item_name'],$row['qty'],$row['lotno'],$row['lotno_extension'],$row['order_no'],$row['remarks']);
			$return['label'][] = $label;
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format16($item_name,$qty,$lotno,$lotno_extension,$order_no,$remarks){
		$space = get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$font_style_name = $space['font_style_name'];
		
		$zebra_code = "	
						^XA

						^FX### ITEM NAME ###
                        ^FO".( 15 + $left_space ).",".( 25 + $top_space )."^GFA,812,812,14,,::::K037F2P03,J01IF2P07,K0F00EP03,K0E007P07C,K0E006P060FF,K0E006P0401C,K0E007P0C03C,K0E007O018038,K0JFO07D87,J01FF0FO0730E,J01E006O0E0FC,J01EQ0100F,K0AQ07007,I02S0C00E,I023F003M0180163F,I033FC3FFCO0IFE,I03008300CN07I0E,I03008300CM038I07,I03008700CM0E98007,I03008300CL01C18006,I03008300EK07F018006,I0300C300CK07C018006,I0380C380CN01C00F,I03FFC3FFCN01JF,I03B9C387CN01CC3F,I07008100CN01C007,Y01C,,::::M0F03FF03FF83803C,M0F07FF83FF83C03C,M0606318181C1C038,M0606318180C1E078,M060030018301E078,:M06003001FF01F0F8,M06003001FF01B0D8,M060030018301B9D8,M060030018301I98,M0600300180019F98,M0600300180C18F18,M0600300181C18F18,M0F007803FF83CF3C,M0F007803FF83C63C,,:::::^FS

                        ^FX### QTY ###
                        ^FO".( 5 + $left_space ).",".( 90 + $top_space )."^GFA,986,986,17,,::M03C07P0C003,L063DC78O0JF8,L07B9C78O0JF8,L03BB87P0E0038,L01BF0EP0JF8,L01BE0EP0JF8,L0JFE06N0E0038,L0JFC0FN0JF8,M07E1IFN0JF98,M0FF9IFN0E0033E,L01FBB87M01LFE,L03B9FC7M01LFE,L07386C7N01JFC,K01E38EC6N01JFC,K01C3CCEEN01C1C38,M03C66EN01JF8,L0JFEEN01JF8,L0KFCN01C1C38,M0E383CN01C1C38,L01C383CN01JF8,L01FF07EN01JFE,L03FF0FFN07KF8,L039F8EF8M07KF8,M03FBC7EO01C018,M0F9F83EO01C03E,L03E1F01EM0LFE,L0F87CP0LFE,L0E07,,::::::::::::::::::::::::::^FS

                       ^FX### LOT NO ###
                       ^FO".( 335 + $left_space ).",".( 125 + $top_space )."^GFA,928,928,16,,:::::::O0F8001FC07FF,O0F8003FE07FF,O07I038E0673,O07I07070673,O07I0707007,::O07I0703007,:O07I0707007,:::O07060386007,O070E03CE007,O0FFE01FC01F8,O0FFE00F801F8,,::::::::::N01F1F01FC,N01F1F03FE,O0F8C038E,O0F8C0707,O0DCC0707,:O0CEC0707,O0CEC0703,O0C7C0703,O0C7C0707,:O0C3C0707,:O0C1C0386038,O0C1C03CE038,N01F0C01FC038,N01F0C00F8038,,::::^FS

                       ^FX### ORDER NO ###
                       ^FO".( 20 + $left_space ).",".( 170 + $top_space )."^GFA,611,611,13,,:J0C0EJ03,J0607J03J0187,J0283J03071C70CC,K0CBFC7JF1C3186,K083FC7F0601E3182,I01983I030601E3303,J0F03I010601B3303,J0D03I01840113303,J03033I08C019B303,J0623F800CC019B303,J0403J078018F303,J0C03J070018F383,J0C03J0F8018718618,J0C0308038F01830CC38,J0C031E0701F3C307838,J0JFE7C00F,J04,,::::::::01E1FC3F83FE6E8I0F0E33,0631C318C18630CI070C638,0C38C3186183306I0788618,0C18C318318030EI078CC0C,1818C318318830EI078CC0C,1818C318318830CI06IC0C,1C18CC1831B83F8I06ECC0C,1818DC1831883B8I066CC0C,1818CC183188318I067CC0C,1C18CC183180318I063CC0C,0C18C618618031CI061C618,0C30C618618330CI061C630E,0631C71CC18638EI0F0C3E0E,03C1F3BF83FE7C6I0D,,::::^FS

                       ^FX### REMARKS ###
                       ^FO".( 10 + $left_space ).",".( 240 + $top_space )."^GFA,928,928,16,,::gG0C,K01839CQ0E,K03C39CQ0E,K03C39C6P0E338,K03839CFP0E7F8,K07KF8M0KF,K077JF8M0JFE,K07039CQ0E3C,K0E679C7P0E783,K0F7JF8O0EF078,J01F7JF8L03LFC,J01E7Q03LFC,J03E7700EP078,J03E77IFO07F1F,J07E77IFO07IF8,J0EE7738EO07IF8,J0CE77FFEN01FE,K0E77FFEN03F0018,K0E7738EN0F7IFC,K0E7738EM01E7IFE,K0E77FFEM0186001E,K0E77FFEO060018,K0E7738ER038,K0EE738ER038,K0EE738ER078,K0EC73FEQ07F,K0FC73FEQ07F,K0F8738EQ03E,K0F06,,:::::J0FF03FE1E780601FE07BC07E,J0FF83FE1E780601FF07BC0FE,J061C1860E700600C383381CE,J060C1860E700F00C18330186,J060C1800E700F00C18370186,J060C1980FF00F00C183601C,J061C1980FF00F00C383E00E,J07F81F80FF01F80FF03C0078,J07F01F80FF01980FE03E003C,J06601980FF01F80CC03EI0E,J06701980FF01F80CE037I07,J06301800FF039C0C60330183,J06301800DB030C0C60338183,J06381860DB030C0C703181C3,J06181860DB030C0C3031C1E7,J0FBC3FE1FF879E1F7879E1FE,J0FBC3FE1FF879E1F7879E1BC,,::^FS

                       ^FX### INSPECTION ###
                       ^FO".( 590 + $left_space ).",".( 235 + $top_space )."^GFA,640,640,16,,:::K0101M0CL0E,K01038L0C18I06861,K01024J0FFEF8I0C061,K05842K01CK0C0618,K03F83K03FK0C061,K011FFCI01ICJ0C7E1,K01B18J018C38I040E1,K01F998I07DF04I0C061,K033998I08C0CJ04061,K03099K0E0CJ0DFE1,K05099K0F4CJ0C061,K010FCK0C0CJ0C063,K01024K0FDCJ0C06,K01867K0F9FCK06,K01881CS06,L01,,:T0401P021,00C860E1E0EE0FF0371FF1F805870C,0060384618E18C184313303018C384,006038440861CC00C1131030306384,0060384C0060CC00800100703063C4,00202C460061CC2180030030306244,0020264380618FE180010030306264,00202640E07F0EE180010030306234,0020234038600E618001003030623C,002023C018600C218001003030621C,002021C408600E008001003030621C,002020CC08600E188183003018C20C,002020C618600C3842030030088204,00703041E0F00FF03C0780FC0707,J0404,,::^FS

                       ^FX### YEC LOGO ###
                       ^FO".( 50 + $left_space ).",".( 290 + $top_space )."^GFA,7776,7776,54,,::::::::::::::::::::::V07IF,V0JF8,T03MF,S01NFE,S03OF,R01PFE,R03QF,R0RFE,Q07KFI0KF8,Q0KFCI03JFC,P01IFE001C003JF,P03IFC003EI07IF,P07FFE001FF8001IF8,O01IF8003FFEI03FFE,O03IFI03FFEI03IF,O03FFCI0JF8I07FF8I07FCK01FE07FFJ01FFEL0IFJ07FFJ03FCI03JFC7FCK07F07F8,O07FFJ0JF8I03FFCI07FEK03FF07FFJ03IFL0IFJ07FFJ03FC003KFE7FCK07F87F8,O0FFEI01JFCI01FFCI07FEK07FE07FF8I03IFK01IFJ0IFJ03FC00LFE7FCK0FF8FF8,N01FFCI01JFCJ0IFI03FFK07FC0IF8I03IFK01IFJ0IF8I03FC03LFE7FCK0FF8FF8,N03FF8I03JFEJ07FFI01FF8J0FFC0IFCI03IF8J01IFI01IF8I03FC07LFE7FCK0FF87F8,N07FFJ07FF3FFJ03FF8001FF8I01FF81IFCI03IF8J03IFI01IFCI03FC0MFE7FCK0FF87F8,N07FEJ07FE3FFJ01FFCI0FFCI03FF01IFEI03IF8J03IFI01IFCI03FC1IFCJ07FCK0FF87F8,N0FFCJ07FE1FFK0FFEI07FEI03FF01IFEI03IFCJ07IFI03IFEI03FC1FFEK07FCK0FF87F8,M01FF8J07FC0FF8J07FEI07FEI07FE03JFI03IFCJ07IFI03IFEI03FC3FF8K07FCK0FF87F8,M01FF8J07FC0FF8J03FFI03FFI0FFC03JFI03IFEJ07IFI07JFI03FC3FFL07FCK0FF87F8,M03FEJ01FF80FFCJ01FF8003FF800FF807FDFFI03IFEJ0JFI07FDFFI03FC7FEL07FCK0FF87F8,M03FCJ01FF80FFCJ01FF8001FF801FF807FCFF8003IFEJ0JFI0FF9FF8003FC7FCL07FCK0FF87F8,M07FCJ01FF807FCK0FF8I0FFC03FF00FF8FF8003JFJ0JFI0FF8FF8003FCFFCL07FCK0FF87F8,M0FFCJ01FF807FCK07FCI07FE07FF00FF8FFC003JFI01JFI0FF0FF8003FCFFCL07FCK0FF87F8,M0FF8J01FF007FCK03FEI07FE07FE00FF07FC003JF8001JF001FF07FC003FCFF8L07FCK0FF87F8,M0FFK01FE007FEK03FEI03FF0FFC01FF07FE003FEFF8003JF001FF07FC003FCFF8L07FCK0FF87F8,L01FFK01FE007FEK01FEI01FF9FF801FF03FE003FEFF8003FCFF003FE07FE003FCFF8L07FCK07F87F8,L03FFK01FE007FEK01FFI01FFBFF803FE03FE003FE7FC003FCFF003FC03FE003FCFFM07FCK0FF87F8,L03FEK03FE007FEL0FFJ0KF003FE01FF003FE7FC007FCFF003FC03FE003JFM07OF87F8,L03FCK03FE003FEL0FFJ07IFE003FC01FF003FE3FC007FCFF007FC03FF003JFM07OF87F8,L07FCK03FE003FEL0FFJ07IFE007FC01FF803FE3FE00FF8FF007FC01FF003JFM07OF87F8,L07FCK03FE003FEL07F8I03IFC007F800FF803FE3FE00FF8FF00FF801FF803JFM07OF87F8,L07FCK03FE003FEL03FCI01IF800FF800FFC03FE1FF00FF0FF00FF800FF803JFM07OF87F8,L07F8K03FE003FEL03FCI01IF800FF800FFC03FE1FF01FF0FF00FFI0FFC03JFM07OF87F8,L07F8K03FE001FEL03FCJ0IF001FFI07FC03FE0FF01FE0FF01FFI0FFC03JFM07OF87F8,L07F8K03FE001FEL03FCJ07FE001FFI07FE03FE0FF83FE0FF01FFI07FC03JFM07FEJ01FF87F8,L07F87WF03FCJ07FE001MFE03FE0FF83FE0FF03MFE03JFM07FCK0FF87F8,L0FF8XF83FCJ03FC003NF03FE07FC7FC0FF03MFE03FCFF8L07FCK0FF87F8,K01FF8XF83FEJ03FC003NF03FE07FC7FC0FF07NF03FCFF8L07FCK0FF87F8,K01FF0XF81FEJ03FC007NF03FE03FC7F80FF07NF03FCFF8L07FCK0FF87F8,K01FE0XF81FEJ03FC007NF83FE03FE7F80FF07NF83FCFFCL07FCK0FF87F8,K01FE0XF81FEJ03FC007NF83FE03JF80FF0OF83FCFFCL07FCK0FF87F8,K01FE0XF81FEJ03FC00OFC3FE01JF00FF0OF83FC7FEL07FCK0FF87F8,K01FE0RFE7JF81FEJ03FC00FF8J0FFC3FE01JF00FF1FF8J0FFC3FC7FEL07FCK0FF87F8,K01FE0FFC007FC001FEI0FF81FEJ03FC00FFK07FE3FE01JF00FF1FFK07FC3FC7FFL07FCK0FF87F8,K01FE07FC003FC001FEI0FF81FEJ03FC01FFK03FE3FE00IFE00FF1FFK07FE3FC3FFCK07FCK0FF87F8,K01FE07FC003FC001FFI0FF81FEJ03FC01FFK03FE3FE00IFE00FF3FEK03FE3FC3IFK07FCK0FF87F8,K01FE07FC003FC001FF801FF81FEJ03FC03FEK01FF3FE007FFC00FF3FEK03FE3FC1JF81FC7FCK0FF87F8,K01FE03FC003FC001FF801FF81FEJ03FC03FEK01FF3FE007FFC00FF3FCK01FF3FC0MFE7FCK0FF87F8,K01FE03FC007FC001FF801FF81FEJ03FC07FCL0FFBFE003FFC00FF7FCK01FF3FC07LFE7FCK0FF87F8,K01FE03FC00FFC001FF801FF81FEJ03FC07FCL0FFBFE003FF800JFCL0FFBFC03LFE7FCK0FF87F8,K01FF03FC00FFC001FF801FF83FEJ03FC07FCL07IFE003FF800JF8L0JFC00LFE7FCK0FF8FF8,L0FF83FC00FFC001FF801FF03FCJ03FC0FF8L07IFE001FFI0JF8L07IFC007KFE7FCK0FF8FF8,L07F83FE00FFC001FF801FF03FCJ03FC0FF8L03IFE001FFI0JFM07IFCI07JFE7FCK0FF87F8,L07F83FE00FFC001FF801FF03FC,L07F83FF00FF8I0FF801FF03FC,L07F83FF00FFJ07F801FF03FC,L07F83FF00FFJ07F801FE03FC,L07FC1FF00FFJ07FC01FE03FCI03IF00F8J03FFEI0IFC03JFE0JF8I01FFC003F803E0F8007FFC007IFC,L03FC1FF01FFJ07FE03FE07F8001JF00F8I01IFE003IFC03JFE0JFCI03IF003F803E0F803IFC00JFC,L03FC0FF03FFJ07FE07FE0FFI01JF00F8I01IFE007IF803JFE0JFEI07IF003F803E0F807IFC00JFC,L03FC1FF83FFJ07FE07FE0FFI01JF00F8I01IFE007FJ03JFE0F801FI0FC1FC03FC03E0F803FJ03JFC,L03FE0FF83FFJ03FE07FE0FFI03IFE00F8I03IFE007EJ01JFE0F801F801F80FC03FE03E0F807EJ03JF8,L01FF0FF83FFJ03FF07FC1FFI07FCJ0F8I07F8J0FCL03EI0F801FC03F007E03FF03E0F80FCJ03F8,M0FF07FC7FEJ03FF0FFC3FEI07EK0F8I07CK0F8L03EI0F801FC07E003E03FF03E0F80F8J03E,M0FF07FE7FCJ01FF1FF83FCI07CK0F8I07CK0FM03EI0F801FC0FE003F03FF03E0F80F8J03E,M0FFC7JFEK0KF87FCI07IFE00F8I07IFE00FM03EI0F803FC0FE003F83FF83E0F80F8J03F8,M07FC3JFCK0KF0FFCI07JF00F8I07IFE00FM03EI0KF80FC001F83FFC3E0F80F8J03JF,M03FE1JF8K0KF0FF8I07JF00F8I07IFE00FM03EI0KF00F8I0F83E7E3E0F80F8J03JF,M03FE1JF8K07JF1FF8I07JF00F8I07IFE00FM03EI0JFE00F8I0F83E7F1E0F80F8K0JFC,M03FF1JFL03IFE1FFJ07IFE00F8I07IFE00FM03EI0JFC00F8I0F83E7F9E0F80F8K0JFC,M01FF8IFEL01IFC7FEJ07CK0F8I07CK0FM03EI0JFC00F8I0F83E3F9E0F80F8K07JF,N0FFC7FFCM0IF87FEJ07CK0F8I07CK0FM03EI0FC1FC00F8001F83E1FFE0F80F8N0FF,N0FFE3FF8M07FF0FFCJ07CK0F8I07CK0F8L03EI0F80FE00F8003F83E0FFE0F80F8N07F,N07FF0FFN01F81FFCJ07CK0F8I07CJ01FCL03EI0F807F00FE003F03E0FFE0F80FCN03F,N03FF87EO0103FF8J07EK0F8I07EK0FEL03EI0F803F007E003E03E0FFE0F80FEN01F,N03FFCS07FFK07FK0F8I07FK07FL03EI0F801F003F007E03E07FE0F807FN01F,O0FFES0FFEK03F8J0FCI03F8J07IF8I03EI0F801F001FC0FC03E01FE0F807IF8K0FF,O0IFR01FFCK01FCJ0FEI01FCJ07IFCI03EI0F801FI0FC1FC03E01FE0F803IFCJ01FF,O07FFCQ07FF8K01IFE007IF01IFE001IFCI03EI0F801FC007IF003E007E0F801IFC03JFC,O03FFEP01IFM0JF003IF01IFE001IFCI03EI0F800FC003IF003E007E0F800IFC03JF8,O01IFP03IFM03IF001IF003FFEI0IFCI03EI0F8007C001FFC003E007E0F8007FFC03JF,P07FFEO0IFC,P07IFN01IF8,P01JFM0JF,Q0JF8K01IFE,Q07JFEI0KF8,Q01RFE,R0RFC,R01QF,S0PFE,S01OF,T01MF,U0LFE,V03IF,:,:::::::::::::::::::^FS

						^FX#### ITEM NAME ####
						^FO".(  2+ $left_space ).", ".( 14+ $top_space )."
						^GB 140,73,2,B
						^FS
						^CF 0,20
						^FX#### QTY ####
						^FO".( 2+ $left_space ).", ".( 85+ $top_space )."
						^GB 140,73,2,B
						^FS
						^CF 0,20
						^FX#### ORDER NO ####
						^FO".( 2+ $left_space ).", ".( 156+ $top_space )."
						^GB 140,73,2,B
						^FS
						^CF 0,20
						^FX#### REMARKS ####
						^FO".( 2+ $left_space ).", ".( 228+ $top_space )."
						^GB 140,74,2,B
						^FS
						^CF 0,20
						^FX#### YEC LOGO ####
						^FO".( 2+ $left_space ).", ".( 300+ $top_space )."
						^GB 550,131,2,B
						^FS
						^CF 0,20
						^FX#### ITEM NAME CONTENT ####
						^FO".( 140+ $left_space ).", ".( 14+ $top_space )."
						^GB 609,73,2,B
						^FS
						^CF 0,20
						^FX#### QTY CONTENT ####
						^FO".( 140+ $left_space ).", ".( 85+ $top_space )."
						^GB 214,74,2,B
						^FS
						^CF 0,20
						^FX#### LOT NO ####
						^FO".( 352+ $left_space ).", ".( 85+ $top_space )."
						^GB 80,145,2,B
						^FS
						^CF 0,20
						^FX#### LOT NO CONTENT ####
						^FO".( 430+ $left_space ).", ".( 85+ $top_space )."
						^GB 319,145,2,B
						^FS
						^CF 0,20

						^FX#### ORDER NO CONTENT ####
						^FO".( 140+ $left_space ).", ".( 157+ $top_space )."
						^GB 214,73,2,B
						^FS
						^CF 0,20

						^FX#### REMARKS CONTENT ####
						^FO".( 140+ $left_space ).", ".( 228+ $top_space )."
						^GB 411,74,2,B
						^FS
						^CF 0,20

						^FX#### INSPECTION ####
						^FO".( 550+ $left_space ).", ".( 228+ $top_space )."
						^GB 199,55,2,B
						^FS
						^CF 0,20

						^FX#### INSPECTION CONTENT ####
						^FO".( 550+ $left_space ).", ".( 281+ $top_space )."
						^GB 199,150,2,B
						^FS
						^CF 0,20

						^FX### QTY LABEL ###
						^FO".( 45+ $left_space ).", ".( 130+ $top_space )."
						^CF 0,26
						^FDQ' TY
						^FS

						^CWA,E:".$font_style_name.".FNT

						### ITEM NAME TEXT ###
						^FO".( 180+ $left_space ).", ".( 60+ $top_space )."
						^AAN 0,36
						^FD".$item_name."
						^FS

						^FX### QTY TEXT ###
						^FO".( 180+ $left_space ).", ".( 133+ $top_space )."
						^AAN 0,36
						^FD".$qty."pcs
						^FS

						^FX### LOT NO TEXT ###
						^FO".( 450+ $left_space ).", ".( 160+ $top_space )."
						^AAN 0,36
						^FD".$lotno."-".$lotno_extension."
						^FS

						^FX### ORDER NO TEXT ###
						^FO".( 180+ $left_space ).", ".( 203+ $top_space )."
						^AAN 0,36
						^FD".$order_no."
						^FS

						^FX### REMARKS ###
						^FO".( 180+ $left_space ).", ".( 275+ $top_space )."
						^AAN 0,36
						^FD".$remarks."
						^FS

						^FX### LOT NO QR CODE ###
						^FO".( 620+ $left_space ).", ".( 95+ $top_space )."
						^BQN,2, 5
						^FD\\\\".$lotno."-".$lotno_extension."
						^FS

						^XZ

						";
		return $zebra_code;
	}

	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 17     *********************/
	/***************************************************************/
	/***************************************************************/
	function check_existing_item_name_and_lotno17(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$item_name = $return['item_name'];
		$lotno = explode("-",$return['lotno']);
		$lotno = $lotno[0];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format17';
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
	
	function save_new_c3_label17(){
		require_once('../class/c3.php');
		$return 		= $_POST; 
		$print_qty      = $return['txt_print_qty'];
		$return['query'] = '';
		$return['label'] = array();
		for($x=0;$x<$print_qty;$x++){
			$result 		= "";
			$table   		= "tbl_format17"; //table name
			$array_fields 	= array('part_no','sm','pono','note','date_encoded','lastupdate','username'); //table fields
			$array_values 	= array($return['txt_part_no'],date('Y/m'),$return['txt_po_no'],$return['txt_note'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			/* generate zebra code format 17 */
			$return['label'][] = generate_zebra_code_format17($return['txt_part_no'],date('Y/m'),$return['txt_po_no'],$return['txt_note']);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info17(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format17';
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
			$return['html'] .= '	<td>'.$row['part_no'].'</td>';
			$return['html'] .= '	<td>'.$row['sm'].'</td>';
			$return['html'] .= '	<td>'.$row['pono'].'</td>';
			$return['html'] .= '	<td>'.$row['note'];
			$return['html'] .= '</tr>';
		}
		// $return['msg'] = $result;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label17(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format17";
			$array_fields = array('logdel');
			$array_values = array('1');
			$pkid = $array_pkid[$x];
			$result = C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		}
		$return['msg'] = 'Label has been deleted!';
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function reprint_label17(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format17';
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
			$label = generate_zebra_code_format17($row['part_no'],$row['sm'],$row['pono'],$row['note']);
			$return['label'][] = $label;
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format17($part_no,$sm,$po_no,$note){
		$space = get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$font_style_name = $space['font_style_name'];
		
		$zebra_code = "	
						^XA

						^FO50,30^GFA,7776,7776,54,,::::::::::::::::::::::V07IF,V0JF8,T03MF,S01NFE,S03OF,R01PFE,R03QF,R0RFE,Q07KFI0KF8,Q0KFCI03JFC,P01IFE001C003JF,P03IFC003EI07IF,P07FFE001FF8001IF8,O01IF8003FFEI03FFE,O03IFI03FFEI03IF,O03FFCI0JF8I07FF8I07FCK01FE07FFJ01FFEL0IFJ07FFJ03FCI03JFC7FCK07F07F8,O07FFJ0JF8I03FFCI07FEK03FF07FFJ03IFL0IFJ07FFJ03FC003KFE7FCK07F87F8,O0FFEI01JFCI01FFCI07FEK07FE07FF8I03IFK01IFJ0IFJ03FC00LFE7FCK0FF8FF8,N01FFCI01JFCJ0IFI03FFK07FC0IF8I03IFK01IFJ0IF8I03FC03LFE7FCK0FF8FF8,N03FF8I03JFEJ07FFI01FF8J0FFC0IFCI03IF8J01IFI01IF8I03FC07LFE7FCK0FF87F8,N07FFJ07FF3FFJ03FF8001FF8I01FF81IFCI03IF8J03IFI01IFCI03FC0MFE7FCK0FF87F8,N07FEJ07FE3FFJ01FFCI0FFCI03FF01IFEI03IF8J03IFI01IFCI03FC1IFCJ07FCK0FF87F8,N0FFCJ07FE1FFK0FFEI07FEI03FF01IFEI03IFCJ07IFI03IFEI03FC1FFEK07FCK0FF87F8,M01FF8J07FC0FF8J07FEI07FEI07FE03JFI03IFCJ07IFI03IFEI03FC3FF8K07FCK0FF87F8,M01FF8J07FC0FF8J03FFI03FFI0FFC03JFI03IFEJ07IFI07JFI03FC3FFL07FCK0FF87F8,M03FEJ01FF80FFCJ01FF8003FF800FF807FDFFI03IFEJ0JFI07FDFFI03FC7FEL07FCK0FF87F8,M03FCJ01FF80FFCJ01FF8001FF801FF807FCFF8003IFEJ0JFI0FF9FF8003FC7FCL07FCK0FF87F8,M07FCJ01FF807FCK0FF8I0FFC03FF00FF8FF8003JFJ0JFI0FF8FF8003FCFFCL07FCK0FF87F8,M0FFCJ01FF807FCK07FCI07FE07FF00FF8FFC003JFI01JFI0FF0FF8003FCFFCL07FCK0FF87F8,M0FF8J01FF007FCK03FEI07FE07FE00FF07FC003JF8001JF001FF07FC003FCFF8L07FCK0FF87F8,M0FFK01FE007FEK03FEI03FF0FFC01FF07FE003FEFF8003JF001FF07FC003FCFF8L07FCK0FF87F8,L01FFK01FE007FEK01FEI01FF9FF801FF03FE003FEFF8003FCFF003FE07FE003FCFF8L07FCK07F87F8,L03FFK01FE007FEK01FFI01FFBFF803FE03FE003FE7FC003FCFF003FC03FE003FCFFM07FCK0FF87F8,L03FEK03FE007FEL0FFJ0KF003FE01FF003FE7FC007FCFF003FC03FE003JFM07OF87F8,L03FCK03FE003FEL0FFJ07IFE003FC01FF003FE3FC007FCFF007FC03FF003JFM07OF87F8,L07FCK03FE003FEL0FFJ07IFE007FC01FF803FE3FE00FF8FF007FC01FF003JFM07OF87F8,L07FCK03FE003FEL07F8I03IFC007F800FF803FE3FE00FF8FF00FF801FF803JFM07OF87F8,L07FCK03FE003FEL03FCI01IF800FF800FFC03FE1FF00FF0FF00FF800FF803JFM07OF87F8,L07F8K03FE003FEL03FCI01IF800FF800FFC03FE1FF01FF0FF00FFI0FFC03JFM07OF87F8,L07F8K03FE001FEL03FCJ0IF001FFI07FC03FE0FF01FE0FF01FFI0FFC03JFM07OF87F8,L07F8K03FE001FEL03FCJ07FE001FFI07FE03FE0FF83FE0FF01FFI07FC03JFM07FEJ01FF87F8,L07F87WF03FCJ07FE001MFE03FE0FF83FE0FF03MFE03JFM07FCK0FF87F8,L0FF8XF83FCJ03FC003NF03FE07FC7FC0FF03MFE03FCFF8L07FCK0FF87F8,K01FF8XF83FEJ03FC003NF03FE07FC7FC0FF07NF03FCFF8L07FCK0FF87F8,K01FF0XF81FEJ03FC007NF03FE03FC7F80FF07NF03FCFF8L07FCK0FF87F8,K01FE0XF81FEJ03FC007NF83FE03FE7F80FF07NF83FCFFCL07FCK0FF87F8,K01FE0XF81FEJ03FC007NF83FE03JF80FF0OF83FCFFCL07FCK0FF87F8,K01FE0XF81FEJ03FC00OFC3FE01JF00FF0OF83FC7FEL07FCK0FF87F8,K01FE0RFE7JF81FEJ03FC00FF8J0FFC3FE01JF00FF1FF8J0FFC3FC7FEL07FCK0FF87F8,K01FE0FFC007FC001FEI0FF81FEJ03FC00FFK07FE3FE01JF00FF1FFK07FC3FC7FFL07FCK0FF87F8,K01FE07FC003FC001FEI0FF81FEJ03FC01FFK03FE3FE00IFE00FF1FFK07FE3FC3FFCK07FCK0FF87F8,K01FE07FC003FC001FFI0FF81FEJ03FC01FFK03FE3FE00IFE00FF3FEK03FE3FC3IFK07FCK0FF87F8,K01FE07FC003FC001FF801FF81FEJ03FC03FEK01FF3FE007FFC00FF3FEK03FE3FC1JF81FC7FCK0FF87F8,K01FE03FC003FC001FF801FF81FEJ03FC03FEK01FF3FE007FFC00FF3FCK01FF3FC0MFE7FCK0FF87F8,K01FE03FC007FC001FF801FF81FEJ03FC07FCL0FFBFE003FFC00FF7FCK01FF3FC07LFE7FCK0FF87F8,K01FE03FC00FFC001FF801FF81FEJ03FC07FCL0FFBFE003FF800JFCL0FFBFC03LFE7FCK0FF87F8,K01FF03FC00FFC001FF801FF83FEJ03FC07FCL07IFE003FF800JF8L0JFC00LFE7FCK0FF8FF8,L0FF83FC00FFC001FF801FF03FCJ03FC0FF8L07IFE001FFI0JF8L07IFC007KFE7FCK0FF8FF8,L07F83FE00FFC001FF801FF03FCJ03FC0FF8L03IFE001FFI0JFM07IFCI07JFE7FCK0FF87F8,L07F83FE00FFC001FF801FF03FC,L07F83FF00FF8I0FF801FF03FC,L07F83FF00FFJ07F801FF03FC,L07F83FF00FFJ07F801FE03FC,L07FC1FF00FFJ07FC01FE03FCI03IF00F8J03FFEI0IFC03JFE0JF8I01FFC003F803E0F8007FFC007IFC,L03FC1FF01FFJ07FE03FE07F8001JF00F8I01IFE003IFC03JFE0JFCI03IF003F803E0F803IFC00JFC,L03FC0FF03FFJ07FE07FE0FFI01JF00F8I01IFE007IF803JFE0JFEI07IF003F803E0F807IFC00JFC,L03FC1FF83FFJ07FE07FE0FFI01JF00F8I01IFE007FJ03JFE0F801FI0FC1FC03FC03E0F803FJ03JFC,L03FE0FF83FFJ03FE07FE0FFI03IFE00F8I03IFE007EJ01JFE0F801F801F80FC03FE03E0F807EJ03JF8,L01FF0FF83FFJ03FF07FC1FFI07FCJ0F8I07F8J0FCL03EI0F801FC03F007E03FF03E0F80FCJ03F8,M0FF07FC7FEJ03FF0FFC3FEI07EK0F8I07CK0F8L03EI0F801FC07E003E03FF03E0F80F8J03E,M0FF07FE7FCJ01FF1FF83FCI07CK0F8I07CK0FM03EI0F801FC0FE003F03FF03E0F80F8J03E,M0FFC7JFEK0KF87FCI07IFE00F8I07IFE00FM03EI0F803FC0FE003F83FF83E0F80F8J03F8,M07FC3JFCK0KF0FFCI07JF00F8I07IFE00FM03EI0KF80FC001F83FFC3E0F80F8J03JF,M03FE1JF8K0KF0FF8I07JF00F8I07IFE00FM03EI0KF00F8I0F83E7E3E0F80F8J03JF,M03FE1JF8K07JF1FF8I07JF00F8I07IFE00FM03EI0JFE00F8I0F83E7F1E0F80F8K0JFC,M03FF1JFL03IFE1FFJ07IFE00F8I07IFE00FM03EI0JFC00F8I0F83E7F9E0F80F8K0JFC,M01FF8IFEL01IFC7FEJ07CK0F8I07CK0FM03EI0JFC00F8I0F83E3F9E0F80F8K07JF,N0FFC7FFCM0IF87FEJ07CK0F8I07CK0FM03EI0FC1FC00F8001F83E1FFE0F80F8N0FF,N0FFE3FF8M07FF0FFCJ07CK0F8I07CK0F8L03EI0F80FE00F8003F83E0FFE0F80F8N07F,N07FF0FFN01F81FFCJ07CK0F8I07CJ01FCL03EI0F807F00FE003F03E0FFE0F80FCN03F,N03FF87EO0103FF8J07EK0F8I07EK0FEL03EI0F803F007E003E03E0FFE0F80FEN01F,N03FFCS07FFK07FK0F8I07FK07FL03EI0F801F003F007E03E07FE0F807FN01F,O0FFES0FFEK03F8J0FCI03F8J07IF8I03EI0F801F001FC0FC03E01FE0F807IF8K0FF,O0IFR01FFCK01FCJ0FEI01FCJ07IFCI03EI0F801FI0FC1FC03E01FE0F803IFCJ01FF,O07FFCQ07FF8K01IFE007IF01IFE001IFCI03EI0F801FC007IF003E007E0F801IFC03JFC,O03FFEP01IFM0JF003IF01IFE001IFCI03EI0F800FC003IF003E007E0F800IFC03JF8,O01IFP03IFM03IF001IF003FFEI0IFCI03EI0F8007C001FFC003E007E0F8007FFC03JF,P07FFEO0IFC,P07IFN01IF8,P01JFM0JF,Q0JF8K01IFE,Q07JFEI0KF8,Q01RFE,R0RFC,R01QF,S0PFE,S01OF,T01MF,U0LFE,V03IF,:,:::::::::::::::::::^FS


						^FX YEC LABEL ^FS

						^FX CONTAINER ^FS
						^FO 20,30
						^GB 730,380,2,B
						^FS
						^CF 0,20

						^FX LABEL ^FS

						^FO80,180
						^A0N,35,0
						^FDPart No:
						^FS

						^FO80,230
						^A0N,35,0
						^FDSM:
						^FS

						^FO80,280
						^A0N,35,0
						^FDPO No:
						^FS

						^FO80,330
						^A0N,35,0
						^FDNote:
						^FS

						^CWA,E:".$font_style_name.".FNT
						
						^FX VALUES ^FS

						^FO250,200
						^AAN 0,36
						^FD".$part_no."
						^FS

						^FO250, 250
						^AAN 0,36
						^FD".$sm."
						^FS

						^FO250, 300
						^AAN 0,36
						^FD".$po_no."
						^FS

						^FO250, 350
						^AAN 0,36
						^FD".$note."
						^FS

						^XZ
						";
		return $zebra_code;
	}
	
	/***************************************************************/
	/***************************************************************/
	/************ FORMAT 18  (UL Label 70mm x 20mm)  ***************/
	/***************************************************************/
	/***************************************************************/
	function check_existing_item_name_and_lotno18(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$item_name = $return['item_name'];
		$lotno = explode("-",$return['lotno']);
		$lotno = $lotno[0];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format18';
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
	
	function save_new_c3_label18(){
		require_once('../class/c3.php');
		$return 		= $_POST; 
		$print_qty      = $return['txt_print_qty'];
		$return['query'] = '';
		$return['label'] = array();
		for($x=0;$x<$print_qty;$x++){
			$result 		= "";
			$table   		= "tbl_format18"; //table name
			$array_fields 	= array('product_id','date_encoded','size','lastupdate','username'); //table fields
			$array_values 	= array($return['txt_product_id'],date('Y-m-d H:i:s'),$_POST['txt_size'],date('Y-m-d H:i:s'),$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			/* generate zebra code format 18 */
			$return['label'][] = generate_zebra_code_format18($return['txt_product_id'],$_POST['txt_size']);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info18(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format18';
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
			$return['html'] .= '	<td>'.$row['product_id'].'</td>';
			$size 			 = '';
			$row['size'] == 1 ? $size = "70mm x 20mm" : $size  = "130mm x 42mm";
			$return['html'] .= '	<td>'.$size.'</td>';
			$return['html'] .= '</tr>';
		}
		// $return['msg'] = $result;
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label18(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format18";
			$array_fields = array('logdel');
			$array_values = array('1');
			$pkid = $array_pkid[$x];
			$result = C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		}
		$return['msg'] = 'Label has been deleted!';
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function reprint_label18(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format18';
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
			$label = generate_zebra_code_format18($row['product_id'],$row['size']);
			$return['label'][] = $label;
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format18($product_id,$size){
		$space = get_sticker_alignment_printing_ul();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$font_style_name = $space['font_style_name'];
		if($size == 1){
			$zebra_code = "	
							^XA
							
							^FO".(  45 + $left_space ).",".( 10 + $top_space )."^GFA,3264,3264,51,,::W07E,0FFCN03EI0FF8gL03FCU0CD72C8,0FFEM03FF003FFCK0IFEN0IFCK0FFEK03FEK03LFC3FEL01F703FE,0FFEM07FF007FFEK0IFEN0IFCJ01IF8J07FEJ01MFC7FEL01FF83FE,07FFM07FE007IFK0JFM01IFCJ03IFCJ07FEJ07MFC7FEL01FF83FE,07FF8L0FFC01JFK0JF8L01IFCJ07IFCJ07FEI01NFC7FEL01FF83FE,03FF8K01FFC03JF8J0JF8L01IFCJ07IFEJ07FEI03NFC7FEL01FF83FE,01FFCK03FF803JFCJ0JF8L03IFCJ0JFEJ07FEI0OFC7FEL01FF87FE,00FFCK03FF003JFCJ0JF8L07IFCJ0KFJ07FEI0OFC7FEL01FF87FE,007FEK07FF007FEFFEJ0JFCL07IFCI01KFJ07FE001IFC03J07FEL01FF87FE,007FFK0IF007FC7FEJ0JFCL07IFCI01FF1FF8I07FE003FFEM07FEL01FF87FE,007FF8I01FFE007FC3FEJ0JFEL07IFCI01FF0FF8I07FE007FFCM07FEL01FF87FE,003FF8I01FFC00FFC3FFJ0JFEL0JFCI03FE0FF8I07FE00IFN07FEL01FF87FE,001FFCI03FF801FFC3FFJ0JFEL0JFCI03FE0FFCI07FE00IFN07FEL01FF87FE,I0FFCI07FF001FF81FFJ0KFL0JFCI07FE0FFCI07FE00FFCN07FEL01FF87FE,I0FFEI07FF001FF81FF8I0KFK01FF7FCI0FFE07FCI07FE01FFCN07FEL01FF87FE,I07FEI0FFE001FF01FF8I0FFBFFK01FF7FCI0FFC07FEI07FE01FF8N07FEL01FF87FE,I07FF001FFC003FF00FF8I0FFBFF8J03FF7FCI0FF803FEI07FE03FF8N07FEL01FF87FE,I03FF001FFC003FF00FFCI0FF9FF8J03FE7FCI0FF803FFI07FE03FFO07FEL01FF87FE,I01FF803FF8003FE00FFCI0FF9FF8J07FC7FC001FF803FFI07FE03FFO07FEL01FF87FE004,I01FFC07FF8007FE007FEI0FF8FFCJ07FC7FC001FF001FFI07FE03FEO07FEL01FF87FE00EL01E,J0FFC07FEI07FC007FEI0FF8FFCJ07FC7FC003FF001FF8007FE07FEO07FEL01FF87FE01FL01F,J07FE0FFEI07FC003FFI0FF87FCJ07F87FC003FE001FF8007FE07FEO07FEL01FF87FE03EL01F8,J07FE1FFCI0FFC003FFI0FFC7FEJ0FF87FC003FEI0FF8007FE07FEO07FEL01FF87FE07C0IFE0078,J07FF1FFCI0FF8003FFI0FFC7FEI01FF87FC007FEI0FFC007FE07FEO07FEL01FF87FE0FC0JF807C,J03FF3FF8I0FF8001FFI0FF87FFI01FF87FC007FCI0FFC007FE07FCO07FEL01FF87FE0F80JFC03E,J01KFI01FFI01FF800FF83FFI01FF07FC00FFCI07FC007FE07FCO07QF87FE1F00JFE01E,K0JFEI03FFI01FF800FF83FF8003FE07FC00FFCI07FE007FE07FCO07QF87FE1E00F807E01F,K0JFEI03FEJ0FF800FF83FF8003FE07FC01FF8I07FE007FE07FCO07QF87FE1E00F803E00F,K07IFCI07FEJ0FFC00FF81FF8007FE07FC01FF8I03FF007FE07FCO07QF87FE3C00F003E00F,K03IF8I07FEJ07FC00FF81FFC007FE07FC01FF8I03FF007FE07FEO07QF87FE3C00F803E007,K03IF8I07FCJ07FC00FF80FFC007FC07FC03FFJ03FF807FE07FCO07QF87FE3C00F003E0078,K01IFJ0FFCJ07FE00FF80FFC00FFC07FC03FFJ01FF807FE07FEO07QF87FE3C00F803E0078,L0FFEJ0FF8J03FE01FF807FE00FF807FC03FEJ01FF807FE07FEO07QF87FE3C00F807E0078,L0FFEJ0FF8J03FF01FF807FE01FF807FC03FEK0FF807FE07FEO07FEL03FF87FE3C00F80FE0078,L0FFEI01FF8J03FF00FF807FE01FF007FC07FCK0FFC07FE07FEO07FEL03FF87FE3C00JFC0078,L07FEI01IFA3623FF00FF803FE01FF007FC0FFEK0FFC07FE07FEO07FEL01FF87FE3C00JFC0078,L07FEI01PF80FF803FF01FF007FC0PFC07FE07FEO07FEL01FF87FE3C00JF80078,L07FEI03PF80FF801FF03FE007FC0PFE07FE07FEO07FEL03FF87FE3C00IFEI07,L07FEI03PFC1FF801FF83FE007FC0PFE07FE03FEO07FEL03FF87FE3C00F8K07,L07FEI07PFC1FF801FF87FE007FC1QF07FE03FFO07FEL03FF87FE3C00F8K0F,L07FEI07PFC0FF800FF87FC007FC1QF07FE03FFO07FEL03FF87FE1E00FL0F,L07FEI07PFE1FF800FFCFFC007FC3QF07FE03FF8N07FEL01FF87FE1E00FL0E,L07FEI0QFE0FF800FFCFFC007FC3QF87FE03FF8N07FEL01FF87FE1F00FK01E,L07FEI0IF92FFC37FF0FF8007FCFF8007FC3QFC7FE01FF8N07FEL03FF87FE0F00FK03E,L07FE001FF8L03FF0FF8007FEFF8007FC7FCM0FFC7FE01FFCN07FEL03FF87FE0F80FK07C,L07FE001FFM03FF0FF8007JFI07FC7FCM0FFC7FE00FFEN07FEL03FF07FE07C1FK07C,L07FE003FFM01FF8FF8003JFI07FCFFCM0FFE7FE007FFN07FEL03FF87FE07E0FK0F8,L07FE003FFM01FF8FF8003IFEI07FCFF8M07FE7FE007FF8M07FEL03FF87FE03EL01F,L07FE003FEN0FF8FF8003IFEI07F8FF8M07FE7FE007FFCM07FEL03FF07FE01FL01E,L07FE003FEN0FF9FF8001IFEI07F8FF8M03FE7FE001IFM07FEL03FF07FE01EL01C,L07FE007FCN0FFDFF8001IFCI07F9FFN03FF7FE001JF801I07FCL03FF07FE004M0C,L07FE007FCN07FCFF8I0IFCI07F9FFN03FF7FEI0OFC7FCL03FF07FE,L07FE007FCN07JF8I0IF8I07IFEN03JFEI07NFC7FEL03FF87FE,L07FE00FF8N07JF8I0IF8I07IFEN01JFEI01NFC7FEL03FF07FE,L07FE01FF8N03JF8I0IF8I07IFEN01JFEJ0NFC7FEL03FF07FE,L07FE01FF8N03JF8I07FFJ07IFCO0JFEJ03MFC7FEL03FF07FE,L07FE01FFO03JF8I03FFJ07IFCO0JFEK03LFC7FEL03FF07FE,gH010AM05EJ0179F8O07IFCL01KF87FCL03FF07FC,jK04,,^FS

							^FO".(  480 + $left_space ).",".( 20 + $top_space )."^GFA,572,572,11,,::W018,01NF807FFE066,03NFC07IF07A,07NFC03IF0AB,0OFE03IF8B1,0OFE03IF8EA,0OFE01IFC66,0PF01IFC38,0PF01IFC,07OF80IFE,:03OF80IFE,03IF001IFC07IF,:01IFI0IFC03IF,01IF800IFE03IF8,01IF8007FFE03IF8,00IFC007FFE03IFC,00PF01IFC,:007OF01IFE,007OF80IFE,:007OF807IF,003OFC07IF,:001OFE03IF8,I0OFE03IF8,I07NFE03IF8,K0IFE7FFE01IFC,K0IFE7IF01IFC,K0IFE3NFC,K0IFC3NFE,K0IFC1NFE,J01IFC1NFE,J01IFC1OF,J01IF80OF8,J01IF80OF,J01IF80OF8,J03IF807NF8,J03IF007NF8,J03IF003NF8,:J03IF003NF,J03IF001MFC,,:::^FS
							
							^FX CONTAINER ^FS

							
							^FO".(  1+ $left_space ).", ".( 1+ $top_space )."
							^GB 828,237,2,B
							^FS
							^CF 0,80

							^FX YEC LOGO ^FS
							^FO".(  1+ $left_space ).", ".( 1+ $top_space )."
							^GB 828,71.4,2,B
							^FS
							^CF 0,20

							^CWA,E:".$font_style_name.".FNT

							^FO".( 47.6+ $left_space ).", ".( 73.4+ $top_space )."
							^CF 0,30
							^FDElectrical Rating: 1A, Voltage rating not determined
							^FS

							^FO".( 47.6+ $left_space ).", ".( 106+ $top_space )."
							^CF 0,30
							^FDFor disconnecting use only
							^FS

							^FO".( 47.6+ $left_space ).", ".( 143+ $top_space )."
							^CF 0,30
							^FDFlammability Class 94V-0
							^FS

							^FO".( 47.6+ $left_space ).", ".( 180+ $top_space )."
							^CF 0,30
							^FDProduct ID:
							^FS

							^FX FIELD VALUES ^FS
							^FO".( 190+ $left_space ).", ".( 180+ $top_space )."
							^CF 0,40
							^FD".$product_id."
							^FS


							^XZ
							";
			// $zebra_code = "^XA

							// ^FO".(19 + $left_space).",".(9 + $top_space)."^GFA,667,667,29,,3FC0FCI02I07F8003F8001J0FFC001FE207FE3FF07FE,1F003J07J0F8007CI038I01EI0783E00F007800F,0F002J07J0F8007CI038I01EI0F00E00F007800F,07802J07J0FC00BCI038I01E

							// 001E00E00F007800F,07C04J0F8I0BC00BCI07CI01E003C00600F007800FJ047FC2,03C04J0F8I0BE01BCI07CI01E007C00200F007800FJ081CE1,03E08I017CI09E013CI0BEI01E007800200F007800FI0101C708,01E1

							// J013CI09F013CI09EI01E00F8K0F007800FI0301C70C,00F1J023EI08F023C0011FI01E00F8K0F007800FI0201C704,00FAJ021EI08F823C0010FI01E00F8K0JF800FI0601CE06,007AJ021EI087843C0010FI01E00F8K0

							// F007800FI0601FC06,007CJ040FI087843C002078001E00F8K0F007800FI0601C006,003CJ040FI087C83C002078001E00F8K0F007800FI0601C006,003CJ080F80083C83C00407C001E0078K0F007800FI0601C006,003

							// CJ0IF80083F03C007FFC001E007CK0F007800FI0601C006,003CJ080780081F03C00403C001E003CK0F007800FI0207F004,003CI01003C0081F03C00801E001E003E00200F007800FI03K0C,003CI03003E0080E03C018

							// 01F001E001E00600F007800FI01K08,003CI07003E0080E03C03801F001EI0781800F007800FJ08I01,01FF800FC0FF87F041FF87E07FC0FFC001FE007FE3FF07FEI04I02,,:^FS

							
							// ^FO".(250 + $left_space).",".(7 + $top_space)."^GFA,138,138,6,,0021FC00C3E,07IFE0FC3E,0KF0FE6380KF0FE5D80KF07F5980KF87FE1807F83F87FB6,07F03FC3F8,03F01FC3FC,03F81FC1FC,01JFE1FC,01JFE0FE,01KF0FE,00KF0FF,00KF87F,I07F7

							// F87F8,I07F3JF8,:I0FE1JFC,::001FE0JFC,^FS

							// ^FX CONTAINER ^FS

							// ^FO ".(1 + $left_space).",".(1 + $top_space)."
							// ^GB 373,105,2,B
							// ^FS
							// ^CF 0,80

							// ^FX YEC LOGO ^FS
							// ^FO ".(1 + $left_space).",".(1 + $top_space)."
							// ^GB 373,32,2,B
							// ^FS
							// ^CF 0,20

							// ^CWA,E:".$font_style_name.".FNT

							// ^FO".(21 + $left_space).",".(37 + $top_space)."
							// ^CF 0,15
							// ^FDElectrical Rating: 1A, Voltage rating not determined
							// ^FS

							// ^FO".(21 + $left_space).",".(50 + $top_space)."
							// ^CF 0,15
							// ^FDFor disconnecting use only
							// ^FS

							// ^FO".(21 + $left_space).",".(64 + $top_space)."
							// ^CF 0,15
							// ^FDFlammability Class 94V-0
							// ^FS

							// ^FO".(21 + $left_space).", ".(78 + $top_space)."
							// ^CF 0,15
							// ^FDProduct ID:
							// ^FS

							// ^FX FIELD VALUES ^FS
							// ^FO".(90 + $left_space).",".(78 + $top_space)."
							// ^A0N,35,0
							// ^FDNFS-26A-0110
							// ^FS

							// ^XZ
							// ";
		}else{
			$zebra_code = "	^XA
							
							^FO".(  108.7 + $left_space ).",".( 4.1 + $top_space )."^GFA,31220,31220,140,,:::::::::::::::::::::::::::hN01IF8,hN03JFiY0IFE,K03hH07JFEiW07JF8,001LFEgK03E7EN01LF8iV0KFEhI01F8FC38FF870F83E,001MFgH03LF8M03LFCiU03LFhI03UF,001MF8gG07LF8M0MFEU01PFgI01NFEV07LF8V0KFEV03F80VFI07FFE7CgH06,001MFCgG0MFCL01NFU03PFgI03OFV0MFEU03LFV0gFI0LFg07FFC1F8I01LF,001MFCgG0MFCL07NFCT03PF8gH07OF8T01NF8T03LFU01gF001LF8Y0MF8007LF,I0MFEgG0MF8L0OFET03PF8gH07OF8T07NFET07LF8S03gGF003LF8Y0MF8007LF,I07MFg01MF8K01PFT03PFCgH0PF8S01PFT07LF8S07gGF007LF8X01MFC007LF,I07MFg03MFL01PF8S03PFCgH0PF8S03PF8S07LF8R01gHF007LF8Y0MFC007LF,I03MF8Y03LFEL03PF8S03PFCgG01PF8S07PF8S07LF8R07gHF007LF8Y0MF8007LF,I03MF8Y07LFCL03PF8S03PFEgG01PF8S07PFCS07LF8R0gIF007LF8Y0MF8007LF,I01MFCY0MFCL0QFCS03PFEgG01PF8S0QFCS07LF8Q01gIF003LF8Y0MFI07LF,I01MFCX01MF8K01QFCS03QFgG01PF8R01QFES07LF8P01gJF003LF8Y0MFI07KFE,I01MFEX03MF8K03QFES03QF8g03PF8R01RFS07LFQ03gJF003LF8Y0MFI07KFE,J0NFX07MFL07RFS03QF8g03PF8R03RFS07LFQ0gKF003LF8Y0MFI07KFE,J07MF8W0NFL0SF8R03QF8g03PF8R07RF8R07LFP03gKF003LF8Y0MFI07KFE,J03MF8W0NFK01SFCR03QF8g03PF8R07RF8R07LFP07gKF007LF8Y0MFI07KFE,J01MFCV01MFEK01SFCR03QFCg07PF8R0SFCR07LFO01gLF007LF8Y0MFI07LF,K0MFCV01MFCK01SFER03QFCg0QF8R0SFER07LFO03gLF007LF8Y0MFI07LF,K0MFEV03MF8K01SFER03QFCY01QF8R0SFER07LFO03gLF003LF8Y0MFI07LF,K07LFEV03MFL01SFER03QFCY01QF8Q01SFER07LFO07gLF003LF8Y0MFI07LF,K07MFV07LFEL01TFR03QFEY03QF8Q01TFR0MFO0gLFE003LF8Y0MFI07LF,K03MFV0MFEL03TF8Q03RFY07QF8Q03TFR0MFN01XF8P07LF8Y0MFI07KFE,K01MF8T01MFCL07TFCQ03RFY07QF8Q07TFR0MFN03WFCQ07LF8Y0MFI07KFE,L0MF8T01MFCL07LF1MFCQ03RFY07QF8Q07TF8Q0MFN03PF8X07LF8Y0MFI07KFE,L0MFCT03MFCL0MF07LFCQ03RFY07QF8Q07LF8MF8Q0MFN0PF8Y07LF8Y0MFI07KFE,L07LFET07MFCL0LFE03LFCQ03RF8X07QF8Q0LFE03LF8Q0MFM01OFgG03LF8Y0MFI07KFE,L07MFT0NF8K01LFC01LFCQ03RF8X07QF8Q0LFE01LFCQ0MFM03NFEgG03LF8Y0MFI07KFE,L07MF8R01NFL01LFC01LFCQ03RFCX0RF8Q0LFC01LFCQ0MFM03NFCgG03LF8Y0MFI07KFE,L03MFCR03MFEL01LFC00LFCQ03RFCX0RF8Q0LFC00LFCQ0MF8L07NF8gG07LF8Y0MFI07KFE,L03MFCR03MFCL03LFC00LFEQ03RFEW01RF8P01LF8007KFEQ0MF8L0NFEgH07LF8Y0MFI07KFE,L01MFCR03MF8L03LF800MFQ03RFEW01RF8P01LF8007KFEQ0MFM0NF8gH07LF8Y0MFI07KFE,L01MFER03MFM07LF800MFQ03RFEW03RF8P03LF8007LFQ0MFL01NFgI07LF8Y0MFI07KFE,M0MFER07MFM07LF8007LF8P03SFW03RF8P03LFI07LFQ07LFL01NFgI07LF8Y0MFI07KFE,M07MFR07LFEM0MF8007LF8P03SFW03RF8P03LFI03LF8P07LFL03MFEgI07LF8Y0MFI07KFE,M07MF8Q0MFEM0MFI07LF8P03SFW03RF8P07KFEI03LF8P07LFL03MFEgI07LF8Y0MFI07KFE,M03MF8P03MFCL01LFEI03LF8P03SF8V03RF8P07KFEI03LF8P07LFL03MFCgI07LF8Y0MFI07KFE,M01MF8P07MF8L01LFCI01LF8P03SFCV03RF8P0LFEI03LFCP0MFL07MFgJ07LF8Y0MFI07KFE,N07LFCP0NFM01LFCJ0LF8P03SFCV07RF8O01LFEI03LFCP0MFL0MFEgJ07LF8Y0MFI07KFE,N07LFCP0MFEM03LFCJ0LFCP03SFCV0SF8O01LFEI01LFCP0MFK01MFCgJ07LF8Y0MFI07KFE,N07LFEP0MFEM03LFCJ0LFCP03SFCV0LFDLF8O03LFEJ0LFCP0MFK01MF8gJ07LF8Y0MFI07LF,N03MFO01MFCM03LF8J0LFEP03SFCU01LF8LF8O03LFCJ0LFCP07LFK03MFgK07LF8Y0MFI07LF,N03MFO01MFCM03LF8J0LFEP03SFCU01LF0LF8O07LF8J0LFEP07LFK03MFgK07LF8Y0MFI07KFE,N01MF8N03MF8M03LFK07LFP03LF3LFEU01LF0LF8O07LF8J07KFEP0MFK03LFEgK07LF8Y0MFI07KFE,O0MF8N07MFN07LFK07LFP03LF3LFEU01LF0LF8O07LFK07LFP0MFK03LFEgK07LF8Y0MFI07KFE,O0MFCN07LFEN07LFK07LF8O03LF1LFEU03LF0LF8O0LFEK03LFP0MFK07LFEgK07LF8Y0MFI07KFE,O07LFEN0MFCN0LFEK07LF8O03LF1MFU07KFE0LF8O0LFEK03LF8O0MFK07LFCgK07LF8Y0MFI07KFE,O03LFEM01MFCM01LFEK03LF8O03LF0MF8T07KFE0LF8O0LFCK01LF8O0MF8J07LFCgK07LF8Y0MFI07KFE,O01MFM03MF8M01LFEK03LF8O03LF0MF8T07KFE0LF8O0LFCK01LFCO0MF8J07LF8gK07LF8Y0MFI07KFE,O01MFM03MF8M01LFEK03LFCO03LF0MFCT0LFC0LF8O0LFCK01LFCO0MF8J07LF8gK07LF8Y0MFI07LF,P0MF8L07MF8M01LFEK01LFCO03LF07LFCT0LF80LF8N01LFCK01LFEO07LFK0MFgL07LF8Y0MFI07LF,P07LFCL0NFN01LFCK01LFCO03LF07LFCT0LF01LF8N01LFCL0LFEO07LFK0MFgL07LF8Y0MFI07LF,P03LFEK01NFN03LFCK01LFCO03LF07LFCS01LF01LF8N03LF8L07KFEO07LFK0MFgL07LF8Y0MFI07KFEL01FgG07,P03MFK01MFEN07LF8L0LFEO03LF03LFES03LF00LF8N03LFM07KFEO07LFK0MFgL07LF8Y0MFI07KFEL03F8Y01FC,P01MF8J03MFCN07LFM07LFO07KFE03MFS03KFE00LF8N07KFEM03LFO0MFK0LFEgL07LF8X01MFI07KFEL07FCY03FE,Q0MF8J07MFCN07LFM07LFO07KFE01MFS03KFE00LF8N07KFEM03LFO0MFJ01LFCgL07LF8X01MFI07KFEL0FFEY07FF,Q0MF8J07MF8N07KFEM07LF8N07LF01MFS03KFE00LF8N0LFEM03LFO0MFJ01LFCgL07LF8X01MFI07KFEK01FFEY07FFC,Q07LFCJ07LFEO07KFCM07LF8N07LF01MFS03KFE00LF8N0LFEM03LF8N0MFJ03LFCgL07LFY01MFI07LFK03FFEY07FFE,Q03LFCJ0MFCO0LF8M07LFCN07LF00MFS03KFE00LF8M01LFCM03LFCN0MFJ03LFCgL07LFY01MFI07KFEK07FFEY07IF,Q03LFEI01MF8O0LF8M03LFCN07LF00MFS07KFC00LF8M01LFCM03LFCN0MFJ07LFCgL07LFY01MFI07KFEK0IFEY07IF,Q01MFI03MF8O0LF8M01LFEN07LF807LF8R07KF801LF8M01LFCM01LFCN0MFJ07LFCgL07LFY01MFI07KFEJ01IFEY03IF8,Q01MFI03MFO01LF8M01LFEN07LF803LF8R0LF801LF8M01LF8N0LFCN0MFJ07LFCgL07LFY01MFI0LFEJ03IFCY03IF8,R0MF8007MFO03LF8N0LFEN03LF803LFCQ01LF001LF8M01LF8N0LFEN0MF8I07LFEgL07LFY01MFI0LFEJ07IF8I07OF8L0IFC,R0MF800MFEO03LF8N0MFN03LF803LFCQ01LF001LF8M01LF8N0LFEN0MF8I07LFEgL07LFY01MFI0LFEJ0JFJ0PFEL07FFE,R0MF801MFEO03LF8N0MFN03LF803LFCQ03LF001LF8M01LF8N07KFEN0MFJ07LFEgL07LFY01MFI0LFEJ0IFEJ0QFL03IF,R0MFC01MFEO07LF8N0MFN03LF803LFEQ07LFI0LF8M03LFO07KFEN0MFJ07LFCgL07LFY01MFI0LFEI01IFEJ0QFEK03IF8,R07LFC03MFEO07LFO0MFN03LF803LFEQ07LFI0LF8M07LFO07LFN0MFJ07LFCgL07LF8X01MFI0LFEI01IFCI01RFK01IF8,R03LFC03MF8O07LFO07LFN03LF801LFEQ07LFI0LF8M0MFO07LFN0MFJ07LFCgL07LF8X01MFI0LFEI03IF8I01RF8K0IF8,R01LFE03MFP07KFEO07LFN03LF001MFQ0LFEI0LF8M0LFEO07LFN0MFJ07LF8gL07LF8X01MFI07KFEI03IFJ01RFCK07FFC,R01LFE07LFEP0LFCO03LF8M03LF001MF8P0LFEI0LF8L01LFEO07LF8M0MFJ07LFgM07LF8X01MFI07KFEI03IFJ01RFCK07FFE,S0MF8MFCO01LFCO03LF8M03LFI0MF8P0LFCI0LF8L01LFCO03LF8M0MFJ07KFEgM07LFE003ET07MFI07KFEI07FFEJ01RFEK03FFE,S07TF8O03LF8O01LFCM03LFI0MFCO01LF8I0LF8L01LFCO01LF8M0MFJ07KFEgM07gSFI07KFEI07FFCJ01SFK03IF,S03TF8O07LF8O01LFCM03LFI07LFCO01LFJ0LF8L03LF8O01LFCM0MFJ07KFEgM07gSFI07KFEI0IF8J01SFK01IF,S03TFP07LF8O01LFEM03LFI07LFCO03LFJ0LF8L03LF8O01LFCM0MFJ07KFEgM07gSFI07KFEI0IF8J01JF1C007JF8K0IF,S03SFEP07LFQ0LFEM03LFI03LFEO03LFJ0LF8L07LF8O01LFEM0MFJ07KFEgM07gSFI07KFE001IFL0IF8J03JF8K07FF8,S01SFCP07LFQ0LFEM07LFI03MFO07LFJ0LF8L07LFQ0MFM0MFJ07KFEgM07gSFI0LFE001FFEL0IF8K0JF8K07FF8,T0SFCP07KFEQ07KFEM07LFI03MFO07LFJ0LF8L0LFEQ0MFM0MFJ07KFEgM07gSFI0LFE003FFCL0IFL07IF8K03FFC,T07RF8P0LFCQ07LFM07LFI01MFO07LFJ0LF8L0LFEQ07LF8L0MF8I07KFEgM07gSFI0LFE003FFCL0IFL01IF8K03FFC,T07RFQ0LFCQ07LFM07LFI01MFO07LFJ0LF8K01LFCQ07LF8L0MF8I07LFgM07gSFI0LFE003FF8L0IFL01IFCK01FFC,T03QFEP01LFCQ07LF8L07LFJ0MFO0LFEJ0LF8K01LFCQ03LFCL0MF8I07LFgM07gSFI07KFE003FF8L0IFM0IFCK01FFC,T01QFEP01LFCQ03LF8L07LFJ0MFO0LFEJ0LF8K01LFCQ03LFCL0MF8I07LFgM07gSFI07KFE003FF8L0IFM0IFCK01FFC,U0QFCP03LF8Q03LFCL07LFJ0MF8M01LFEJ0LF8K01LFCQ01LFCL0MF8I07LFgM07gSFI07KFE007FF8L0IFM0IFCL0FFC,U07PFCP03LF8Q01LFCL07LFJ07LFCM01LFCJ0LF8K01LFCQ01LFEL0MF8I07LF8gL07gSFI07LF007FFM0IFM07FFCL0FFC,U03PF8P03LF8R0LFCL07LFJ07LFEM01LFCJ0LF8K03LFCQ01LFEL0MFJ07LF8gL07gSFI07LF00IFM0IFM07FFCL07FC,U03PF8P03LF8R0LFCL07LFJ03LFEM03LF8J0LF8K03LFCQ01MFL0MFJ07LFgM07gSFI07LF00IFM0IFM07FFCL07FE,U03PFQ03LFS0LFCL07LFJ03LFEM07LFK0LF8K07LF8Q01MFL0MFJ07LFgM07gSFI07KFE00FFEM0IFM07FFCL07FE,U01OFEQ07LFS0LFCL07LFJ01LFEM07LFK0LF8K0MF8R0MF8K0MFJ07LFgM07gSFI07KFE00FFEM0IFM0IFCL03FF,V0OFEQ07KFES0LFEL07LFJ01LFEM07KFEJ01LF8K0MFS0MF8K0MFJ07LFgM07gSFI07KFE00FFEM0IF8L0IFCL03FF,V07NFCQ0MFS07KFEL07LFJ01LFEM0LFEJ01LF8K0MFS0MFL0MFJ07LFgM07gSFI07KFE00FFEM0IF8L0IFCL03FF,V07NF8P01LFES07LFL07LFJ01LFEM0LFEJ01LF8K0LFES07LFL0MFJ07LF8gL07gSFI07KFE00FFEM0IF8K01IFCL03FF8,V03NFQ01LFCS07LF8K07LFK0MFM0LFEJ01LF8J01LFCS07LF8K0MFJ07LF8gL07gSFI07KFE00FFEM0IF8K03IFCL03FF8,V01MFEQ03LF8S03LF8K0MFK0MF8K01LFCJ01LF8J01LF8S03LF8K0MFJ07LF8gL07gRFEI07KFE00FFEM0IFL07IFCL03FF8,V01MFEQ03LF8S01LFCK0MFK07LF8K01LFCJ01LFK01LF8S01LFCK0MFJ07LF8gL07gRFEI07KFE00FFEM0IF8K0JF8L03FF8,V01MFCQ03LFT01LFCK0MFK07LFCK03LF8J01LFK01LF8S01LFCK0MFJ07LF8gL0MFCX07LFEI07KFE00FFEM0IF8J01JF8L03FF8,W0MFCQ07LFU0LFCK0MFK03LFCK03LF8J01LFK01LFU0LFCK0MFJ07LF8gL0MF8X03LFEI07KFE00FFEM0IF8J03JF8L03FF8,W0MFCQ07LFU0LFEK0MFK03LFCK03LFK01LFK01LFU0LFEK0MFJ07LF8gL0MF8X03LFEI07KFE00FFEM0IFCJ07JFM03FF8,W0MFCQ07KFEU0LFEK07LFK03LFCK03LFK01LFK03KFEU0LFEK0MFJ07LF8gL0MF8X03LFEI0LFE00FFEL01SFM03FF8,W07LFCQ0LFEU0LFEK07KFEK01LFCK03KFEK01LF8J07KFCU0MFK0MFJ07LF8gL07LFY03LFEI0LFE00FFEL01RFEM03FF8,W07LFCQ0LFEU0LFEK07KFEK01LFCK07KFEK01LF8J0LFCU0MFK0MFJ07LFCgL07LFY01LFEI07KFE00FFEL01RFEM03FF8,W03LFCQ0LFE1FCR0MFK07LFK01LFEK07KFEK01LF8I01LFET01MFK0MFJ07LFCgL07LFY01LFEI07LF00FFEL01RFEM03FF8,W03LFCQ0PF181FF3E00C01MFK07LFL0LFEK07KFCK01LF8I01MF8S01MF8J0MFJ07LFCgL07LFY01MFI07LF00FFEM0RFCM03FF8,W03LFCP01gOF8J07LFL0MFK07KFCK01LF8I03PF9JFE7EQF8J0MFJ07LFCgL07LFY01MFI07LF00FFEM0RF8M03FF,W03LFCP01gOFCJ07LFL07LF8J0LFCL0LF8I03gOFCJ0MFJ07LFCgL07LFY01MFI07LF00FFEM0RFN03FF,W03LFCP01gOFCJ07KFEL07LF8J0LFCL0LF8I03gOFCJ0MFJ07LFCgL07LFY01MFI0MF00FFEM0QFEN03FF,W03LFCP03gOFEJ07KFEL03LF8I01LF8K01LF8I03gOFEJ0MFJ07LFCgL07LFY03MFI07KFE00FFEM0QFCN03FF,W03LFCP07gOFEJ07LFL03LF8I03LFL01LFJ03gOFEJ0MFJ03LFCgL07LF8X03MFI07KFE00FFEL01QFO07FE,W03LFCP07gPFJ07LFL01LFCI03LFL01LFJ03gOFEJ0MFJ03LFCgL07LF8X03MFI07KFE00FFEL01PFCO07FE,W03LFCP07gPFJ0MFL01LFCI07KFEL01LFJ03gOFEJ0MFJ01LFCgL07LFY03LFEI07KFE00FFEL01IFEV07FE,W03LFCP07gPF8I0MFL01LFEI07KFEL01LFJ07gOFEJ0MFK0LFCgL07LFY03LFEI07KFE00IFL01IF8V0FFE,W03LFCP0gQF8I0MFL01LFEI0LFEL01LF8I0gQFJ0MFK0LFCgL07LFY03LFEI0LFE00IFL01IFW0FFE,W03LFCP0gQF8I0LFEM0MFI0LFEL01LF8I0gQF8I0MFK0LFEgL07LFY03LFEI0LFE007FFL01IFW0FFE,W03LFCO01gQF8I0LFEM0MFI0LFEL01LF8I0gQFCI0MFK0MFgL07LFY01LFEI0LFE007FFL01IFV01FFE,W03LFCO01gQFCI07KFEM0MF001LFCL01LF8001gQFCI0MFK0MFgL07LFY01LFEI0LFE003FFL01IFV01FFC,W03LFCO03gQFCI07KFEM03LF001LF8L01LF8001gQFCI0MFK0MFgL07LFY01LFEI0LFE003FF8K01IFV01FFC,W03LFCO03gQFCI07KFEM03LF003LF8L01LFI03gQFCI0MFK0MFgL07LFY01LFEI0LFE003FF8K01IFV03FF8,W03LFCO03gQFCI07KFEM03LF803LFM01LFI03gQFCI0MFK0MF8gK07LFY01LFEI0LFE001FFCK01IFV03FF8,W03LFCO07gQFCI0LFEM03LF807LFM01LFI03gQFCI0MFK0MF8gK07LFY01LFEI0LFE001FFEK01IFV03FF8,W03LFCO07gQFEI0LFEM03LFC07LFM01LFI07gQFEI0MFK0MFCgK07LFY01LFEI0LFE001FFEK01IFV07FF,W03LFCO0gSFI0MFM01LFC07LFM01LFI07gQFEI0MFK07LFEgK07LFY01LFEI0LFE001IFK01IFV07FF,W03LFCO0gSFI07LFM01LFC07LFM01KFEI0gSFI0MFK07LFEgK07LFY01LFEI0LFE001IFK01IFV0IF,W03LFCN01gSF8007LFM01LFE07KFEM01LFI0gSF800MFK03LFEgK07LFY01LFEI0LFEI0IF8J01IFU01FFE,W03LFCN01gSFC007LFN0LFE0LFEM01LFI0gSF800MFK03LFEgK07LFY03LFEI0LFEI0IF8J01IFU01FFE,W03LFCN03OFERF87OFC007LFN0LFE0LFCM01LF001gSFC00MFK01MFgK07LFY03LFEI0LFEI0IFCJ01IFU03FFE,W03LFCN03LF8I030307JF8J030MFE007LFN0LFE0LFCM01LF001gSFE00MFK01MFgK07LFY03LFEI0LFEI07FFEJ01IFU07FFC,W03LFCN03LF8Y03LFE007LFN07LF0LF8M01LF003LF8Y03LFE00MFK01MF8gJ07LFY03LFEI0LFEI03IFJ01IFU0IFC,W03LFCN03LFg01LFE007KFEN07LF9LF8M01LF003LFg01MF00MFK01MFCgJ07LFY03LFEI0LFEI03IFJ01IFT01IF8,W03LFCN07KFEg01LFE007KFEN07SFN01LF007LFgG0MF00MFL0MFEgJ0MFY03LFEI0LFEI01IF8I03IFT03IF8,W03LFCN07KFCg01LFE007KFEN07SFN01LF007LFgG0LFE00MFL0NFgJ0MFY03LFEI0LFEI01IFCI03IFT03IF,W03LFCN07KFCg01LFE007KFEN03RFEN01LF00MFgG0LFE00MFL07MFgJ0MFY03LFEI07KFEJ0IFCI03IFT03IF,W03LFCN0LFCg01LFE007KFEN03RFEN01LF00LFEgG0MF00MFL03MF8gI0MFY03LFEI07KFEJ0IFEI01IFT07FFE,W03LFCN0LFCg01MF007KFEN01RFEN01LF01LFEgG0MF80MFL01MFCgI0MFY03LFEI07KFEJ07IFI01IFT0IFC,W03LFCM03LF8gG0MF807KFEN01RFCN01LF01LFCgG07LF80MFL01MFCgI0MFY03LFEI07KFEJ03IFI01IFS01IFC,W03LFCM03LF8gG0MFC07KFEO0RFCN01LF01LFCgG07LFC0MFM0MFEgI0MFY03LFEI07KFEJ03IF8I0FFES03IF8,W03LFCM03LF8gG07LFC07KFEO0RF8N01LF01LF8gG07LFC0MFM0NFgI07LFY03LFEI0LFEJ01IFCY03IF,W03LFCM03LF8gG07LFC07KFEO0RFO01KFE03LF8gG03LFC0MFM07MFCgH07LFY03LFEI0LFEJ01IFEY07IF,W03LFCM03LFgH03LFC07KFEO0RFO01KFE03LF8gG03LFC0MFM07MFCgH07LFY03LFEI0LFEK0IFEY07FFE,W03LFCM03LFgH03LFC07KFEO0RFO01KFE03LFgH01LFC0MFM07MFEgH07LFY03LFEI0LFEK07FFEY07FFC,W03LFCM07LFgH01LFC07KFEO07QFO01KFE03LFgH01LFE0MFM03NF8gG07LFY03LFEI0LFEK03FFEY07FF8,W03LFCM07KFEgI0LFC0LFEO03PFEO01KFE03LFgI0LFE0MFN0NFCgG07LFY03LFEI0LFEK01FFEY07FF,W03LFCM07KFEgI0LFE0LFEO01PFEO01KFE07LFgI07KFE0MFN07NFEg07LFY03LFEI0LFEK01FFEY07FE,W03LFCM0LFCgI0LFE0LFEO01PFEO01KFE07KFEgI07KFE0MFN03OFg07LFY03LFEI0LFEL0FFCY03FC,W03LFCL01LFCgI0MF0LFEO01PFEO01KFE07KFCgI07LF0MFN03OFE7FW0MFY03LFEI0LFEL03F8Y01F8,W03LFCL01LF8gI07LF8LFEO01PFEO01KFE0LFCgI07LF0MFN01RF8V0MFY03LFEI0LFEL01FgG0F,W03LFCL03LF8gI07LF8LFEP0PFCO01KFE0LF8gI07LF0MFO0TFE0C03F8003CJ0MFY03LFEI0LFEM0E,W03LFCL03LFgJ07LF8LFEP07OFCO01KFE1LF8gI07LF8MFO07gKFC007LFY03LFEI0LFE,W03LFCL03LFgJ03LFC7KFEP07OFCO01KFC1LFgJ07TFO03gKFE007LFY03LFEI0LFE,W03LFCL07LFgJ03LFC7KFEP03OF8O01KFE3LFgJ07TFO03gLF007LFY03LFEI0LFE,W03LFCL07LFgJ03LFE7KFEP03OF8O01LF7LFgJ03TFP0gLF007LFY03LFEI0LFE,W03LFCL07KFEgJ03SFEP03OFP01RFEgJ03TFP07gKF007LFY03LFEI0LFE,W03LFCL07KFEgJ01SFEP03NFEP01RFEgJ01TFP03gJFE007LFY03LFEI0LFE,W03LFCL07KFCgJ01SFEP03NFEP01RFEgK0TFQ07gIFE007LFY03LFEI0LFE,W03LFCL0LFCgJ01SFEP03NFCP01RFCgK0TFQ03gIFE007LFY03LFEI0LFE,W03LFCK01LF8gK0SFEP03NFCP01RFCgK0TFQ01gIFE007LFY03LFEI0LFE,W03LFCK03LFgL0SFEP03NFCP01RFCgK0TFR07gHFE00MFY03LFEI0LFE,W07LFCK07LFgL07RFEP01NFCP01RF8gK0TFR03gHFE007LFY03LFEI0LFE,W07LFCK07LFgL07RFEQ0NFCP01RF8gK07SFS0gIF007LFY07LFEI0LFE,W07LFCK07LFgL03RFEQ0NF8P01RFgL03SFS01gHF007LFY07LFEI0LFE,W07LFCK07LFgL03RFEQ07MFQ01RFgL03SFT0gHF00MFY07LFEI0LFE,W07LFCK07KFEgL03RFEQ03LFEQ01RFgL01SFT03gGF00MFY07LFEI0LFE,W03LFCK07KFEgL03RFEQ01LFEQ01QFEgL01SFV0gF00MFY07LFEI0LFE,W03LF8K07KFCgL01RFER0LFCQ01QFEgL01SFV03XFE00LFEY07LFEI0LFE,gG03C7h0JFCMFCR0LF8R0QF8gM0RFEY07UFE00LFEY07LFCI0LFE,iJ0300382gG0E7FFT021FFC0JFgN07QF8Y01UFC007KFCY03LFCI07KFC,jS01EhV01C003EgI03E038I0383EL0300C0F8Y01LF8I03KFC,r0F8,,:::::::::::::::::::::::::::^FS
							^FO".(  1230  + $left_space ).",".( 50 + $top_space )."^GFA,4176,4176,29,,:::hR06,hQ01F8,P02h03FE,I03gJFEL03OFCJ01F1F8,I07gKFL07OFEJ03F0FC,001gLF8K07PFJ07IFE,003gLFCK07PF8I07FF9F,007gLFEK07PF8I0IF8F,00gMFEK03PFC001IF8F8,01gMFEK03PFC0039E787E,03gMFEK03PFC0039E387E,03gNFK01PFE0038E383C,07gNFK01PFE0038FC03C,07gNF8J01QF0038FC03C,0gOFCJ01QF0039FC078,0gOFCK0QF803DF30F,0gOFCK0QF803FE38F,0gOFCK07PFC01FE38E,0gOFCK07PFC00FC1FE,0gOFCK07PFE007C0FC,0gOFEK03PFE007F0F8,0gOFEK03PFE003IF,0gPFK03QFI0FFC,0gPF8J03QFI07F8,07gOF8J01QFI03C,07gOF8J01QF,03gOFCK0QF,03gOFCK0QF8,01gOFEK07PF8,01gOFEK07PFC,:01gPFK07PFC,00gPFK03PFE,007gOFK03PFE,:003PFC3JFCRF8J01QF,003PF8M07PF8K0QF,003PF8M07PF8K0QF8,003PFN03PFCK0QF8,003PF8M03PFCK07PFC,003PF8M01PFEK07PFC,001PF8M01PFEK07PFC,001PF8N0PFEK03PFC,I0PFCN0PFEK03PFE,I0PFCN07PFK01PFE,I0PFEN07PFK01QF,I07OFEN07PFK01QF,I07PFN03PF8J01QF8,I07PFN03PFCJ01QF8,I07PFN01PFCJ01QF8,I03PFN01PFCK0QF8,I01PF8N0PFCK0QFC,I01PFCN0PFCK07PFC,J0PFEN0PFEK07PFE,J0QF3C7J01QFK07PFE,J07VFE7QF8J03QF,J07gOF8J03QF,::J07gOFCJ01QF8,J03gOFCJ01QFC,J01gOFCJ01QFC,J01gOFEK0QFE,:J01gOFEK07PFE,J01gPFK07PFE,J01gPFK03PFE,K0gPFK03PFE,:K0gPF8J01QF,K0gPF8J01QF8,K07gOF8J01QF8,K03gOFCK0QFC,K03gOFEK0QFC,K01gOFEK07PFC,:K01gPFK07PFC,L0gPFK03PFE,L0gPFK01PFE,L07gOF8J01QF,:L03gOF8J01QF8,L01gOFCJ01QF8,M0gOFCK0QF8,M07gNFCK0QF8,M01gNFCK0QFC,N0gNFEK07PFC,N07gMFEK03PFC,S0QFE1PFEK03PFE,S07PFC0PFEK03PFE,S07PFC0QFK01QF,S07PF80QF8J01QF,S07PF807PFCJ03QF,S07PF807QF8I03QF,S07PF803gMF8,:S0QF801gMFC,:S0QFI0gMFE,S0QFI07gLFE,S0PFEI07gLFE,S0PFEI03gLFE,R01PFEI03gLFE,R01PFEI03gMF,R03PFCI03gMF,R03PFCI03gMF8,:R03PFCI01gMFC,R03PF8I01gMFE,R03PF8J0gMFE,R03PFK0gNF,R03PFK07gMF,R07PFK07gLFE,::R07PFK03gMF,:R0QFK03gMF,Q01QFK01gMF8,Q01PFEK01gMF8,Q01PFEL0gMF8,Q01PFCL0gMF,Q01PF8L0gMF,Q01PF8L07gLF,:Q01PF8L03gLF,:Q01PF8L01gLF,Q03PF8L01gLF,Q03PFM01gKFE,Q03PF8L01gKFE,Q03PF8M0gKFC,Q03PFN0gKF8,Q03PFN07gJF,Q01PFN03gIF8,R0F8MFCN01gHFE,,:::^FS

							^FX CONTAINER ^FS

							^FO".(  1+ $left_space ).", ".( 1+ $top_space )."
							^GB 1530,480,8,B
							^FS
							^CF 0,80

							^FO".(  1+ $left_space ).", ".( 1+ $top_space )."
							^GB 1530,209.2,4,B
							
							^FS
							^CF 0,20

							
							^FO".( 119+ $left_space ).", ".( 218.9+ $top_space )."
							^CF 0,50
							^FDElectrical Rating: 0.5A, Voltage rating not determined
							^FS

							^FO".( 119+ $left_space ).", ".( 268+ $top_space )."
							^CF 0,50
							^FDFor disconnecting use only
							^FS

							^FO".( 119+ $left_space ).", ".( 315.6+ $top_space )."
							^CF 0,50
							^FDFlammability Class 94V-0
							^FS

							^FO".( 119+ $left_space ).", ".( 365.2+ $top_space )."
							^CF 0,50
							^FDProduct ID:
							^FS

							^FX FIELD VALUES ^FS
							^FO".( 350+ $left_space ).", ".( 373+ $top_space )."
							^CF 0,90
							^FD".$product_id."
							^FS

							^XZ
							";
		}
		return $zebra_code;
	}
	
	
	function save_new_c3_label19(){
		require_once('../class/c3.php');
		$return 		= $_POST; 
		$print_qty      = $return['txt_print_qty'];
		$return['query'] = '';
		$return['label'] = array();
		for($x=0;$x<$print_qty;$x++){
			if(isset($return['chk_alternate_lot'])){
				$lotno_extension     = generate_alternate_lot_no_extension( $x+1, $return['txt_lot_no_count'] );
			}else{
				if($x==0){
					$lotno_extension = $return['txt_lot_no_count'];
				}else{
					$lotno_extension = generate_new_lot_no_extension($lotno_extension);
				}
			}
			$return['checking']['lotno_extension'][] 	= $lotno_extension;
			$result 		= "";
			$table   		= "tbl_format19"; //table name
			$array_fields 	= array('item_name','qty','lotno','lotno_extension','order_no','remarks','date_encoded','lastupdate','username'); //table fields
			$array_values 	= array($return['txt_itemname'],$return['txt_qty'],$return['txt_lot_no'],$lotno_extension,$return['txt_order_no'],$return['txt_remarks'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),$return['username']); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			// $script 		= C3::getInstance()->insert_query_test($table,$array_fields,$array_values);
			$return["result"] = json_encode($result); //return the the serialize values
			// $return["script"] = $script; //return the the serialize values
			/* generate zebra code format 1 */
			$return['label'][] = generate_zebra_code_format1($return['txt_itemname'],$return['txt_qty'],$return['txt_lot_no'],$lotno_extension,$return['txt_order_no'],$return['txt_remarks']);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	/***************************************************************/
	/***************************************************************/
	/************************    FORMAT 20      *********************/
	/***************************************************************/
	/***************************************************************/
	function check_existing_item_name_and_lotno_format20(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$pn_code = $return['spec'];
		$lotno = $return['lotno'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format20';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `spec` = "'.$pn_code.'" AND `lotno` = "'.$lotno.'"';
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
	
	function save_new_c3_label_format20(){
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
			$table   		= "tbl_format20"; //table name
			$array_fields 	= array('pn_code',
									'qty',
									'contractor_code',
									'lotno',
									'lotno_extension',
									'spec',
									'p',
									'date_encoded',
									'lastupdate',
									'username'); //table fields
			if( !isset($return['chk_p']) ){
				$p = 0;
			}else{
				$p = $return['chk_p'];
			}
			$array_values 	= array($return['txt_pn_code'],
									$return['txt_qty'],
									$return['txt_contractor_code'],
									$return['txt_lot_no'],
									$lotno_extension,
									$return['txt_spec'],
									$p,
									date('Y-m-d H:i:s'),
									date('Y-m-d H:i:s'),
									$return['username']); //values to be saved
			$result 			= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return["query"]  	= C3::getInstance()->insert_query_test($table,$array_fields,$array_values);
			/* generate zebra code format 11 */
			$return['label'][] = generate_zebra_code_format20($return['txt_pn_code'],$return['txt_qty'],$return['txt_contractor_code'],$return['txt_lot_no'],$lotno_extension,$return['txt_spec'],$p);
		}
		$return["msg"]  = 1;
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function load_selected_label_info_format20(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format20';
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
			$return['html'] .= '	<td>'.$row['pn_code'].'</td>';
			$return['html'] .= '	<td>'.$row['qty'].'</td>';
			$return['html'] .= '	<td>'.$row['contractor_code'].'</td>';
			$return['html'] .= '	<td>'.$row['lotno'].'-'.$row['lotno_extension'].'</td>';
			$return['html'] .= '	<td>'.$row['spec'].'</td>';
			$return['html'] .= '</tr>';
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function delete_label_format20(){
		require_once('../class/c3.php'); 
		$return = $_POST; 
		$array_pkid = $_POST['array_pkid'];
		$return['msg'] = '';
		for($x=0;$x<count($array_pkid);$x++){
			$result = "";
			$table        = "tbl_format20";
			$array_fields = array('logdel');
			$array_values = array('1');
			$pkid = $array_pkid[$x];
			$result = C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		}
		$return['msg'] = 'Label has been deleted!';
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	function reprint_label_format20(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$array_pkid = $_POST['array_pkid'];
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'vw_format20';
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
			$label = generate_zebra_code_format20($row['pn_code'],$row['qty'],$row['contractor_code'],$row['lotno'],$row['lotno_extension'],$row['spec'],$row['p']);
			$return['label'][] = $label;
		}
		$return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	function generate_zebra_code_format20($pn_code,$qty,$contractor_code,$lotno,$lotno_extension,$spec,$p){
		$space 		= get_sticker_alignment_printing();
		$left_space = $space['left_space'];
		$top_space 	= $space['top_space'];
		$top_space = $top_space-20;
		$font_style_name	= $space['font_style_name'];
		if($p == '1'){
			$print_p = 'P';
		}else{
			$print_p = '';
		}
		$zebra_code = "
						^FX FIXED VALUES ^FS
						^FO".( 50+ $left_space ).", ".( 415+ $top_space )."
						^CF 0,26
						^FD[EIAJ C-3]
						^FS

						^FX BARCODE ^FS

						^FO".( 50+ $left_space ).", ".( 210+ $top_space )."
						^BY1
						^B3N, N, 50, N, N
						^FD3N 1 ".$pn_code."
						^FS

						^FO".( 50+ $left_space ).", ".( 310+ $top_space )."
						^BY1
						^B3N, N, 50, N, N
						^FD3N 2 ".$qty." ".$lotno."-".$lotno_extension." ".$contractor_code."
						^FS

						^FO".( 580+ $left_space ).", ".( 115+ $top_space )."
						^A0N20,100
						^FD".$print_p."
						^FS

						^FX BARCODE TEXT ^FS
						^FX  ######## Select Font ######## ^FS

						^FO".( 50+ $left_space ).", ".( 180+ $top_space )."
						^CF 0,26
						^FD(3N) 1".$pn_code."  ".$qty."
						^FS

						^FO".( 50+ $left_space ).", ".( 280+ $top_space )."
						^CF 0,26
						^FD(3N) 2 ".$lotno."-".$lotno_extension."  ".$contractor_code."
						^FS

						^FX VALUES ^FS

						^FO".( 50+ $left_space ).", ".( 80+ $top_space )."
						^AAN0,40
						^FD <P/N>  ".$pn_code."
						^FS

						^FO".( 50+ $left_space ).", ".( 140+ $top_space )."
						^AAN0,30
						^FD <S/N>  ".$lotno."-".$lotno_extension."
						^FS

						^FO".( 460+ $left_space ).", ".( 140+ $top_space )."
						^AAN0,30
						^FD <QTY> ".$qty."pcs
						^FS

						^FO".( 50+ $left_space ).", ".( 375+ $top_space )." 
 						^FD<YAMAICHI P/N> ".$spec."
						^FS


						^XZ";
		return $zebra_code;
	}
	
	
	
	
	/* Default Values */
	function get_cn_default_value(){
		require_once('../class/c3.php'); 
		$return = $_POST;
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'tbl_cn_default_values';
		$joins 	   	= '';
		$sql_where 	= 'WHERE `item_name` = "'.$_POST['item_name'].'"';
		$sql_order 	= '';
		$sql_limit 	= '';
		$result = C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script = C3::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return['data'] = array();
        while($row = mysqli_fetch_assoc($result)){
			$return['data'] = $row;
		}
		$return['script'] = $script;
		// $return['result'] = json_encode($result);
		echo json_encode($return);
	}
	
	/* settings */
	function get_sticker_alignment(){
		require_once('../class/c3.php'); 
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
		$return["query"] = C3::getInstance()->update_query_test($table,$array_fields,$array_values,$pkid);
		$return["result"] = json_encode($result); //return the the serialize values
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
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
	
	function get_sticker_alignment_ul(){
		require_once('../class/c3.php'); 
		$return = $_POST;
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
	
	function get_sticker_alignment_printing_ul(){
		// error_reporting(E_ALL);
		// ini_set('display_errors', 1);
		require_once('../class/c3.php'); 
		$return = array();
		$result = "";
		$array_fields = array('*');
		$table 	   	= 'tbl_sticker_alignment_ul';
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
			$ctr++;
		}
		/* no existing record - insert new row with 0 as default left and top space */
		if($ctr == 0){
			$table   		= "tbl_sticker_alignment_ul"; //table name
			$array_fields 	= array('pc_ip','left_space','top_space'); //table fields
			$array_values 	= array($_SERVER['REMOTE_ADDR'],'0','0'); //values to be saved
			$result 		= C3::getInstance()->insert_query($table,$array_fields,$array_values);
			$return = $_POST;
			$result = "";
			$array_fields = array('*');
			$table 	   	= 'tbl_sticker_alignment_ul';
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
	
	function update_sticker_alignment_ul(){
		require_once('../class/c3.php'); 
		$return 	  = $_POST;
		$result 	  = "";
		$table        = "tbl_sticker_alignment_ul";
		$array_fields = array('left_space','top_space','font_style_name'); //table fields
		$array_values = array($return['left_space'], $return['top_space'], $return['font_name']);
		$pkid = $return['pkid'];
		$result = C3::getInstance()->update_query($table,$array_fields,$array_values,$pkid);
		$return["query"] = C3::getInstance()->update_query_test($table,$array_fields,$array_values,$pkid);
		$return["result"] = json_encode($result); //return the the serialize values
		echo json_encode($return); //json encode since I used a dataType json before passing the serialized values here
	}
	
	/* Function for reserved words */
	function add_backslash_reserve_words($str){
		$new_str = $str;
		if (strpos($str, 'FP') !== false) {
			/* add backslash to special reserved words in zebra */
			$new_str = str_replace('FP','\\\FP',$str);
		}
		return $new_str;
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
		while($row = mssql_fetch_array($result)){
			$return['item_name'][] = $row['NAME'];
		}
		echo json_encode($return);
	}
	
	function get_item_code(){
		require_once('../class/cn_ypics1.php');
		$CNYPICS = new CNYPICS;
		$p = $_POST;
		$pattern = $_POST['pattern'];
		$return = array();
		$fields = array('TOP 10 CODE');
		$table_name = "XHEAD";
		$where = "WHERE CODE LIKE '%$pattern%' ";
		$order = "";
		$result = $CNYPICS->select_record($fields,$table_name,$where,$order);
		$return['item_code'] = array();
		while($row = mssql_fetch_array($result)){
			$return['item_code'][] = $row['CODE'];
		}
		echo json_encode($return);
	}
	
	function get_item_name(){
		require_once('../class/cn_ypics1.php');
		$CNYPICS = new CNYPICS;
		$p = $_POST;
		$item_code = $_POST['item_code'];
		$return = array();
		$fields = array('NAME');
		$table_name = "XHEAD";
		$where = "WHERE CODE = '$item_code' ";
		$order = "";
		$result = $CNYPICS->select_record($fields,$table_name,$where,$order);
		$return['item_name'] = '';
		while($row = mssql_fetch_array($result)){
			$return['item_name'] = $row['NAME'];
		}
		echo json_encode($return);
	}
	
	function save_new_default_values(){
		require_once('../class/c3.php'); 
		/* check for existing record */
		$item_name 			= $_POST['item_name']; 
		$array_fields 		= array('*');
		$table				= 'tbl_cn_default_values';
		$joins				= '';
		$sql_where			= '';
		$sql_order			= 'WHERE item_name = "'.$item_name.'" and logdel = "0" ';
		$sql_limit			= '';
		$result 			= C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 			= C3::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$return['script']	= $script;
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
		$script 			= C3::getInstance()->insert_query_test($table,$array_fields,$array_values);
		$return['data']		= $data;
		$return['script']	= $script;
		echo json_encode($return);
	}
	
	function get_default_value_details(){
		require_once('../class/c3.php'); 
		/* check for existing record */
		$id					= $_POST["id"];
		$array_fields 		= array('*');
		$table				= 'tbl_cn_default_values';
		$joins				= '';
		$sql_where			= '';
		$sql_order			= 'WHERE pkid = "'.$id.'"';
		$sql_limit			= '';
		$result 			= C3::getInstance()->select_query($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		$script 			= C3::getInstance()->select_query_test($array_fields,$table,$joins,$sql_where,$sql_order,$sql_limit);
		while($row = mysqli_fetch_assoc($result)){
			$return['data'] = $row;
		}
		$return['script']	= $script;
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
		$script 			= C3::getInstance()->update_query_test($table,$array_fields,$array_values,$pkid);
		$return['script']	= $script;
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
	
	function search_item(){
		require_once('../class/cn_ypics1.php');
		$CNYPICS = new CNYPICS;
		// $p = $_POST;
		$search_category = $_POST['search_category'];
		$search_pattern  = $_POST['search_pattern'];
		if($search_category == 'PONo'){
			$search_category = 'XRECE.SORDER';
		}
		$return = array();
		$fields = array('XHEAD.NAME','SORDER as PONo');
		$table_name = "XRECE INNER JOIN XHEAD ON XRECE.CODE = XHEAD.CODE";
		$where = "WHERE ".$search_category." ='".$search_pattern."'";
		$order = "";
		$result = $CNYPICS->select_record($fields,$table_name,$where,$order);
		$exist = 0;
		while($row = mssql_fetch_array($result)){
			$return['item_name'][] = $row['NAME'];
			$return['PONo'][] = $row['PONo'];
			$exist = 1;
		}
		$return['result'] = json_encode($result);
		$return['search_category'] = $search_category;
		$return['exist'] = $exist;
		echo json_encode($return);
	}

	function search_item_ts(){
		require_once('../class/tpics_iscd2.php');
		$TSYPICS = new TSYPICS;
		// $p = $_POST;
		$search_category = $_POST['search_category'];
		$search_pattern  = $_POST['search_pattern'];
		if($search_category == "PONo"){
			$search_pattern = $search_pattern;
			$search_category = 'SORDER';
		}
		$return = array();
		$fields = array('XRECE.SORDER AS PONo','XRECE.CODE','XHEAD.NAME');
		$table_name = "XRECE";
		$where = "INNER JOIN XHEAD ON XRECE.CODE = XHEAD.CODE WHERE ".$search_category." ='".$search_pattern."'";
		$order = "";
		$result = $TSYPICS->select_record($fields,$table_name,$where,$order);
		$script = $TSYPICS->select_record_script($fields,$table_name,$where,$order);
		$exist = 0;
		while($row = mssql_fetch_array($result)){
			$return['item_name'][] = str_replace(' - (Burn-in)','',$row['NAME']);
			$return['PONo'][] = $row['PONo'];
			$exist = 1;
		}
		$return['exist'] = $exist;
		$return['script'] = $script;
		$return['result'] = $result;
		echo json_encode($return);
	}
	
	function get_all_item_name_by_po(){
		require_once('../class/cn_ypics1.php');
		$CNYPICS = new CNYPICS;
		$p = $_POST;
		$return = array();
		$fields = array('XHEAD.NAME');
		$table_name = "XRECE INNER JOIN XHEAD ON XRECE.CODE = XHEAD.CODE";
		$where = "WHERE XRECE.SORDER = '".$p['PONo']."00010'";
		$order = "";
		$result = $CNYPICS->select_record($fields,$table_name,$where,$order);
		while($row = mssql_fetch_array($result)){
			$return['PONo'][] = $row['NAME'];
		}
		$return['new'] = $where;
		echo json_encode($return);
	}
	
	function search_item_cn(){
		require_once('../class/cn_ypics1.php');
		$CNYPICS = new CNYPICS;
		$search_category = $_POST['search_category'];
		$search_pattern  = $_POST['search_pattern'];
		if($search_category == 'PONumber' || $search_category == 'PONo'){
			$search_category = 'XRECE.SORDER';
		}
		$return = array();
		$fields = array('XHEAD.NAME as DeviceName','XHEAD.CODE as DeviceCode','XRECE.SORDER as PONumber');
		$table_name = "XRECE INNER JOIN XHEAD ON XRECE.CODE = XHEAD.CODE";
		$where = "WHERE ".$search_category." ='".$search_pattern."'";
		$order = "";
		$result = $CNYPICS->select_record($fields,$table_name,$where,$order);
		$query 	= $CNYPICS->select_record_test($fields,$table_name,$where,$order);
		$exist = 0;
		while($row = mssql_fetch_array($result)){
			$return['PONumber'][] 	= $row['PONumber'];
			$return['DeviceCode'][] = $row['DeviceCode'];
			$return['DeviceName'][] = $row['DeviceName'];
			$return['POQty'][] 		= $row['POQty'];
			$exist = 1;
		}
		$return['query'] = $query;
		$return['exist'] = $exist;
		$return['post'] = $_POST;
		echo json_encode($return);
	}
	
	function get_all_item_name_by_po_yf(){
		require_once('../class/yf.php');
		$YFYPICS = new YFYPICS;
		$p = $_POST;
		$return = array();
		$fields = array('NAME');
		$table_name = "vw_yf_po_received";
		$where = "WHERE PONumber = '".$p['PONo']."00010'";
		$order = "";
		$result = $YFYPICS->select_record($fields,$table_name,$where,$order);
		while($row = mssql_fetch_array($result)){
			$return['PONo'][] = $row['NAME'];
		}
		$return['new'] = $where;
		echo json_encode($return);
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
		$return['work_week'] = date('y'). str_pad( ( floor($datediff / $one_week) ),2,0, STR_PAD_LEFT );
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