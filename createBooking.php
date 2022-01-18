


<?php   //PURPOSE OF CODE: Creates a new Booking.
include_once 'connecttodb.php';
if (isset($_POST['createBooking'])){
  $selectPass = $_POST['selPassenger'];
  $selectTrip = $_POST['selBusTrip'];
  $addPrice = $_POST['addPrice'];

  $query = "INSERT INTO booking (passengerid,tripid,price) VALUES ('$selectPass','$selectTrip','$addPrice')";
  $result = mysqli_query($connection,$query);
  if(!$result)
  {
    echo "Error adding record";
  }
}
?>

