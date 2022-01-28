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

$sql ="select country from country where country_id=$country_id";
$result = $conexion->query($sql);
// output data of each row
$row = $result->fetch_assoc();
if(!$row){
    die("No existe pais con ese código");
}
$country=$row['country'];

echo "<h1>$country</h1>";

echo "<table border=1>";

$sql2 ="select city, city_id from city where country_id=$country_id";
$result2 = $conexion->query($sql2);
// output data of each row
while ($row2 = $result2->fetch_assoc()) {
    $city_id=$row2['city_id'];
    $city=$row2['city'];
    echo "<tr>";
    echo "<td>$city</td>";
    echo "</tr>";
}
echo "</table>";
$conexion->close();
?>
<form action="insertarCiudad3.php" method="get">
	<label for="city">Nueva Ciudad:</label>
	<input type="text" name='city'>
	<br>
	<input type="hidden" name="country_id" value='<?=$country_id?>'>
	<br>
	<input type='submit' value='Aceptar'>
</form>