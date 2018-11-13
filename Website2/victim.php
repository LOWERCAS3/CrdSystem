  <?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';

$sql = "SELECT * FROM victim  ";
$result = mysqli_query($conn, $sql) or die("Bad query: $sql");
 ?>
<main>
  <form action='includes/delete.inc.php' method='post'>
 <?php
echo "<table border='1'>";
echo " <tr> <td>Victim Id</td>
            <td>Case Id</td>
            <td>Name</td>
            <td>Age</td>
            <td>Gender</td>
            <td>Delete<td>
        </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "
            <tr><td> <a href='victimdetails.php?id={$row['vict_id']}'>{$row['vict_id']}</a></td>
            <td>{$row['case_id']}</td>
            <td>{$row['vict_name']}</td>
            <td>{$row['vict_age']}</td>
            <td>{$row['vict_gender']}</td>
            <td><input name='checkbox[]' type='checkbox' id='checkbox[]' value='{$row['vict_id']}' /></td>
            <td><a href='victimedit.php?id={$row['vict_id']}'>Edit</a></td>

            </tr>
          ";
  }
echo "</table>";
 ?>
 <button type='submit' name='delete-victim'>Delete</button>
  </form>
  <link rel="stylesheet" href="style.css">
  <button type="submit" name="edit">Edit</button>

  <button type="submit" onclick="location.href='victimform.php'">add Victims info</button>
</main>
