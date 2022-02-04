<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select customer_id, first_name, last_name from customer 
            order by last_name, first_name;";
$result = $conexion->query($sql);
$sql2 = "select film_id, title from film
            order by title;";
$result2 = $conexion->query($sql2);
$sql3 = "select store_id, address from
           store s, address a
              where s.address_id=a.address_id;";
$result3 = $conexion->query($sql3);

?>
<form method="get" action="alquilarPelicula2.php">
	<label for="customer_id">Cliente:</label> <select name="customer_id">
		<option value=''></option>
        <?php
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $customer_id = $row['customer_id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            echo "<option value='$customer_id'>$last_name, $first_name</option>";
        }
        $conexion->close();
        ?>
	</select>
	<br>
	<br> 
	<label for="film_id">Película:</label>
	<select name="film_id">
		<option value=''></option>
        <?php
        // output data of each row
        while ($row2 = $result2->fetch_assoc()) {
            $film_id = $row2['film_id'];
            $title = $row2['title'];
            echo "<option value='$film_id'>$title</option>";
        }
        $conexion->close();
        ?>
	</select>
	<br>
	<br> 
	<label for="store_id">Tienda:</label>
	<select name="store_id">
		<option value=''></option>
        <?php
        // output data of each row
        while ($row3 = $result3->fetch_assoc()) {
            $store_id = $row3['store_id'];
            $address = $row3['address'];
            echo "<option value='$store_id'>$address</option>";
        }
        $conexion->close();
        ?>
	</select>
	 <br>
	 <br>
	  <input type="submit" value="aceptar">
</form>
