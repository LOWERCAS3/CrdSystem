<?php
include_once 'header.php';
  ?>
<main>
    <form class="" action="includes/prisoner.inc.php" method="post" enctype="multipart/form-data">
      <h1>Prisoners Details</h1>
      <hr>
      <pre>
        
            Upload Image:  <input style="background-color: white;" type="file" required name="image">

            Name:         <input type="text" name="pname" value=""><br>
            Address:      <textarea name="addr" rows="2" cols="30"></textarea><br>
            Age:                <input type="text" name="age" value=""><br>
            Gender:   Male:<input type="radio" name="gender" value="Male"> Female:<input type="radio" name="gender" value="Female"> <br>
            Arrest Date: <input type="date" style="color: black;" name="date" placeholder="YYYY-MM-DD"><br>
            Arrest Time: <input type="time" style="color: black;" name="time"><br>
            Crime:           <textarea style=" color: black;"name="crime" rows="2" cols="30"></textarea><br>
            Status:           <select  class="" name="pstatus">
                                  <option value="">Select</option>
                                  <option value="arrested">Arrested</option>
                                  <option value="OnBail">On Bail</option>
                                  <option value="sentenced">Sentenced</option></select><br>
        </pre>
        <button type="submit" name="prisoner_submit">Submit</button>
    </form>
</main>

<?php
  if(!empty($_GET)){
    if($_GET['error']=='format'){
      echo '<script> alert("Unsupported image format!"); </script>';
    }
  }
?>
