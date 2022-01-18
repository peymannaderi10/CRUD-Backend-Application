

<?php //PURPOSE OF CODE: used to return a drop down menu for the bus trip ids currently in the database.

  $query = "SELECT tripid FROM bustrip";
  $result = mysqli_query($connection,$query);
  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_assoc($result)) {
  echo "<option value='$row[tripid]'>$row[tripid]</option>";
  }
  mysqli_free_result($result);


?>

