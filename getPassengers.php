

<?php  //PURPOSE OF CODE: returns a drop down list of all the passengers full names.

  $query = "SELECT passengerid, CONCAT(firstname,' ',lastname) AS fullname FROM passenger";
  $result = mysqli_query($connection,$query);
  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_assoc($result)) {
  echo "<option value='$row[passengerid]'>$row[fullname]</option>";
  }
  mysqli_free_result($result);


?>

