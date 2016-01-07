<?php
require 'php/nav.php';
require 'php/manage_users.php';
?>
<br>
<div class="container-fluid">
 <h1 style="text-align: center;"class="page-header">Users
<div class="btn-group pull-right">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-cog"></i>  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                        <li><a href="#" data-toggle="modal" data-target="#addUserModal">Add User</a></li>
                </ul>
        </div>
</h1>
<div class="container">
  <table class="table table-hover table-bordered" style="overflow: auto">
    <thead>
      <tr>
        <th>Username</th>
        <th>Last Update Date</th>
        <th>Is Active</th>
        <th>Is Account Owner</th>
        <th>Is Admin</th>
	<th></th>
      </tr>
    </thead>
          <?php while ($row = mysql_fetch_assoc($user_result)){?>
	<tbody>
          <tr>
            <td class=""><?php echo $row["user_email"];?></td>
            <td class=""><?php echo $row["update_date"];?></td>
            <td class=""><?php echo $row["is_active"];?></td>
            <td class=""><?php echo $row["is_account_owner"];?></td>
            <td class=""><?php echo $row["is_admin"];?></td>
	    <td>
            <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle fixed" data-toggle="dropdown">
              <i class="glyphicon glyphicon-user"></i>  <span class="caret"></span>
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
              <li><a href="instanceDetails.php?instanceId=<?php ?>">Change Password</a></li>
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
<div id="addUserModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add User</h4>
      </div>
      <div class="modal-body">
      <form class="form-signin" method="POST" action="php/add_user.php">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
        </div>
        <button class="btn btn-sm btn-primary btn-block" type="submit">Add User</button>
      </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

