<?php
$conexion = new mysqli("10.10.0.3", "classicmodels", "classicmodels", "classicmodels", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if(!isset($_GET['orderNumber'])){
    die ('falta el parámetro orderNumber');
}
if(empty($_GET['orderNumber'])){
    die ('falta el parámetro orderNumber');
}
$orderNumber = $_GET['orderNumber'];

if(!isset($_GET['productCode'])){
    die ('falta el parámetro productCode');
}
if(empty($_GET['productCode'])){
    die ('falta el parámetro productCode');
}
$productCode = $_GET['productCode'];

if(!isset($_GET['quantityOrdered'])){
    die ('falta el parámetro quantityOrdered');
}
if(empty($_GET['quantityOrdered'])){
    die ('falta el parámetro quantityOrdered');
}
$quantityOrdered = $_GET['quantityOrdered'];

//busco el precio unitario del producto, que se encuentra en la tabla de productos
//también debo comprobar que hay stock suficiente del producto para afrontar la cantidad solicitada
$sql="select buyPrice, quantityInStock from products where productCode='$productCode'";
$result=$conexion->query($sql);
if($row = $result->fetch_assoc()){
    $buyPrice=$row['buyPrice'];
    $quantityInStock=$row['quantityInStock'];
}
else{
    die("No se encuentra el producto");
}
//si no hay estock suficiente doy aviso y salgo
if($quantityInStock < $quantityOrdered){
    die("Stock insuficiente. El stock es de $quantityInStock unidades.");
}

//la tabla orderdetails tiene un campo orderLineNumber. 
//cuando inserte la nueva linea de producto en la orden el campo orderLineNumber
//debe tener un valor igual al máximo de lineas más uno
//para ello debo buscar el número máximo de este campo e incrementarlo en uno.
$sql2="select max(orderLineNumber) as maxOrderLineNumber from orderdetails where orderNumber=$orderNumber";
$result2=$conexion->query($sql2);
if($row2 = $result2->fetch_assoc()){
    $maxOrderLineNumber=$row2['maxOrderLineNumber'];
    //la nueva linea a insertar debe incrementar en uno este valor
    $orderLineNumber=$maxOrderLineNumber+1;
}
else{
    die("No se encuentra la orden");
}

//una vez hecha todas las comprobaciones paso a insertar la nueva linea de producto en la orden
//en el campo priceEach inserto el valor de venta actual del producto
$sql3 ="insert into orderdetails (orderNumber, productCode, quantityOrdered, priceEach, orderLineNumber)
values ($orderNumber,'$productCode',$quantityOrdered,$buyPrice,$orderLineNumber);";

if ($conexion->query($sql3)) {
    echo "Producto añadido a la orden correctamente";
} else {
    echo "Error: " . $sql3 . "<br>" . $conexion->error;
}
$conexion->close();
?>