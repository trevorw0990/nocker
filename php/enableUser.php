<?php

require 'dbConnection.php';

$disable_user= "update user set is_active=1 where user_email='$_GET[email]'";


if (!mysql_query($disable_user)) {

die('Error: ' . mysql_error());


}

header('Location: ../users.php');



?>
