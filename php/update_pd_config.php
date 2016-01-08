<?php

session_start();

require 'dbConnection.php';

$insert_query="update company set pd_api_key='$_POST[pd_api_key]', pd_master_user_id='$_POST[pd_master_user_id]' where company_id='$_SESSION[companyId]';";

if (!mysql_query($insert_query)) {

echo "<script>alert('Could Not Update PagerDuty Configuration')
window.location.href='../configuration.php';
</script>";

}

header('Location: ../configuration.php');


?>
