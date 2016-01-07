<?php

require 'dbConnection.php';

$insert_user = "insert into user (company_id, is_active, user_email, user_password) VALUES ('$_POST[companyId]', '1', '$_POST[email]', '$_POST[password]')"; 


if (!mysql_query($insert_user))

{

die('<script>alert("username already exists")
window.location.href="../signup.php";
</script>');

}else{
header('Location: index.php');
}

?>
