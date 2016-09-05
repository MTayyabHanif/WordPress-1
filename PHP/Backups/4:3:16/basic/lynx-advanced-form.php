<!-- Start Form -->

<div class="location-form"> 

<!-- form action = page that the browser is going to send data to -->
<!-- form action = page that processes info -->

<form action="http://www.trackingfelids.com/wp-content/themes/basic/lynx-advanced-mysql.php" method="post" /> 

<p class="form-fields">Upload Image:</p> <input type="file" name="upload_image" value="<?php echo $upload_image;?>">

<p class="form-fields">Upload Map:</p> <input type="file" name="upload_map" value="<?php echo $upload_map;?>">

<p class="form-fields">City:</p> <input type="text" name="city" value="<?php echo $city;?>">

<p class="form-fields">State:</p> <input type="text" name="state" value="<?php echo $state;?>">

<p class="form-fields">Latitude:</p> <input type="text" name="latitude" value="<?php echo $latitude;?>">

<p class="form-fields">Longitude:</p> <input type="text" name="longitude" value="<?php echo $longitude;?>">

<p class="form-fields">Notes:</p> <input type="text" name="notes" value="<?php echo $notes;?>">

<div class="submit-wrap"><input type="submit" value="Submit" /></div>

</form>

</div>

<!-- End Form -->