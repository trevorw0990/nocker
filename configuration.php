<?php
require 'php/nav.php';
require 'php/dbConnection.php';

$integration_query = "select aws_access_id, aws_secret_id, pd_api_key, pd_master_user_id from company where company_id='$_SESSION[companyId]';";

$result_integration_query = mysql_query($integration_query);

$res = mysql_num_rows($result_integration_query);

while($row=mysql_fetch_assoc($result_integration_query)){
if($row['aws_access_id'] == null || $row['aws_secret_id'] == null){
$aws_access_id = "";
$aws_secret_id = "";
$aws_logo = "";
}else{
$aws_access_id = $row['aws_access_id'];
$aws_secret_id = $row['aws_secret_id'];
$aws_logo = 'images/aws.jpg';
}
if($row['pd_api_key'] == null || $row['pd_master_user_id'] == null){
$pd_api_key = "";
$pd_master_user_id = "";
$pd_logo = "";
}else{
$pd_api_key = $row['pd_api_key'];
$pd_master_user_id = $row['pd_master_user_id'];
$pd_logo = "images/pd.png";
}
}
?>
<br>
<div class="container-fluid">
 <h1 style="text-align: center;"class="page-header">Configuration and Integration
<div class="btn-group pull-right">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-cog"></i>  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                        <li><a href="#" data-toggle="modal" data-target="#addAWSConfigurationModal">AWS Configuration</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#addPDConfigurationModal">PagerDuty Configuration</a></li>
                </ul>
        </div>
</h1>
<div class="container-fluid">
<h2 style="text-align: center;"class="">Your Current Integrations
<div class="">
<br>
<img src="<?php echo $aws_logo;?>"/>
<img src="<?php echo $pd_logo;?>"/>
</div>
</h2>
<div id="addAWSConfigurationModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">AWS Configuration</h4>
      </div>
      <div class="modal-body">
      <form class="form-signin" method="POST" action="php/update_aws_config.php">
        <label for="aws_access_id" class="sr-only">AWS Access ID</label>
        <input value="<?php echo $aws_access_id;?>" type="text" name="aws_access_id" id="aws_access_id" class="form-control" placeholder="AWS Access Id" required autofocus>
        <label for="aws_secret_id" class="sr-only">AWS Secret ID</label>
        <input value="<?php echo $aws_secret_id;?>" type="password" name="aws_secret_id" id="aws_secret_id" class="form-control" placeholder="AWS Secret Id" required>
        <div class="checkbox">
        </div>
        <button onclick="return confirm('Are you sure you want to add/update configuration?')" class="btn btn-sm btn-success btn-block" type="submit">Submit</button>
      </form>
      <br>
      <form class="form-signin" method="POST" action="php/delete_aws_config.php">
        <button onclick="return confirm('Are you sure you want to remove configuration?')" class="btn btn-sm btn-danger btn-block" type="submit">Delete</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div id="addPDConfigurationModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">PagerDuty Configuration</h4>
      </div>
      <div class="modal-body">
      <form class="form-signin" method="POST" action="php/update_pd_config.php">
        <label for="aws_access_id" class="sr-only">PagerDuty API Key</label>
        <input value="<?php echo $pd_api_key;?>" type="password" name="pd_api_key" id="pd_api_key" class="form-control" placeholder="PagerDuty API Key" required autofocus>
        <label for="aws_secret_id" class="sr-only">AWS Secret ID</label>
        <input value="<?php echo $pd_master_user_id;?>" type="text" name="pd_master_user_id" id="pd_master_user_id" class="form-control" placeholder="PagerDuty Master User ID" required>
        <div class="checkbox">
        </div>
        <button onclick="return confirm('Are you sure you want to add/update configuration?')" class="btn btn-sm btn-success btn-block" type="submit">Submit</button>
      </form>
      <br>
      <form class="form-signin" method="POST" action="php/delete_pd_config.php">
        <button onclick="return confirm('Are you sure you want to remove configuration?')" class="btn btn-sm btn-danger btn-block" type="submit">Delete</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
