<?php
include_once '_conexion.php';
if ($conexion->connect_errno) {
    die("error de conexión: " . $conexion->connect_error);
}
$arr = json_decode($_POST["arr"], true);

$sql="INSERT INTO `partes_servicio`( `nombre_trabajador`, `dni_trabajador`, `fecha`, `hora`, `descripcion`, `tipo_incidencia`, `puesto`, `nombre_victima`, `patologia`, `procedencia`, `ambulancia`, `activo`)
VALUES ('$arr[1]','$arr[2]','$arr[3]','$arr[4]','$arr[8]','$arr[10]','$arr[5]','$arr[6]','$arr[9]','$arr[7]','$arr[11]','S')";

$conexion->query($sql);
