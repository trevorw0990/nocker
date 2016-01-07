<?php

require 'dbConnection.php';

$insert_user = "insert into user (company_id, is_active, is_admin , user_email, user_password) VALUES ('$_POST[companyId]', '1', '1', '$_POST[email]', '$_POST[password]')"; 


if (!mysql_query($insert_user))

{

die("<script>alert('Error Signing up...please contact support!')
window.location.href='../signup.php';
</script>");

}else{
header('Location: ../index.php');
}

?>
