<?php
$numeroFilasPorPagina=100;
$conexion = new mysqli("10.10.0.3", "sakila", "sakila", "sakila", 3306);
if ($conexion->connect_errno) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET['offset'])) {
    $offset = $_GET['offset'];
} else {
    $offset = 0;
}
$sql = "select count(*) as numeroFilas from film;";
$result = $conexion->query($sql);
$row = $result->fetch_assoc();
echo ("Numero de filas: $numeroFilasPorPagina");
if($_GET['accion'] == "siguiente") {
    if (($offset + $numeroFilasPorPagina) < $row['numeroFilas']) {
        $offset += $numeroFilasPorPagina;
    }
}
if ($_GET['accion'] == "atras") {
    $offset -= $numeroFilasPorPagina;
    if ($offset < 0) {
        $offset = 0;
    }
}

$sql2 = "select title, release_year from film limit $offset,$numeroFilasPorPagina";
$result2 = $conexion->query($sql2);

echo "<table border=1>";
// output data of each row
while ($row2 = $result2->fetch_assoc()) {
    $title = $row2['title'];
    $release_year = $row2['release_year'];
    echo "<tr>";
    echo "<td>$title</td><td>$release_year</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br>";
echo "<br>";
echo "<a href='verFilmsPaginado.php?offset=$offset&accion=atras'>Atrás</a>";
echo "<br>";
echo "<a href='verFilmsPaginado.php?offset=$offset&accion=siguiente'>Siguiente</a>";
$conexion->close();
?>