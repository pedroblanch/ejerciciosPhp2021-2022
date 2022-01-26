<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if (! isset($_GET['actor_id'])) {
    die('falta el parámetro actor_id');
}
if (empty($_GET['actor_id'])) {
    die('falta el parámetro actor_id');
}
$actor_id = $_GET['actor_id'];

$sql = "select last_name, first_name from actor where actor_id=$actor_id";
$result = $conexion->query($sql);
if ($row = $result->fetch_assoc()) {
    $last_name = $row['last_name'];
    $first_name = $row['first_name'];
} else {
    die("No se encuentra el actor");
}
echo "<h1>$last_name, $first_name</h1>";
?>
