<?php

require 'dbConnection.php';

require_once('/var/www/html/nocker/vendor/stripe/stripe-php/init.php');

\Stripe\Stripe::setApiKey("sk_test_9Q8KIYBurnsWcoJ52CQ33rAE");

if($_POST['inputPassword'] != $_POST['passwordConfirmation']){
echo "<script>alert('Password does not match')
window.location.href='../userinfo.php?companyId=$_POST[companyIdentifier]';
</script>";
}else{

$token = $_POST['stripeToken'];


$customer = \Stripe\Customer::create(array(
  "source" => $token,
  "plan" => "one_year_subscription",
  "email" => "$_POST[stripeEmail]")
);

$stripper = str_replace("Stripe\Customer JSON:", "", $customer);

$encoded = json_decode($stripper, true);

$stripe_cust_id = $encoded['id'];

$insert_new_customer = "insert into company(company_id, is_active, stripe_cust_id) VALUES ('$_POST[companyIdentifier]', '1', '$stripe_cust_id');"; 

$insert_admin_user = "insert into user(company_id, user_email, user_password, is_active, is_admin, is_account_owner) VALUES ('$_POST[companyIdentifier]', '$_POST[inputEmail]', '$_POST[inputPassword]', '1', '1', '1');";

if (!mysql_query($insert_new_customer)){
die("<script>alert('Error adding customer $_POST[companyIdentifier]...please contact support!')
window.location.href='../signup.php';
</script>");
}else{
if (!mysql_query($insert_admin_user)){
die("<script>alert('Error adding user $_POST[inputEmail]...please contact support!')
window.location.href='../userinfo.php';
</script>");
}else{
echo "<script>alert('Card successfully charged, and user and company have been added to the system')
window.location.href='../login.php?companyId=$_POST[companyIdentifier]';
</script>";
}
}
}
?>
