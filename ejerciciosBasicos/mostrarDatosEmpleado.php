<?php
//recojo los parámetros de entrada y verifico su correción
$apellidos=$_GET['apellidos'];
$nombre=$_GET['nombre'];
$dni=$_GET['dni'];
$sueldo=$_GET['sueldo'];
if(!is_numeric($sueldo)){
    echo("Error: el sueldo no es numérico");
    exit;
}
if(!isset($_GET['jefeProyecto'])){
    $jefeProyecto=false;
}
else{
    $jefeProyecto=true;
}

if(!isset($_GET['reduccionJornada'])){
    $reduccionJornada=false;
}
else{
    $reduccionJornada=true;
}
$categoria=$_GET['categoria'];

if(!isset($_GET['conocimientos'])){
    echo("Error: faltan los conocimientos");
    exit;
}
$conocimientos=$_GET['conocimientos'];

$deparmento=$_GET['departamento'];

$formacion=$_GET['formacion'];

//muestro los datos en pantalla
?>
<!-- cambio a html por ser más cómodo -->
DNI: <?=$dni?>
<br>
Apellidos: <?=$apellidos?>
<br>
Nombre: <?=$nombre?>
<br>
Sueldo: <?=$sueldo?>
<br>
Jefe de Proyecto: <?=($jefeProyecto ? 'si es jefe' : 'no es jefe') ?>
<br>
Reducción de Jornada: <?=($reduccionJornada ? 'si' : 'no') ?>
<br>
Categoría: <?=$categoria?>
<br>
Conocimientos:
<?php 
foreach ($conocimientos as $conocimiento){
    echo("<br>$conocimiento");
}
?>
<br>
Formación: <?=$formacion?>
<br>
Departamento: <?=$deparmento?>
