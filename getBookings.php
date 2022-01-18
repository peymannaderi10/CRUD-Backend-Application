

<?php  //PURPOSE OF CODE: Retrieves Existing bookings.

include_once 'connecttodb.php';
if (isset($_POST['getBookings'])){
$selectPass = $_POST['getPassbooking'];

$query = "SELECT * FROM booking,bustrip WHERE booking.tripid=bustrip.tripid AND passengerid LIKE '$selectPass'";
$result = mysqli_query($connection,$query);
if (!$result) {
  die("databases query failed.");
}
echo "<p>WARNING: Once the box is checked the booking will be instantly deleted, choose carfully.</p>";
while ($row = mysqli_fetch_assoc($result)) {
  $bookIdDel = $row['tripid'];
  echo '<p>Trip Name: '.$row["tripname"].'| Price: '.$row["price"].'| Country: '.$row["country"].' | Start Date: '.$row["startdate"].' | End Date: '.$row["enddate"].' | Assigned Bus: '.$row["assignedbus"].'</p><br>';
  echo "CHECK BOX TO DELETE BOOKING ABOVE: <input type='submit' name='delBooking' value='$bookIdDel'style='color: buttonface;' formaction = 'deleteBooking.php'/>";
}
mysqli_free_result($result);
}
?>

