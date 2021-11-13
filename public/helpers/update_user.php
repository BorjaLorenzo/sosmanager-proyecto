<?php
include_once '_conexion.php';
if ($conexion->connect_errno) {
    die("error de conexión: " . $conexion->connect_error);
}
$dni=$_POST["dni"];
$old_dni=$_POST["old_dni"];
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$rol=$_POST["rol"];
$asuntos=$_POST["asuntos"];
$grupo=$_POST["grupo"];

$sql = "UPDATE `detalles_users` SET `dni`='$dni',`nombre`='$nombre',`apellidos`='$apellidos',`grupo`='$grupo',`asuntos_propios`='$asuntos' WHERE `dni`='$old_dni';";
$conexion->query($sql);
$sql="UPDATE `users` SET `name`='$nombre', `dni`='$dni', `rol`='$rol' WHERE `dni`='$old_dni';";
$conexion->query($sql);