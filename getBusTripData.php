

<?php  //PURPOSE OF CODE:Used to retreive the bus trip data based off the useres way of ordering.

if (isset($_POST['submit']) && isset($_POST['orderby']) && isset($_POST['ascdesc'])){
  $orderby = $_POST['orderby'];
  $ascdesc = $_POST['ascdesc'];
  $query = "SELECT * FROM bustrip ORDER BY $orderby $ascdesc ";
  $result = mysqli_query($connection,$query);
  if (!$result) {
    die("databases query failed.");
  }
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<p>TripID: '.$row["tripid"].'| Name: '.$row["tripname"].' | Start: '.$row["startdate"].' | End: '.$row["enddate"].' | Country: '.$row["country"].' | Bus: '.$row["assignedbus"].'</p><br>';
  }
  mysqli_free_result($result);
}
else{
  echo "<p> Please make sure both fields are selected!</p>";
}
?>

