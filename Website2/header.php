<?php
  session_start();
?>
<link rel="stylesheet" href="style.css">
 <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

<main class="headerPHP">
  <div class="headerlogo">
    <ul>
    <a href="index.php"><img  class="nav-header-logo" src="img/icon.png" alt="logo" ></a>

      <li><a href="index.php">Home</a></li>
      <li><a href="prisoner.php">Prisoner</a></li>
      <li><a href="fir.php">FIR</a></li>
      <li><a href="cases.php">Cases</a></li>
      <li><a href="courts.php">Courts</a></li>
      <li><a href="victim.php">Victims</a></li>
    </ul>
    <?php
      if (isset($_SESSION['userId'])) {
        echo   '  <form class="" action="includes/logout.inc.php" method="post">
                  <button type="submit" name="logout-submit">Logout</button>
                  </form>';
      }
    ?>
  </div>
</main>
