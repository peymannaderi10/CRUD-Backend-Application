

<?php  //PURPOSE OF CODE: this is used to update the bus trips when wanting to update an existing trip in the database.

include_once 'connecttodb.php';
session_start();
$_SESSION['hasPhoto']=$_POST['urlimage'];

if (isset($_POST['subupdate'])) {
        $newname = $_POST['tripname'];
        $newStart = $_POST['startdate'];
        $newEnd =  $_POST['enddate'];
        $newImg = $_POST['urlimage'];
        if(!is_null($_SESSION['hasPhoto'])){
          $query = "UPDATE bustrip SET tripname='$newname', startdate='$newStart', enddate='$newEnd', urlimage='$newImg' WHERE tripid='".$_SESSION['tripID']."'";
        }else{
          $query = "UPDATE bustrip SET tripname='$newname', startdate='$newStart', enddate='$newEnd' WHERE tripid='".$_SESSION['tripID']."'";
        }

        $result = mysqli_query($connection,$query);
        if($result)
        {
            mysqli_close($connection);
            header("location:index.php");
            exit;
        }
        else
        {
            echo "Error updating record";
        }
}

?>

