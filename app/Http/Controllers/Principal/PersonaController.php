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
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $ficha = Grupo_Familiar::all();
        return view('censoweb.personas.index', compact('id', 'ficha'));
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

        /*$this->validate($request, [
            'nombre_1' => 'required|min:3|max:15',
            'nombre_2' => 'min:3|max:15',
            'apellido_1' => 'required|min:3|max:15',
            'apellido_2' => 'min:3|max:15',
            'telefono' => 'min:6|max:12|numeric',
            'direccion' => 'required',
            'id_genero' => 'required',
            'id_estado_civil' => 'required',
            'cabeza_familia',
            'id_niveleducativo' => 'required',
            'id_grupo_familiar' => 'required',
            'id_ocupacion' => 'required',
            'id_parentesco'
            ]);*/

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
        $persona->cabeza_familia = 1;
        $persona->id_niveleducativo = $request->nivel_educativo;
        $persona->id_grupo_familiar = $idGrupoFamiliar;
        $persona->id_ocupacion = $request->ocupacion;
        $persona->id_parentesco = $request->parentesco;
        //dd($persona);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::find($id);
        dd($persona);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
