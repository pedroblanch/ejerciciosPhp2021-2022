<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if(!isset($_GET['country_id'])){
    die ('falta el parámetro country_id');
}
if(empty($_GET['country_id'])){
    die ('falta el parámetro country_id');
}
$country_id = $_GET['country_id'];

if(!isset($_GET['city'])){
    die ('falta el parámetro city');
}
if(empty(trim($_GET['city']))){
    die ('falta el parámetro city');
}
$city = $_GET['city'];

$sql ="insert into city (city, country_id)
	values ('$city',$country_id);";

if ($conexion->query($sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}