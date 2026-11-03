<!-- <script>
	console.log('index');
</script> -->
<?php
/* Get selected page */
$allowed_pages = array('../home.php', '../format28.php', '../settings.php');
$page = (isset($_GET['page']) && in_array($_GET['page'], $allowed_pages, true)) ? $_GET['page'] : '../home.php';
include('../header.php');
include($page);
include('navside_menu.php');
include('../footer.php');

