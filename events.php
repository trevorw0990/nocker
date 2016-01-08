<?php
require 'php/nav.php';
require 'php/dbConnection.php';
session_start();

$query_pd_creds = "select pd_api_key, pd_master_user_id from company where company_id='$_SESSION[companyId]'";
$result_pd_creds = mysql_query($query_pd_creds);

while($row = mysql_fetch_assoc($result_pd_creds)){
if($row['pd_master_user_id'] == null || $row['pd_api_key'] == null){
echo "<script>alert(Credentials missing)</script>";
}else{
$requester_id = $row['pd_master_user_id'];
$api_token = $row['pd_api_key'];
}
}


$service_url = "https://rntls.pagerduty.com/api/v1/incidents";
//header
$auth        = 'Authorization: Token token='."$api_token";
$method      = 'GET';

// curl init
$ch = curl_init($service_url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLINFO_HEADER_OUT    => true,
    CURLOPT_HTTPHEADER     => [
        $auth
    ],
]);

// curl exec
$data = curl_exec($ch);
curl_close($ch);

// output
$response = json_decode($data, true);

?>
<br>
<div class="container-fluid">
 <h1 style="text-align: center;"class="page-header">Environment Events
        <div class="btn-group pull-right">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-cog"></i>  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                        <li onclick="return confirm('Auto Refresh')"><a href="#">Toggle Auto Refresh</a></li>
                        <li <?php if($_GET['unresolved'] == true){ echo "class=disabled";}else{ echo "onclick=return confirm('Show All Events?')";}?>><a href="?unresolved=true">Show Unresolved</a></li>
                        <li <?php if(!ISSET($_GET['unresolved'])){ echo "class=disabled";}else{ echo "onclick=return confirm('Show All Events?')";}?>><a href="events.php">Show All</a></li>
                </ul>
        </div>
</h1>
<?php
foreach($response['incidents'] as $chunk) {
  $incident_id = $chunk['id'];
  $status = $chunk['status'];
  $status_change_date = $chunk['last_status_change_on'];
  $created_on_date = $chunk['created_on'];
  $change = $chunk['last_status_change_by'];
  $description = $chunk['trigger_summary_data'];
  $urgency = $chunk['urgency'];
  $assignee = $chunk['assigned_to_user'];
  $incident_num = $chunk['incident_number'];
  $instance_id_match = $description['description'];
  $instance_id_match_found = strstr($instance_id_match, 'i-');
?>
<?php
if($_GET['unresolved'] == true && $status != 'resolved'){
?>
<ul class="timeline">
    <li class="timeline-inverted">
      <div class="timeline-badge info"><i class="glyphicon glyphicon-fire"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">Incident Id: <?php echo $incident_id;?></h4>
        </div>
        <div class="timeline-body">
          <p><b>Summary</b></p>
          Status:<?php echo  " " . $status;?></br>
          Created On:<?php echo  " " . $created_on_date;?></br>
          Description:<?php echo  " " . $description['description'];?></br>
          Incident Number:<?php echo  " " . $incident_num;?></br>
          Urgency:<?php echo  " " . $urgency;?></br>
          Assigned To: <a href="mailto:<?php echo $assignee['email'];?>?Subject=Incident: <?php echo $incident_id;?>" target="_top"><?php echo $assignee['name'];?></a><br>
	  Last Status Change Date: <?php echo  " " . $status_change_date;?></br>
          Last Status Changed By: <a href="mailto:<?php echo $change['email'];?>?Subject=Incident: <?php echo $incident_id;?>" target="_top"><?php echo $change['name'];?></a>
          <br>
          <br>
          <div class="btn-group <?php echo $incident_id;?>">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-search"></i>  <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="instanceDetails.php?instanceId=<?php echo $instance_id_match_found;?>">Investigate</a></li>
              <li onclick="return confirm('Resolve Event?')"><a href="php/resolve_event.php?incident_id=<?php echo $incident_id;?>">Resolve</a></li>
            </ul>
          </div>
        </div>
      </div>
</li>
<?php
}elseif($status == 'resolved' && $_GET['unresolved'] == false){
?>
<ul class="timeline">
    <li class="timeline">
      <div class="timeline-badge info"><i class="glyphicon glyphicon-ok"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">Incident Id: <?php echo $incident_id;?></h4>
        </div>
        <div class="timeline-body">
          <p><b>Summary</b></p>
	  Status:<?php echo  " " . $status;?></br>
	  Created On:<?php echo  " " . $created_on_date;?></br>
	  Description:<?php echo  " " . $description['description'];?></br>
	  Incident Number:<?php echo  " " . $incident_num;?></br>
	  Urgency:<?php echo  " " . $urgency;?></br>
	  Last Status Change Date: <?php echo  " " . $status_change_date;?></br>
	  Last Status Changed By: <a href="mailto:<?php echo $change['email'];?>?Subject=Incident: <?php echo $incident_id;?>" target="_top"><?php echo $change['name'];?></a>
        </div>
      </div>
</li>
<?php
}elseif($_GET['unresolved'] != true && $status != 'resolved'){
?>
<ul class="timeline">
    <li class="timeline-inverted">
      <div class="timeline-badge info"><i class="glyphicon glyphicon-fire"></i></div>
      <div class="timeline-panel">
        <div class="timeline-heading">
          <h4 class="timeline-title">Incident Id: <?php echo $incident_id;?></h4>
        </div>
        <div class="timeline-body">
          <p><b>Summary</b></p>
          Status:<?php echo  " " . $status;?></br>
          Created On:<?php echo  " " . $created_on_date;?></br>
          Description:<?php echo  " " . $description['description'];?></br>
          Incident Number:<?php echo  " " . $incident_num;?></br>
          Urgency:<?php echo  " " . $urgency;?></br>
          Last Status Change Date: <?php echo  " " . $status_change_date;?></br>
          Last Status Changed By: <a href="mailto:<?php echo $change['email'];?>?Subject=Incident: <?php echo $incident_id;?>" target="_top"><?php echo $change['name'];?></a>
          <br>
          <br>
          <div class="btn-group <?php echo $incident_id;?>">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-search"></i>  <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="instanceDetails.php?instanceId=<?php echo $instance_id_match_found;?>">Investigate</a></li>
              <li onclick="return confirm('Resolve Event?')"><a href="php/resolve_event.php?incident_id=<?php echo $incident_id;?>">Resolve</a></li>
            </ul>
          </div>
        </div>
      </div>
</li>
<?php
}
}
?>
