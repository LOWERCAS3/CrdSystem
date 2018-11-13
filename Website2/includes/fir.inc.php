<?php

if (isset($_POST['fir_submit']))
{
  require 'dbh.inc.php';
  $name = $_POST['Victim'];
  $region = $_POST['slct1'];
  $firdate = $_POST['FIR_Date'];
  $firtime = $_POST['Fir_Time'];
  $area = $_POST['slct2'];
  $suspects = $_POST['suspect'];
  $description = $_POST['dscrptn'];

  $sql ="INSERT INTO fir (victim, fir_date, fir_time, dscrptn, region, area, suspect) VALUES ('$name' ,'$firdate','$firtime','$description','$region','$area','$suspects');";
  mysqli_query($conn, $sql);
  header("Location: ../fir.php?data=entered");
  exit();
}
