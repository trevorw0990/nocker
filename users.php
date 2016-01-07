<?php
require 'php/nav.php';
require 'php/manage_users.php';
?>
<br>
<div class="container-fluid">
 <h1 style="text-align: center;"class="page-header">Users</h1>
</div>
 <div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Username</th>
        <th>Is Active</th>
	<th></th>
      </tr>
    </thead>
          <?php while ($row = mysql_fetch_assoc($user_result)){?>
          <tr>
            <td><?php echo $row["user_email"];?></td>
            <td><?php echo $row["is_active"];?></td>
	    <td>
            <div class="btn-group <?php echo $incident_id;?>">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-cog"></i>  <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="php/disableUser.php?email=<?php echo $row['user_email'];?>">Disable</a></li>
              <li><a href="instanceDetails.php?instanceId=<?php echo $instance_id_match_found;?>">Change Password</a></li>
            </ul>
          </div>
	   </td>
          </tr>
              <?php
            };
            ?>
    </table>
 </div>
 </div>
 </div>

