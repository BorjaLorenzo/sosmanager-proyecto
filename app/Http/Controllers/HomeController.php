<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $model_user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->model_user=new User();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $user=Auth::user();

        return view('menu',['user'=>$user]);
        
    }
    public function showTrabajadores(){
        $trabajadores=$this->model_user->getUsers();
        return view('tabla_trabajadores',['trabajadores'=>$trabajadores,'usuario'=>Auth::user()]);
    }
}
