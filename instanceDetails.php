<?php
$getInstanceId = $_GET['instanceId'];
require 'php/nav.php';
require 'php/ec2Client.php';
$result = $aws->DescribeInstances();
$reservations = $result['Reservations'];
foreach ($reservations as $reservation) {
  $instances = $reservation['Instances'];
  foreach ($instances as $instance) {
    if($instance['InstanceId'] == $getInstanceId){
	$instance_id = $instance['InstanceId'];
	$image_id = $instance['ImageId'];
        $state = $instance['State']['Name'];
        $launchtime = $instance['LaunchTime'];
        $instanceType = $instance['InstanceType'];
	$hypervisor = $instance['Hypervisor'];
	$publicDnsName = $instance['PublicDnsName'];
        $privateIpAddress = $instance['PrivateIpAddress'];
        $publicIpAddress = $instance['PublicIpAddress'];
	$subnetId = $instance['SubnetId'];
	$vpcId = $instance['VpcId'];
	$ebsOptimized = $instance['EbsOptimized'];
	$rootDeviceType = $instance['RootDeviceType'];
     }
  }
}
?>
<br>
<div class="container">
	<h1 style="text-align: center;"class="page-header"><?php echo $_GET['instanceId'];?>
	<div class="btn-group pull-right">
		<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
		<i class="glyphicon glyphicon-cog"></i>  <span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu">
			<li onclick="return confirm('Snapshot <?php echo $instance_id;?>?')"><a href="php/resolve_event.php?incident_id=<?php echo $incident_id;?>">Snapshot</a></li>
			<li onclick="return confirm('Stop <?php echo $instance_id;?>?')"><a href="php/resolve_event.php?incident_id=<?php echo $incident_id;?>">Stop</a></li>
			<li onclick="return confirm('Reboot <?php echo $instance_id;?>?')"><a href="php/resolve_event.php?incident_id=<?php echo $incident_id;?>">Reboot</a></li>
			<li onclick="return confirm('Terminate <?php echo $instance_id;?>?')"><a href="php/resolve_event.php?incident_id=<?php echo $incident_id;?>">Terminate</a></li>
		</ul>
	</div>
	</h1>
</div>
</div>
  <div class="container-fluid">
    <div class="row placeholders">
      <div class="col-xs-6 col-sm-3 placeholder">
        <img src="images/meter.png" class="img-responsive" height=60px width=60px alt="placeholder thumbnail">
        <h4>CPU Utilization</h4>
	 <img src="images/red_bl.gif" class="img-responsive" height=20px width=20px>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img src="images/meter.png" class="img-responsive" height=60px width=60px alt="placeholder thumbnail">
        <h4>Memory Utilization</h4>
	 <img src="images/green_bl.gif" class="img-responsive" height=20px width=20px>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img src="images/meter.png" class="img-responsive" height=60px width=60px alt="placeholder thumbnail">
        <h4>Disk IO</h4>
	 <img src="images/green_bl.gif" class="img-responsive" height=20px width=20px>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img src="images/meter.png" class="img-responsive" height=60px width=60px alt="placeholder thumbnail">
        <h4>Network IO</h4>
	 <img src="images/green_bl.gif" class="img-responsive" height=20px width=20px>
      </div>
  </div>
 </div>
</div>
<div class="container">
  <div class="row">
   <div class="bs-example">
    <div class="panel-group" id="accordionNetwork">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordionNetwork" href="#collapseNetwork">Host Information</a>
          </h4>
        </div>
        <div id="collapseNetwork" class="panel-collapse collapse">
          <div class="panel-body">
            <div>
              <span>Server Name:</span>
              <?php echo $instance_id;?>
            </div>
            <div>
              <span>State:</span>
              <?php echo $state;?>
            </div>
            <div>
              <span>Launch Time:</span>
              <?php echo $launchtime;?>
            </div>
            <div>
              <span>Instance Type:</span>
              <?php echo $instanceType;?>
            </div>
	    <div>
              <span>Hypervisor:</span>
              <?php echo $hypervisor;?>
            </div>
	    <div>
              <span>Public DNS Name:</span>
              <?php echo $publicDnsName;?>
            </div>
       </div>
   </div>
</div>
</div>
<div class="container">
  <div class="row">
   <div class="bs-example">
    <div class="panel-group" id="accordion">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Network Information</a>
          </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
          <div class="panel-body">
            <div>
              <span>Private IP Address:</span>
              <?php echo $privateIpAddress;?>
            </div>
            <div>
              <span>Public IP Address:</span>
              <?php echo $publicIpAddress;?>
            </div>
            <div>
              <span>Subnet Id:</span>
              <?php echo $subnetId;?>
            </div>
            <div>
              <span>VPC Id:</span>
              <?php echo $vpcId;?>
            </div>
       </div>
   </div>
</div>
</div>
<div class="container">
  <div class="row">
   <div class="bs-example">
    <div class="panel-group" id="accordionStorage">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordionStorage" href="#collapseStorage">Storage Information</a>
          </h4>
        </div>
        <div id="collapseStorage" class="panel-collapse collapse">
          <div class="panel-body">
            <div>
              <span>EBS Optimized:</span>
              <?php echo $ebsOptimized;?>
            </div>
            <div>
              <span>Root Device Type:</span>
              <?php echo $rootDeviceType;?>
            </div>
       </div>
   </div>
</div>
