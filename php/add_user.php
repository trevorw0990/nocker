<?php
require 'dbConnection.php';

session_start();

$insert_user = "insert into user (company_id, is_active,is_admin, is_account_owner, user_email, user_password) VALUES ('$_SESSION[companyId]', '1', '0', '0', '$_POST[email]', '$_POST[password]')"; 
if (!mysql_query($insert_user))
{
die("<script>alert('Error Adding user $_POST[email]...please contact support!')
window.location.href='../users.php';
</script>");
}else{
header('Location: ../users.php');
}
?>
