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
          and i.film_id=f.film_id
		  and not exists (
			select r.inventory_id from rental r
				where r.inventory_id=i.inventory_id
                and isnull(return_date) );";
$result = $conexion->query($sql);
$sql2 = "select staff_id, first_name, last_name from staff
        where store_id=$store_id";
$result2 = $conexion->query($sql2);
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
	<br>
	<label for="staff_id">Empleado:</label> 
	<select name="staff_id">
		<option value=''></option>
        <?php
        // output data of each row
        while ($row2 = $result2->fetch_assoc()) {
            $staff_id = $row2['staff_id'];
            $last_name = $row2['last_name'];
            $first_name = $row2['first_name'];
            echo "<option value='$staff_id' >$last_name, $first_name</option>";
        }
        $conexion->close();
        ?>
	</select> 
	<input type="hidden" name="customer_id" value='<?=$customer_id?>'> 
	<br> 
	<input type='submit' value='Aceptar'>
</form>