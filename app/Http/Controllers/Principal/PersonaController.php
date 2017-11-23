<?php

namespace App\Http\Controllers\Principal;

use App\Http\Controllers\Controller;
use App\Models\Principal\Persona;
use App\Models\Catalogos\Estado_Civil;
use App\Models\Catalogos\Genero;
use App\Models\Catalogos\Nivel_Educativo;
use App\Models\Catalogos\Ocupacion;
use App\Models\Catalogos\Parentesco;
use App\Models\Catalogos\Tipo_Doc;
use App\Models\Principal\Grupo_Familiar;
use Illuminate\Http\Request;
use Datatables;
use Carbon\Carbon;
use Alert;
use DB;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $personas = DB::table('personas')
        ->join('tipo_docs', 'personas.id_tipo_doc', '=', 'tipo_docs.id')
        ->join('generos', 'personas.id_genero', '=', 'generos.id')
        ->select(
            'personas.id_persona',
            'personas.grupofamiliar_id',
            'personas.identificacion',
            'personas.nombre_1',
            'personas.nombre_2',
            'personas.apellido_1',
            'personas.apellido_2',
            'personas.fecha_nacimiento',
            'personas.edad',
            'generos.genero',
            'tipo_docs.codigo_doc')
        ->get();
        return view('censoweb.personas.index', compact('id', 'ficha', 'personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $grupofamiliar = Grupo_Familiar::find($id);
        $generos = Genero::all();
        $ocupaciones = Ocupacion::all();
        $niveles_educativos = Nivel_Educativo::all();
        $estadosciviles = Estado_Civil::all();
        $tiposdocumento = Tipo_Doc::all();
        $parentescos = Parentesco::all();
        return view('censoweb.personas.create', compact(
            'grupofamiliar',
            'generos',
            'ocupaciones',
            'niveles_educativos',
            'estadosciviles',
            'tiposdocumento',
            'parentescos'));
        //dd($grupofamiliar);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idGrupoFamiliar)
    {
        $persona = new Persona;
        $fullname = $request->nombre_1.' '.$request->nombre_2.' '.$request->apellido_1.' '.$request->apellido_2;
        $persona->id_tipo_doc = $request->tipo_doc;
        $persona->identificacion = $request->identificacion;
        $persona->nombre_1 = $request->nombre_1;
        $persona->nombre_2 = $request->nombre_2;
        $persona->apellido_1 = $request->apellido_1;
        $persona->apellido_2 = $request->apellido_2;
        $persona->telefono = $request->telefono;
        $persona->direccion = $request->direccion;
        $persona->id_genero = $request->genero;
        $persona->id_estado_civil = $request->estado_civil;
        $persona->cabeza_familia = $request->cabezahogar;
        $persona->id_niveleducativo = $request->nivel_educativo;
        $persona->grupofamiliar_id = $idGrupoFamiliar;
        $persona->id_ocupacion = $request->ocupacion;
        $persona->id_parentesco = $request->parentesco;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
        $persona->edad = Carbon::parse($persona->fecha_nacimiento)->age;
        $persona->save();
        $personas = Persona::all();
        Alert::success('Comunero Registrado a la ficha Familiar', 'Censo Web');
        return redirect()->route('personagrupo-familiar.new',[$idGrupoFamiliar]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit(Persona $id_persona)
    {
        $generos = Genero::all();
        $tiposdocumento = Tipo_Doc::all();
        $parentescos = Parentesco::all();
        $ocupaciones = Ocupacion::all();
        $niveles_educativos = Nivel_Educativo::all();
        $estadosciviles = Estado_Civil::all();
        
        $personas = Persona::find($id_persona);
        dd($id_persona);

        /*return view('censoweb.personas.edit', compact(
            'personas', 
            'generos',
            'tiposdocumento',
            'parentescos', 
            'ocupaciones',
            'niveles_educativos',
            'estadosciviles'
        ));*/
        
    }

    /*public function edit(Persona $id_persona)
    {   
        $grupofamiliar = Grupo_Familiar::all();
        $generos = Genero::all();
        $tiposdocumento = Tipo_Doc::all();
        $parentescos = Parentesco::all();
        $ocupaciones = Ocupacion::all();
        $niveles_educativos = Nivel_Educativo::all();
        $estadosciviles = Estado_Civil::all();
        $personas = DB::table('personas')
        ->join('grupos_familiares as gf','gf.id','=','personas.grupofamiliar_id')
        ->join('generos as gn','gn.id','=','personas.id_genero')
        ->join('tipo_docs as td','td.id','=','personas.id_tipo_doc')
        ->join('parentescos as pt','pt.id','=','personas.id_parentesco')
        ->join('ocupaciones as oc','oc.id','=','personas.id_ocupacion')
        ->join('niveles_educativos as ne','ne.id','=','personas.id_niveleducativo')
        ->join('estados_civiles as ec','ec.id','=','personas.id_estado_civil')
        ->where('personas.id_persona','=',$id_persona)
        ->select('personas.*',
            'gf.id',
            'gn.cod_genero',
            'td.codigo_doc',
            'ec.estado_civil',
            'oc.ocupacion',
            'ne.nivel_educativo',
            'pt.parentesco')
            ->first();
            
        return view('censoweb.personas.create', compact('personas',
            'grupofamiliar',
            'generos',
            'tiposdocumento',
            'parentescos', 
            'ocupaciones',
            'niveles_educativos',
            'estadosciviles',
            'personas'
            ));
            
        
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        //$personas = Persona::find($id)->update($request->all());
        //return redirect()->route('censo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
