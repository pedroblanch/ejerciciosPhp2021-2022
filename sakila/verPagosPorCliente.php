<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select last_name, first_name,customer_id from customer
	order by last_name, first_name";
$result = $conexion->query($sql);

echo "<table border=1>";
// output data of each row
while ($row = $result->fetch_assoc()) {
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $customer_id = $row['customer_id'];
    echo "<tr>";
    echo "<td>$last_name</td><td>$first_name</td>";
    echo "</tr>";
    
    // muestro todos los pagos de este cliente
    $total_cliente=0.0;
    $sql2 = "select payment_date, amount from payment
	   where customer_id=$customer_id
        order by payment_date";
    $result2 = $conexion->query($sql2);
    while($row2=$result2->fetch_assoc()){
        $payment_date=$row2['payment_date'];
        $amount=$row2['amount'];
        $total_cliente=$total_cliente+$amount;
        echo "<tr>";
        echo "<td>$payment_date</td><td>$amount</td>";
        echo "</tr>";
    }//end_while pagos del cliente
    echo "<tr><td>Total cliente</td><td>$total_cliente</td></tr>";
} // end_while clientes
echo "</table>";

$conexion->close();
?>