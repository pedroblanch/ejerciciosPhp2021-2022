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

$sql="select orderNumber, orderDate, customerName 
            from orders o, customers c
                where o.customerNumber=c.customerNumber
                    and orderNumber= $orderNumber;";
$result=$conexion->query($sql);
if($row = $result->fetch_assoc()){
    $orderDate=$row['orderDate'];
    $customerName=$row['customerName'];
}
else{
    die("No se encuentra la orden");
}

echo "<table border=1>";
echo "<tr><td colspan=4><b>Orden: $orderNumber - $orderDate - $customerName</b></td></tr>";
echo "<tr>";
echo "<td><b>Producto</b></</td>";
echo "<td><b>Unidades</b></td>";
echo "<td><b>Precio Unitario</b></td>";
echo "<td><b>Total producto</b></td>";
echo "</tr>";
$total=0.0;
$sql2 = "select productName, quantityOrdered, priceEach, quantityOrdered * priceEach as totalProduct
                from orderdetails o, products p
                    where o.productCode=p.productCode
                        and orderNumber=$orderNumber
                            order by orderLineNumber asc";
$result2 = $conexion->query($sql2);
// output data of each row
while ($row2 = $result2->fetch_assoc()) {
    $productName = $row2['productName'];
    $quantityOrdered = $row2['quantityOrdered'];
    $priceEach = $row2['priceEach'];
    $totalProduct = $row2['totalProduct'];
    $total+=$totalProduct;
    echo "<tr>";
    echo "<td>$productName</td>";
    echo "<td align=right>$quantityOrdered</td>";
    echo "<td align=right>$priceEach</td>";
    echo "<td align=right>$totalProduct</td>";
    echo "</tr>";
}
echo "<tr>";
echo "<td colspan=3 align=right><b>Total Orden: </b></td>";
echo "<td align=right><b>$total</b></td>";
echo "</tr>";
echo "</table>";
$sql3 = "select productCode, productName from products order by productName;";
$result3 = $conexion->query($sql3);
?>
<form method="get" action="addProductoOrden3.php">
	<br>
	<label for="productCode">productCode</label> 
	<select name="productCode">
		<option value=''></option>
        <?php 
        // output data of each row
        while ($row3 = $result3->fetch_assoc()) {
            $productCode = $row3['productCode'];
            $productName = $row3['productName'];
            echo "<option value='$productCode'>$productName</option>";
        }
        $conexion->close();
        ?>
	</select> 
	<br> 
	<br> 
	<label for="quantityOrdered">quantityOrdered</label>
	<input type='number' name='quantityOrdered' value=0>
	<br>
	<input type='hidden' name='orderNumber' value='<?=$orderNumber?>'>
	<br>
	<input type="submit" value="Añadir producto">
</form>