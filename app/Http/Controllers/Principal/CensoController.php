<?php

namespace App\Http\Controllers\Principal;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Catalogos\Estado_Civil;
use App\Models\Catalogos\Genero;
use App\Models\Catalogos\Nivel_Educativo;
use App\Models\Catalogos\Ocupacion;
use App\Models\Economia\Actividad_Economica;
use App\Models\Economia\Tipo_Actividad;
use App\Models\Principal\Grupo_Familiar;
use App\Models\Vivienda\Agua_Servida;
use App\Models\Vivienda\Consumo_Agua;
use App\Models\Vivienda\Eliminar_Excretas;
use App\Models\Vivienda\Material_Pared;
use App\Models\Vivienda\Material_Piso;
use App\Models\Vivienda\Material_Techo;
use App\Models\Vivienda\Riesgo_Vivienda;
use App\Models\Vivienda\Tipo_Alumbrado;
use App\Models\Vivienda\Tipo_Vivienda;
use App\Models\Vivienda\Vector_Vivienda;
use DB;
use Illuminate\Http\Request;


//use Illuminate\Pagination\Paginator;
//use Illuminate\Pagination\LengthAwarePaginator;

class CensoController extends Controller
{


    public function byactividad($id)
    {
        return Tipo_Actividad::where('id_actividad_economica',$id)->get();
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$personas = DB:: table ('grupos_familiares')
        ->join('personas', 'grupos_familiares.id', '=', 'personas.id_grupo_familiar')
        ->join('generos', 'personas.id_genero', '=', 'generos.id')
        ->join('tipo_docs', 'personas.id_tipo_doc', '=', 'tipo_docs.id')
        ->select(
            'grupos_familiares.numero_ficha',
            'personas.id_persona',
            'personas.nombre_1', 
            'personas.nombre_2',
            'personas.apellido_1',
            'personas.apellido_2',
            'personas.identificacion',
            'personas.direccion',
            'personas.telefono',
            'tipo_docs.codigo_doc', 
            'generos.cod_genero')
        ->paginate(7);
        return view('censoweb.censo.index', compact('personas'));*/

        $grupos = DB::table('grupos_familiares')
            ->join('personas', 'grupos_familiares.id', '=', 'personas.id_grupo_familiar')
            ->select(
                'grupos_familiares.id',
                'grupos_familiares.numero_ficha',
                'grupos_familiares.direccion',
                'grupos_familiares.zona',
                'personas.nombre_1',
                'personas.nombre_2',
                'personas.apellido_1',
                'personas.apellido_2')
                ->where('personas.cabeza_familia','=','T')
        ->paginate(2);
        //dd($grupos);
        return view('censoweb.censo.index', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tiposvivienda = Tipo_Vivienda::all();
        $acteconom = Actividad_Economica::all();
        $materialestecho = Material_Techo::all();
        $materialespiso = Material_Piso::all();
        $materialparedes = Material_Pared::all();
        $riesgos = Riesgo_Vivienda::all();
        $vectores = Vector_Vivienda::all();
        $generos = Genero::all();
        $estadosciviles = Estado_Civil::all();
        $ocupaciones = Ocupacion::all();
        $niveles_educativos = Nivel_Educativo::all();
        $tiposalumbrado = Tipo_Alumbrado::all();
        $consumosagua = Consumo_Agua::all();
        $excretas = Eliminar_Excretas::all();
        $aguaservidas = Agua_Servida::all();
        return view ('censoweb.censo.create', compact(
            'tiposvivienda',
            'acteconom',
            'materialestecho', 
            'materialespiso',
            'materialparedes',
            'riesgos',
            'vectores',
            'generos',
            'estadosciviles',
            'ocupaciones',
            'niveles_educativos',
            'tiposalumbrado',
            'consumosagua',
            'excretas',
            'aguaservidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ficha' => 'required|numeric',
            'direccion',
            'zona' => 'required',
            'id_tipo_vivienda',
            'id_material_paredes',
            'id_material_pisos',
            'id_material_techo',
            'id_tipo_actividad',
            'consumo_agua',
            'tipo_alumbrado',
            'elimina_excretas',
            'aguas_servidas',
            'id_vector_viviendas',
            'id_riesgo_vivienda'
            ]);
        $grupo_familiar = new Grupo_Familiar;
        $grupo_familiar->numero_ficha = $request->ficha;
        $grupo_familiar->direccion = $request->direccion;
        $grupo_familiar->zona = $request->zona;
        $grupo_familiar->id_tipo_vivienda = $request->tipo_vivienda;
        $grupo_familiar->id_material_paredes = $request->mat_paredes;
        $grupo_familiar->id_material_pisos = $request->mat_piso;
        $grupo_familiar->id_material_techo = $request->mat_techo;
        $grupo_familiar->id_tipo_actividad = $request->id_tipact;
        $grupo_familiar->id_consumo_agua = $request->consumoagua;
        $grupo_familiar->id_elimina_excretas = $request->excreta;
        $grupo_familiar->id_aguas_servidas = $request->aguaservidas;
        $grupo_familiar->id_vector_viviendas = $request->vectorvivienda;
        $grupo_familiar->id_riesgo_vivienda = $request->riesgovivienda;
        $grupo_familiar->id_tipo_alumbrado= $request->alumbrado;
        //dd($grupo_familiar);
        $grupo_familiar->save();
        Alert::success('Ficha Creada con Exito!');
        return redirect()->route('personagrupo-familiar.new',[$grupo_familiar->id]);
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
        $tiposvivienda = Tipo_Vivienda::all();
        $acteconom = Actividad_Economica::all();
        $materialestecho = Material_Techo::all();
        $materialespiso = Material_Piso::all();
        $materialparedes = Material_Pared::all();
        $consumosagua = Consumo_Agua::all();
        $excretas = Eliminar_Excretas::all();
        $aguaservidas = Agua_Servida::all();
        $tiposalumbrado = Tipo_Alumbrado::all();
        $riesgos = Riesgo_Vivienda::all();
        $vectores = Vector_Vivienda::all();
        $grupos = Grupo_Familiar::find($id);
        $tipoactividades = Tipo_Actividad::all();
        return view('censoweb.censo.edit', compact(
            'grupos', 
            'tiposvivienda',
            'acteconom',
            'materialestecho',
            'materialespiso',
            'materialparedes',
            'consumosagua',
            'excretas',
            'aguaservidas',
            'tiposalumbrado',
            'riesgos',
            'vectores',
            'tipoactividades'
            ));
        
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
        $grupos = Grupo_Familiar::find($id)->update($request->all());
        Alert::success('Ficha Modificada con Exito!');
        return redirect()->route('censo.index');

        //dd($request);
        //return redirect()->route('personagrupo-familiar.new',[$grupo_familiar->id]);
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
