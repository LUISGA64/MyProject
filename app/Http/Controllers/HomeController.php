<?php

namespace App\Http\Controllers;
use Alert;
use App\Models\Localidad\Resguardo;
use App\Models\Principal\Persona;
use ConsoleTVs\Charts\Facades\Charts;
use Storage;


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
        $resg = Resguardo::where('id',24)->get();
        
        //Usuarios por genero
        $fem = Persona::where('genero_id',1)->count();
        $masc = Persona::where('genero_id',2)->count();
        
        $chart = Charts::create('pie', 'chartjs')
        ->title('Población por Genero')
        ->elementLabel('Femenino','Masculino')
        ->colors(['#26BCA8','#214F73'])
        ->values([$fem,$masc])
        ->responsive(false)
        ->labels(['Femenino','Masculino'])
        //->backgroundColor('orange')
        ->dimensions(0,500)
        ->export(true);
       
        //dd($chart);

        return view('home',['chart' =>$chart]);

    }
}
