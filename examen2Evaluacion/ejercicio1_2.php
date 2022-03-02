<?php
$conexion = new mysqli("10.10.0.3", "Northwind", "Northwind", "Northwind", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if(!isset($_GET['SupplierID'])){
    die ('falta el parámetro SupplierID');
}
$SupplierID = $_GET['SupplierID'];

if(!isset($_GET['CategoryID'])){
    die ('falta el parámetro CategoryID');
}
$CategoryID = $_GET['CategoryID'];

if(trim($SupplierID)=="" && trim($CategoryID=="")){
    die("Falta CategoryID y/o ProductID");
}
    

if(trim($SupplierID)=="" && trim($CategoryID!="")){
    //proveedor vacío y categoría no vacía
    $sql="select ProductName, CategoryName from Products p, Categories c 
                    where p.CategoryID=$CategoryID and p.CategoryID=c.CategoryID";   
}
if(trim($SupplierID)!="" && trim($CategoryID=="")){
    //proveedor no vacío y categoría vacía
    $sql="select ProductName, CompanyName from Products p, Suppliers s
                    where p.SupplierID=$SupplierID and s.SupplierID=p.SupplierID";
}
if(trim($SupplierID)!="" && trim($CategoryID!="")){
    //proveedor no vacío y categoría no vacía
    $sql="select ProductName, CategoryName, CompanyName from Products p, Suppliers s, Categories c
                    where p.SupplierID=$SupplierID 
                            and p.CategoryID=$CategoryID
                            and s.SupplierID=p.SupplierID
                            and c.CategoryID=p.CategoryID";
}

$result=$conexion->query($sql);
echo "<table border=1>";
echo "<tr>";
echo "<td><b>Producto</b></td>";
echo "<td><b>Proveedor</b></td>";
echo "<td><b>Categoría</b></td>";
echo "</tr>";
while ($row = $result->fetch_assoc()) {
    $ProductName = $row['ProductName'];
    $CategoryName = $row['CategoryName'];
    $CompanyName = $row['CompanyName'];
    echo "<tr>";
    echo "<td>$ProductName</td>";
    echo "<td>$CompanyName</td>";
    echo "<td>$CategoryName</td>";
    echo "</tr>";
}
echo "</table>";
$conexion->close();
?>