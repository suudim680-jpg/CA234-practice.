// controle_strcture.php 

<?php

$month = "March";

if ($month == "March")
    echo "It's Spring Time!";

echo "<br>";
$x = 5;
$y = 8;

if ($x > $y) {
    echo "$x is greater than $y";
}

if ($x < $y) {
    echo "$x is less than $y";
}

echo "<br>";
$mark = 45;

if ($mark >= 50)
echo "PASSED";
else
echo "FAILED";

echo "<br>";
$mark = 85;

if ($mark >= 90)
echo "Your grade is A";
elseif ($mark >= 80)
echo "Your grade is B";
else if ($mark >= 70)
echo "Your grade is C";
else if ($mark >= 60)
echo "Your grade is D";
else if ($mark >= 50)
echo "Your grade is E";
else
echo "Your grade is F";

echo "<br>";
$month = "jdfgkdfg";

switch ($month) {
    case "January":
    case "February":
    case "March":
        echo "It's Winter time!";
        break;
    case "April":
    case "May":
    case "June":
        echo "It's Spring time!";
        break;
    case "July":
        echo "It's Summer time!";
        break;
    default:
        echo "Invalid Month";
        break;
}

echo "<br>";
$page = "About";

switch ($page):
case "Home":
echo "You selected Home Page";
break;
case "About":
echo "You selected About Page";
break;
case "News":
echo "You selected News Page";
break;
case "Contact":
echo "You selected Contact Page";
break;
case "Contact":
echo "You selected Contact Page";
break;
default:
echo "Invalid Page";
endswitch;


echo "<br>";
$mark = 65;

switch ($mark) {
case ($mark >= 90):
echo "Your grade is A";
break;
case ($mark >= 80):
echo "Your grade is B";
break;
case ($mark >= 70):
echo "Your grade is C";
break;
case ($mark >= 60):
echo "Your grade is D";
break;
case ($mark >= 50):
echo "Your grade is E";
break;
default:
echo "Your grade is F";

}


echo "<br>";
$fuel = 1;

echo ($fuel <= 1) ? "Fill Tank Now" : "It's Enough Fuel";

echo "<br>";

$mark = 35;
$message = ($mark >= 50) ? "PASSED" : "FAILED";

echo $message


?>

// practice.php


<?php

$name = "Abdi Omar";
$age = 20;

$output = "My name is $name, I am $age years old";

echo $output;

echo "<br>";

echo "Good " . "Morning " . $name;

$message = "Good Morning";

echo "<br>";
echo "The Length of this String \"$message\" is " . strlen($message);

$message = "The Quick Brown Fox Jumps over the Lazy Dog";
echo "<br>";
echo "Total Words \"$message\" = " . str_word_count($message);
echo "<br>";
echo "The position [7] is " . $message[7];
echo "<br>";
echo "Search Word \"fox\" " . strpos($message, "word");
echo "<br>";
// echo strpos($message, "word");

echo "Replace Dog to Cat: " . str_replace("Dog", "Cat", $message);


define("PI", 3.14);
$radius = 6;
echo "<br>";
$area = PI * $radius * $radius;

echo "The Area of Circle: ", $area;


$age = 14;
echo "<br>";
($age > 18) ? print "Adult" : print "Child";
echo "<br>";
echo ($age > 18) ? "Adult" : "Child";


$x = 5;
$y = 4;
echo "<br>";
// echo $x++;
echo ++$x;


echo "<br>";
echo $x > $y ? "$x is greater $y" : "$x is less than $y";

echo "<br>";
echo "The result is ", 1 + 5 * 3 - (6/2) > 10 && 5 < 3 || !(6 < 8);

echo false;

?>



//loop.php

<?php

$count = 1;

while ($count <= 15) {

    echo "$count, ";
    $count++;

}

echo "<br>";

$i = 1;

while ($i <= 12) {
    echo "12 * $i = " . 12 * $i . "<br>";
    $i++;
}

echo "<br>";

$week = 3;
$day = 7;

for ($i = 1; $i <= $week; $i++) {

    echo "Week $i: <br>";

    for ($j = 1; $j <= $day; $j++) {
        echo "&nbsp; &nbsp;Day $j <br>";
    }

}



?>



index.php


<h1>Welcome to PHP Practice</h1>

Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus quis dolorem doloribus sequi est corrupti optio? Vitae fugiat earum non blanditiis cum quae repudiandae magnam tempore, quis amet voluptas. Minus.
<br>

<?php
// Echo and Print
echo ("This is echo Statement");
echo "<br>";
print ("This is print Statement <br>");
echo "This Echo is without Parentheses";
echo "<br>";

echo "This is an output ", " Two Parameters using echo";
// print "This is an output ", "Two Parameters using print"; Error

echo "<br>";

$x = 5;
$y = 4;

($x < $y) ? print "$x is less than $y" : print "$x is greater than $y";
// ($x < $y) ? echo "$x is less than $y" : echo "$x is greater than $y";

echo "<br>";
$x = 5;
echo "This is the value of $x <br>";
echo 'This is the value of $x';
echo "<br>";

$a = 4;
$b = 5;
$c = $a + $b;

echo "Total of $a and $b = $c";
echo "<br>";
echo 'Total of $a and $b = $c';

// echo `Total of $a and $b = $c`;

$student_number = 200;
$name = "Omar Ali";
$single = true;
$salary = 10.5;

echo "<br>";
Echo "Student Number: $student_number <br>";
Echo "Student name: $name <br>";
Echo "Student single: $single <br>";
Echo "Student salary: $salary <br>";

// echo var_dump($student_number);

Echo "Student Number:", var_dump($student_number), "<br>";
Echo "Student name:", var_dump($name), "<br>";
Echo "Student single:", var_dump($single), "<br>";
Echo "Student salary:", var_dump($salary), "<br>";
?>


