<?php
  include_once 'dbh.inc.php';
  if (isset($_POST['update-submit'])){
    $victId = $_GET['id'];
    $victimName = $_POST['vname'];
    $address = $_POST['addr'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $statement = $_POST['statement'];
    $sql = "UPDATE victim SET vict_name = '$victimName', vict_address = '$address', vict_age = '$age', vict_gender = '$gender', vict_statement = '$statement' WHERE vict_id = '$victId';";
    mysqli_query($conn,$sql);
    header("Location: ../victim.php?status=updated");
    exit();
}
if (isset($_POST['update-pri-submit'])){
  $priId = $_GET['id'];
  $name = $_POST['pname'];
  $addr = $_POST['address'] ;
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $arrest_date = $_POST['date'];
  $arrest_time = $_POST['time'];
  $crime = $_POST['crime'];
  $status = $_POST['pstatus'];
  $sql = "UPDATE prisoner SET name='$name', address='$addr', age='$age', gender='$gender', arrest_date='$arrest_date', arrest_time='$arrest_time', crime='$crime', sttus='$status' WHERE pri_id = '$priId';";
  mysqli_query($conn,$sql);
  header("Location: ../prisoner.php?status=updated");
  exit();

}
?>


// if (isset($_POST[''])){
//
// }
