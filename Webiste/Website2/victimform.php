<?php include_once 'header.php';
 ?>
<main>
  <link rel="stylesheet" href="style.css">
  <form class="" action="includes/victim.inc.php" method="post" enctype="multipart/form-data">
    Case ID: <input type="text" name="case_id" value=""><br>
    Upload Image: <input type="file" required name="image"><br>
    Name: <input type="text" name="vname" value=""><br>
    Address: <textarea name="addr" rows="2" cols="30"></textarea><br>
    Age: <input type="text" name="age" value="">
    Gender:  Male:<input type="radio" name="gender" value="Male">
             Female:<input type="radio" name="gender" value="Female"><br>
    Statement: <textarea name="statement" rows="2" cols="30"></textarea><br>
    <button type="submit" name="victim_submit">Submit</button>
  </form>
</main>
<?php
  if(!empty($_GET)){
    if($_GET['error']=='format'){
      echo '<script> alert("Unsupported image format!"); </script>';
    }
  }
?>
