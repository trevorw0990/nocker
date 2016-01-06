<!DOCTYPE html>
<html lang="en">
<head>
  <title>AWS For NOC</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/signin.css" rel="stylesheet">
</head>
  <body>
    <img src="images/iiq.png" alt="IIQ Logo" class="img-responsive center-block" />
    <div class="container">
      <form class="form-signin" method="POST" action="php/validate_login.php">
        <h2 class="form-signin-heading">Please sign in</h2>
	<label for="companyId" class="sr-only">Company Id</label>
        <input type="companyId" name="companyId" id="companyId" class="form-control" placeholder="Company Identifier" required autofocus>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div>
   <div class="container">
    <form class="form-signin" method="GET" action="signup.php">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
    </form>
   </div>
  </body>
</html>
