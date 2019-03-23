<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Crime records</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<body>
  <header>
    <div class="main">
      <span>
      <nav class="nav-header-main">
            <a href="index.php" >
            <img  class="nav-header-logo" src="img/icon.png" alt="logo" >
          </a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Gallery</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
    </span>
      <div class="loginform">
        <?php
          if (isset($_SESSION['userId'])) {
            echo   '<form class="" action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit">Logout</button>
                    </form>';
          }
          else {
            echo  '<form class="" action="includes/login.inc.php" method="post">
                    <input type="text" name="mailuid" autocomplete="off" placeholder=" Username/E-mail...">
                    <input type="password" name="pwd" autocomplete="off" placeholder=" Password...">
                    <button type="submit" name="login-submit">Login</button>
                    <a href="signup.php?signup=page">Signup</a>
                    </form>';
          }
          if (!isset($_GET['signup'])) {
            echo '<div class="title">
            <h1>CRIME RECORDS DATABASE</h1>
            </div>';

          }
        ?>

      </div>
    </nav>
    </div>
  </header>
</body>
</html>
