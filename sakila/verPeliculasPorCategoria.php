<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<table border=1>";

$sql = "select category_id, name from category order by name";
$result = $conexion->query($sql);
// output data of each row
while ($row = $result->fetch_assoc()) {
    $category_id = $row['category_id'];
    $name = $row['name'];
    echo "<tr>";
    echo "<td><b>$name</b></td>";
    echo "</tr>";
    
    //muestro las películas de esta categoría
    $sql2 = "select title, description, f.film_id 
         from film f, film_category fc
	       where f.film_id=fc.film_id
		      and fc.category_id=$category_id
			         order by title";
    $result2 = $conexion->query($sql2);
    // output data of each row
    while ($row2 = $result2->fetch_assoc()) {
        $film_id = $row2['film_id'];
        $title = $row2['title'];
        $description = $row2['description'];
        echo "<tr>";
        echo "<td><i>$title</i></td>";
        echo "<td><i>$description</i></td>";
        echo "</tr>";
        
        //muestro los actores de esta película
        $sql3 = "select last_name, first_name 
                	from actor a, film_actor fa
                		where a.actor_id=fa.actor_id
                			and fa.film_id=$film_id
                				order by last_name, first_name;";
        $result3 = $conexion->query($sql3);
        // output data of each row
        while ($row3 = $result3->fetch_assoc()) {
            $last_name = $row3['last_name'];
            $first_name = $row3['first_name'];
            echo "<tr>";
            echo "<td>$last_name</td>";
            echo "<td>$first_name</td>";
            echo "</tr>";
        }//end_while actores de la película
        
    }//end_while peliculas de la categoria
    
} // end_while clientes

echo "</table>";

$conexion->close();
?>