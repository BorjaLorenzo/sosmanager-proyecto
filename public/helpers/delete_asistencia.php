<?php
include '_conexion.php';
if ($conexion->connect_errno) {
    die("error de conexión: " . $conexion->connect_error);
}
$id=$_POST["idd"];

$sql = "UPDATE `partes_servicio` SET `activo`='N' WHERE `id`= '$id'";

$conexion->query($sql);