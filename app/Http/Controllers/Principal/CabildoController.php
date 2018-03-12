<?php

namespace App\Http\Controllers\Principal;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Catalogos\Cargos;
use App\Models\Catalogos\Tipo_Doc;
use App\Models\Localidad\Resguardo;
use App\Models\Resguardo\Integrantes;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;


class CabildoController extends Controller
{

    public function index()
    {        
        $y = Carbon::now()->year;

        $resg = Resguardo::first();
        $intspl = DB::table('integrantes')
        ->join('cargos','integrantes.cargo_id','=','cargos.cargo_id')
        ->select(
            'integrantes.integrantes_id',
            'integrantes.integrante',
            'cargos.cargo as car')
        ->where('cargos.principal', '=', '0')
        ->where('vigencia_inicio','=',$y)->get();

        $gobp = DB::table('integrantes')
        ->join('cargos','integrantes.cargo_id','=','cargos.cargo_id')
        ->select(
            'integrantes.integrantes_id',
            'integrantes.integrante',
            'cargos.cargo')
        ->where('cargos.principal', '=', '1')
        ->where('vigencia_inicio','=',$y)->get();

    
        return view('censoweb.cabildo.index', compact('resg','gobp','intspl'));
    }



    public function create()
    {
        $resg = Resguardo::first();
        $tipodocs = Tipo_Doc::all();
        $cargos = Cargos::all();
        return view('censoweb.cabildo.create', compact('tipodocs', 'cargos','resg'));
    }


    public function store(Request $request)
    {
        $y = Carbon::now()->year;
        $integ = Integrantes::where('vigencia_inicio',$y)->get();

        $this->validate($request,[
            'integrante'        => 'required',
            'identificacion'    => 'required',
            'tipodocs'          => 'required',
            'cargo'             => 'required',
            'vigencia'          => 'required',
        ]);

        $integrantes = New Integrantes;
        $integrantes->integrante= $request->integrante;
        $integrantes->identificacion = $request->identificacion;
        $integrantes->tipodoc_id = $request->tipodocs;
        $integrantes->cargo_id = $request->cargo;
        $integrantes->vigencia_inicio = $request->vigencia;

        $integrantes->save();
        Alert::success('Registro Exitoso', 'Censo Web');
        return redirect()->route('cabildo.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $resg = Resguardo::first();
        $tipodocs = Tipo_Doc::all();
        $cargos = Cargos::all();
        $integrantes =  Integrantes::findOrFail($id);
        return view('censoweb.cabildo.edit', compact('integrantes', 'resg', 'cargos', 'tipodocs'));
    }



    public function update(Integrantes $integrantes, Request $request, $id)
    {   
        $integrantes = Integrantes::findOrFail($id);
        $integrantes->integrante = $request->integrante;
        $integrantes->identificacion = $request->identificacion;
        $integrantes->tipodoc_id = $request->tipodocs;
        $integrantes->cargo_id = $request->cargo;
        $integrantes->vigencia_inicio = $request->vigencia;
        $integrantes->save();


        Alert::success('Modificado con Exito!', $request->integrante);
        return redirect()->route('cabildo.index');
    }

    

    public function destroy($id)
    {
        //
    }
}