// Array.php


<?php

// Creating array using array() function
$fruits = array ("Apple", "Orange", "Banana");

print_r($fruits);
echo "<br>";
echo $fruits[0] . " " .  $fruits[1] . " " . $fruits[2];
echo "<br>";
var_dump($fruits);

echo "<br>";

// Creating array manual indexing
$cities[0] = "Mogadishu";
$cities[1] = "Hargeisa";
$cities[2] = "Kismayo";
$cities[5] = "Bosaso";

print_r($cities);

echo "<br>";
echo "Index of 5: ", $cities[5];

echo "<br>";

// Creating array without explicit location 
$cars[] = 'Mecedes Benz';
$cars[] = 'Hilux';
$cars[] = 'BMW';
$cars[] = 'Toyoto';
$cars[] = 'Nissan';
var_dump($cars);

echo "<br>";

// Array with different type of values
$student_info = array (
    "101",
    "Mohamed Abdi Ali",
    20,
    "single",
    161.5
);

var_dump($student_info);
print_r($student_info);

echo "<br>";
echo "<br>";

// Printing Array using For Loop
for ($i = 0; $i < count($fruits); $i++) {
    echo "$fruits[$i], ";
}

echo "<br>";

// Printing Array using Foreach Loop
foreach ($cars as $car) {
    echo "$car, ";
}

echo "<br>";

foreach ($student_info as $value) {
    echo "$value <br>";
}

echo "<br>";

// Calculating sum of Array elements
$numbers = array (26, 11, 13, -4, 14, 17, 5 , 52, 7, 9,  21,  32, 2, 4, 5);

$total = 0;
foreach ($numbers as $n) {
    $total += $n;
}

echo "The Total numbers is ", $total;

echo "<br>";

// Creating Arrays by adding the two arrays
$array1 = array (1, 2, 3, 4, 5);
$array2 = array (6, 7, 8, 9, 10);

for ($i = 0; $i < count($array1); $i++)
	$array3[$i] = $array1[$i] + $array2[$i];

//printing the new array
echo "Array elements are:<br>";
foreach ($array3 as $item)
	echo ("$item, ");

echo "<br>";
echo "<br>";

// Associative Array

$student_info = array (
    "id" => 101,
    "name" => "Mohamed Abdi Ali",
    "age" => 20,
    "address" => "Hodan District",
    "status" => "single",
    "weight" => 161.5
);


print_r ($student_info);

echo "<br>";
foreach ($student_info as $value) {
    echo "$value, ";
}

echo "<br>";

foreach($student_info as $key => $value) {
    echo "$key : $value <br>";
}

?>


// assoc_array.php


<?php 

// Creating Associative Array using array() function

$student_info = array (
    "id" => 101,
    "name" => "Mohamed Abdi Ali",
    "age" => 20,
    "address" => "Hodan District",
    "status" => "single",
    "weight" => 61.5
);

print_r ($student_info);

echo "<br>";

echo $student_info['address'];

echo "<br>";

// Creating Associative Array using manual indexing
$student_info["id"] = 101;
$student_info["name"] = "Mohamed Abdi Ali";
$student_info["age"] = 20;
$student_info["address"] = "Hodan District";
$student_info["status"] = "single";
$student_info["weight"] = 61.5;

print_r ($student_info);

echo "<br>";

foreach($student_info as $value) {
    echo "$value, ";
}

echo "<br>";

foreach($student_info as $key => $value) {
    echo "$key: $value <br>";
}

// Two Dimensional Array

$students = array (
    array (101, "Mohamed", 20, "single"),
    array (102, "Abdi", 30, "single"),
    array (103, "Jamac", 33, "married"),
    array (104, "Amina", 40, "single"),
    array (105, "Farah", 50, "married")
);

print_r($students);

echo "<br>";

echo $students[2][1]; // Display Jaamac

echo "<br>";

echo $students[3][4]; // Display 40

echo "<br>";

foreach ($students as $info) {
    foreach ($info as $value) {
        echo "$value, ";
    }
    echo "<br>";
}

$students = array (
    array ("id"=>101, "name"=>"Mohamed", "age"=>20, "status"=>"single"),
    array ("id"=>102, "name"=>"Abdi", "age"=>30, "status"=>"single"),
    array ("id"=>103, "name"=>"Jamac", "age"=>33, "status"=>"married"),
    array ("id"=>104, "name"=>"Amina", "age"=>40, "status"=>"single"),
    array ("id"=>105, "name"=>"Farah", "age"=>50, "status"=>"married")
);

echo "<br>";

echo $students[2]["name"]; // Display Jaamac

echo "<br>";

echo $students[3]["age"]; // Display 40

echo "<br>";

foreach ($students as $info) {
    foreach ($info as $key => $value) {
        echo "$key : $value ";
    }
    echo "<br>";
}



?>

Jamhuriya university of science & technology.php



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

echo "<h1>Jamhuriya University of Science & Technology</h1>";

echo "<h2>About Information</h2>";

echo "<p>
Jamhuriya University of Science and Technology (JUST) is a private
institution and was officially established in Mogadishu, Somalia,
in 2011 by a group of somalia schooles and intellectuals to fill the existing vacuum (in the quality)
in the higher education system in somalia by providing higher education of international standards.
</p>";

echo "<h2>Contact Information</h2>";

echo "<p><b>Email:</b> info@just.edu.so</p>";
echo "<p><b>Phone:</b> +252 612 223999</p>";
echo "<p><b>Address:</b> Digfeer Street, Hodan District</p>";
echo "<p><b>Website:</b> just.edu.so</p>";

?>
    
</body>
</html>