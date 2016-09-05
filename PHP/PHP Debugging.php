<?php 
// Debugging
// Common Problems

// Common Problems
// No outputs / no info to go on 
// First thing should do: access basic HTML page (make sure web server running)
// Second: try to access a PHP page - see if we can get the web server to process PHP
// ... confirms PHP is working & gives configuration info
// Third: once we know web server is running & finding files in right place, problem is in code
// Make sure display errors is on and configured

// First & most common: typos - comb over code
// - Missing semicolon at end of line (tells when one command ends and starts)
// - Missing closing brace: } ) ] 
// - Missing closing quote: "" ''
// - Case sensitive variable names $myvar vs. $myVar
// - Confusing = with == 
//    * if ($count = 3) { ... }
//    ** assigning 3 value to count, instead of checking it 

?>

<?php 
// Warnings and Errors 

// Turn on error reporting
// First way: in php.ini 
display_error = On
error_reporting = E_ALL

// Second way: in PHP code
// -  PHP.ini file might not have the settings we want customized for out little bit of code 
// In that case use: 
ini_set('display_errors', 'On'); // set value as if had been set in php.ini file
error_reporting(E_ALL); // set error reporting using error reporting function
// 'On' is a string, E_ALL is a constant (no quotes) 

// E_STRICT added in PHP 5
// but not in E_ALL until PHP 5.4
error_reporting(E_ALL | E_STRICT);

// Use ~ for "omit"
error_reporting(E_ALL & ~E_DEPRECATED);

//return the current level
error_reporting();






?> 







