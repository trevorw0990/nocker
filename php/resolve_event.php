<?php

require 'dbConnection.php';

session_start();

$query_pd_creds = "select pd_api_key, pd_master_user_id from company where company_id='$_SESSION[companyId]'";
$result_pd_creds = mysql_query($query_pd_creds);

while($row = mysql_fetch_assoc($result_pd_creds)){
if($row['pd_master_user_id'] == null || $row['pd_api_key'] == null){
echo "<script>alert('Could Not Load PagerDuty Configuration')
window.location.href='configuration.php';
</script>";
}else{
$requester_id = $row['pd_master_user_id'];
$api_token = $row['pd_api_key'];
}
}

$incident_id = $_GET['incident_id'];
$service_url = "https://rntls.pagerduty.com/api/v1/incidents/$incident_id/resolve";

$data = array('requester_id'=>$requester_id);
$data_json = json_encode($data);

$chlead = curl_init();
curl_setopt($chlead, CURLOPT_URL, $service_url);
curl_setopt($chlead, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Token token='."$api_token" ));
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
