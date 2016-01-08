<?php

session_start();

require 'dbConnection.php';

$insert_query="update company set pd_api_key=null, pd_master_user_id=null where company_id='$_SESSION[companyId]';";

if (!mysql_query($insert_query)) {

echo "<script>alert('Could Not Delete PagerDuty Configuration')
window.location.href='../configuration.php';
</script>";

}

header('Location: ../configuration.php');


?>
