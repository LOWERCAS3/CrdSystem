<?php

if (isset($_POST['cases_submit'])){

include_once 'dbh.inc.php';

$prisonerId = $_POST['pri_id'];
$courtId = $_POST['crt_id'];
$hearingdate = $_POST['hearing_date'];
$arrests = $_POST['arrests'];
$firId = $_POST['fir_id'];

$sql = "SELECT fir_id FROM fir WHERE fir_id = '$firId';";
$result = mysqli_query($conn, $sql) or die("Bad query: $sql");
$rowcount=mysqli_num_rows($result);
echo $rowcount;
if($rowcount != 1)
{
  header("Location: ../forms/casesform.php?error=fir_id");
  exit();
}
$sql="SELECT pri_id FROM prisoner WHERE pri_id = '$prisonerId';";
$result = mysqli_query($conn, $sql) or die("Bad query: $sql");
$rowcount=mysqli_num_rows($result);
if($rowcount != 1)
{
  header("Location: ../forms/casesform.php?error=prisoner_id");
  exit();
}
$sql="SELECT crt_id FROM court WHERE crt_id = '$courtId';";
$result = mysqli_query($conn, $sql) or die("Bad query: $sql");
$rowcount=mysqli_num_rows($result);
if($rowcount != 1)
{
  header("Location: ../forms/casesform.php?error=court_id");
  exit();
}

$sql ="INSERT INTO cases (pri_id, crt_id, hearing_date, arrests, fir_id) VALUES ('$prisonerId','$courtId','$hearingdate','$arrests','$firId');";
mysqli_query($conn, $sql);
header("Location: ../cases.php?data=entered");
exit();
}
