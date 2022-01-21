<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select category_id, name from category order by name;";
$result = $conexion->query($sql);
?>
<form method="get" action="peliculasCategoria2.php">
	<label for="formacion">formacion:</label> 
	<select name="category_id">
		<option value=''></option>
        <?php 
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $category_id = $row['category_id'];
            $name = $row['name'];
            echo "<option value='$category_id'>$name</option>";
        }
        $conexion->close();
        ?>
	</select> 
	<br> 
	<br> 
	<input type="submit" value="aceptar">
</form>
