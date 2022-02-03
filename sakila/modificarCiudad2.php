<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if (! isset($_GET['city_id'])) {
    die('falta el parámetro city_id');
}
if (empty($_GET['city_id'])) {
    die('falta el parámetro city_id');
}
$city_id = $_GET['city_id'];

$sql = "select city, country_id  from city where city_id=$city_id;";
$result = $conexion->query($sql);
// output data of each row
$row = $result->fetch_assoc();
if (! $row) {
    die("No existe ciudad con ese código");
}
$city = $row['city'];
$country_id = $row['country_id'];
$sql2 = "select country_id as country_id_select, country from country order by country;";
$result2 = $conexion->query($sql2);
?>
<form action="modificarCiudad3.php" method="get">
	<label for="city">Ciudad:</label> <input type="text" name='city'
		value="<?=$city?>"> <br> <label for="country_id">Pais:</label> <select
		name="country_id">
		<option value=''></option>
        <?php
        // output data of each row
        while ($row2 = $result2->fetch_assoc()) {
            $country_id_select = $row2['country_id_select'];
            $country = $row2['country'];
            if ($country_id == $country_id_select) {
                echo "<option value='$country_id_select' selected>$country</option>";
            }
            else{
                echo "<option value='$country_id_select' >$country</option>";
            }
        }
        $conexion->close();
        ?>
	</select> <br> <input type="hidden" name="city_id"
		value='<?=$city_id?>'> <br> <input type='submit' value='Aceptar'>
</form>