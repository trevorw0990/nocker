<?php

require 'dbConnection.php';

$company_query = "select company_id from company where company_id='$_POST[companyId]' and is_active='1';"; 

$company_result = mysql_query($company_query);

$res=mysql_num_rows($company_result);

if($res == 1){
echo "<script>alert('The company identifier $_POST[companyId] already exists in the system... please contact administrator for login details')
window.location.href='../login.php';
</script>";
}elseif($res == 0){
header("Location: ../userinfo.php?companyId=$_POST[companyId]");
}
?>
