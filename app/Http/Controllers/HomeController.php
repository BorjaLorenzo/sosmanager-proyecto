<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $rol=Auth::id();
       
        return view('menu_trabajador',['rol'=>$rol]);
        // switch ($rol) {
        //     case 'T':
        //         return view('menu_adm',['rol'=>$rol]);
        //         break;
        //     case 'E':
        //         return view('menu_encargado');
        //         break;
        //     case 'A':
        //         return view('menu_adm');
        //         break;
        // }
    }
}
