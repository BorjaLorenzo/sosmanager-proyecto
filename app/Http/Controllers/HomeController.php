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
        return view('menu', ['user' => Auth::user()]);
    }
    public function showTrabajadores()
    {
        $trabajadores = $this->user->getUsers();
        return view('tabla_trabajadores', ['trabajadores' => $trabajadores, 'usuario' => Auth::user()]);
    }
    public function showServicios()
    {
        $partes = 0;

        if (Auth::user()->rol == 'A') {
            $partes = $this->servicio->getServicios();
        } else {
            $partes = $this->servicio->getServiciosByUser(Auth::user()->dni);
        }
        return view('tabla_servicios', ['usuario' => Auth::user(), 'partes' => $partes]);
    }
}
