<?php include_once 'header.php';
?>
<main>

  <form class=""action="../includes/cases.inc.php" method="post"><br>
    Fir Id: <input type="text" name="fir_id" value=""><br>
    Prisoner Id: <input type="text" name="pri_id" ><br>
    Court Id: <input type="text" name="crt_id" value=""><br>
    Hearing Date: <input type="text" name="hearing_date" placeholder="YYYY-MM-DD"><br>
    Arrests:<input type="" name="arrests" value=""><br>
    <button type="submit" name="cases_submit">Submit</button>
  </form>
</main>
