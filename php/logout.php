<?php
ob_start();
echo $_COOKIE['PHPSESSID'];
if (isset( $_COOKIE['PHPSESSID']) )
//clear session from disk
session_destroy();
header( 'Location: /login.php' );
ob_flush();
?>
