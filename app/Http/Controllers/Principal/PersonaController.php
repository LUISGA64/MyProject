<?php

namespace App\Http\Controllers\Principal;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Catalogos\Estado_Civil;
use App\Models\Catalogos\Genero;
use App\Models\Catalogos\Nivel_Educativo;
use App\Models\Catalogos\Ocupacion;
use App\Models\Catalogos\Parentesco;
use App\Models\Catalogos\Tipo_Doc;
use App\Models\Principal\Grupo_Familiar;
use App\Models\Principal\Persona;
use Carbon\Carbon;
use Datatables;
use DB;
use Illuminate\Http\Request;
use Validator;

class PersonaController extends Controller
{

    public function index(Request $request)
    {
        $personas = DB::table('personas')
            ->join('tipo_docs', 'personas.tipodoc_id', '=', 'tipo_docs.tipodocs_id')
            ->join('generos', 'personas.genero_id', '=', 'generos.generos_id')
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
    }



    public function store(Request $request, $idGrupoFamiliar)
    {
        $validator = Validator::make($request->all(),[
            'identificacion'    => 'required|unique:personas',
            'nombre_1'          => 'required',
            'apellido_1'        => 'required',
            'fecha_nacimiento'  => 'required',
            'genero'            => 'required',
            'cabezahogar'       => 'required',
            'nivel_educativo'   => 'required',
            'ocupacion'         => 'required',
        ]);

        $messages = [
            'identificacion.required'   =>  'El número de Identificacion es requerido.',
            'identificacion.unique'     =>  'El usuario ya esta registrado',
            'nombre_1.required'         =>  'El nombre del usuario es obligatorio',
            'apellido_1.required'       =>  'El primer apellido es requerido',
            'fecha_nacimiento.required' =>  'La fecha de nacimiento es requerida',
            'genero.required'           =>  'El genero es requerido',
            'cabezahogar.required'      =>  'El campo Cabeza Hogar es requerido',
            'nivel_educativo.required'  =>  'El campo Nivel Educativo es requerido',
            'ocupacion.required'        =>  'La ocupacion es requerida'
        ];

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $persona = new Persona;
        $persona->tipodoc_id = $request->tipodocs_id;
        $persona->identificacion = $request->identificacion;
        $persona->expedicion = $request->expedicion;
        $persona->nombre_1 = $request->nombre_1;
        $persona->nombre_2 = $request->nombre_2;
        $persona->apellido_1 = $request->apellido_1;
        $persona->apellido_2 = $request->apellido_2;
        $persona->telefono = $request->telefono;
        $persona->direccion = $request->direccion;
        $persona->genero_id = $request->genero;
        $persona->estadocivil_id = $request->estado_civil;
        $persona->cabeza_familia = $request->cabezahogar;
        $persona->nivelEducativo_id = $request->nivel_educativo;
        $persona->grupofamiliar_id = $idGrupoFamiliar;
        $persona->ocupacion_id = $request->ocupacion;
        $persona->parentesco_id = $request->parentesco;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
        $persona->edad = Carbon::parse($persona->fecha_nacimiento)->age;
        $fullname = $request->nombre_1.' '.$request->nombre_2.' '.$request->apellido_1.' '.$request->apellido_2;
        $persona->vereda_id = 1;
        $persona->save();
        $personas = Persona::all();
        Alert::success('Comunero Registrado a la ficha Familiar', $fullname);
        return redirect()->route('personagrupo-familiar.new',[$idGrupoFamiliar]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $generos = Genero::all();
        $tiposdocumento = Tipo_Doc::all();
        $parentescos = Parentesco::all();
        $ocupaciones = Ocupacion::all();
        $niveles_educativos = Nivel_Educativo::all();
        $estadosciviles = Estado_Civil::all();
        $grupos_familiares = Grupo_Familiar::all();
        $personas = Persona::find($id);

        return view('censoweb.personas.edit', compact(
            'grupos',
            'personas',
            'generos',
            'tiposdocumento',
            'parentescos',
            'ocupaciones',
            'niveles_educativos',
            'estadosciviles'
        ));
    }

    public function update(Persona $persona, Request $request, $id)
    {
        $persona = Persona::findOrFail($id);
        $persona->tipodoc_id = $request->tipo_doc;
        $persona->identificacion = $request->identificacion;
        $persona->expedicion = $request->expedicion;
        $persona->nombre_1 = $request->nombre_1;
        $persona->nombre_2 = $request->nombre_2;
        $persona->apellido_1 = $request->apellido_1;
        $persona->apellido_2 = $request->apellido_2;
        $persona->telefono = $request->telefono;
        $persona->direccion = $request->direccion;
        $persona->genero_id = $request->genero;
        $persona->estadocivil_id = $request->estado_civil;
        $persona->nivelEducativo_id = $request->nivel_educativo;
        $persona->ocupacion_id = $request->ocupacion;
        $persona->parentesco_id = $request->parentesco;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
        $persona->edad = Carbon::parse($persona->fecha_nacimiento)->age;
        $fullname = $request->nombre_1.' '.$request->nombre_2.' '.$request->apellido_1.' '.$request->apellido_2;
        $persona->save();
        Alert::success('Datos Actualizados');
        return redirect()->route('personagrupo-familiar.index');
    }

    public function destroy($id)
    {
        //
    }
}
