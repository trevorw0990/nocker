<?php
ob_start();
echo $_COOKIE['PHPSESSID'];
if (isset( $_COOKIE['PHPSESSID']) )
session_start();
session_destroy();
header( 'Location: /login.php' );
ob_flush();
?>
