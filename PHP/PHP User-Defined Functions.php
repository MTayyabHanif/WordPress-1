<?php
// USER DEFINED FUNCTIONS
// Defining Functions 
// function names case insensitive (unlike variables)
// function names must start with letter or underscore + have no spaces
function_name($arg1, $arg2) { // argument 1 and 2 (can have more - just separate by comma)
	statement; // code associated with this name
}
?> 

<?php 
// Functions: defining
function say_hello () {
	echo "Hello Work!<br />"; // just defining function (not calling)
}

say_hello(); // calling function ^ - even if no arguments, we need the parentheses

function say_hello_to($word) { // defined function argument $word
echo "Hello {$word}! <br />"; // we can use $word because we defined the function argument above
}

say_hello_to("World"); // need to provide content for $word
// Outputs Hello World!
say_hello_to("Everyone"); // need to provide content for $word
// Outputs Hello Everyone!
say_hello_loudly();
// without function, we will get error

function say_hello_loudly() { // now we are defining the function after calling it
	echo "HELLO WORLD!<br />"; // PHP 4 and 5 pre-process the page so it doesn't matter the order
}
// Outputs HELLO WORLD!

// function say_hello_loudly() { // cannot redine a function
	// echo "We can't refine a function"; 
// }
// Outputs fatal error message
?>


<?php 
//Function Arguments 
function say_hello_to($word) { 
echo "Hello {$word}! <br />"; 
}

$name = "John Doe"; // defining string
say_hello_to($name); // referencing string defined above
// Outputs Hello John Doe! 

str_replace("quick", "super-fast", $third) // 3 arguments (used previously) - $third is string previously defined
// str_replace is already pre-defined in PHP
function str_replace($find, $replace, $target) { 
	// this is how we would define a new function and the 3 arguments (if not pre-defined)
	// order and number of arguments matters
}
?>

<?php 
//Function Arguments 
function better_hello($greeting, $target, $punct) {
	echo $greeting . "" . $target . $punct . "<br />";

	better_hello("Hello", $name, "!");
	// Output Hello John Doe!
	better_hello("Greetings", $name, "!!!");
	// Outputs Greetings John Doe!!!
	better_hello("Greetings", $name, null);
	// Outputs Greetings John Doe (converts null into string that is nothing)
}
?>

<?php
// Returning values from a function
	function add($val1, $val2) { // add function that takes two arguments 
		$sum = $val1 + $val2; // adds arguments together and assigns them to sum
		return $sum; // returns values from function
		// best practice with functions is to always have a return value
		// always want to return something from function
		// stops function (as break does for loop or switch)
		// section on PHP.net with return values, inputs and outputs
	}

$return1 = add(3,4); 
echo $results;
// Outputs 7
$results2 = add(5,$result1);
echo $result2;
//Outputs 12
?> 


<?php // Chinese Zodiac as a function
	function chinese_zodiac($year) {
		switch (($year - 4) % 12) {
			case 0: return 'Rat'; // before: case 0: 'Rat' break; - now return is the break
			case 1: return 'Ox';
			case 2: return 'Tiger';
			case 3: return 'Rabbit';
			case 4: return 'Dragon';
			case 5: return 'Snake';
			case 6: return 'Horse';
			case 7: return 'Goat';
			case 8: return 'Monkey';
			case 9: return 'Rooster';
			case 10: return 'Dog';
			case 11: return 'Pig';
		}
	}

	$zodiac = chinese_zodiac(2013);
	echo "2013 is the year of the {$zodiac}.<br />"
	//Outputs 2013 is the year of the Snake. 
	$zodiac = chinese_zodiac(2027);
	echo "2027 is the year of the " chinese_zodiac(2027) . "<br />"; // 2027 is the... and function 
	// Outputs 2027 is the year of the Goat. 
	?>


<?php
//Function Arguments 
function better_hello($greeting, $target, $punct) {
	return $greeting . " " . $target . $punct . "<br />";
}
echo better_hello("Hello", "John Doe", "!");  
// instead of echoing from inside that function, change to return
// much more flexibility
// better to keep echo statements outside of function and use return values
?>

<?php 
// Multiple Return Values
function add_subt($val1, $val2) {
	$add = $val1 + $val2;
	$subt = $val1 - $val2;
	// return $add; // return functions only allow us to return one thing
	// $result = add_subt(10,5); echo $result - Outputs 15 (just value of adding)
	return array($add, $subt); // arrays can return as many values as we'd like
}

$result_array = add_subt(10,5);
echo "Add: " . $result_array[0] . "<br />";
// Outputs Add: 15
echo "Subt: " . $result_array[1] . "<br />";
// Outputs Subt: 5

// use list to assign array values to variables
list($add_result, $subt_result) = add_subt(20,7); 
// allows us to take elements we just packaged up into an array
// and break down, unpack, and assign 2 variables easier to identify
echo "Add: " . $add_result . "<br />";
// Outputs Add: 27
echo "Subt: " . $subt_result . "<br />";
// Outputs Subt: 13

?>

<?php 
// Scope and Global Variables
// a variable created inside a function is by default only accessible
// in the function - we say that the function is the variable's scope
// two scopes in PHP - local and global
$bar = "outside"; // global scope
function foo () {
	$bar - "inside"; // local scope
}
echo "1: " . $bar . "<br />"; // looking at value of bar
foo(); // calling foo function, which is setting value of bar
echo "2: " . $bar . "<br />"; // then echoing it again
// Outputs 1: outside 2: outside (because $bar inside and outside are not the same)
// local scope variable is different than global scope variable 
?>

<?php 
$bar = "outside"; // global scope (changes below not to global but to local)
function foo ($bar) {
	global $bar; // creates window to access outside function 
	if (isset($bar)) { // alone, it only works if function is set
		echo "foo: " . $bar . "<br / >";
	}1
	$bar - "inside"; // local scope
}
echo "1: " . $bar . "<br />"; 
foo(); 
echo "2: " . $bar . "<br />"; // changes global scoped variable
//  Typically you prob won't use more than 3-5 variables that get declared as globals in most projects. 
// Just in some special cases of things that you need to bring in
// Most of the time you're going to want to use your arguments and return values instead

?>

<?php 
// User-defined functions
// Setting default argument values
function paint($color) {
return "The color of the room is {$color}.<br />";
}

echo paint("blue");
// Outputs The color of the room is blue. 
?> 

<?php 
// User-defined functions
// Setting default argument values
function paint($color="red") {
return "The color of the room is {$color}.<br />";
}

echo paint(); // since no value, inputs default value
// Outputs The color of the room is red. 
?> 

<?php 
// User-defined functions
// Setting default argument values
function paint($room="office",$color="red") {
return "The color of the {$room} is {$color}.<br />";
}

echo paint(); // since no value, inputs default value
// Outputs The color of the office is red. 
?> 

<?php 
// User-defined functions
// Setting default argument values
function paint($room="office",$color="red") {
return "The color of the {$room} is {$color}.<br />";
}

echo paint(); // since no value, inputs default value
echo paint("bedroom", "blue"); 
echo paint("bedroom", null); // when you say null, it will pass in nothing, not default.
echo paint("blue");
// Outputs The color of the office is red. 
// Also Outputs The color of the bedroom is blue.
// then Outputs  The color of the bedroom is .
// then Outputs  The color of the blue is red. (have to input first value)
// Argument order doesn't matter, as long as they match what's called (i.e., ($color="red",$room="office"))
?> 










