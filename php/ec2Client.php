<?php

session_start();

require 'vendor/autoload.php';
require 'dbConnection.php';

use Aws\Ec2\Ec2Client;
use Aws\Common\Enum\Region; 

$query_creds = "select aws_access_id, aws_secret_id from company where company_id='$_SESSION[companyId]';";

$result_creds = mysql_query($query_creds);

while($row = mysql_fetch_assoc($result_creds)){
if($row['aws_access_id'] == null || $row['aws_secret_id'] == null){
echo "<script>alert(Credentials missing)</script>";
}else{
$key = $row['aws_access_id'];
$secret = $row['aws_secret_id'];
}
}


$aws = Ec2Client::factory(array(
'version' => 'latest',
'region' => 'us-east-1',
'credentials' => array(
	'key' => $key,
	'secret' => $secret,
    )
));

return $aws;
?>
