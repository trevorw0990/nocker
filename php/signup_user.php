<?php

require 'dbConnection.php';

$insert_user = "insert into user (company_id, is_active, user_email, user_password) VALUES ('$_POST[companyId]', '1', '$_POST[email]', '$_POST[password]')"; 

echo $insert_user;

if (!mysql_query($insert_user))

{

die('Error: ' . mysql_error());

}

if ($res){
session_start();
header( 'Location: /index.php' );
}else{
session_destroy();
header( 'Location: /login.php' );
}
?>
