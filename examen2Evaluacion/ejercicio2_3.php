<?php
$conexion = new mysqli("10.10.0.3", "Northwind", "Northwind", "Northwind", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if (! isset($_GET['TerritoryID'])) {
    die('falta el parámetro TerritoryID');
}
if (empty($_GET['TerritoryID'])) {
    die('falta el parámetro TerritoryID');
}
$TerritoryIDArray = $_GET['TerritoryID'];

if (! isset($_GET['EmployeeID'])) {
    die('falta el parámetro EmployeeID');
}
if (empty($_GET['EmployeeID'])) {
    die('falta el parámetro EmployeeID');
}
$EmployeeID = $_GET['EmployeeID'];

foreach ($TerritoryIDArray as $TerritoryID) {
    $sql = "delete from  EmployeeTerritories where TerritoryID=$TerritoryID and EmployeeID=$EmployeeID;";
    if ($conexion->query($sql)) {
        echo "<br>Se ha quitado el empleado con ID $EmployeeID del territorio con ID $TerritoryID";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
$conexion->close();
?>