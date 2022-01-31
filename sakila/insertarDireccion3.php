<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if(!isset($_GET['address'])){
    die ('falta el parámetro address');
}
if(empty($_GET['address'])){
    die ('falta el parámetro address');
}
$address = $_GET['address'];

if(!isset($_GET['address2'])){
    die ('falta el parámetro address2');
}
if(empty($_GET['address2'])){
    $address2="null";
}
else{
    $address2= "'".$_GET['address2']."'";
}

if(!isset($_GET['district'])){
    die ('falta el parámetro district');
}
if(empty($_GET['district'])){
    die ('falta el parámetro district');
}
$district = $_GET['district'];


if(!isset($_GET['city_id'])){
    die ('falta el parámetro city_id');
}
if(empty($_GET['city_id'])){
    die ('falta el parámetro city_id');
}
$city_id = $_GET['city_id'];

if(!isset($_GET['postal_code'])){
    die ('falta el parámetro postal_code');
}
if(empty($_GET['postal_code'])){
    $postal_code="null";
}
else{
    $postal_code= "'".$_GET['postal_code']."'";
}

if(!isset($_GET['phone'])){
    die ('falta el parámetro phone');
}
if(empty($_GET['phone'])){
    die ('falta el parámetro phone');
}
$phone = $_GET['phone'];


$sql ="insert into address (address, address2, district, city_id, postal_code, phone)
values ('$address',$address2,'$district',$city_id,$postal_code,'$phone');";

echo ($sql.'<br>');
if ($conexion->query($sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}