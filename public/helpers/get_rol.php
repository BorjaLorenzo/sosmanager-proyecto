<?php
include_once '_conexion.php';
if ($conexion->connect_errno) {
    die("error de conexión: " . $conexion->connect_error);
}
$dni=$_POST["dni"];

$sql = "SELECT `rol` FROM `users` WHERE `dni`='$dni';";
$resultado=$conexion->query($sql);
$fila = $resultado->fetch_assoc();

echo json_encode($fila);
