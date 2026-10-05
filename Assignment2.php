<!DOCTYPE html>
<html>
<head>
    <title>PHP Assignment 2</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
        }

        h2 {
            background-color: #333;
            color: white;
            padding: 10px;
        }

        table {
            border-collapse: collapse;
            margin: 15px 0 30px 0;
            background-color: white;
        }

        th, td {
            border: 1px solid black;
            padding: 8px 15px;
            text-align: center;
        }

        th {
            background-color: #ddd;
        }

        .result {
            margin: 10px 0;
            font-weight: bold;
        }
    </style>
</head>

<body>

<h1>PHP Assignment 2</h1>


<!-- ==================== QUESTION 1 ==================== -->

<h2>Question 1</h2>

<?php

// 1. Declare and initialize one-dimensional array
$array = array(5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9);


// 2. Print all elements
echo "<h3>All Elements</h3>";

echo "<table>";
echo "<tr>";

foreach ($array as $value) {
    echo "<td>$value</td>";
}

echo "</tr>";
echo "</table>";


// 3. Calculate total of all elements
$total = 0;

foreach ($array as $value) {
    $total += $value;
}

echo "<div class='result'>Total of all elements = $total</div>";


// 4. Calculate total of even elements
$evenTotal = 0;

foreach ($array as $value) {
    if ($value % 2 == 0) {
        $evenTotal += $value;
    }
}

echo "<div class='result'>Total of even elements = $evenTotal</div>";


// 5. Calculate total of odd elements
$oddTotal = 0;

foreach ($array as $value) {
    if ($value % 2 != 0) {
        $oddTotal += $value;
    }
}

echo "<div class='result'>Total of odd elements = $oddTotal</div>";


// 6. Find minimum element and its positions
$min = min($array);

echo "<div class='result'>Minimum element = $min</div>";

echo "Minimum positions: ";

foreach ($array as $index => $value) {
    if ($value == $min) {
        echo $index . " ";
    }
}


// 7. Find maximum element and its positions
$max = max($array);

echo "<div class='result'>Maximum element = $max</div>";

echo "Maximum positions: ";

foreach ($array as $index => $value) {
    if ($value == $max) {
        echo $index . " ";
    }
}

?>


<!-- ==================== QUESTION 2 ==================== -->

<h2>Question 2</h2>

<?php

// Declare two-dimensional associative array
$colors = array(

    "Light" => array(
        "Red" => "Light Red",
        "Green" => "Light Green",
        "Blue" => "Light Blue"
    ),

    "Normal" => array(
        "Red" => "Normal Red",
        "Green" => "Normal Green",
        "Blue" => "Normal Blue"
    ),

    "Dark" => array(
        "Red" => "Dark Red",
        "Green" => "Dark Green",
        "Blue" => "Dark Blue"
    )
);


// Print array as table
echo "<table>";

echo "<tr>";
echo "<th></th>";
echo "<th>Red</th>";
echo "<th>Green</th>";
echo "<th>Blue</th>";
echo "</tr>";

foreach ($colors as $rowName => $columns) {

    echo "<tr>";

    echo "<th>$rowName</th>";

    foreach ($columns as $value) {
        echo "<td>$value</td>";
    }

    echo "</tr>";
}

echo "</table>";

?>


<!-- ==================== QUESTION 3 ==================== -->

<h2>Question 3</h2>

<?php

// 1. Declare and initialize square 2D array
$squareArray = array(
    array(2, -6, 8),
    array(-6, 1, 6),
    array(7, 8, -6)
);


// 2. Print all elements
echo "<h3>Square Array</h3>";

echo "<table>";

foreach ($squareArray as $row) {

    echo "<tr>";

    foreach ($row as $value) {
        echo "<td>$value</td>";
    }

    echo "</tr>";
}

echo "</table>";


// 3. Total of odd elements
$oddTotal3 = 0;

foreach ($squareArray as $row) {

    foreach ($row as $value) {

        if ($value % 2 != 0) {
            $oddTotal3 += $value;
        }

    }
}

echo "<div class='result'>Total of odd elements = $oddTotal3</div>";


// 4. Total of even elements
$evenTotal3 = 0;

foreach ($squareArray as $row) {

    foreach ($row as $value) {

        if ($value % 2 == 0) {
            $evenTotal3 += $value;
        }

    }
}

echo "<div class='result'>Total of even elements = $evenTotal3</div>";


// 5. Total of each row
echo "<h3>Total of Each Row</h3>";

foreach ($squareArray as $index => $row) {

    $rowTotal = 0;

    foreach ($row as $value) {
        $rowTotal += $value;
    }

    echo "<div class='result'>";
    echo "Row " . ($index + 1) . " total = $rowTotal";
    echo "</div>";
}


// 6. Total of each column
echo "<h3>Total of Each Column</h3>";

for ($column = 0; $column < 3; $column++) {

    $columnTotal = 0;

    for ($row = 0; $row < 3; $row++) {

        $columnTotal += $squareArray[$row][$column];

    }

    echo "<div class='result'>";
    echo "Column " . ($column + 1) . " total = $columnTotal";
    echo "</div>";
}


