<?php
$radio=$_GET['radio'];
$altura=$_GET['altura'];
if(!is_numeric($radio)){
    echo("El radio debe ser un valor numérico");
    exit;
}
if(!is_numeric($altura)){
    echo("La altura debe ser un valor numérico");
    exit;
}
//si llega aquí significa que los dos parámetros son válidos
$volumen=pi()*pow($radio,2)*$altura;
echo("El volumen del cilindro es $volumen");
?>
