<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if (! isset($_GET['customer_id'])) {
    die('falta el parámetro customer_id');
}
if (empty($_GET['customer_id'])) {
    die('falta el parámetro customer_id');
}
$customer_id = $_GET['customer_id'];

if (! isset($_GET['film_id'])) {
    die('falta el parámetro film_id');
}
if (empty($_GET['film_id'])) {
    die('falta el parámetro film_id');
}
$film_id = $_GET['film_id'];

if (! isset($_GET['store_id'])) {
    die('falta el parámetro store_id');
}
if (empty($_GET['store_id'])) {
    die('falta el parámetro store_id');
}
$store_id = $_GET['store_id'];

$sql = "select inventory_id, title
            from inventory i, film f 
                where i.film_id=$film_id 
                    and store_id=$store_id
                    and i.film_id=f.film_id;";
$result = $conexion->query($sql);
?>
<form action="alquilarPelicula3.php" method="get">
	<label for="inventory_id">Ejemplar:</label> 
	<select name="inventory_id">
		<option value=''></option>
        <?php
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $inventory_id = $row['inventory_id'];
            $title = $row['title'];
            echo "<option value='$inventory_id' >$inventory_id - $title</option>";
        }
        $conexion->close();
        ?>
	</select> 
	<br> 
	<input type="hidden" name="customer_id" value='<?=$customer_id?>'> 
	<br> 
	<input type='submit' value='Aceptar'>
</form>