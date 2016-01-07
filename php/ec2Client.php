<?php
require 'vendor/autoload.php';
use Aws\Ec2\Ec2Client;
use Aws\Common\Enum\Region; 


$aws = Ec2Client::factory(array(
'version' => 'latest',
'region' => 'us-east-1',
'credentials' => array(
        'key'    => 'AKIAITG6PZ6XNUXLXKUQ',
        'secret' => '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',
    )
));

return $aws;
?>
