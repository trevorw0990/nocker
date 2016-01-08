<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nocker</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/signin.css" rel="stylesheet">
</head>
  <body>
    <img src="images/logo.png" alt="IIQ Logo" class="img-responsive center-block" />
    <div class="container">
  <form class="form-signin" method="POST" action="php/signup_user.php">
  <h3 class="form-signin-heading">Complete the following to sign up</h3>
  <br><label for="companyIdentifier" class="sr-only">Company Identifier</label>
  <input type="companyIdentifier" value="<?php echo $_GET['companyId'];?>" name="companyIdentifier" id="companyIdentifier" class="form-control" placeholder="Company Identifier" required autofocus readonly="readonly">
  <br><label for="inputEmail" class="sr-only">Email Address</label>
  <input type="inputEmail" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
  <br><label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required autofocus>
  <label for="inputPasswordConfirm" class="sr-only">Password Confirmation</label>
  <input type="password" name="passwordConfirmation" id="inputPasswordConfirmation" class="form-control" placeholder="Password Confirmation" required>
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button" 
    data-key="pk_test_B8NL4q7mN1FzV9EhiDvT469Y"
    data-allow-remember-me="false"
    data-amount="20000"
    data-name="Nocker Subscription"
    data-description="1 year subscription ($200.00)"
    data-image="images/logo.png">
  </script>
  </div>
</form>
</body>
</html>

