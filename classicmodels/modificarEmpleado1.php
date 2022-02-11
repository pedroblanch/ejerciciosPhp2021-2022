<?php
$conexion = new mysqli("10.10.0.3", "classicmodels", "classicmodels", "classicmodels", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select employeeNumber, firstName, lastName from employees
	order by lastName, lastName";
$result = $conexion->query($sql);

echo "<table border=1>";
// output data of each row
while ($row = $result->fetch_assoc()) {
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $employeeNumber = $row['employeeNumber'];
    echo "<tr>";
    echo "<td><a href='modificarEmpleado2.php?employeeNumber=$employeeNumber'>$lastName, $firstName</a></td>";
    echo "</tr>"; 
} // end_while employees
echo "</table>";

$conexion->close();
?>