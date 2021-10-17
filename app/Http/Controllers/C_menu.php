<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_menu;
use App\Models\M_user;

class C_menu extends Controller
{
    private $menu;
    private $user;

    public function __construct()
    {
        $this->menu=new M_menu();
        $this->menu=new M_user();
    }

    
}
