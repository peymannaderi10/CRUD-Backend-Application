

<?php  //PURPOSE OF CODE: prints off trip info based on the country that it is in.
if (isset($_POST['countryTrips'])){
  $selCountry = $_POST['countryList'];
  $query = "SELECT * FROM bustrip WHERE country='$selCountry'";
  $result = mysqli_query($connection,$query);
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<p>TripID: '.$row["tripid"].'| Name: '.$row["tripname"].' | Start: '.$row["startdate"].' | End: '.$row["enddate"].' | Country: '.$row["country"].' | Bus: '.$row["assignedbus"].'</p><br>';
  }
  mysqli_free_result($result);
}
?>

