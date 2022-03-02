<?php
$conexion = new mysqli("10.10.0.3", "Northwind", "Northwind", "Northwind", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if (! isset($_GET['EmployeeID'])) {
    die('falta el parámetro EmployeeID');
}
if (empty($_GET['EmployeeID'])) {
    die('parámetro EmployeeID no puede ser vacío');
}
$EmployeeID = $_GET['EmployeeID'];

$sql = "select TerritoryDescription, t.TerritoryID from 
	Territories t, EmployeeTerritories et
		where t.TerritoryID=et.TerritoryID
        and et.EmployeeID=$EmployeeID;";
$result = $conexion->query($sql);
?>
<form method="get" action="ejercicio2_3.php">
	<label for="TerritoryID">Territorios:</label> 
	<select name="TerritoryID[]" multiple size=7>
        <?php 
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $TerritoryID = $row['TerritoryID'];
            $TerritoryDescription = $row['TerritoryDescription'];
            echo "<option value='$TerritoryID'>$TerritoryDescription</option>";
        }
        ?>
	</select> 
	<br> 
	<input type='hidden' value='<?=$EmployeeID?>' name='EmployeeID'>
	<br> 
	<input type="submit" value="aceptar">
</form>