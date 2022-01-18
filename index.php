

<?php   
//PURPOSE OF CODE: The Main Home Page.
  include_once 'connecttodb.php';  
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
    <h2> PLEASE NOTE: When pressing the submit button it may jump back up to the top of the page, dont worry it still worked just scroll down!</h2>
    <h1>List all the Bus Trip Data</h1>
    <h4>Please Select A Way of Ordering The List</h4>
    <form  action="selectTrip.php" method="post">
      *Please select the field to be ordered by:<br>
      Order By Country<input type="radio" name="orderby" required value="country"/><br>
      Order By Trip Name<input type="radio" name="orderby" required value="tripname"/>
      <br /><br />
      *Please select how you would like it to be ordered:<br>
      Order Ascending<input type="radio" name="ascdesc" required value="ASC"/><br>
      Order Decending<input type="radio" name="ascdesc" required value="DESC"/>
      <br /> <br />
      <input type="submit" name="submit" value="Submit"/>
    </form>
    <h1>Add a New Bus Trip</h1><br />

    <?php
      $message = "";
      $found = FALSE;
    if(isset($_POST['addaTrip'])){
      $query = "SELECT tripid FROM bustrip";
      $result = mysqli_query($connection,$query);
      if (!$result) {
        die("databases query failed.");
      }
      while ($row = mysqli_fetch_assoc($result)) {
        if($row['tripid']==$_POST['addNewID']){
           $message = "The ID Selected Already Exists ";
           $found = TRUE;
        }
      }
      if(!$found){
        include "addNewTrip.php";
      }
      mysqli_free_result($result);
    }

    ?>
    <form action="" method="post" onsubmit="alert('Action Completed, Read Error if Applicable');">
       <?php echo $message; ?>
      <h4>Please Enter the Following information you would like to add:</h4>
      Trip ID:   <input type="text" name="addNewID" placeholder="Trip ID" required/><br>
      Trip Name:   <input type="text" name="addNewName" placeholder="Trip Name" required/><br>
      Country:   <input type="text" name="newCountry" placeholder="Country Name" required/><br>
      Start Date:  <input type="date" id='addNewStart' name="addNewStart" required/><br>
      End Date:  <input type="date" id ='addNewEnd' name="addNewEnd" required onchange="compareTime('addNewStart','addNewEnd');" /><br>
      Bus Plate: <select name='busPlate'>
        <?php
          include "getbusPlates.php"
         ?>
       </select><br />
      Image Url:   <input type='url' name='addNewImage' placeholder='Picture URL'/><br><br>
    <input type="submit" name="addaTrip" value="Submit" />
    </form>

    <br /><br />
    <h1>Select Country</h1>
    <form action="" method="post">
      <h4>Please Select a Country You would Like to View the Bus Trips in.</h4>
      Country: <select name='countryList'>
        <?php
          include "displayCountries.php"
         ?>
       </select><br />
       <input type="submit" name="countryTrips" value="Submit"/>
    </form>
    <?php
      include "countryBusTripData.php";
    ?>
    <br /><br />


    <h1>Create A Booking</h1>
    <form action="" method="post" onsubmit="alert('success');">
      Passenger: <select name='selPassenger'>
        <?php
          include "getPassengers.php"
         ?>
       </select><br />
       Bus Trip: <select name='selBusTrip'>
         <?php
           include "getTripName.php"
          ?>
        </select><br />
        Price:   <input type="text" name="addPrice" placeholder="0.00$" required/><br>
    <input type="submit" name="createBooking" value="Submit" />
    <?php
      include "createBooking.php"
    ?>
    </form>
    <br /><br />

    <h1>List of All Passengers Including Passport Ordered by Last Name</h1>
      <?php
      $query = "SELECT * FROM passenger,passport WHERE passenger.passengerid=passport.passengerid ORDER BY passenger.lastname";
      $result = mysqli_query($connection,$query);
      if (!$result) {
        die("databases query failed.");
      }
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<p>Passenger ID: '.$row["passengerid"].'| First Name: '.$row["firstname"].'| Last Name: '.$row["lastname"].' | Passport Number: '.$row["passportnum"].' | Citizenship: '.$row["citizenshipcountry"].' | Expiry date: '.$row["expireydate"].' | Birth Date: '.$row["birthdate"].'</p><br>';
      }
      mysqli_free_result($result);
    ?>
    <br /><br />
    <h1>View A Passengers Bookings</h1>
    <form action="" method="post">
      Passenger: <select name='getPassbooking'>
        <?php
          include "getPassengers.php"
         ?>
    <input type="submit" name="getBookings" value="Submit" />
    <?php
      include "getBookings.php"
    ?>
    </form>
    <br /><br />

    <h1>Bus Trips That Have No Bookings</h1>
    <?php
    $query = "SELECT tripid,tripname FROM bustrip WHERE tripid NOT IN (SELECT tripid FROM booking)";
    $result = mysqli_query($connection,$query);
    if (!$result) {
      die("databases query failed.");
    }
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<p>Trip Name: ".$row['tripname']."</p><br />";
    }
    mysqli_free_result($result);
  ?>
  </body>
</html>

