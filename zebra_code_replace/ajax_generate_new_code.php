<?php
$return 			= $_POST;
$old_code 			= $return['txt_old_code'];
$values_per_row		= explode("\n",$old_code);
$return['new_code'] = "";

if($return['radio_quotation_used'] == 1){
	$closing_tag =  "'";
}else{
	$closing_tag =  "\"";
}

for($x=0;$x<count($values_per_row);$x++){
	/* check for pattern: ^FO */
	if( strpos($values_per_row[$x], '^FO') !== false ){
		/* explode values by comman (,) */
		$sv = explode(',', $values_per_row[$x]);
		/* get left space - What I mean here is left space for zebra code */
		$ls = str_replace('^FO','',$sv[0]);
		/* get top space - What I mean here is top space for zebra code */
		$ts = preg_replace( "/\r|\n/", "", $sv[1] );
		
		/* change values here */ 
		// $new_value = '$zebra_code .= '.$closing_tag.'^FO'.$closing_tag.'.( '.$ls.'+ $left_space ).'.$closing_tag.', '.$closing_tag.'.( '.$ts.'+ $top_space'.' ).'.$closing_tag;
		$new_value = '^FO'.$closing_tag.'.( '.$ls.'+ $left_space ).'.$closing_tag.', '.$closing_tag.'.( '.$ts.'+ $top_space'.' ).'.$closing_tag;
		/* should generate something like this */
		//'^FO'.(180+$left_space).','.(279+$top_space);
		/* remove unwanted line break */
		$new_value = trim(preg_replace('/\t+/', '', $new_value));
		$return['new_code'] .= $new_value."\n";
	}else{
		$return['new_code'] .= trim(preg_replace('/\t+/', '', $values_per_row[$x]))."\n";
	}
}
echo json_encode($return);
?>