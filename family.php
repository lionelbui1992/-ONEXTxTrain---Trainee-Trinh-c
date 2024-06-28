<?php 
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','', 'familydb');
if (!$con) {
  die('Could not connect: ' . mysqli_connect_error());
}
$sql="SELECT * FROM user WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "<td>" . $row['Age'] . "</td>";
  echo "</tr>";
} 
echo "</table>";

mysqli_close($con);
?>