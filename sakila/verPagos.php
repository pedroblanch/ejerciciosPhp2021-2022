<?php
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select first_name, last_name, payment_date, amount from
	customer c, payment p
		where p.customer_id=c.customer_id
			order by payment_date;";
$result = $conexion->query($sql);
$total=0;

echo "<table border=1>";
// output data of each row
while ($row = $result->fetch_assoc()) {
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $payment_date = $row['payment_date'];
    $amount = $row['amount'];
    $total=$total+$amount;
    echo "<tr>";
    echo "<td>$last_name</td><td>$first_name</td>";
    echo "<td>$payment_date</td><td align=right>$amount</td>";
    echo "</tr>";
}//end_while
echo "<tr><td colspan=3 align=right>Total:</td><td align=right>$total</td></tr>";
echo "</table>";

$conexion->close();
?>