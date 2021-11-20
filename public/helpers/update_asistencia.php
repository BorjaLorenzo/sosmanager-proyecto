<?php
include_once '_conexion.php';
if ($conexion->connect_errno) {
    die("error de conexión: " . $conexion->connect_error);
}
$arr = json_decode($_POST["arr"], true);

$sql = "UPDATE `partes_servicio` 
 SET `nombre_trabajador`='$arr[1]',`dni_trabajador`='$arr[2]',
`fecha`='$arr[3]',`hora`='$arr[4]',`descripcion`='$arr[8]',
`tipo_incidencia`='$arr[10]',`puesto`='$arr[5]',`nombre_victima`='$arr[6]',
`patologia`='$arr[9]',`procedencia`='$arr[7]',`ambulancia`='$arr[11]'
 WHERE `id`='$arr[0]'";
$conexion->query($sql);
