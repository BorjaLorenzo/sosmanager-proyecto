<?php
include_once '_conexion.php';
if ($conexion->connect_errno) {
    die("error de conexión: " . $conexion->connect_error);
}
$id=$_POST["id"];

$sql = "SELECT * FROM `partes_servicio` WHERE `id`=$id;";
$resultado=$conexion->query($sql);
$fila = $resultado->fetch_assoc();

echo json_encode($fila);
