<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select country_id, country from country order by country;";
$result = $conexion->query($sql);
?>
<form method="get" action="insertarDireccion2.php">
	<label for="country_id">Pais:</label> 
	<select name="country_id">
		<option value=''></option>
        <?php 
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $country_id = $row['country_id'];
            $country = $row['country'];
            echo "<option value='$country_id'>$country</option>";
        }
        $conexion->close();
        ?>
	</select> 
	<br>
	<input type="submit" value="aceptar">
</form>
