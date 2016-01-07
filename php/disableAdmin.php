<?php

require 'dbConnection.php';

$disable_user= "update user set is_admin=0 where user_email='$_GET[email]' and is_account_owner !='1';";


if (!mysql_query($disable_user)) {

die('Error: ' . mysql_error());


}

header('Location: ../users.php');



?>
