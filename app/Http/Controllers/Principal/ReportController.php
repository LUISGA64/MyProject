<?php

namespace App\Http\Controllers\Principal;

use App\Http\Controllers\Controller;
use App\Models\Principal\Grupo_Familiar;
use App\Models\Principal\Persona;
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

    public function excel(){
        \Maatwebsite\Excel\Facades\Excel::create('Censo Web', function ($excel){
            $excel->setTitle('Mi archivo');
            $excel->sheet('Comuneros', function ($sheet){
                //Header//
                //$sheet->mergeCells('A1:M1');
                $sheet->row(1,['Relacion de Personas Inscritas en el Censo']);
                $sheet->row(2,['Grupo Familiar','Dirección','Zona','Tipo Documento','Identificación','Primer Nombre','Segundo Nombre',
                    'Primer Apellido','Segundo Apellido','Fecha Nacimiento','Edad','Genero','Nivel Educativo']);
                $personas = Persona::
                    join('tipo_docs', 'personas.tipodoc_id', '=', 'tipo_docs.tipodocs_id')
                    ->join('grupos_familiares','personas.grupofamiliar_id','=','grupos_familiares.id')
                    ->join('generos', 'personas.genero_id', '=', 'generos.generos_id')
                    ->join('niveles_educativos','personas.nivelEducativo_id','=','niveles_educativos.nivelesEducativos_id')
                    ->select(
                        'personas.grupofamiliar_id',
                        'grupos_familiares.direccion',
                        'grupos_familiares.zona',
                        'tipo_docs.codigo_doc',
                        'personas.identificacion',
                        'personas.nombre_1',
                        'personas.nombre_2',
                        'personas.apellido_1',
                        'personas.apellido_2',
                        'personas.fecha_nacimiento',
                        'personas.edad',
                        'generos.genero',
                        'niveles_educativos.nivel_educativo')
                    ->orderBy('personas.grupofamiliar_id')
                    ->get();
                //Data
                $data =[];
                foreach ($personas as $persona)
                    $row = [];
                $sheet->fromArray($personas);
            });
        })->export('xlsx');
    }
}
