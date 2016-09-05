<?php
//  WHILE LOOPS
	$count = 0; 
	while ($count <= 10) {
		if ($count == 5) {
			echo "FIVE, "; // text will say FIVE, instead of 5
		} else {
			echo $count . ", "; // lists count list separated by commas
		}
		$count++; // increment by 1 
	}
	echo "<br />";
	echo "Count: {$count}";
?>

<?php // WHILE LOOPS example
	$count = 0;
	while ($count <= 10) {
		echo $count . ", ";
		$count++;
	}
?>

<?php // FOR LOOPS - same function as above, reference to similarities
	for($count = 0; $count <= 10; $count++) { 
	// count++ = count up / count-- = count down
		echo $count . ", "; 
		// what we want to do each time we loop
}
?>

<?php
// FOR LOOPS
// expr1 is executed the first time only - initializing statement before loop starts
// expr2 is the test expression that's going to be checked at the start of each loop
// expr3 is going to be executed at the end of every loop
	for (expr1; expr2; expr3) { 
		statement;
	}
//AKA (or): 
	for (initial; test; each){
		statement;
	}
?>

<?php 
// FOR LOOPS
// Module Operator = $count % 2 -divides count by 2 and gets remainder
// % = modulo 
	for ($count = 20; $count > 0; $count--) { // count up to 20, when # is more than 0, count down
		if ($count % 2 == 0) { // if number is divided by 2, there will be a 0 remainder aka it's an even #
			echo "{count} is even. <br />"; // when # is even, echo this statement
			} else { // otherwise, 
			echo "{$count} is odd <br />"; // (if odd) echo this statement
			}
		}

?>

<?php
// FOREACH LOOPS
// then in parentheses theres a special statement:
	// an array we're looping through - already established value
	// and then special keyword - value just being defined now
// no condition and no method for incrementing (like for and while loops)
	// condition - when gets to end of array
	// no incrementing because when it gets to bottom, it'll know what to do - goes to next item in array

	foreach ($array as $value){
		statement;
	}

?>

<?php
// FOREACH LOOPS
$ages = array(4,8,15,16,23,42); // $ages already defined
foreach($ages as $age) { // $age new value
	echo "Age:{$age}<br />";
}
// Will show as:
	// Age: 4
	// Age: 8 ... and so on
?>


<?php
// FOREACH LOOPS using an associative array
	foreach ($array as $key => $value) { // key and value needs to be assigned
		statement;
	}
?>

<?php
// FOREACH LOOPS using an associative array
	$person = array (
			"first_name" => "Dallas",
			"last_name" => "Huggins", 
			"address" => "3573 Purley Ln.",
			"city" => "Concord",
			"state" => "CA",
			"zip_code" => "94519",
	);
	foreach($person as $attribute => $data){ 
	// saying for each item in 'person', assign them to variable 'attribute' and 'data' 
		$attr_nice = ucwords(str_replace("_", " ", $attribute));
		// ucwords = uppercase words / str_replace = string replace
		// clean attributes (with underscores and lowercase) 
		// by removing underscores and uppercasing first words- called that attribute '$attr_nice'
		echo "{attr_nice}: {$data}<br />"; // outputting those variables
	}
?>

<?php 
// FOREACH LOOPS using an associative array
$prices = array("Brand New Computer" => 2000, 
				"1 month Lynda.com" => 25,
				"Learning PHP" => null);
foreach($prices as $item => $price) { // i.e., $item is "Brand New Computer" and $price = 2000
	echo "{item}: "; // output item names
	if (is_int($price)) { // if it is an integer, 
		echo "$" . $price; // add a dollar sign and then price variable
	} else {
		echo "priceless"; // if not an integer, output 'priceless'
	}
	echo "<br />"; // outputs break
}
?>

<?php 
// CONTINUE function 
// Skip to next one 
 for ($count=0; $count <= 10; $count++) { // when $count is equal to or less than 10, count up
 	if ($count == 5) { // if count is equal to 5, 
 		continue; // continue tells it to immediately loop
 		// increments the counter to 6 
 	}
 	echo $count . ", "; // comma separated values
 }
 // outputs as: '0,1,2,3,4,6,7,8,9,10' - when 5, stop and continue at next value

//OR
 for ($count=0; $count <= 10; $count++) { // when $count is equal to or less than 10, count up
 	if ($count % 2 == 0) { // if count is even,
 		continue; // continue tells it to immediately loop (skip over)
 		// increments the counter to next #
 	}
 	echo $count . ", "; // comma separated values
 }
 // outputs as: '1,3,5,7,9' - outputs odd numbers
?>

<?php
// CONTINUE function 
$count = 0;
while ($count <= 10) {
	if ($count == 5) {
		$count++; //increment before loop - cannot have after continue, will be stuck in infinite loop
		continue;
	}
	echo $count . ",";
}
?>

