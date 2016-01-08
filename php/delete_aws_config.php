<?php

session_start();

require 'dbConnection.php';

$insert_query="update company set aws_access_id=null, aws_secret_id=null where company_id='$_SESSION[companyId]';";

if (!mysql_query($insert_query)) {

echo "<script>alert('Could Not Delete AWS Configuration')
window.location.href='../configuration.php';
</script>";

}

header('Location: ../configuration.php');


?>
