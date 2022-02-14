<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    <link rel="icon" href="asset/img/favicon.png" type="image/x-icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/login.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <?php
        session_start();
        if(isset($_SESSION['adminname'])) {
        header('location:admin.php'); }
        require_once("koneksi.php");
      ?>
        <form action="prosesloginadmin.php" method="post" class="form-signin">
          <h2 class="form-signin-heading"> <a href="index.php"><span class="glyphicon glyphicon-home"></span></a> Silahkan Masuk</h2>
          <label for="inputUsername" class="sr-only">Adminname</label>
          <input type="username" name="adminname" class="form-control" placeholder="Adminname" required autofocus><br>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <input class="btn btn-lg btn-primary btn-block" value="Login" type="submit">
        </form>
    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
    </div>
  </body>
</html>


