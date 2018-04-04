<?php

namespace App\Http\Controllers\Principal;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Localidad\Resguardo;
use App\Models\Principal\Persona;
use App\Models\Resguardo\Aval;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;


class AvalController extends Controller
{
   
    public function index()
    {
         $y = Carbon::now()->year;
    	$resg = Resguardo::get();
         $avals =DB::table('avals')
        ->join('personas','avals.persona_id', '=','personas.id_persona')
        ->join('resguardos','avals.resguardo_id','=','resguardos.id')
        ->select(
            'personas.*',
            'avals.*',
            'resguardos.*'
        )//->where('vigencia_inicio',$y)
        ->get();

        return view ('censoweb.aval.index', compact('avals','resg'));
    }

    


    public function create($id)
    {
        $persona = Persona::findOrFail($id);
        $resguardo = Resguardo::all();
        if ($persona->edad >= 18) {
            return view('censoweb.aval.create', compact('persona', 'resguardo'));
        }else{
            Alert::warning('No puedes solicitar Aval', 'Censo Web');
            return redirect()->route('personagrupo-familiar.index');
        }
        
    }

    
    public function store(Request $request)
    {
        $resguardo = Resguardo::first();
        $persona = Persona::find($request->pers);
        
        $aval = new Aval;
        $aval->resguardo_id =  $request->resguardo;
        $aval->entidadSolicita = $request->entSolicita;
        $aval->persona_id = $request->pers;
        $aval->formato = $request->documentosolicitado;
        $aval->detalle = $request->detalle;
        $aval->cargoAspirante = $request->cargo;
        
        //dd($aval);
        $aval->save();
        Alert::success('Aval Generado', 'Censo Web');
        return redirect()->route('aval-index');
    }


    public function avalPdf ($id)
    {
        $y = Carbon::now()->year;
        $resg = Resguardo::get();
        
        $it = DB::table('integrantes')
        ->join('cargos','integrantes.cargo_id','=','cargos.cargo_id')
        ->select('integrante', 'cargo','prioridad')
        ->where('vigencia_inicio',$y)
        //->where('prioridad',1)
        ->get();

        //Gobernador Principal
        $gb = DB::table('integrantes')
        ->join('cargos','integrantes.cargo_id','=','cargos.cargo_id')
        ->select('integrante', 'cargo')
        ->where('vigencia_inicio',$y)
        ->where('prioridad',1)
        ->get();
        //Secretario General
        $sc = DB::table('integrantes')
        ->join('cargos','integrantes.cargo_id','=','cargos.cargo_id')
        ->select('integrante', 'cargo')
        ->where('vigencia_inicio',$y)
        ->where('prioridad',3)
        ->get();
        //GobernadorSuplente
        $gbs = DB::table('integrantes')
        ->join('cargos','integrantes.cargo_id','=','cargos.cargo_id')
        ->select('integrante', 'cargo')
        ->where('vigencia_inicio',$y)
        ->where('prioridad',8)
        ->get();
        //Fiscal
        $fc = DB::table('integrantes')
        ->join('cargos','integrantes.cargo_id','=','cargos.cargo_id')
        ->select('integrante', 'cargo')
        ->where('vigencia_inicio',$y)
        ->where('prioridad',4)
        ->get();
        //Capitan
        $cp = DB::table('integrantes')
        ->join('cargos','integrantes.cargo_id','=','cargos.cargo_id')
        ->select('integrante', 'cargo')
        ->where('vigencia_inicio',$y)
        ->where('prioridad',6)
        ->get();
        //Secretario suplente
        $scs = DB::table('integrantes')
        ->join('cargos','integrantes.cargo_id','=','cargos.cargo_id')
        ->select('integrante', 'cargo')
        ->where('vigencia_inicio',$y)
        ->where('prioridad',10)
        ->get();

        $aval = Aval::
        join('personas as p','avals.persona_id', '=','p.id_persona')
        ->join('tipo_docs as td','p.tipodoc_id','=','td.tipodocs_id')
        ->join('resguardos as r','avals.resguardo_id','=','r.id')
        //->join('cargos as c','r.id','=','c.resguardo_id')
        //->join('integrantes as it','c.cargo_id','=','it.cargo_id')
        ->select(
            'p.nombre_1',
            'p.nombre_2',
            'p.apellido_1',
            'p.apellido_2',
            'p.identificacion as identidad',
            'p.edad',
            'p.expedicion',
            'td.codigo_doc',
            'td.tipo_documento',
            'r.identificacion',
            'r.resguardo',
            'r.pueblo',
            'r.resolucion',
            'r.tipo_doc',
            'r.direccion_resg',
            'r.jurisdiccion',
            'r.email_resg',
            'avals.*'
            )-> where('avals.avals_id',$id)->get();
        
        //dd($aval->nombre_2);
        $view =  \View::make('censoweb.aval.pdf', compact('aval','resg','gb','sc','gbs','fc','cp','scs'))->render();        
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        foreach ($aval as $v) {
          $identidad =   $v->identidad;
            return $pdf->stream($identidad.'-'.'Aval.pdf');  
        }
    }


    public function show()
    {
        return view('censoweb.aval.show');
    }

    

    public function edit($id)
    {
        //
    }

    

    public function update(Request $request, $id)
    {
        //
    }

    

    
    public function destroy($id)
    {
        //
    }



}
