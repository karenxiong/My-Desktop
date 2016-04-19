<?php
session_start();
session_regenerate_id(FALSE);
session_unset();
$pass = $_POST['pass'];
$result = "<div class='pwmsg'>Please enter your password</div>";
if(isset($pass)) {
  if( $pass == "xiong" ) {
    $url = "/index.php";
    $_SESSION['auth'] = 1;
    header("Location: $url");
  } else {
      $result="<div class='pwmsg'>Incorrect password. Please try again.</div>";
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>My Desktop</title>
    <meta name="author" content="Karen Xiong">
    <meta name="description" content="A desktop simulator based on a teenage girls desktop.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css"/>
  </head>
  <body class="welcome">
    <div class="wcontainer">
      <!--  <img src="img/iconw.png" alt="Icon"> -->
      <img src="img/chloe.png" alt="Dog Picture">
      <h1>Karen Xiong</h1><br>
      <form class="pword" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input class="login" type="password" name="pass" placeholder="Password">
      </form>
      <?php echo $result; ?>
    </div>
  </body>
</html>