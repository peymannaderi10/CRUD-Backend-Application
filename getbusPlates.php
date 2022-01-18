

<?php //PURPOSE OF CODE: used to list a dropdown menu of the bus licenseplates.

  $query = "SELECT DISTINCT licenseplate FROM bus";
  $result = mysqli_query($connection,$query);
  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_assoc($result)) {
  echo "<option value='$row[licenseplate]'>$row[licenseplate]</option>";
  }
  mysqli_free_result($result);


?>

