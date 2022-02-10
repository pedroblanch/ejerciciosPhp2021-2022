<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if(!isset($_GET['rental_id'])){
    die ('falta el parámetro rental_id');
}
if(empty($_GET['rental_id'])){
    die ('falta el parámetro rental_id');
}
$rental_id = $_GET['rental_id'];

$sql = "select rental_id, return_date  from rental where rental_id=$rental_id;";
$result = $conexion->query($sql);
// output data of each row
$row = $result->fetch_assoc();
if (! $row) {
    die("No existe alquiler con ese código");
}
$rental_id = $row['rental_id'];
$return_date = $row['return_date'];
if($return_date!=null){
    die("Ese alquiler ya está devuelto");
}

$sql2 ="update rental set return_date=now()
	where rental_id=$rental_id";

if ($conexion->query($sql2)) {
    echo "Alquiler devuelto correctamente";
} else {
    echo "Error: " . $sql2 . "<br>" . $conexion->error;
}
?>