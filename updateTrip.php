

<?php  //PURPOSE OF CODE: This is used to retreive the input data of the user and what they want to update in a pre-exisiting bus trip.

include_once 'connecttodb.php';
session_start();
$_SESSION['tripID']=$_POST['tripChoice'];
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8" />
  <title>pnaderi4-Assignment3</title>
  <script>
  function compareTime(startID,endID) {
      var start = document.getElementById(startID).value;
      var end = document.getElementById(endID).value;
      if(start>end){
        alert("ERROR: PLEASE CHOOSE AN END DATE PAST THE START DATE");
        document.getElementById(endID).value = null;
      }

}
  </script>
</head>
<body>

  <form action="updateDB.php" method="post" onsubmit="alert('success');">
    <h4>Please Enter the Following information you would like to update:</h4>
    Trip Name:   <input type="text" name="tripname" placeholder="Trip Name" required/><br>
    Start Date:  <input type="date" id='startdate' name="startdate" required/><br>
    End Date:  <input type="date" id ='enddate' name="enddate" onchange="compareTime('startdate','enddate');" required /><br>
  <?php
    include "displayTripPicture.php";
  ?>
  <input type="submit" name="subupdate" value="Submit" />
  </form>
</body>
</html>

