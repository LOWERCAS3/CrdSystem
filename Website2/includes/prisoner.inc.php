<?php
if (isset($_POST['prisoner_submit'])) {
 include_once 'dbh.inc.php';

 $prisonerName = $_POST['pname'];
 $address = $_POST['addr'];
 $age = $_POST['age'];
 $gender = $_POST['gender'];
 $arrestDate = $_POST['date'];
 $arrestTime = $_POST['time'];
 $crime = $_POST['crime'];
 $status = $_POST['pstatus'];
 $filename = addslashes($_FILES['image']['name']);
 $tmpname = addslashes(file_get_contents($_FILES['image']['tmp_name']));
 $filetype = addslashes($_FILES['image']['type']);

 $array = array('jpg', 'png', 'jpeg');
 $ext = pathinfo($filename, PATHINFO_EXTENSION);
 if (!empty($filename)) {
   if(in_array($ext,$array)){
     $sql = "INSERT INTO prisoner (name, address, age, gender, arrest_date, arrest_time, crime, sttus, image) VALUES ('$prisonerName', '$address', '$age', '$gender', '$arrestDate', '$arrestTime', '$crime', '$status','$tmpname');";
     mysqli_query($conn, $sql);
     header("Location: ../prisoner.php?data=entered");
     exit();
   }
   else {
   header("Location: ../forms/prisonerform.php?error=format");
   }

 }






 // $sql = "INSERT INTO image(name, image) VALUES ('$filename','$tmpname')";
 // mysqli_query($conn,$sql);
 // echo "image inserted";
 // header("Location: show.php");
 // exit();
}
