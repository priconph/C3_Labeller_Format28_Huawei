<?php
/* Get selected page */
if($_GET['page'] == '' || !isset($_GET['page'])){
	$page = 'home.php';
}else{
	$page = $_GET['page'];
}
include('header.php');
include($page);
include('navside_menu.php');
include('footer.php');
