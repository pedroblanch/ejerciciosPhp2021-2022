<?php
if(!isset($_GET['apellidos']) || empty(trim($_GET['apellidos']))){    
    echo "Faltan los apellidos";
    exit;
}
else{
    $apellidos=$_GET['apellidos'];
}


echo("apellidos: $apellidos");
?>