<?php

if(isset($_POST['courts_submit']))
{
include_once 'dbh.inc.php';
$courtname = $_POST['crt_name'];
$Address = $_POST['crt_addr'];
$type = $_POST['crt_type'];

$sql = "INSERT INTO court(crt_name, crt_place, crt_type) VALUES ('$courtname', '$Address', '$type');";
mysqli_query($conn, $sql);
header("Location: ../courts.php?data=entered");
exit();
}
