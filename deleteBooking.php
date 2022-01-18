

<?php //PURPOSE OF CODE: Deletes booking based on attributes.
include_once 'connecttodb.php';
$delbookingID = $_POST['delBooking'];
$delPassID = $_POST['getPassbooking'];
if (isset($_POST['delBooking'])) {
        $query = "DELETE FROM booking WHERE tripid='$delbookingID' AND passengerid ='$delPassID'";
        $del = mysqli_query($connection,$query);
        if($del)
        {
            mysqli_close($connection);
            header("location:index.php");
            exit;
        }
        else
        {
          	echo $_POST['delBooking'];
			echo $_POST['getPassbooking'];
            echo "Error could not delete booking";
        }
}

?>

