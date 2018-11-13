<?php
  require "header1.php";
?>

    <main class="signupform">
      <fieldset>
      <h1> <br>Sign Up</h1>
      <?php
      if (!empty($_GET)) {
        if (isset($_GET['error'])) {
          if ($_GET['error'] == "emptyfields") {
            echo "<p>Fill in all fields!</p>";
          }
          elseif ($_GET['error'] == "invalidmail") {
            echo "<p>Invalid E-mail!</p>";
          }
          elseif ($_GET['error'] == "invaliduid") {
            echo "<p>Invalid Username!</p>";
          }
          elseif ($_GET['error'] == "invalidfields") {
            echo "<p>Fill in all Username and E-mail!</p>";
          }
          elseif ($_GET['error'] == "passwordcheck") {
            echo "<p>Passwords do not match!</p>";
          }
          elseif ($_GET['error'] == "alreadyregistered") {
            echo "<p> Email already registered!</p>";
          }
        }
        elseif ($_GET['signup'] == "success") {
          echo "<p>Signed up!</p>";
        }
    }
      ?>
        <form class="fields" action="includes/signup.inc.php" method="post"><br><br>
          <input type="text" name="uid" placeholder=" Username..."><br><br>
          <input type="text" name="mail" placeholder=" Email..."><br><br>
          <input type="password" name="pwd" placeholder=" Password..."><br><br>
          <input type="password" name="pwd-repeat" placeholder=" Re-type Password..."><br><br>
          <button type="submit" name="signup-submit">Sign Up</button><br><br>
        </form>
      </fieldset>
    </main>
<?php
  require "footer.php";
?>
