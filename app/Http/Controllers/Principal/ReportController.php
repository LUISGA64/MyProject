<?php

namespace App\Http\Controllers\Principal;

use App\Http\Controllers\Controller;
use App\Models\Principal\Grupo_Familiar;
use Datatables;


class ReportController extends Controller
{
    public function viviendas()
    {
		
        $grufamiliar = Grupo_Familiar::join('personas','grupos_familiares.id','=','personas.grupofamiliar_id')
        ->join('materiales_techo','grupos_familiares.id_material_techo','=','materiales_techo.id')
        ->select(
            'grupos_familiares.*',
            'materiales_techo.material_techo',
            'personas.fullName')
        ->where('personas.cabeza_familia','T')
            ->get();



        $material = Grupo_Familiar::join('materiales_techo','grupos_familiares.id_material_techo','=','materiales_techo.id')
        ->select(
            'materiales_techo.material_techo'
            )->get()->toJson();

        //dd($material);
        
        $fichas = Grupo_Familiar::join("materiales_techo as mt","grupos_familiares.id_material_techo","=","mt.id")->count();


        //dd($fichas);

        return view('censoweb.reportes.tablero', compact('grufamiliar','material','fichas'));
    		
    }


    public function pisos()
    {
        return view ('censoweb.reportes.prueba');
    }
}
