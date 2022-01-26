<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if (! isset($_GET['film_id'])) {
    die('falta el parámetro film_id');
}
if (empty($_GET['film_id'])) {
    die('falta el parámetro film_id');
}
$film_id = $_GET['film_id'];

$sql = "select title from film where film_id=$film_id";
$result = $conexion->query($sql);
if ($row = $result->fetch_assoc()) {
    $title = $row['title'];
} else {
    die("No se encuentra la película");
}
echo "<h1>$title</h1>";
?>

<table border=1>
    	<?php
    $sql2 = "select a.actor_id,last_name, first_name from actor a, film_actor fa
        	where fa.actor_id=a.actor_id 
        		and fa.film_id=$film_id
                    order by last_name, first_name";
    $result2 = $conexion->query($sql2);
    // output data of each row
    while ($row2 = $result2->fetch_assoc()) {
        $actor_id = $row2['actor_id'];
        $last_name = $row2['last_name'];
        $first_name = $row2['first_name'];
        echo "<tr><td><a href='actoresPelicula3-version2.php?actor_id=$actor_id'>$last_name, $first_name</a></td></tr>";
    }
    $conexion->close();
    ?>	
</table>

