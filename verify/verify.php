<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/ttt/stylesheets/styles.css">

    <!-- Scripts -->
    <!-- <script src="/var/www/html/ttt/play/node_modules/jquery/src/jquery.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/ttt/cs.js"></script>
    <title>Tic Tac Toe</title>
  </head>
  <body>

<?php include ('html/header.html'); ?>

      <div class="leftDiv">
        <div class="formContainer">
          <form action="./" method="post" class="form-inline">

              <label class="sr-only" for="inlineFormInputGroupUsername2">Email</label>
              <div class="input-group mb-2 mr-sm-2">
                <input type="text" class="form-control" id="verifyEmail" placeholder="Email">
              </div>

              <label class="sr-only" for="inputPassword4">Key</label>
              <input type="text" class="form-control mb-2 mr-sm-2" id="verifyKey" placeholder="Key">

              <button type="submit" onclick="onVerifyClick()" class="btn btn-primary mb-2">Verify</button>
          </form>
      </div>
      </div>

      <div class="rightDiv">

      </div>

  <?php include ('html/footer.html'); ?>



</body>
</html>
