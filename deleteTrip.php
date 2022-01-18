

<?php  //PURPOSE OF CODE: used to delete a trip based off of tripid

include_once 'connecttodb.php';
if (isset($_POST['delete'])) {
        $query = "DELETE FROM bustrip WHERE tripid=".$_POST['tripChoice'];
        $del = mysqli_query($connection,$query);
        if($del)
        {
            mysqli_close($connection);
            header("location:index.php");
            exit;
        }
        else
        {
            echo "Error deleting record, please be aware that this trip may already have a booking";
        }
}

?>

