<?php
if (isset($_COOKIE['uid'])) {
    header('location: welcome.php');
    exit;
}

include 'config.inc';
include 'opendb.inc';

if(isset($_REQUEST["username"]) and isset($_REQUEST["password"])){
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    if ($username <> "" and $password <> "") {
        $query  = "SELECT * FROM accounts WHERE username='". $username ."' AND password='".stripslashes($password)."'";
        $result = $mysqli->query($query) or die(mysql_error($conn) . '<p><b>SQL Statement:</b>' . $query);
        if ($result->num_rows > 0) {
            // flag the cookie as secure only if it is accessed via SSL
            $ssl = FALSE;
            if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
                // SSL connection
                $ssl = TRUE;
            }
            // set a random md5 as the session value
                    $rndm = rand();
                    $value = md5($rndm);
                    setcookie("sessionid", $value);
            // set uid to appropriate user
            $row = $result->fetch_array(MYSQLI_ASSOC);
            setcookie("uid", base64_encode($row['id']));
            $failedloginflag=0;
            header("location: welcome.php");
            exit;
        } else {
            $failedloginflag=1;
        }
    }
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
    ?>
    <title>Pentesting Lab</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" method="POST" action="">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <div class="alert alert-warning" style="margin-top: 10px">
          <strong>WARNING:</strong>
          <em>This site is only intended for instruction. This site is riddled
          with numerous vulnerabilities.</em>
        </div>
      </form>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
