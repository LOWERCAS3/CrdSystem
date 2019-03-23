<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';

$sql = "SELECT * FROM court";
$result = mysqli_query($conn, $sql) or die("Bad query: $sql");

echo "<table border='1'>";
echo " <tr><td>Court Id</td><td>Court Name</td><td>Court Place</td><td>Court Type</td></tr>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr><td>{$row['crt_id']} </td><td>{$row['crt_name']}</td><td>{$row['crt_place']}</td><td>{$row['crt_type']}</td></tr>";
  }

echo "</table>";
 ?>
<main>
  <link rel="stylesheet" href="style.css">
  <button type="submit" name="edit">Edit</button>
  <button type="submit" name="delete">Delete</button>
  <button type="button" onclick="location.href='forms/courtsform.php'" name="button">add court</button>
</main>
