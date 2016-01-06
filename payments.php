<?php
require 'php/nav.php';
?>

<html>
<br>
<br>
<div class="container">
 <h1 style="text-align: center;"class="page-header">Payments</h1>
<div class="row">
<form action="php/process_payments.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_B8NL4q7mN1FzV9EhiDvT469Y"
    data-amount="20000"
    data-name="AWS For NOC"
    data-description="1 year subscription ($200.00)"
    data-image="images/iiq.png"
    data-locale="auto">
  </script>
</form>
</div>
</div>
</html>
