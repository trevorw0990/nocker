<?php

require 'dbConnection.php';

$user_query = "select user_email, user_password, company_id from user where user_email='$_POST[email]' and user_password='$_POST[password]' and company_id='$_POST[companyId]' and is_active=1;"; 

$user_result = mysql_query($user_query);

$res=mysql_fetch_row($user_result);

if ($res){
session_start();
header( 'Location: /index.php' );
}else{
session_destroy();
header( 'Location: /login.php' );
}
?>
