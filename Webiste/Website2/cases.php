<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';

$sql = "SELECT * FROM cases";
$result = mysqli_query($conn, $sql) or die("Bad query: $sql");

echo "<table border='1'>";
echo " <tr><td>Case Id</td><td>Prisoner Id</td><td>Court Id</td><td>Hearing Date</td><td>Arrests</td><td>fir_id</td></tr>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr><td>{$row['case_id']} </td><td>{$row['pri_id']}</td><td>{$row['crt_id']}</td><td>{$row['hearing_date']}</td><td>{$row['arrests']}</td><td>{$row['fir_id']}</td></tr>";
  }

echo "</table>";
 ?>
<main>
  <link rel="stylesheet" href="style.css">
  <button type="submit" name="edit">Edit</button>
  <button type="submit" name="delete">Delete</button>
  <button type="button" onclick="location.href='casesform.php'"name="button">add case</button>
</main>
