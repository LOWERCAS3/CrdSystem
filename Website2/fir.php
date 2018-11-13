<?php
// include_once 'header.php';(check if this even works??)
include_once 'header.php';
include_once 'includes/dbh.inc.php';

$sql = "SELECT * FROM fir";
$result = mysqli_query($conn, $sql) or die("Bad query: $sql");

echo "<table border='1'>";
echo " <tr><td>Fir Id</td><td>Victim</td><td>Fir Date</td><td>Fir Time</td><td>Description</td><td>Region</td><td>Area</td><td>Suspect</td></tr>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr><td>{$row['fir_id']} </td><td>{$row['victim']}</td><td>{$row['fir_date']}</td><td>{$row['fir_time']}</td><td>{$row['dscrptn']}</td><td>{$row['region']}</td><td>{$row['area']}</td><td>{$row['suspect']}</td></tr>";
  }

echo "</table>";
 ?>
<main>
  <link rel="stylesheet" href="style.css">
  <button type="button" name="edit">Edit</button>
  <button type="button" onclick="location.href='firform.php'" name="">Lodge FIR</button>
  <button type="submit" name="delete">Delete</button>
</main>
