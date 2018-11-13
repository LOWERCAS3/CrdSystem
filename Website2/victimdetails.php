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
        <br><br>
        <p>Name&nbsp:&nbsp&nbsp&nbsp&nbsp<?php echo $name; ?><br><br>
        <span class=" victImg"> <?php echo '<img src="data:image/jpg;base64,'.base64_encode($row['vict_image']).'"width="250" height="250" >';?></span>
        <p>Victim ID&nbsp:&nbsp&nbsp&nbsp&nbsp<?php echo $victId; ?></p><br>
        <p>Case ID&nbsp:&nbsp&nbsp&nbsp&nbsp<?php echo $caseId; ?></p><br>
        <p>Gender&nbsp:&nbsp&nbsp&nbsp&nbsp<?php echo $gender; ?></p><br>
        <p>Age&nbsp:&nbsp&nbsp&nbsp&nbsp<?php echo $age; ?></p><br>
        <p>Statement&nbsp:&nbsp&nbsp&nbsp&nbsp<?php echo $statement; ?></p><br>
        <p>Address&nbsp:&nbsp&nbsp&nbsp&nbsp<?php echo $addr; ?></p><br>
      </fieldset>
 </main>
