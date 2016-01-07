<?php

session_start();

require 'dbConnection.php';

$user_query = "select * from user where company_id='$_SESSION[companyId]'";

$user_result = mysql_query($user_query);

?>
