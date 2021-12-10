<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Exception as GlobalException;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dni',
        'rol',
        'activo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function getUserByDni($dni)
    {
        return DB::table('detalles_users')->where('dni', '=', $dni)->get();
    }
    public function getUsers()
    {
        return DB::table('detalles_users')->get();
    }
    public function getRol($dni)
    {
        return DB::table('detalles_users')->where('dni', '=', $dni)->value('rol');
    }
    public function deleteUser($dni)
    {
        try {
            DB::table('users')->where('dni', '=', $dni)->delete();
            DB::table('detalles_users')->where('dni', '=', $dni)->update(['activo' => 'N']);
            return true;
        } catch (GlobalException $e) {
            return false;
        }
    }
    public function updateUser($inputs)
    {
        try {
            DB::table('users')->where('dni', '=', $inputs['old_dni'])->update(['name' =>$inputs['nombre'] ,'dni' => $inputs['dni']]);
            if (isset($inputs['asuntos'])) {
                $inputs['asuntos']='S';
            } else {
                $inputs['asuntos']='N';
            }
            DB::table('detalles_users')->where('dni', '=', $inputs['old_dni'])->update(['dni' => $inputs['dni'],'nombre' =>$inputs['nombre'],'grupo' =>$inputs['grupo'],'rol' => $inputs['rol'],'asuntos_propios' => $inputs['asuntos']]);
            return true;
        } catch (GlobalException $e) {
            return false;
        }
    }
    public function getSinRol(){
        try {
            return DB::table('detalles_users')->where('rol', '')->get();
        } catch (GlobalException $e) {
            return false;
        }
    }
    public function deleteNuevoTrabajador($inputs){
        try {
            DB::table('detalles_users')->where('dni', $inputs['dni'])->delete();
            DB::table('users')->where('dni', $inputs['dni'])->delete();
            return true;
        } catch (GlobalException $e) {
            echo $e;
            return false;
        }
    }
    public function confirmarNuevoTrabajador($inputs){
        try {
            DB::table('detalles_users')->where('dni', $inputs['dni'])->update(['grupo' =>$inputs['grupo'] ,'rol' => $inputs['rol']]);
            return true;
        } catch (GlobalException $e) {
            echo $e;
            return false;
        }
    }
}
