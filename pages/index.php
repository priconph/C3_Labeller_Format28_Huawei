<?php
session_start();
/* Get selected page (allowlist: it is passed to include() and echoed into JS) */
$allowed_pages = array('home.php', 'format28.php', 'settings.php', '../format13/pages/format13view.php');
$page = (isset($_GET['page']) && in_array($_GET['page'], $allowed_pages, true)) ? $_GET['page'] : 'format28.php';
include('header.php');
include($page);
include('navside_menu.php');
include('footer.php');