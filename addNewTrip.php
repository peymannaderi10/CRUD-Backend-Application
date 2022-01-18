


<?php   //PURPOSE OF CODE: Inserts a new trip that the user has chosen into the database.
include_once 'connecttodb.php';

  $addID = $_POST['addNewID'];
  $addname = $_POST['addNewName'];
  $addCountry = $_POST['newCountry'];
  $addStart = $_POST['addNewStart'];
  $addEnd =  $_POST['addNewEnd'];
  $busPlate = $_POST['busPlate'];
  $addImg = $_POST['addNewImage'];

  $query = "INSERT INTO bustrip (tripid,tripname,startdate, enddate, country, assignedbus, urlimage) VALUES ('$addID','$addname','$addStart','$addEnd','$addCountry','$busPlate',NULLIF('$addImg',''))";
  $result = mysqli_query($connection,$query);
  if($result)
  {
    mysqli_close($connection);
    header("location:index.php");
    exit;
  }
  else
  {
    echo "Error adding record";
}

?>

