<?php

session_start();

require 'dbConnection.php';

$insert_query="update company set aws_access_id='$_POST[aws_access_id]', aws_secret_id='$_POST[aws_secret_id]' where company_id='$_SESSION[companyId]';";

if (!mysql_query($insert_query)) {

echo "<script>alert('Could Not Update AWS Configuration')
window.location.href='../configuration.php';
</script>";

}

header('Location: ../configuration.php');


?>
