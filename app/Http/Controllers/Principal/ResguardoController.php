<?php

namespace App\Http\Controllers\Principal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Models\Localidad\Resguardo;
use DB;
use Alert;
use Storage;
use App\Http\Requests\ResguardoRequest;
use Illuminate\Contracts\Validation\Validator;


class ResguardoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $resg = Resguardo::all()->first();
        //dd($resg);
        if($resg){
            return view ('censoweb.resguardo.index', compact('resg'));    
        }
        else
        {
            Alert::error('Registre un Resguardo','Censo Web')->persistent('Cerrar');
            return view('censoweb.resguardo.create');
            //echo "no hay registros";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('censoweb.resguardo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResguardoRequest $request)
    {

        /*$messages = [
        'resguardo.required' => 'Numero de identificacion repetido!',
        'logo_resg.image' => 'El archivo no es una Imagen',
        ];

        $this->validate($request, [
        'resguardo' => 'bail|required',
        'identificacion'=>'unique:posts|max:255',
        'logo_resg'=> 'bail|image|required',
        ],$messages);*/
        

        $resguardo = new Resguardo;
        //manejo de Imagen
        $img = $request ->file('logo');
        $name = time().'-'.$img->getClientOriginalName();
        $request->file('logo')->storeAs(('Docs'),$name);
        $path = public_path().'/img/DocResaguardo/';
        $img->move($path,$name);
        $resguardo->logo_resg=$name;
        $resguardo->resguardo = $request->resguardo;
        $resguardo->tipo_doc = 'NIT';
        $resguardo->identificacion = $request->identResguardo;
        $resguardo->pueblo = $request->pueblo;
        $resguardo->resolucion = $request->resolucion;
        $resguardo->direccion_resg = $request->direccion_resg;
        $resguardo->jurisdiccion = $request->jurisdiccion;
        $resguardo->email_resg = $request->email;
        //dd($resguardo);
        $resguardo->save();
        Alert::success('Registro Exitoso', $request->resguardo);
        return redirect()->route('resguardo-index');
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
        $resg = Resguardo::findOrFail($id);
        return view ('censoweb.resguardo.edit',compact('resg'));
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
        $resg = Resguardo::findOrFail($id)->update($request->all());
        Alert::warning('Archivo Modificado','Exitoso');
        return redirect()->route('resguardo-index');
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
