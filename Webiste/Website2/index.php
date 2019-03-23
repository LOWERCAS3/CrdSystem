<?php
  require 'header1.php';
?>

    <main>
      <?php
      if (isset($_SESSION['userId'])) {
        header("Location: header.php");
      }
      elseif(empty($_GET)) {
        echo "";
      } ?>
    </main>

<?php
  require 'footer.php';
?>
