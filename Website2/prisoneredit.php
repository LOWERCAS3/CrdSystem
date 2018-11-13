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
  <form class="priform" action="includes/update.inc.php?id=<?php echo $priId;  ?>" method="post">
  <p>Prisoner ID:<?php echo $priId;  ?></p><br>
  <p>Name:            <input autocomplete=" off" type="text" name="pname" value="<?php echo $name; ?>"></p><br>
  <span class=" priImg"> <?php echo '<img src="data:image/jpg;base64,'.base64_encode($row['image']).'"width="250" height="250" >';?></span>
  <p>Arrest Date:     <input autocomplete=" off" type="text" name="date" placeholder="YYYY-MM-DD" value="<?php echo $arrest_date; ?>"></p><br>
  <p>Arrest Time:     <input autocomplete=" off" type="text" name="time" placeholder="In 24hr Format (HH:MM)" value="<?php echo $arrest_time; ?>"></p><br>
  <p>Crime:           <textarea name="crime" rows="2" cols="20"><?php echo $crime; ?></textarea></p><br>
  <p>Gender:Male:     <input type="radio" name="gender" value="Male"> &emsp; Female:<input type="radio" name="gender" value="Female"></p><br>
  <p>Age:             <input autocomplete=" off" type="text" name="age" value="<?php echo $age; ?>"></p><br>
  <p>Status:          <input autocomplete=" off" type="text" name="pstatus" value="<?php echo $status; ?>"><br>
  <p>Address:         <textarea name="address" rows="2" cols="20"><?php echo $addr; ?></textarea></p><br>
  <button type="submit" name="update-pri-submit">Update</button>
  </form>
  </fieldset>

  </main>
