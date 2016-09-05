<!-- OLD LYNX MYSQL FILES -->

<!-- START OF OLD lynx-everything-mysql.php FILE -->

<?php
// Defining constants: 
// like a variable with a larger scope
/*define('DB_NAME', 'lynxstudy'); // name of constant and value
define('DB_USER', 'dallashuggins');
define('DB_PASSWORD', 'nirvana1');
define('DB_HOST', 'mysql.dallashuggins.com');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD); // connect to host (MySQL connect)

if (!$link) { // if doesn't connect display: 
	die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $link); // select database to access 

if (!$db_selected) { // if no database is found display: 
	die('Can\'t use ' . DB_NAME . ': ' . mysql_error());
}

echo 'Connected successfully'; // checks if connects successfully

$value = $_POST['upload_image']; // upload image 
$value2 = $_POST['upload_map']; 
$value3 = $_POST['city']; 
$value4 = $_POST['state']; 
$value5 = $_POST['latitude']; 
$value6 = $_POST['longitude'];
$value7 = $_POST['notes'];  
// information put in text box will be passed to this page
// then PHP will retrieve value, store it in these variables
// then variables will be put in statement to put in database

$sql = "INSERT INTO everything_lynx (upload_image, upload_map, city, state, latitude, longitude, notes) VALUES ('$value', '$value2', 'value3', 'value4', 'value5', 'value6', 'value7')"; 


if (!mysql_query($sql)) { // error check to see if MySQL query went through
	die('Error: ' . mysql_error());
}
mysql_close(); // close connection to MySQL
*/?>

<!-- END OF OLD lynx-everything-mysql.php FILE -->


<!-- START OF OLD lynx-location-mysql.php FILE -->

<?php

// Defining constants: 
// like a variable with a larger scope
/*define('DB_NAME', 'lynxstudy'); // name of constant and value
define('DB_USER', 'dallashuggins');
define('DB_PASSWORD', 'nirvana1');
define('DB_HOST', 'mysql.dallashuggins.com');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD); // connect to host (MySQL connect)

if (!$link) { // if doesn't connect display: 
	die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $link); // select database to access 

if (!$db_selected) { // if no database is found display: 
	die('Can\'t use ' . DB_NAME . ': ' . mysql_error());
}

echo 'Connected successfully'; // checks if connects successfully

$value = $_POST['city']; // city 
$value2 = $_POST['state']; 
$value3 = $_POST['latitude']; 
$value4 = $_POST['longitude']; 
// information put in text box will be passed to this page
// then PHP will retrieve value, store it in these variables
// then variables will be put in statement to put in database

$sql = "INSERT INTO location_lynx (city, state, latitude, longitude) VALUES ('$value', '$value2', 'value3', 'value4')"; 


if (!mysql_query($sql)) { // error check to see if MySQL query went through
	die('Error: ' . mysql_error());
}

mysql_close(); // close connection to MySQL
*/?>



<!-- START OF OLD lynx-upload-mysql.php FILE -->

<?php

// Defining constants: 
// like a variable with a larger scope
/*define('DB_NAME', 'lynxstudy'); // name of constant and value
define('DB_USER', 'dallashuggins');
define('DB_PASSWORD', 'nirvana1');
define('DB_HOST', 'mysql.dallashuggins.com');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD); // connect to host (MySQL connect)

if (!$link) { // if doesn't connect display: 
	die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db(DB_NAME, $link); // select database to access 

if (!$db_selected) { // if no database is found display: 
	die('Can\'t use ' . DB_NAME . ': ' . mysql_error());
}

echo 'Connected successfully'; // checks if connects successfully

$value = $_POST['upload']; // upload
$value2 = $_POST['name']; // upload name
// information put in text box will be passed to this page
// then PHP will retrieve value, store it in these variables
// then variables will be put in statement to put in database

$sql = "INSERT INTO upload_lynx (upload, name) VALUES ('$value', '$value2')"; 


if (!mysql_query($sql)) { // error check to see if MySQL query went through
	die('Error: ' . mysql_error());
}

mysql_close(); // close connection to MySQL
*/?>

<!-- END OF OLD lynx-upload-mysql.php FILE -->


<!-- START OF OLD lynx-username-mysql.php FILE -->

<?php
/*$mysqli = new mysqli("localhost", "db_user", "db_password", "db_name");
if (mysqli_connect_error()) { echo mysqli_connect_error(); exit; } 
// catches connection errors

// The (?,?,?) below are parameter markers used for variable binding
$sql = "INSERT INTO people (username, gender, country) VALUES (?,?,?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $u, $g, $c); // bind variables
// sss = string string string (how many strings you are using / if 5 = sssss)

$u = 'Anton';
$g = 'm';
$c = 'Sweden';
$stmt->execute(); // execute the prepared statement

$u = 'Tanya';
$g = 'f';
$c = 'Serbia';
$stmt->execute(); // execute the prepared statement again

$stmt->close(); // close the prepared statement
$mysqli->close(); // close the database connection
*/?>
<!-- END OF OLD lynx-username-mysql.php FILE -->





