<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class Servicio extends Model
{
    use HasFactory;

    public function getServiciosByUser($dni){
        return DB::table('partes_servicio')->where('dni_trabajador', '=', $dni)->get();
    }
    public function getServicios(){
        return DB::table('partes_servicio')->get();
    }
    public function setServicio($nombreT,$dniT,$fecha,$hora,$descripcion,$tipo,$puesto,$nombreV,$patologia,$procedencia,$ambulancia){
        try {
            DB::table('partes_servicio')->insert([
                'nombre_trabajador'=>$nombreT,
                'dni_trabajador'=>$dniT,
                'fecha'=>$fecha,
                'hora'=>$hora,
                'descripcion'=>$descripcion,
                'tipo_incidencia'=>$tipo,
                'puesto'=>$puesto,
                'nombre_victima'=>$nombreV,
                'patologia'=>$patologia,
                'procedencia'=>$procedencia,
                'ambulancia'=>$ambulancia
            ]);
            return 'Parte de servicio guardado!';
        } catch (Exception $e) {
            return 'Ha habido un problema en la transaccion . . .';
        }
        
    }
}
