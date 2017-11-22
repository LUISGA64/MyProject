<?php

namespace App\Http\Controllers;
use App\Models\Localidad\Resguardo;
use App\Models\Principal\Persona;
use DB;
use Alert;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resg = Resguardo::first();
        $personas = DB::table('personas')
        ->join('generos','id','=','personas.id_genero')
        ->where('generos.cod_genero', '=', 'F')
        ->select(DB::raw('count(*) as comuneros_femenino'))
        ->get();
        //dd($personas);
        return view('home', compact('personas','resg'));

    }
}
