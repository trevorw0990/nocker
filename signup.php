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
    <img src="images/logo.png" alt="IIQ Logo" class="img-responsive center-block" />
    <div class="container">
      <form class="form-signin" method="POST" action="php/check_company.php">
        <h3 class="form-signin-heading">Complete the following steps to sign up</h3>
        <label for="companyId" class="sr-only">Company Id</label>
        <input type="companyId" name="companyId" id="companyId" class="form-control" placeholder="Company Identifier" required autofocus>
        <button class="btn btn-lg btn-success btn-block" type="submit">Next</button>
      </form>
    </div>
  </body>
</html>

