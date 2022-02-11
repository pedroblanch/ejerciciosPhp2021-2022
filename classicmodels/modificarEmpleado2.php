<?php
$conexion = new mysqli("10.10.0.3", "classicmodels", "classicmodels", "classicmodels", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if (! isset($_GET['employeeNumber'])) {
    die('falta el parámetro employeeNumber');
}
if (empty($_GET['employeeNumber'])) {
    die('falta el parámetro employeeNumber');
}
$employeeNumber = $_GET['employeeNumber'];

$sql = "select employeeNumber, firstName, lastName, extension,
                email, officeCode, reportsTo, jobTitle 
	               from employees where employeeNumber=$employeeNumber";
$result = $conexion->query($sql);
// output data of each row
$row = $result->fetch_assoc();
if (! $row) {
    die("No existe empleado con ese código");
}
$firstName = $row['firstName'];
$lastName = $row['lastName'];
$extension = $row['extension'];
$email = $row['email'];
$officeCode = $row['officeCode'];
$reportsTo = $row['reportsTo'];
$officeCode = $row['officeCode'];
$jobTitle = $row['jobTitle'];

$sql2 = "select officeCode, city, addressLine1 from offices order by city";
$result2 = $conexion->query($sql2);
$sql3 = "select firstName, lastName, employeeNumber from employees order by lastName, firstName";
$result3 = $conexion->query($sql3);
?>
<form action="modificarEmpleado3.php" method="get">
	<label for="firstName">firstName:</label> 
	<input type="text" name='firstName' value="<?=$firstName?>"> 
	<br> 
	<br><label for="lastName">lastName:</label> 
	<input type="text" name='lastName' value="<?=$lastName?>"> 
	<br> 
	<br>
	<label for="extension">extension:</label> 
	<input type="text" name='extension' value="<?=$extension?>"> 
	<br> 
	<br>
	<label for="email">email:</label> 
	<input type="text" name='email' value="<?=$email?>"> 
	<br> 
	<br>
	<label for="officeCode">officeCode:</label> <select
	name="officeCode">
	<option value=''></option>
        <?php
        // output data of each row
        while ($row2 = $result2->fetch_assoc()) {
            $officeCode_select = $row2['officeCode'];
            $city = $row2['city'];
            $addressLine1 = $row2['addressLine1'];
            if ($officeCode == $officeCode_select) {
                echo "<option value='$officeCode_select' selected>$city - $addressLine1</option>";
            }
            else{
                echo "<option value='$officeCode_select'>$city - $addressLine1</option>";
            }
        }
        $conexion->close();
        ?>
	</select>
	<br> 
	<br>
	<label for="reportsTo">reportsTo:</label> <select
	name="reportsTo">
	<option value=''></option>
        <?php
        // output data of each row
        while ($row3 = $result3->fetch_assoc()) {
            $employeeNumber_select = $row3['employeeNumber'];
            $firstName_select = $row3['firstName'];
            $lastName_select = $row3['lastName'];
            if ($reportsTo == $employeeNumber_select) {
                echo "<option value='$employeeNumber_select' selected>$lastName_select, $firstName_select</option>";
            }
            else{
                echo "<option value='$employeeNumber_select'>$lastName_select, $firstName_select</option>";
            }
        }
        $conexion->close();
        ?>
	</select>
	<br> 
	<br>
	<label for="jobTitle">jobTitle:</label> 
	<input type="text" name='jobTitle' value="<?=$jobTitle?>"> 
	<br>
	<input type="hidden" name="employeeNumber" value='<?=$employeeNumber?>'>
	<br> 
	<input type='submit' value='Aceptar'>
</form>