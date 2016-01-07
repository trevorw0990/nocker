<?php

require 'dbConnection.php';

$check_company_id = "select company_id from company where company_id='$_POST[companyId]'";
$check_company_id_result = mysql_query($check_company_id);
$res=mysql_num_rows($check_company_id_result);

if($res == 1){
echo "<script>alert('Company has already been added')
window.location.href='../login.php';
</script>";
}elseif($res == "0"){

$insert_user = "insert into user (company_id, is_active,is_admin, is_account_owner, user_email, user_password) VALUES ('$_POST[companyId]', '1', '1', '1', '$_POST[email]', '$_POST[password]')";
if (!mysql_query($insert_user)){

die("<script>alert('Error Signing up...please contact support!')
window.location.href='../signup.php';
</script>");

}else{
header('Location: ../index.php');
}


}



?>
