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
        return view('menu', ['user' => Auth::user(), 'mensaje' => '']);
    }
    public function showTrabajadores()
    {
        $trabajadores = $this->user->getUsers();
        return view('tabla_trabajadores', ['trabajadores' => $trabajadores, 'rol' => $this->user->getRol(Auth::user()->dni),'texto'=>'']);
    }
    public function showServicios()
    {
        $partes = 0;

        if ($this->user->getRol(Auth::user()->dni) == 'A') {
            $partes = $this->servicio->getServicios();
        } else {
            $partes = $this->servicio->getServiciosByUser(Auth::user()->dni);
        }
        return view('tabla_servicios', ['rol' => $this->user->getRol(Auth::user()->dni), 'partes' => $partes, 'mensaje' => '']);
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
            'texto' => $texto
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
            'texto'=>$texto
        ]);
    }
}