<?php //CONTINUE function - loop inside a loop with continue
	for($i=0; $i<=5; $i++) { // i is counting from 0 to 5, upwards
		if ($i % 2 == 0) { // if an even number, 
			continue; // skip 
		}
	for ($k=0; $k<=5; $k++) { // k is counting from 0 to 5 upwards
		echo $i . "-" . $k . "<br />"; // outputs $i dash (-) $k and break
		}
	}
	// Output: 
	// 1,3,5,6,9,0,1,2,3,4,6,7,8,9,10,
	// 1.0 1-1 1-2 1-3 1-4 1-5
	// 3.0 3.1 3.2 3.3 3.4 3.5 
	// 5-0 ...
?>

<?php //CONTINUE function - loop inside a loop with continue
	for($i=0; $i<=5; $i++) { // i is counting from 0 to 5, upwards
		if ($i % 2 == 0) { // if an even number, 
			continue (1); // skip  - default value is 1
		}
	for ($k=0; $k<=5; $k++) { // k is counting from 0 to 5 upwards
		if ($k == 3) { // if k is 3, skip
			continue (2); // default value is 1 - instead of skipping 1, skip 2
		}
		echo $i . "-" . $k . "<br />"; // outputs $i dash (-) $k and break
		}
	}
?>

<?php 
// BREAK function
// Break will end execution of a loop
for ($count=0; $count<= 10; $count++) {
	if ($count == 5) {
		break; // breaks loop
	}
	echo $count . ", ";
}
// Outputs: 
// 0, 1, 2, 3, 4, 
?>

<?php //BREAK function - loop inside a loop with break
	for($i=0; $i<=5; $i++) { // i is counting from 0 to 5, upwards
		if ($i % 2 == 0) { // if an even number, 
			continue (1); // skip  - default value is 1
		}
	for ($k=0; $k<=5; $k++) { // k is counting from 0 to 5 upwards
		if ($k == 3) { // if k is 3, skip
			break (2); // breaks sequence - default is 1, 2 will break 2 loops
			// break (1) only breaks current loop 
			// since it's a loop inside a loop, you'd need break (2) 
		}
		echo $i . "-" . $k . "<br />"; // outputs $i dash (-) $k and break
		}
	}
?>

<?php 
// UNDERSTANDING ARRAY POINTERS 
// PHP maintains pointer that points to one of the items in an array 
// That item is referred to as the 'current item' 

// By default, that's always the first item in array 
// When we start looping through arrays using something like Foreach, 
// PHP moves the pointer down the array as it assigns each value to the loop's variable. 
// Moving the pointer to the next value is how PHP keeps track of which item you're working with now 
// and what the next item is that it should give you after that.

$ages = array(4,8,15,16,23,42)
// current: current pointer value
echo "1:" . current($ages) . "<br />";
// Outputs 1:4

// next: move the pointer forward
// similar to using 'continue' inside a loop
next($ages);
echo "2: " . current($ages) . "<br / >";
// Output 2:8

next($ages);
next($ages); // 2 advancing points
echo "3: " . current($ages) . "<br />"; 
// Output 3:16 

prev($ages);
echo "4: " . current($ages) . "<br />"; 
// Outputs 4:15

// reset: move the pointer to the first element 
reset($ages);
echo "5: " . current($ages) . "<br />"; 
// Outputs 5:4

// end: move the pointer to the last element 
end($ages);
echo "6: " . current($ages) . "<br />"; 
// Outputs 6:42

// next: move the pointer past the last element 
next($ages);
echo "7: " . current($ages) . "<br />"; 
// Outputs 7: 

?>

<?php 
// while loop that moves the array pointer
// similar to foreach 
reset($ages); // resets (currently at null from previous)
while($age = current($ages)) { 
// single equal sign means assignment, not comparison (==)
// we are assigning a value from $current to $age
// We're saying: get the item the array pointer points to, assign it to $age
	// if it is an item, then execute the loop / if not, exit the loop
	echo $age . ", "; // now testing it to see if the assignment was successful (comma separated values)
	next ($ages); // points pointer to next item, to loop different value
}
// So as I said, this is how foreach works - so why not just use for each step? 
// This is an important technique because when we start working with databases, 
// we are going to use something very similar.
// We'll retrieve many rows of data from a database table as an array
// and then move through each row, advancing the pointer as we go. 
// Can't use foreach for this since database pointers aren't exactly the same as array pointers. 
// They are similar, but not the same. 
// And the database pointers are going to be moved by the database driver. 
// Each time that we request a row and each time we do this assignment here,
// it's going to increment the pointer as soon as it finishes making that assignment. 
// Foreach and next won't be able to move those database pointers.
?>







