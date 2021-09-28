<?php

$itemCat 	 = ($_POST['pnSelect']);

switch($itemCat){
	case "0004"	: 
		$itemName = 'CN121H-104-0004';
		$partName = 'CFP2 Mecha set 2 Heatsink&2 Clip';
		$partNumber	 = '1AD188460001';
		break;
	
	case "0005"	: 
		// $itemName = 'CN121H-104-0005'; //4-17-2019
		$itemName = 'CN121H-104-0005(01)';
		$partName = 'CFP2 Mecha set 2 Heatsink&2 Clip';
		$partNumber	 = '1AD188460001';
		break;
	
	case "0007"	:
		$itemName = 'CN121M-104-0007';
		$partName = 'CFP2 Single Clip';
		$partNumber	 = '1AD188460002';
		break;
}

$shipQty	 = ($_POST['shipQty_input']);
$qty_per_box = ($_POST['maxQty_input']);
$shipDate = ($_POST['dateMFD_input']);

$num_of_stickers = $shipQty/$qty_per_box;
$excess = $shipQty%$qty_per_box;



$return = array();


for($x=0;$x<$qty_per_box;$x++){
	$zebra_code  = "^XA

	^FO50,40
	^A0N,20,0
	^FD".$partName."
	^FS

	^FO50,65
	^A0N,20,0
	^FDPN:
	^FS

	^FO90,65
	^A0N,20,0
	^FD".$partNumber."
	^FS

	^FO 50,85^BY1
	^B3N,N,40,N,N
	^FD1P".$partNumber."
	^FS

	^FO50,155
	^A0N,20,0
	^FDYamaichi PN: ".$itemName."
	^FS

	^FO50,200
	^A0N,20,0
	^FDQty:
	^FS

	^FO100,200
	^A0N,20,0
	^FD".$shipQty."pcs
	^FS

	^FO50,225^BY1
	^B3N,N,40,N,N
	^FDQ".$shipQty."
	^FS

	^FO50,300
	^A0N,20,0
	^FDAssembled in: Philippines
	^FS

	^FO450,60^BY1
	^B7N,5,0,6,23,N
	^FD
	[)>06\\\\x1DQ".$shipQty."\\\\x1D1P".$partNumber."\\\\x1D\\\\x1D\\x04
	^FS

	^FO450,270
	^A0N,20,0
	^FDMFD:
	^FS

	^FO500,270
	^A0N,20,0
	^FD".date('d-M-y',strtotime($shipDate))."
	^FS

	^FO450,300
	^A0N,20,0
	^FDYAMAICHI
	^FS

	^FO35,25
	^GB 678,325,2,B
	^FS
	^CF0,20

	^XZ";
	
	$return['zpl'][] = $zebra_code;
}


echo json_encode($return);