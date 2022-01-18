

<?php  //PURPOSE OF CODE: returns a drop down list of the trip names currently in the database.

  $query = "SELECT tripname,tripid FROM bustrip";
  $result = mysqli_query($connection,$query);
  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_assoc($result)) {
  echo "<option value='$row[tripid]'>$row[tripname]</option>";
  }
  mysqli_free_result($result);


?>

