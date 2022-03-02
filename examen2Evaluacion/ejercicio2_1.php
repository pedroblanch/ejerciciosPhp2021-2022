<?php
$conexion = new mysqli("10.10.0.3", "Northwind", "Northwind", "Northwind", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select EmployeeID, FirstName, LastName from Employees order by LastName, FirstName;";
$result = $conexion->query($sql);
?>
<form method="get" action="ejercicio2_2.php">
	<label for="EmployeeID">Empleado:</label> 
	<select name="EmployeeID">
		<option value=''></option>
        <?php 
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $EmployeeID = $row['EmployeeID'];
            $FirstName = $row['FirstName'];
            $LastName = $row['LastName'];
            echo "<option value='$EmployeeID'>$LastName, $FirstName</option>";
        }
        ?>
	</select> 
	<br> 
	<br> 
	<input type="submit" value="aceptar">
</form>
