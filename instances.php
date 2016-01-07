<?php
require 'php/nav.php';
require 'php/ec2Client.php';

$result = $aws->DescribeInstances();
?>
<br>
<div class="container-fluid">
 <h1 style="text-align: center;"class="page-header">Instances</h1>
 <div class="table-responsive">
  <table class="table table-hover table-vcenter">
    <thead>
      <tr>
        <th>Instance ID</th>
        <th>Hostname</th>
        <th>Instance Type</th>
        <th>State</th>
        <th>Private IP</th>
        <th>Public IP</th>
        <th>Hypervisor</th>
        <th></th>
      </tr>
    </thead>
<?php
$reservations = $result['Reservations'];
foreach ($reservations as $reservation) {
  $instances = $reservation['Instances'];
  foreach ($instances as $instance) {
    $instanceName = '';
    foreach ($instance['Tags'] as $tag) {
      if ($tag['Key'] == 'Name') {
        $instanceName = $tag['Value'];
        ?>
        <tbody id="myTable">
          <tr>
           <td><?php echo $instance['InstanceId'];?></td>
           <td><?php echo $instanceName?></td>
           <td><?php echo $instance['InstanceType'];?></td>
           <td><?php echo $instance['State']['Name'];?></td>
           <td><?php echo $instance['PrivateIpAddress'];?></td>
           <td><?php echo $instance['PublicIpAddress'];?></td>
           <td><?php echo $instance['Hypervisor'];?></td>
           <td>
            <div class="btn-toolbar">
              <div class=btn-group>
                <a class="btn btn-info glyphicon glyphicon-cog" href="instanceDetails.php?instanceId=<?php echo $instance['InstanceId'];?>" data-sfid='"<?php echo $instance['InstanceId'];?>"'></a>
              </td>
            </tr>
       </tbody>
<?php
}
}
}
}
?>
</table>
      </div>
      <div class="col-md-10 text-center">
        <ul class="pagination pagination-lg pager" id="myPager"></ul>
      </div>
    </div>
</div>
