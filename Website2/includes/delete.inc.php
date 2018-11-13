<?php
if (isset($_POST['delete-victim'])) {
include_once 'dbh.inc.php';
 $delete_id =  $_POST['checkbox'];
 $id = count($delete_id);
 if (count($id) > 0) {
   foreach ($delete_id as $id_d) {
     $sql = "DELETE FROM victim WHERE vict_id = '$id_d';";
     mysqli_query($conn,$sql);
   }
 }
 header("Location: ../victim.php?id=$id_d");
 exit();
}

elseif (isset($_POST['delete-pri'])) {
include_once 'dbh.inc.php';
 $delete_id =  $_POST['checkbox'];
 $id = count($delete_id);
 if (count($id) > 0) {
   foreach ($delete_id as $id_d) {
     $sql = "DELETE FROM prisoner WHERE pri_id = '$id_d';";
     mysqli_query($conn,$sql);
   }
 }
 header("Location: ../prisoner.php?id=$id_d");
 exit();
}



 ?>
