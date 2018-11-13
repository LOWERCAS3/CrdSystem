<?php
 include_once 'includes/dbh.inc.php';
 include_once 'header.php';
 $victId = $_GET['id'];
 $sql = "SELECT * FROM victim WHERE  vict_id = '$victId'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result);
   $victId = $row['vict_id'];
   $caseId = $row['case_id'];
   $name = $row['vict_name'];
   $addr = $row['vict_address'];
   $age = $row['vict_age'];
   $gender = $row['vict_gender'];
   $image = $row['vict_image'];
   $statement = $row['vict_statement'];
?>

   <main class="victdetails">
      <fieldset class="victfield">
        <h1 class="victtoptitle" >VICTIM DETAILS</h1><br>
        <hr>
        <br><br><form class="victform" action="includes/update.inc.php?id=<?php echo $victId;  ?>" method="post">
          <p>Name&emsp;:&emsp;&emsp;&emsp;&emsp;  <input autocomplete=" off" type="text" name="vname" value="<?php echo $name; ?>"><br><br>
            <span class=" victImg"> <?php echo '<img src="data:image/jpg;base64,'.base64_encode($row['vict_image']).'"width="250" height="250" >';?></span>
            <p>Victim ID:&emsp;&emsp;&nbsp;&emsp;&emsp;<?php echo $victId; ?></p><br>
            <p>Case ID&emsp;:&emsp;&emsp;&emsp;&emsp;<?php echo $caseId; ?></p><br>
            <p>Gender&emsp;:&emsp;&emsp;&emsp;&nbsp;Male: <input type="radio" name="gender" value="Male"> Female: <input type="radio" name="gender" value="Female"> </p><br>
            <p>Age&emsp;:&emsp;&emsp;&emsp;&emsp;&emsp;<input autocomplete=" off" type="text" name="age" value="<?php echo $age; ?>"></p><br>
            <p>Statement&emsp;&emsp;&emsp;<input autocomplete=" off" type="text" name="statement" value="<?php echo $statement; ?>"></p><br>
            <p>Address&emsp;:&emsp;&emsp;&emsp;<input autocomplete=" off" type="text" name="addr" value="<?php echo $addr; ?>"></p><br>
            <button type="submit" name="update-submit">Update</button>
        </form>
      </fieldset>

   </main>
