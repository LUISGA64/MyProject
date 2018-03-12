<?php

namespace App\Http\Controllers\Principal;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResguardoRequest;
use App\Models\Localidad\Resguardo;
use Illuminate\Http\Request;
use Storage;


class ResguardoController extends Controller
{
    


    public function index()
    {
        $resg = Resguardo::get();
        //$resg = Resguardo::where('id',23)->first();
        
        //dd($resg);

        if($resg){
            return view ('censoweb.resguardo.index', compact('resg'));    
        }
        else
        {
            Alert::error('Registre un Resguardo','Censo Web')->persistent('Cerrar');
            return view('censoweb.resguardo.create');
        }
    }

    


    public function create()
    {
        return view('censoweb.resguardo.create');
    }

    

    public function store(ResguardoRequest $request)
    {
        $resguardo = new Resguardo;
        // manejo de la imagen
        $img = $request->file('logo');
        $name = $img->getClientOriginalName();
        Storage::disk('web')->put($name, file_get_contents($img->getRealPath()));
        $resguardo->logo_resg= $name;
        $resguardo->resguardo = $request->resguardo;
        $resguardo->tipo_doc = 'NIT';
        $resguardo->identificacion = $request->identResguardo;
        $resguardo->pueblo = $request->pueblo;
        $resguardo->resolucion = $request->resolucion;
        $resguardo->direccion_resg = $request->direccion_resg;
        $resguardo->jurisdiccion = $request->jurisdiccion;
        $resguardo->email_resg = $request->email;
        
        $resguardo->save();
        Alert::success('Registro Exitoso', $request->resguardo);
        return redirect()->route('resguardo-index');
    }

    


    public function show($id)
    {
        //
    }

    

    public function edit($id)
    {
        $resg = Resguardo::findOrFail($id);
        return view ('censoweb.resguardo.edit',compact('resg'));
    }

    

    public function update(Request $request, $id)
    {
        $resg = Resguardo::findOrFail($id)->update($request->all());
        Alert::warning('Archivo Modificado','Exitoso');
        return redirect()->route('resguardo-index');
    }

    


    public function destroy($id)
    {
        //
    }
}
