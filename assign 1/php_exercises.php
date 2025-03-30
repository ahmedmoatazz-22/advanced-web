<?php
// Exercise 1
$x = 10;
$y = 7;

echo "<h3>Exercise 1</h3>";
echo "$x + $y = " . ($x + $y) . "<br>";
echo "$x - $y = " . ($x - $y) . "<br>";
echo "$x * $y = " . ($x * $y) . "<br>";
echo "$x / $y = " . ($x / $y) . "<br>";
echo "$x % $y = " . ($x % $y) . "<br>";

// Exercise 2
echo "<h3>Exercise 2</h3>";
$month = date('F', time());
if ($month == "August") {
    echo "It's August, so it's really hot.<br>";
} else {
    echo "Not August, so at least not in the peak of the heat.<br>";
}

// Exercise 3
echo "<h3>Exercise 3</h3>";
for ($i = 1; $i <= 12; $i++) {
    echo "$i * $i = " . ($i * $i) . "<br>";
}

// Exercise 4
echo "<h3>Exercise 4</h3>";
echo "<table border='1' cellpadding='5'>";
for ($row = 1; $row <= 7; $row++) {
    echo "<tr>";
    for ($col = 1; $col <= 7; $col++) {
        echo "<td>" . ($row * $col) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
