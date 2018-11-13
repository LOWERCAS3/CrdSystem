<?php
if (isset($_POST['victim_submit'])) {
 include_once 'dbh.inc.php';

 $caseId = $_POST['case_id'];
 $victimName = $_POST['vname'];
 $address = $_POST['addr'];
 $age = $_POST['age'];
 $gender = $_POST['gender'];
 $statement = $_POST['statement'];


 $filename = addslashes($_FILES['image']['name']);
 $tmpname = addslashes(file_get_contents($_FILES['image']['tmp_name']));
 $filetype = addslashes($_FILES['image']['type']);


 $sql = "SELECT case_id FROM cases WHERE case_id = '$caseId';";
 $result = mysqli_query($conn, $sql) or die("Bad query: $sql");
 $rowcount=mysqli_num_rows($result);
 echo $rowcount;
 if($rowcount != 1)
 {
   header("Location: ../victimform.php?error=case_id");
   exit();
 }


 $array = array('jpg', 'png', 'jpeg');
 $ext = pathinfo($filename, PATHINFO_EXTENSION);
 if (!empty($filename)) {
   if(in_array($ext,$array)){
     $sql = "INSERT INTO victim (case_id, vict_name, vict_address, vict_age, vict_gender, vict_image, vict_statement) VALUES ('$caseId','$victimName','$address','$age','$gender','$tmpname','$statement');";
     mysqli_query($conn, $sql);
     header("Location:  ../victim.php?data=entered");
     exit();
    }
   else {
   header("Location: ../victimform.php?error=format");
    }
  }
}
