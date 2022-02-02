<?php
$conexion = new mysqli("localhost", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select title, release_year from film";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=1>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $title=$row['title'];
        $release_year=$row['release_year'];
        echo "<tr>";
        echo "<td>$title</td><td>$release_year</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conexion->close();
?>