<?php
$conexion = new mysqli("10.10.0.3", "Northwind", "Northwind", "Northwind", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if (! isset($_GET['importeMinimo'])) {
    die('falta el parámetro importeMinimo');
}
if (empty($_GET['importeMinimo'])) {
    die('falta el parámetro importeMinimo');
}
$importeMinimo = $_GET['importeMinimo'];

$sql = "select o.OrderID, CompanyName, sum(UnitPrice * Quantity * (1-Discount)) as Importe 
	from OrderDetails od, Orders o, Customers c 
		where o.CustomerID=c.CustomerID  
			 and o.OrderID=od.OrderID group by o.OrderID;";

$result = $conexion->query($sql);
echo "<table border=1>";
echo "<tr>";
echo "<td><b>OrderID</b></td>";
echo "<td><b>CompanyName</b></td>";
echo "<td><b>Importe</b></td>";
echo "</tr>";
while ($row = $result->fetch_assoc()) {
    $OrderID = $row['OrderID'];
    $CompanyName = $row['CompanyName'];
    $Importe = round($row['Importe'],2);
    if ($Importe >= $importeMinimo) {
        echo "<tr>";
        echo "<td align=right>$OrderID</td>";
        echo "<td>$CompanyName</td>";
        echo "<td align=right>$Importe</td>";
        echo "</tr>";
    }
}
echo "</table>";
$conexion->close();
?>