<?php

session_start();

require 'dbConnection.php';



$query_user = "select is_admin from user where user_email='$_SESSION[sessionId]' and is_admin='1'";
$result_user = mysql_query($query_user);
$toggle_user_privileges = mysql_num_rows($result_user); 
if ($toggle_user_privileges == "1"){
$toggle_user_admin = '<ul class="nav navbar-nav">
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrator<span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li><a href="users.php">Manage Users</a></li>
      <li><a href="security.php">Security</a></li>
      <li><a href="configuration.php">Configuration</a></li>
      <li><a href="payments.php">Payments</a></li>
    </ul>
  </li>
</ul>';
}else{
$toggle_user_admin = " ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nocker</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/pagination.js"></script>
  <script src="js/datepicker.js"></script>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/timeline.css" rel="stylesheet">
</head>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <a class="navbar-brand" href="index.php">
        <img alt="Brand" src="images/iiq.png" height=30px width=100px>
      </a>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">AWS<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="instances.php">Instances</a></li>
          </ul>
        </li>
      </ul>
       <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="events.php">Events</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right" action="php/logout.php" method="GET"  role="search">
        <button type="submit" class="btn btn-default">Logout</button>
      </form>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Research<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="analyze.php">Incident Management</a></li>
            <li><a href="analyze.php">Infrastructure Uptime</a></li>
          </ul>
        </li>
      </ul>
     <?php
	echo $toggle_user_admin; 
     ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
