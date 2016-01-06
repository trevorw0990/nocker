<?php

require 'dbConnection.php';

$user_query = "select * from user";

$user_result = mysql_query($user_query);

?>
