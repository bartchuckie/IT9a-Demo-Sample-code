<?php 

//String
$name = "Jhun";

//Integer
$age = 21;

///Float (Double)
$price = 99.99;

//Boolean
$isAdmin = true;

//Array
$colors = array("Red", "Blue", "Green");

//NULL
$var = NULL;

?>

<?php
$name = "Ana";
$age = 20;
$grade = 89.5;
$isPassed = true;

echo "Name: $name <br>";
echo "Age: $age <br>";
echo "Grade: $grade <br>";
echo "Passed: $isPassed";
?>

<?php

//Arithmetic Expressions
$a = 10;
$b = 5;

echo $a + $b;  // Addition
echo $a - $b;  // Subtraction
echo $a * $b;  // Multiplication
echo $a / $b;  // Division

//Comparison Expressions
$a = 10;
$b = 5;

var_dump($a > $b);  // true
var_dump($a == $b); // false


//Logical Expressions
$age = 18;

if ($age >= 18 && $age <= 25) {
    echo "College Student";
}

/*
&& AND

|| OR

! NOT
*/
?>

//Var Dump
<?php

$name = "Jhun";
var_dump($name);

$age = 21;
var_dump($age);

$isAdmin = true;
var_dump($isAdmin);

$colors = array("Red", "Blue", "Green");
var_dump($colors);

?>

<?php
for ($i = 1; $i <= 5; $i++) {
    echo "Number: $i <br>";
}
//Structure: for (initialization; condition; increment)
?>

<?php
$i = 1;

while ($i <= 5) {
    echo "Number: $i <br>";
    $i++;
}
?>

<?php
$i = 1;

do {
    echo "Number: $i <br>";
    $i++;
} while ($i <= 5);
?>


<?php
$colors = array("Red", "Blue", "Green");
//or
$colors = ["Red", "Blue", "Green"];

echo $colors[0]; // Red
?>

<?php
//Associative Array
$student = [
    "name" => "Ana",
    "age" => 20,
    "course" => "IT"
];

echo $student["name"]; // Ana
?>

<?php 

$users = [
    [
        "username" => "PixelWizard",
        "age"      => 28,
        "is_pro"   => true
    ],
    [
        "username" => "CodeMaster",
        "age"      => 34,
        "is_pro"   => false
    ],
    [
        "username" => "ByteSize",
        "age"      => 22,
        "is_pro"   => true
    ],
];

echo $users[1]['username']; // Output: PixelWizard
echo "<br>";
echo $users[1]['age'];      // Output: 34   

?>