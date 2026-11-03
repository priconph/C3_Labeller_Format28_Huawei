<?php
	/*
	 * Script:    DataTables server-side script for PHP and MySQL
	 * Copyright: 2010 - Allan Jardine
	 * License:   GPL v2 or BSD (3-point)
	 */
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	ob_start();
	ini_set('display_errors', '0');
	ini_set('log_errors', '1');
	error_reporting(E_ALL);

	function h($v)
	{
		return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
	}

	$aColumns = array(  'pkid',
						'pn_code',
						'qty',	
						'contractor_code',
						'lotno',									
						'spec',							
						'lotno_extension'
						);
	
	/* used this field for searching data typed in the search box */
	// $array_search = array('empno', 'LastName',
							// 'date', 'date_out');
	// $array_search = array('empno', 'LastName');
							
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "pkid";
	
	/* DB table to use */
	$sTable = "vw_format20";
	
	require_once('config.php');
	/* Database connection information */
	$gaSql['user']       = $username;
	$gaSql['password']   = $password;
	$gaSql['db']         = $db_name;
	$gaSql['server']     = $server;
	
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
	 * no need to edit below this line
	 */
	
	/* 
	 * MySQL connection
	 */
	try {
	$pdo = new PDO( 'mysql:host='.$gaSql['server'].';dbname='.$gaSql['db'].';charset=utf8mb4', $gaSql['user'], $gaSql['password'], array(
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_EMULATE_PREPARES   => false,
		PDO::ATTR_STRINGIFY_FETCHES  => true,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	) );
	$sOrder = "";
	$aWhereBind = array();
	$aLimitBind = array();
	$sTableSql = preg_match('/^\w+$/', $sTable) ? '`'.$sTable.'`' : $sTable;
	
	// Database is selected in the PDO DSN above.
	
	
	/* 
	 * Paging
	 */
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && ($_GET['iDisplayLength'] ?? '') != '-1' )
	{
		$sLimit = "LIMIT ?, ?";
		$aLimitBind = array( intval( $_GET['iDisplayStart'] ), intval( $_GET['iDisplayLength'] ?? 0 ) );
	}
		
	/*
	 * Ordering
	 */
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ?? 0 ) ; $i++ )
		{
			if ( ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i] ?? 0) ] ?? '' ) == "true" && isset( $aColumns[ intval( $_GET['iSortCol_'.$i] ?? 0 ) ] ) )
			{
				$sOrder .= '`'.$aColumns[ intval( $_GET['iSortCol_'.$i] ?? 0 ) ].'`'."
				 	".(strtolower( (string)( $_GET['sSortDir_'.$i] ?? '' ) ) === 'desc' ? 'DESC' : 'ASC') .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
	
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	 
	 /* wag gagalawin yung sWhere default to para sa searchbox ng datatables check mo sa baba kung pano gagawin mo :) */
	$sWhere = "";
	if ( ($_GET['sSearch'] ?? '') != "" )
	{
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			// if( in_array($aColumns[$i],$array_search) ){
			$sWhere .= '`'.$aColumns[$i]."` LIKE ? OR ";
			$aWhereBind[] = '%'.$_GET['sSearch'].'%';
			// }
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	/* Individual column filtering */
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( ($_GET['bSearchable_'.$i] ?? '') == "true" && ($_GET['sSearch_'.$i] ?? '') != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= '`'.$aColumns[$i]."` LIKE ? ";
			$aWhereBind[] = '%'.$_GET['sSearch_'.$i].'%';
		}
	}
	
	/* 
		dito ka mag add ng where mo, una check mo kung may laman na yung $sWhere pag wala append mo yung where mo na meron
		kasama where kapag naman may laman na AND na syempre diba :)
	*/
	
	// if($sWhere == ""){
		// $sWhere .= "WHERE  ";
	// }else{
		// $sWhere .= "AND ";
	// }
	
	// $date_start = $_GET['date_start'];
	// $date_end 	= $_GET['date_end'];
	
	// $sWhere .= "((date BETWEEN '" . $date_start . "' AND '" . $date_end . "') OR (date_out BETWEEN '" . $date_start . "' AND '" . $date_end . "')) AND `empno` LIKE '%".$empno."%'";
	
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "
		SELECT `".implode("`, `", $aColumns)."`
		FROM   $sTableSql
		$sWhere
		$sOrder
		$sLimit
	";
	$rResult = $pdo->prepare( $sQuery );
	foreach ( array_merge( $aWhereBind, $aLimitBind ) as $iBind => $mBind ) {
		$rResult->bindValue( $iBind + 1, $mBind, is_int( $mBind ) ? PDO::PARAM_INT : PDO::PARAM_STR );
	}
	$rResult->execute();
	
	// echo "limit: ".$sLimit." : ".$sQuery."<hr>";
	$query_used = $sQuery;
	
	/* Data set length after filtering */
	$sQuery = "
		SELECT COUNT(*)
		FROM   $sTableSql
		$sWhere
	";
	$rResultFilterTotal = $pdo->prepare( $sQuery );
	foreach ( $aWhereBind as $iBind => $mBind ) {
		$rResultFilterTotal->bindValue( $iBind + 1, $mBind, PDO::PARAM_STR );
	}
	$rResultFilterTotal->execute();
	$aResultFilterTotal = $rResultFilterTotal->fetch( PDO::FETCH_NUM );
	$iFilteredTotal = $aResultFilterTotal[0];
	
	/* Total data set length */
	$sQuery = "
		SELECT COUNT(`".$sIndexColumn."`)
		FROM   $sTableSql
	";
	$rResultTotal = $pdo->query( $sQuery );
	$aResultTotal = $rResultTotal->fetch( PDO::FETCH_NUM );
	$iTotal = $aResultTotal[0];
	
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho'] ?? 0),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);

	
	while ( $aRow = $rResult->fetch( PDO::FETCH_ASSOC ) )
	{
		$row = array();
		unset($row);
		
		$row[] = '<p class="align-center"><input type="checkbox" id="chk_select"></p>';
		$row[] = '<input type="hidden" id="hd_pkid" value="'.h($aRow['pkid']).'">'.h($aRow['pn_code']);
		$row[] = h($aRow['qty']);
		$row[] = h($aRow['contractor_code']);
		$row[] = h($aRow['lotno']).'-'.h($aRow['lotno_extension']);
		$row[] = h($aRow['spec']);
				
		array_push($output['aaData'],$row);
	}
	
	while ( ob_get_level() > 0 ) {
		ob_end_clean();
	}
	header( 'Content-Type: application/json; charset=utf-8' );
	echo json_encode( $output, JSON_INVALID_UTF8_SUBSTITUTE );
} catch ( Throwable $e ) {
	error_log( (string)$e );
	while ( ob_get_level() > 0 ) {
		ob_end_clean();
	}
	http_response_code( 500 );
	header( 'Content-Type: application/json; charset=utf-8' );
	echo json_encode( array( 'error' => 'Server error' ) );
}