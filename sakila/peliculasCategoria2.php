<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if(!isset($_GET['category_id'])){
    die ('falta el parámetro category_id');
}
if(empty($_GET['category_id'])){
    die ('falta el parámetro category_id');
}
$category_id = $_GET['category_id'];

$sql="select name from category where category_id=$category_id";
$result=$conexion->query($sql);
if($row = $result->fetch_assoc()){
    $name=$row['name'];
}
else{
    die("No se encuentra la categoría");
}

echo "<table border=1>";
echo "<tr><td><b>Categoría: $name</b></td></tr>";

$sql2 = "select title from film f, film_category fc
	where f.film_id=fc.film_id 
		and fc.category_id=$category_id";
$result2 = $conexion->query($sql2);
// output data of each row
while ($row2 = $result2->fetch_assoc()) {
    $title = $row2['title'];
    echo "<tr>";
    echo "<td>$title</td>";
    echo "</tr>";
}
echo "</table>";
$conexion->close();
?>