<?php
$servername = "localhost";
$username = "root";
$password = ".l0s3r.1395";
$conn = mysql_connect($servername, $username, $password);
mysql_select_db( "nocker" ) or die( 'Error'. mysql_error() );

if (!$conn) {
        die('Could not connect: ' . mysql_error());
}

?>
