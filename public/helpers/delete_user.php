<?php
include '_conexion.php';
if ($conexion->connect_errno) {
    die("error de conexión: " . $conexion->connect_error);
}
$dni=$_POST["dni"];

$sql = "UPDATE `users` SET `activo`='N' WHERE `dni`= '$dni'";

$conexion->query($sql);
