

<?php  //PURPOSE OF CODE: this is used to select one of the trips listed and either edit or delete it.

  include_once 'connecttodb.php';
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8" />
    <title>pnaderi4-Assignment3</title>
  </head>
  <body>
    <?php
      include "getBusTripData.php"
    ?>
    <form  method="post" >
      <h4>Please Select A Trip ID You Would Like to Either Update Or Delete.</h4>
      Enter the Trip ID of the Trip you would Like to Update from the list above.<br />
      <select name='tripChoice'>
      <?php
        include "getBusTripIDs.php"
       ?>
       </select>
      <input type="submit" name="update" value="Update" formaction="updateTrip.php"  />
      <input type="submit" name="delete" value="Delete" formaction="deleteTrip.php" onclick="alert('Action Completed, Read Error if Applicable');" />
    </form>

  </body>
</html>

