<html>
<title>C3 Labeller (Huawei) | Assembly Line</title>
<?php require_once ('../libraries/includes.php'); ?>
<?php 
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
$username = $_SESSION['username'] ?? '';
echo '<input type="hidden" id="hd_username" value="'.htmlspecialchars((string)$username, ENT_QUOTES, 'UTF-8').'"'; 



?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
<link rel="stylesheet" type="text/css" href="../css/navbar.css">
</head>
<body>
