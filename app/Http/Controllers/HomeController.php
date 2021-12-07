<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $user;
    protected $servicio;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = new User();
        $this->servicio = new Servicio();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('menu', ['usuario' => $this->user->getUserByDni(Auth::user()->dni)]);
    }
    public function showTrabajadores()
    {
        $trabajadores = $this->user->getUsers();
        return view('tabla_trabajadores', ['trabajadores' => $trabajadores, 'rol' => $this->user->getRol(Auth::user()->dni),'texto'=>'','usuario' => $this->user->getUserByDni(Auth::user()->dni)]);
    }
    public function showServicios()
    {
        if ($this->user->getRol(Auth::user()->dni) == 'A') {
            $partes = $this->servicio->getServicios();
        } else {
            $partes = $this->servicio->getServiciosByUser(Auth::user()->dni);
        }
        return view('tabla_servicios', ['usuario' => $this->user->getUserByDni(Auth::user()->dni), 'partes' => $partes, 'texto'=>'']);
    }
    public function eliminar_trabajador(Request $request)
    {
        $mensaje = $this->user->deleteUser($request->input('dni_eliminar'));
        $trabajadores = $this->user->getUsers();
        if ($mensaje) {
            $texto = 'Usuario eliminado correctamente';
        } else {
            $texto = 'Ha ocurrido un problema durante el proceso, intentalo de nuevo';
        }

        return view('tabla_trabajadores', [
            'trabajadores' => $trabajadores,
            'rol' => $this->user->getRol(Auth::user()->dni),
            'mensaje' => $mensaje,
            'texto' => $texto,
            'usuario' => $this->user->getUserByDni(Auth::user()->dni)
        ]);
    }
    public function editar_trabajador(Request $request)
    {
        $mensaje=$this->user->updateUser($request->collect());
        if ($mensaje) {
            $texto = 'Usuario editado correctamente';
        } else {
            $texto = 'Ha ocurrido un problema durante el proceso, intentalo de nuevo';
        }

        $trabajadores = $this->user->getUsers();
        return view('tabla_trabajadores', [
            'trabajadores' => $trabajadores, 
            'rol' => $this->user->getRol(Auth::user()->dni), 
            'mensaje' => $mensaje,
            'texto'=>$texto,
            'usuario' => $this->user->getUserByDni(Auth::user()->dni)
        ]);
    }
    public function insertar_parte(Request $request){
        $mensaje=$this->servicio->insertServicio($request->collect());
        if ($mensaje) {
            $texto = 'Parte de servicio realizado correctamente';
        } else {
            $texto = 'Ha ocurrido un problema durante el proceso, intentalo de nuevo';
        }

        if ($this->user->getRol(Auth::user()->dni) == 'A') {
            $partes = $this->servicio->getServicios();
        } else {
            $partes = $this->servicio->getServiciosByUser(Auth::user()->dni);
        }
        return view('tabla_servicios', ['usuario' => $this->user->getUserByDni(Auth::user()->dni), 'partes' => $partes, 'mensaje' => $mensaje,'texto'=>$texto]);
        // return view('test',['variable'=>$mensaje]);
    }
    public function editar_parte(Request $request){
        $mensaje=$this->servicio->updateServicio($request->collect());
        if ($mensaje) {
            $texto = 'Servicio editado correctamente';
        } else {
            $texto = 'Ha ocurrido un problema durante el proceso, intentalo de nuevo';
        }

        if ($this->user->getRol(Auth::user()->dni) == 'A') {
            $partes = $this->servicio->getServicios();
        } else {
            $partes = $this->servicio->getServiciosByUser(Auth::user()->dni);
        }
        return view('tabla_servicios', ['usuario' => $this->user->getUserByDni(Auth::user()->dni), 'partes' => $partes, 'mensaje' => $mensaje,'texto'=>$texto]);
    }
    public function eliminar_parte(Request $request){
        $mensaje=$this->servicio->deleteServicio($request->collect());
        if ($mensaje) {
            $texto = 'Servicio eliminado correctamente';
        } else {
            $texto = 'Ha ocurrido un problema durante el proceso, intentalo de nuevo';
        }

        if ($this->user->getRol(Auth::user()->dni) == 'A') {
            $partes = $this->servicio->getServicios();
        } else {
            $partes = $this->servicio->getServiciosByUser(Auth::user()->dni);
        }
        return view('tabla_servicios', ['usuario' => $this->user->getUserByDni(Auth::user()->dni), 'partes' => $partes, 'mensaje' => $mensaje,'texto'=>$texto]);
    }
}