// 7. Total of each diagonal

// Main diagonal
$mainDiagonal = 0;

for ($i = 0; $i < 3; $i++) {

    $mainDiagonal += $squareArray[$i][$i];

}


// Second diagonal
$secondDiagonal = 0;

for ($i = 0; $i < 3; $i++) {

    $secondDiagonal += $squareArray[$i][2 - $i];

}

echo "<div class='result'>";
echo "Main diagonal total = $mainDiagonal";
echo "</div>";

echo "<div class='result'>";
echo "Second diagonal total = $secondDiagonal";
echo "</div>";


// 8. Total of all elements
$allTotal = 0;

foreach ($squareArray as $row) {

    foreach ($row as $value) {

        $allTotal += $value;

    }
}

echo "<div class='result'>";
echo "Total of all elements = $allTotal";
echo "</div>";


// 9. Find minimum element and positions
$min3 = $squareArray[0][0];

foreach ($squareArray as $row) {

    foreach ($row as $value) {

        if ($value < $min3) {
            $min3 = $value;
        }

    }
}

echo "<div class='result'>";
echo "Minimum element = $min3";
echo "</div>";

echo "Minimum positions: ";

for ($i = 0; $i < 3; $i++) {

    for ($j = 0; $j < 3; $j++) {

        if ($squareArray[$i][$j] == $min3) {

            echo "(" . ($i + 1) . "," . ($j + 1) . ") ";

        }

    }
}


// 10. Find maximum element and positions
$max3 = $squareArray[0][0];

foreach ($squareArray as $row) {

    foreach ($row as $value) {

        if ($value > $max3) {
            $max3 = $value;
        }

    }
}

echo "<div class='result'>";
echo "Maximum element = $max3";
echo "</div>";

echo "Maximum positions: ";

for ($i = 0; $i < 3; $i++) {

    for ($j = 0; $j < 3; $j++) {

        if ($squareArray[$i][$j] == $max3) {

            echo "(" . ($i + 1) . "," . ($j + 1) . ") ";

        }

    }
}

?>


<!-- ==================== QUESTION 4 ==================== -->

<h2>Question 4</h2>

<?php

// Declare two-dimensional associative array
$students = array(

    "CA221" => array(
        "Name" => "Mohamed Ahmed Ali",
        "Phone" => "0648440403",
        "Address" => "Laba Dhagax, Wardhiigley"
    ),

    "CA223" => array(
        "Name" => "Ahmed Abdi Jama",
        "Phone" => "0647223201",
        "Address" => "Taleex, Hodan"
    ),

    "CA221_2" => array(
        "Name" => "Amina Nur Adan",
        "Phone" => "0646990276",
        "Address" => "Macmacaanka, Dharkeynley"
    )

);


// Print student information
echo "<table>";

echo "<tr>";
echo "<th>Student</th>";
echo "<th>Name</th>";
echo "<th>Phone</th>";
echo "<th>Address</th>";
echo "</tr>";

foreach ($students as $studentID => $student) {

    echo "<tr>";

    echo "<td>$studentID</td>";
    echo "<td>" . $student["Name"] . "</td>";
    echo "<td>" . $student["Phone"] . "</td>";
    echo "<td>" . $student["Address"] . "</td>";

    echo "</tr>";
}

echo "</table>";

?>


<!-- ==================== QUESTION 5 ==================== -->

<h2>Question 5</h2>

<?php

// Declare student transcript array
$transcript = array(

    "Semester 1" => array(

        "subject1" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ),

        "subject2" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ),

        "subject3" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        )

    ),

    "Semester 2" => array(

        "subject1" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 0,
            "Total" => 45,
            "Status" => "Fail"
        ),

        "subject2" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        ),

        "subject3" => array(
            "CW1" => 9,
            "MidTerm" => 26,
            "CW2" => 10,
            "Final" => 40,
            "Total" => 85,
            "Status" => "Pass"
        )

    )

);


// Print transcript
foreach ($transcript as $semester => $subjects) {

    echo "<h3>$semester</h3>";

    echo "<table>";

    echo "<tr>";
    echo "<th>Course</th>";
    echo "<th>CW1</th>";
    echo "<th>MidTerm</th>";
    echo "<th>CW2</th>";
    echo "<th>Final</th>";
    echo "<th>Total</th>";
    echo "<th>Status</th>";
    echo "</tr>";

    foreach ($subjects as $course => $marks) {

        echo "<tr>";

        echo "<td>$course</td>";
        echo "<td>" . $marks["CW1"] . "</td>";
        echo "<td>" . $marks["MidTerm"] . "</td>";
        echo "<td>" . $marks["CW2"] . "</td>";
        echo "<td>" . $marks["Final"] . "</td>";
        echo "<td>" . $marks["Total"] . "</td>";
        echo "<td>" . $marks["Status"] . "</td>";

        echo "</tr>";
    }

    echo "</table>";
}

?>

</body>
</html>