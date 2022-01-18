

<?php   //PURPOSE OF CODE: used to display the trips image stored in the database

  $selected = $_POST['tripChoice'];
  $query = "SELECT urlimage FROM bustrip WHERE tripid=$selected";
  $result = mysqli_query($connection,$query);

  $url = mysqli_fetch_assoc($result);
  if(is_null($url['urlimage'])){
    echo "Image Url:   <input type='url' name='urlimage' placeholder='Picture URL' required/><br><br>";
  }else{
    echo '<br /><img src="'.$url['urlimage'].'"/><br />';
  }

  mysqli_free_result($result);
 ?>

