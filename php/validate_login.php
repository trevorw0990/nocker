<?php

require 'dbConnection.php';

$user_query = "select user_email, is_active, user_password, company_id from user where user_email='$_POST[email]' and user_password='$_POST[password]' and company_id='$_POST[companyId]' and is_active=1;"; 

$user_result = mysql_query($user_query);

while($row = mysql_fetch_assoc($user_result)){
$company_id = $row["company_id"];
}

$res=mysql_num_rows($user_result);


if ($res == "1"){
session_start();
$_SESSION["sessionId"]=$_POST["email"];
$_SESSION["companyId"]=$company_id;
header( 'Location: ../index.php' );
}else{
session_destroy();
header( 'Location: /login.php' );
}
?>
