<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select city_id, city from city order by city;";
$result = $conexion->query($sql);
?>
<form method="get" action="modificarCiudad2.php">
	<label for="city_id">Ciudad:</label> 
	<select name="city_id">
		<option value=''></option>
        <?php 
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $city_id = $row['city_id'];
            $city = $row['city'];
            echo "<option value='$city_id'>$city</option>";
        }
        $conexion->close();
        ?>
	</select> 
	<br>
	<input type="submit" value="aceptar">
</form>
