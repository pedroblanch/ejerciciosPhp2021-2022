<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if(!isset($_GET['city_id'])){
    die ('falta el parámetro city_id');
}
if(empty($_GET['city_id'])){
    die ('falta el parámetro city_id');
}
$city_id = $_GET['city_id'];

if(!isset($_GET['city'])){
    die ('falta el parámetro city');
}
if(empty(trim($_GET['city']))){
    die ('falta el parámetro city');
}
$city = $_GET['city'];

if(!isset($_GET['country_id'])){
    die ('falta el parámetro country_id');
}
if(empty($_GET['country_id'])){
    die ('falta el parámetro country_id');
}
$country_id = $_GET['country_id'];


$sql ="update city set city='$city', country_id=$country_id
	where city_id=$city_id";

if ($conexion->query($sql)) {
    echo "Ciudad modificada correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}