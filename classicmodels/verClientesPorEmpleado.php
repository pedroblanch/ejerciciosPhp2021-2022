<?php
$conexion = new mysqli("10.10.0.3", "classicmodels", "classicmodels", "classicmodels", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select employeeNumber, firstName, lastName from employees
	order by lastName, lastName";
$result = $conexion->query($sql);

echo "<table border=1>";
// output data of each row
while ($row = $result->fetch_assoc()) {
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $employeeNumber = $row['employeeNumber'];
    echo "<tr style='background-color:grey'>";
    echo "<td>$firstName</td><td>$lastName</td>";
    echo "</tr>";
    
    // muestro todos los clientes asociados al empleado
    // y muestro también el total de pagos de cada cliente
    $sql2 = "select customerName, sum(amount) as totalPagos
	from customers c, payments p
		where p.customerNumber=c.customerNumber
        and c.salesRepEmployeeNumber=$employeeNumber
			group by p.customerNumber;";
    $result2 = $conexion->query($sql2);
    $totalClientesEmpleado=0.0;
    while($row2=$result2->fetch_assoc()){
        $customerName=$row2['customerName'];
        $totalPagos=$row2['totalPagos'];
        echo "<tr>";
        echo "<td>$customerName</td><td>$totalPagos</td>";
        echo "</tr>";
        $totalClientesEmpleado+=$totalPagos;
    }//end_while clientes asociados al empleado
    echo "<tr><td align=right><b>Total empleado: </b></td><td>$totalClientesEmpleado</td></tr>";
    
} // end_while employees
echo "</table>";

$conexion->close();
?>