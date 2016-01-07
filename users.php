<?php
require 'php/nav.php';
require 'php/manage_users.php';
?>
<br>
<div class="container-fluid">
 <h1 style="text-align: center;"class="page-header">Users</h1>
 <div class="table-responsive">
  <table class="table table-hover span5">
    <thead>
      <tr>
        <th>Username</th>
        <th>Last Update Date</th>
        <th>Is Active</th>
        <th>Is Admin</th>
	<th></th>
      </tr>
    </thead>
          <?php while ($row = mysql_fetch_assoc($user_result)){?>
	<tbody>
          <tr>
            <td><?php echo $row["user_email"];?></td>
            <td><?php echo $row["update_date"];?></td>
            <td><?php echo $row["is_active"];?></td>
            <td><?php echo $row["is_admin"];?></td>
	    <td>
            <div class="btn-group <?php echo $incident_id;?>">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-cog"></i>  <span class="caret"></span>
            </button>

		<?php
			if($row["is_active"] == 1){
			    $toggle_enabled = "<li><a href=php/disableUser.php?email=$row[user_email]>Disable</a></li>";
			}elseif($row["is_active"] == 0){
			    $toggle_enabled = "<li><a href=php/enableUser.php?email=$row[user_email]>Enable</a></li>";
			}
		?>
            <ul class="dropdown-menu" role="menu">
              <?php echo $toggle_enabled;?>
              <li><a href="instanceDetails.php?instanceId=<?php echo $instance_id_match_found;?>">Change Password</a></li>
            </ul>
          </div>
	   </td>
          </tr>
	</tbody>
              <?php
            };
            ?>
    </table>
 </div>
 </div>
 </div>

