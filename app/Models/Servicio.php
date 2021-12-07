<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use Exception as GlobalException;
use Illuminate\Database\QueryException;

class Servicio extends Model
{
    use HasFactory;

    public function getServiciosByUser($dni){
        return DB::table('partes_servicio')->where('dni_trabajador', '=', $dni)->get();
    }
    public function getServicios(){
        return DB::table('partes_servicio')->get();
    }
    public function insertServicio($inputs){
        try {
            if (isset($inputs['iambulancia'])) {
                $inputs['iambulancia']='SI';
            } else {
                $inputs['iambulancia']='NO';
            }
            DB::table('partes_servicio')->insert([
                'nombre_trabajador'=>$inputs['inombre'],
                'dni_trabajador'=>$inputs['idni'],
                'fecha'=>$inputs['ifecha'],
                'hora'=>$inputs['ihora'],
                'tipo_incidencia'=>$inputs['itipo'],
                'puesto'=>$inputs['ipuesto'],
                'nombre_victima'=>$inputs['ivictima'],
                'procedencia'=>$inputs['iprocedencia'],
                'patologia'=>$inputs['ipatologia'],
                'descripcion'=>$inputs['idescripcion'],
                'ambulancia'=>$inputs['iambulancia'],
                'activo'=>'S'
            ]);

            return true;
        } catch (GlobalException $e) {
            echo $e;
            return false;
        }
    }
    public function updateServicio($inputs){
        try {
            if (isset($inputs['ambulancia'])) {
                $inputs['ambulancia']='SI';
            } else {
                $inputs['ambulancia']='NO';
            }
            DB::table('partes_servicio')->where('dni_trabajador',$inputs['dni'])->update([
                'fecha'=>$inputs['fecha'],
                'hora'=>$inputs['hora'],
                'descripcion'=>$inputs['descripcion'],
                'tipo_incidencia'=>$inputs['tipo'],
                'puesto'=>$inputs['puesto'],
                'nombre_victima'=>$inputs['victima'],
                'procedencia'=>$inputs['procedencia'],
                'patologia'=>$inputs['patologia'],
                'descripcion'=>$inputs['descripcion'],
                'ambulancia'=>$inputs['ambulancia']
            ]);
            return true;
        } catch (GlobalException $e) {
            echo $e;
            return false;
        }
    }
    public function deleteServicio($inputs)
    {
        try {
            DB::table('partes_servicio')->where('id', $inputs['id'])->update(['activo' => 'N']);
            return true;
        } catch (GlobalException $e) {
            echo $e;
            return false;
        }
        
    }
}
