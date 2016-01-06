<?php
$incident_id = $_GET['incident_id'];
$service_url = "https://iiq-consulting-llc.pagerduty.com/api/v1/incidents/$incident_id/resolve";


$data = array('requester_id'=>'PXTCUDQ');
$data_json = json_encode($data);

$chlead = curl_init();
curl_setopt($chlead, CURLOPT_URL, $service_url);
curl_setopt($chlead, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Token token=cdY2VoFkhVzGKkCcPopw' ));
curl_setopt($chlead, CURLOPT_VERBOSE, 1);
curl_setopt($chlead, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chlead, CURLOPT_CUSTOMREQUEST, "PUT"); 
curl_setopt($chlead, CURLOPT_POSTFIELDS,$data_json);
curl_setopt($chlead, CURLOPT_SSL_VERIFYPEER, 0);
$chleadresult = curl_exec($chlead);
$chleadapierr = curl_errno($chlead);
$chleaderrmsg = curl_error($chlead);
curl_close($chlead);

header("Location: ../events.php");
?>
