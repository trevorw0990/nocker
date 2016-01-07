<?php
require 'php/nav.php';


if(isset($_COOKIE['PHPSESSID']) && isset($_SESSION["sessionId"])){
}else{
    echo "Invalid Login";
    header( 'Location: /login.php' );
}
?>
<br>
<div class="container-fluid">
  <h1 style="text-align: center;"class="page-header">Current Environment Health</h1>
  <div class="row placeholders">
    <div class="col-xs-6 col-sm-3 placeholder">
      <img src="images/meter.png" class="img-responsive" height=60px width=60px alt="placeholder thumbnail">
      <h4>Graph 1</h4>
      <span class="text-muted">Placeholder</span>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder">
      <img src="images/meter.png" class="img-responsive" height=60px width=60px alt="placeholder thumbnail">
      <h4>Graph 2</h4>
      <span class="text-muted">Placeholder</span>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder">
      <img src="images/meter.png" class="img-responsive" height=60px width=60px alt="placeholder thumbnail">
      <h4>Graph 3</h4>
      <span class="text-muted">Placeholder</span>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder">
      <img src="images/meter.png" class="img-responsive" height=60px width=60px alt="placeholder thumbnail">
      <h4>Graph 4</h4>
      <span class="text-muted">Placeholder</span>
    </div>
</div>
