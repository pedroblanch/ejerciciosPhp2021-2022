<?php
$conexion = new mysqli("10.10.0.3", "classicmodels", "classicmodels", "classicmodels", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select orderNumber, orderDate from orders order by orderNumber;";
$result = $conexion->query($sql);
?>
<form method="get" action="addProductoOrden2.php">
	<label for="orderNumber">orderNumber</label> 
	<select name="orderNumber">
		<option value=''></option>
        <?php 
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $orderNumber = $row['orderNumber'];
            $orderDate = $row['orderDate'];
            echo "<option value='$orderNumber'>$orderNumber - $orderDate</option>";
        }
        $conexion->close();
        ?>
	</select> 
	<br> 
	<br> 
	<input type="submit" value="aceptar">
</form>
