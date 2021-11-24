<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Empresa;
use App\Models\User;

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
        $empresas = Empresa::get()->where('estado',1);
        $usuario = User::findOrFail(Auth::user()->id);
        $empresas_disponibles = $usuario->empresas;
        return view('home',['empresas_disponibles' => $empresas_disponibles]);
    }
}
