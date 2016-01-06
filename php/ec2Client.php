<?php
require 'vendor/autoload.php';
use Aws\Ec2\Ec2Client;
use Aws\Common\Enum\Region; 


$aws = Ec2Client::factory(array(
'version' => 'latest',
'region' => 'us-east-1',
'credentials' => array(
        'key'    => 'AKIAJOHZDJ2WEHGJLZ6A',
        'secret' => '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',
    )
));

return $aws;
?>
