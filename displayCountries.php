

<?php //PURPOSE OF CODE: this is used to display a drop down menu for the list of countries

  $query = "SELECT DISTINCT country FROM bustrip";
  $result = mysqli_query($connection,$query);
  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_assoc($result)) {
  echo "<option value='$row[country]'>$row[country]</option>";
  }
  mysqli_free_result($result);


?>

