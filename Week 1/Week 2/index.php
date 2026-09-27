<?php

// Question 1
echo "Question 1<br>";
echo "<b>Result:</b><br>";

$a = 10;
$b = 25;
$c = 15;

if ($a > $b && $a > $c) {
    $greatest = $a;
} elseif ($b > $a && $b > $c) {
    $greatest = $b;
} else {
    $greatest = $c;
}

if ($a < $b && $a < $c) {
    $smallest = $a;
} elseif ($b < $a && $b < $c) {
    $smallest = $b;
} else {
    $smallest = $c;
}

echo "Greatest number: $greatest <br>";
echo "Smallest number: $smallest <br><br>";


// Question 2
echo "Question 2<br>";
echo "<b>Result:</b><br>";

$num = 15;

if ($num % 3 == 0 && $num % 5 == 0) {
    echo "$num is divisible by both 3 and 5.<br>";
} elseif ($num % 3 == 0) {
    echo "$num is divisible by 3.<br>";
} elseif ($num % 5 == 0) {
    echo "$num is divisible by 5.<br>";
} else {
    echo "$num is not divisible by 3 or 5.<br>";
}

echo "<br>";


// Question 3
echo "Question 3<br>";
echo "<b>Result:</b><br>";

echo "Odd numbers from 2 to 20: ";

for ($i = 2; $i <= 20; $i++) {
    if ($i % 2 != 0) {
        echo "$i ";
    }
}

echo "<br>";

echo "Even numbers from 35 to 7: ";

for ($i = 35; $i >= 7; $i--) {
    if ($i % 2 == 0) {
        echo "$i ";
    }
}

echo "<br><br>";


// Question 4
echo "Question 4<br>";
echo "<b>Result:</b><br>";

echo "Numbers divisible by 2 and 5: ";

for ($i = 50; $i >= 2; $i--) {
    if ($i % 2 == 0 && $i % 5 == 0) {
        echo "$i ";
    }
}

echo "<br><br>";


// Question 5
echo "Question 5<br>";
echo "<b>Result:</b><br>";

$num = 12345;
$reverse = 0;

while ($num > 0) {
    $digit = $num % 10;
    $reverse = ($reverse * 10) + $digit;
    $num = intdiv($num, 10);
}

echo "Reversed number: $reverse<br><br>";


// Question 6
echo "Question 6<br>";
echo "<b>Result:</b><br>";

$a = 8;
$b = 12;

for ($i = 1; $i <= $a * $b; $i++) {
    if ($i % $a == 0 && $i % $b == 0) {
        $lcm = $i;
        break;
    }
}

echo "LCM of $a and $b = $lcm<br><br>";


// Question 7
echo "Question 7<br>";
echo "<b>Result:</b><br>";

$a = 18;
$b = 24;
$hcf = 1;

for ($i = 1; $i <= $a && $i <= $b; $i++) {
    if ($a % $i == 0 && $b % $i == 0) {
        $hcf = $i;
    }
}

echo "HCF of $a and $b = $hcf<br><br>";


// Question 8
echo "Question 8<br>";
echo "<b>Result:</b><br>";

echo "Multiplication Table<br>";

echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>";

for ($i = 1; $i <= 12; $i++) {

    echo "<tr>";

    for ($j = 1; $j <= 12; $j++) {

        echo "<td style='border:1px solid black; text-align:center;'>";
        echo $i * $j;
        echo "</td>";

    }

    echo "</tr>";
}

echo "</table>";

echo "<br><br>";


// Question 9
echo "Question 9<br>";
echo "<b>Result:</b><br>";

$num = 17;
$isPrime = true;

if ($num < 2) {
    $isPrime = false;
}

for ($i = 2; $i <= sqrt($num); $i++) {
    if ($num % $i == 0) {
        $isPrime = false;
        break;
    }
}

if ($isPrime) {
    echo "$num is a Prime number.<br><br>";
} else {
    echo "$num is a Non-Prime number.<br><br>";
}


// Question 10
echo "Question 10<br>";
echo "<b>Result:</b><br>";

echo "Prime numbers from 10 to 50: ";

for ($num = 10; $num <= 50; $num++) {

    $isPrime = true;

    for ($i = 2; $i <= sqrt($num); $i++) {

        if ($num % $i == 0) {
            $isPrime = false;
            break;
        }
    }

    if ($isPrime) {
        echo "$num ";
    }
}

?>