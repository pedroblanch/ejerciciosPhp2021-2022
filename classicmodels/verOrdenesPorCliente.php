<?php
$conexion = new mysqli("10.10.0.3", "classicmodels", "classicmodels", "classicmodels", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select c.customerNumber, customerName, sum(amount) as totalPagos from customers c, payments p
	where p.customerNumber=c.customerNumber
    group by p.customerNumber;";
$result = $conexion->query($sql);

echo "<table border=1>";
// muestro todos los clientes
while ($row = $result->fetch_assoc()) {
    $customerName = $row['customerName'];
    $totalPagos = $row['totalPagos'];
    $customerNumber = $row['customerNumber'];
    echo "<tr style='background-color:grey'>";
    echo "<td>$customerName</td><td align=right>Total Pagos: $totalPagos</td>";
    echo "</tr>";
    
    // muestro todas las órdenes del cliente
    $sql2 = "select orderDate, orderNumber from orders
	where customerNumber=$customerNumber order by orderDate desc";
    $result2 = $conexion->query($sql2);
    while($row2=$result2->fetch_assoc()){
        $orderDate=$row2['orderDate'];
        $orderNumber=$row2['orderNumber'];
        echo "<tr>";
        echo "<td><b>Fecha de Orden: $orderDate</b></td><td><b>Número: $orderNumber</b></td>";
        echo "</tr>";
        
        // muestro todos los productos existentes en la orden
        $sql3 = "select productName, quantityOrdered from products c, orderdetails o
	                   where c.productCode=o.productCode and orderNumber=$orderNumber
		                      order by orderLineNumber asc;";
        $result3 = $conexion->query($sql3);
        while ($row3 = $result3->fetch_assoc()) {
            $productName = $row3['productName'];
            $quantityOrdered = $row3['quantityOrdered'];
            echo "<tr>";
            echo "<td>$productName</td><td>$quantityOrdered</td>";
            echo "</tr>";
        }//end_while productos dentro de la orden
        
    }//end_while órdenes asociadas al cliente
    
} // end_while mostrar todos los clientes
echo "</table>";

$conexion->close();
?>