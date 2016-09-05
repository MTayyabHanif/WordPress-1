<?php
$db_user = 'dallashuggins';
$db_pass = 'nirvana1';
$db_name = 'lynxstudy';
$db_host = 'mysql.dallashuggins.com';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// defining variables
$upload_image = $_POST['upload_image']; // upload image 
$upload_map = $_POST['upload_map']; 
$city = $_POST['city']; 
$state = $_POST['state']; 
$longitude = $_POST['latitude']; 
$longitude = $_POST['longitude'];
$notes = $_POST['notes'];  

// Insert query
    $qry_insertlocation = "INSERT INTO everything_lynx (upload_image, upload_map, city, state, latitude, longitude, notes) VALUES (?,?,?,?,?,?,?)";

// prepares statement, if not correct it will fail
    if (!($stmt = $mysqli->prepare($qry_insertlocation))) { // error check
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }

// assigns $ marks 
    $stmt->bind_param("sssssss", $upload_image, $upload_map, $city, $state, $latitude, $longitude, $notes);
    $stmt->execute();
    $stmt->store_result();

    header("Location: http://www.trackingfelids.com/canadian-lynx/success");
    /* Redirect browser */
	exit;
  ob_end_flush();
?>