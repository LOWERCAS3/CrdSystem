<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';

$sql = "SELECT * FROM prisoner";
$result = mysqli_query($conn, $sql) or die("Bad query: $sql");
?>
<main>
    <form class="" action="prisoner.php" method="post">
      <input type="text" name="search" value="">
      <button type="submit" name="viewbutton">Search</button>
    </form>
    <form class="" action="includes/delete.inc.php" method="post">
<?php
if (!isset($_POST['viewbutton'])) {
echo "<table class='pritable' border='1'>";
echo " <tr><td>Prisoner Id</td>
            <td>Name</td>
            <td>Address</td>
            <td>Age</td>
            <td>Gender</td>
            <td>Arrest Date</td>
            <td>Arrest Time</td>
            <td>Crime</td>
            <td>Status</td>
            <td>Delete</td>
            </tr>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr><td> <a href='prisonersdetails.php?id={$row['pri_id']}'>{$row['pri_id']}</a></td>
            <td>{$row['name']}</td>
            <td>{$row['address']}</td>
            <td>{$row['age']}</td>
            <td>{$row['gender']}</td>
            <td>{$row['arrest_date']}</td>
            <td>{$row['arrest_time']}</td>
            <td>{$row['crime']}</td>
            <td>{$row['sttus']}</td>
            <td><input name='checkbox[]' type='checkbox' id='checkbox[]' value='{$row['pri_id']}' /></td>
            <td><a href='prisoneredit.php?id={$row['pri_id']}'>Edit</a></td>
        </tr>";
  }
echo "</table>";
} else {
$search = $_POST['search'];
$sql = "SELECT * FROM prisoner WHERE pri_id LIKE '%$search%' OR name LIKE '%$search%' OR address LIKE '%$search%' OR age LIKE '%$search%' OR gender LIKE '%$search%' OR  arrest_time LIKE '%$search%' OR arrest_date LIKE '%$search%' OR crime LIKE '%$search%';";
$result = mysqli_query($conn,$sql);
echo "<table class='pritable' border='1'>";
echo " <tr><td>Prisoner Id</td>
            <td>Name</td>
            <td>Address</td>
            <td>Age</td>
            <td>Gender</td>
            <td>Arrest Date</td>
            <td>Arrest Time</td>
            <td>Crime</td>
            <td>Status</td>
            <td>Delete</td>
            </tr>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr><td> <a href='prisonersdetails.php?id={$row['pri_id']}'>{$row['pri_id']}</a></td>
            <td>{$row['name']}</td>
            <td>{$row['address']}</td>
            <td>{$row['age']}</td>
            <td>{$row['gender']}</td>
            <td>{$row['arrest_date']}</td>
            <td>{$row['arrest_time']}</td>
            <td>{$row['crime']}</td>
            <td>{$row['sttus']}</td>
            <td><input name='checkbox[]' type='checkbox' id='checkbox[]' value='{$row['pri_id']}' /></td>
            <td><a href='prisoneredit.php?id={$row['pri_id']}'>Edit</a></td>
        </tr>";
  }
echo "</table>";
}
 ?>
  <link rel="stylesheet" href="style.css">
  <button class="delete" type="submit" name="delete-pri">Delete</button>
</form>
<button type="submit" name="edit">Edit</button>
  <button type="submit" onclick="location.href='prisonerform.php'">add prisoner info</button>
</main>
