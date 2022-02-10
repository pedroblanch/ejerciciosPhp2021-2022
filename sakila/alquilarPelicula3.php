<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if(!isset($_GET['inventory_id'])){
    die ('falta el parámetro inventory_id');
}
if(empty($_GET['inventory_id'])){
    die ('falta el parámetro inventory_id');
}
$inventory_id = $_GET['inventory_id'];

if(!isset($_GET['customer_id'])){
    die ('falta el parámetro customer_id');
}
if(empty($_GET['customer_id'])){
    die ('falta el parámetro customer_id');
}
$customer_id = $_GET['customer_id'];


if(!isset($_GET['staff_id'])){
    die ('falta el parámetro staff_id');
}
if(empty($_GET['staff_id'])){
    die ('falta el parámetro staff_id');
}
$staff_id = $_GET['staff_id'];



$sql ="insert into rental (rental_date, inventory_id, customer_id, return_date, staff_id)
values (now(),$inventory_id,$customer_id,null,$staff_id);";

echo ($sql.'<br>');
if ($conexion->query($sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}