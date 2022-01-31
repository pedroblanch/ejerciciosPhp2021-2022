<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if(!isset($_GET['country_id'])){
    die ('falta el parámetro country_id');
}
if(empty($_GET['country_id'])){
    die ('falta el parámetro country_id');
}
$country_id = $_GET['country_id'];
$sql = "select city_id, city from city where country_id=$country_id order by city;";
$result = $conexion->query($sql);
?>
<form action="insertarDireccion3.php" method="get">
	<label for="address">address</label>
	<input type="text" name='address'>
	<br>
	<label for="address2">address2</label>
	<input type="text" name='address2'>
	<br>
	<label for="district">district</label>
	<input type="text" name='district'>
	<br>
	<label for="postal_code">postal_code</label>
	<input type="text" name='postal_code'>
	<br>
	<label for="phone">phone</label>
	<input type="text" name='phone'>
	<br>
	<label for="city_id">City:</label> 
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
	<input type='submit' value='Aceptar'>
</form>