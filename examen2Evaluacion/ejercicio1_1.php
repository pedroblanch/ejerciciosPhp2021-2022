<?php
$conexion = new mysqli("10.10.0.3", "Northwind", "Northwind", "Northwind", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select SupplierID, CompanyName from Suppliers order by CompanyName;";
$result = $conexion->query($sql);
?>
<form method="get" action="ejercicio1_2.php">
	<label for="SupplierID">CompanyName:</label> 
	<select name="SupplierID">
		<option value=''></option>
        <?php 
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $SupplierID = $row['SupplierID'];
            $CompanyName = $row['CompanyName'];
            echo "<option value='$SupplierID'>$CompanyName</option>";
        }
        ?>
	</select> 
	<br> 
	<br> 
	<label for="CategoryID">CategoryName:</label> 
	<select name="CategoryID">
		<option value=''></option>
        <?php 
        $sql2 = "select CategoryID, CategoryName from Categories order by CategoryName;";
        $result2 = $conexion->query($sql2);
        // output data of each row
        while ($row2 = $result2->fetch_assoc()) {
            $CategoryID = $row2['CategoryID'];
            $CategoryName = $row2['CategoryName'];
            echo "<option value='$CategoryID'>$CategoryName</option>";
        }
        $conexion->close();
        ?>
	</select> 
	<br> 
	<br> 
	<input type="submit" value="aceptar">
</form>
