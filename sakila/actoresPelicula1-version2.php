<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select film_id, title from film order by title;";
$result = $conexion->query($sql);
?>
<form method="get" action="actoresPelicula2-version2.php">
	<label for="film_id">Película</label> 
	<select name="film_id">
		<option value=''></option>
        <?php 
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $film_id = $row['film_id'];
            $title = $row['title'];
            echo "<option value='$film_id'>$title</option>";
        }
        $conexion->close();
        ?>
	</select> 
	<br> 
	<br> 
	<input type="submit" value="aceptar">
</form>
