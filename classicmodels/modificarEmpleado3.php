<?php
$conexion = new mysqli("10.10.0.3", "classicmodels", "classicmodels", "classicmodels", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if(!isset($_GET['employeeNumber'])){
    die ('falta el parámetro employeeNumber');
}
if(empty($_GET['employeeNumber'])){
    die ('falta el parámetro employeeNumber');
}
$employeeNumber = $_GET['employeeNumber'];

if(!isset($_GET['lastName'])){
    die ('falta el parámetro lastName');
}
if(empty(trim($_GET['lastName']))){
    die ('falta el parámetro lastName');
}
$lastName = $_GET['lastName'];

if(!isset($_GET['firstName'])){
    die ('falta el parámetro firstName');
}
if(empty($_GET['firstName'])){
    die ('falta el parámetro firstName');
}
$firstName = $_GET['firstName'];

if(!isset($_GET['email'])){
    die ('falta el parámetro email');
}
if(empty($_GET['email'])){
    die ('falta el parámetro email');
}
$email = $_GET['email'];

if(!isset($_GET['extension'])){
    die ('falta el parámetro extension');
}
if(empty($_GET['extension'])){
    die ('falta el parámetro extension');
}
$extension = $_GET['extension'];

if(!isset($_GET['jobTitle'])){
    die ('falta el parámetro jobTitle');
}
if(empty($_GET['jobTitle'])){
    die ('falta el parámetro jobTitle');
}
$jobTitle = $_GET['jobTitle'];

if(!isset($_GET['officeCode'])){
    die ('falta el parámetro officeCode');
}
if(empty($_GET['officeCode'])){
    die ('falta el parámetro officeCode');
}
$officeCode = $_GET['officeCode'];

if(!isset($_GET['reportsTo'])){
    die ('falta el parámetro reportsTo');
}
if(empty($_GET['reportsTo'])){
    $reportsTo='null';
}
else{
    $reportsTo = $_GET['reportsTo'];
}


$sql ="update employees set firstName='$firstName',
                            lastName='$lastName',
                            email='$email',
                            extension='$extension',
                            jobTitle='$jobTitle',
                            officeCode='$officeCode',
                            reportsTo=$reportsTo 
	                               where employeeNumber=$employeeNumber";

if ($conexion->query($sql)) {
    echo "Empleado modificado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}
?>