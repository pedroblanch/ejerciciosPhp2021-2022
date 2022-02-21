<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select title, count(*) as totalAlquileres 
	from rental r, inventory i, film f
		where r.inventory_id=i.inventory_id
			and i.film_id=f.film_id
            group by f.film_id
            order by title;";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $total=0;
    echo "<table border=1>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $title=$row['title'];
        $totalAlquileres=$row['totalAlquileres'];
        echo "<tr>";
        echo "<td>$title</td><td  align=right>$totalAlquileres</td>";
        echo "</tr>";
        $total+=$totalAlquileres;
    }//end_while
    echo "<tr>";
    echo "<td align=right>Total</td align=right><td>$total</td>";
    echo "</tr>";
    echo "</table>";
} else {
    echo "0 results";
}
$conexion->close();
?>