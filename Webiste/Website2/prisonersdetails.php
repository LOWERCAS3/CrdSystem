<?php
 include_once 'includes/dbh.inc.php';
 include_once 'header.php';
 $priId = $_GET['id'];
 $sql = "SELECT * FROM prisoner WHERE  pri_id = '$priId'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result);
   $priId = $row['pri_id'];
   $name = $row['name'];
   $addr = $row['address'];
   $age = $row['age'];
   $gender = $row['gender'];
   $arrest_date = $row['arrest_date'];
   $arrest_time = $row['arrest_time'];
   $crime = $row['crime'];
   $status = $row['sttus'];
   $image = $row['image'];
?>
   <main class="pridetails">
        <fieldset class="priform">
        <h1 class="toptitle" >PRISONER DETAILS</h1><br>
        <hr>
        <br>
        <p>Name&emsp;:&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo $name; ?></p><br>
        <span class=" priImg"> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"width="250" height="250" >';?></span>
        <p>Arrest Date&emsp;:&emsp;&emsp; <?php echo $arrest_date; ?></p><br>
        <p>Arrest Time&emsp;:&emsp;&emsp;&nbsp<?php echo $arrest_time; ?></p><br>
        <p>Crime&emsp;:&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<?php echo $crime; ?></p><br>
        <p>Gender&emsp;:&emsp;&emsp;&emsp;&emsp;<?php echo $gender; ?></p><br>
        <p>Age&emsp;:&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<?php echo $age; ?></p><br>
        <p>Status&emsp;:&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;<?php echo $status; ?></p><br>
        <p>Address&emsp;:&emsp;&emsp;&emsp;&nbsp;<?php echo $addr; ?></p><br>
      </fieldset>
   </main>
