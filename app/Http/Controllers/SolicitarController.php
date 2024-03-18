<?php

namespace App\Http\Controllers;

use App\Models\Solicitar;
use Illuminate\Http\Request;
use App\Models\Usuarios;

use App\Exports\SolicitarExport;
use Maatwebsite\Excel\Facades\Excel;

class SolicitarController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function exportExcel() 
    {
        return Excel::download(new SolicitarExport, 'solicitar.xlsx');
    }

    public function exportPDF() 
    {
        return Excel::download(new SolicitarExport, 'solicitar.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
    
    public function solicitaciones(Request $request)
    {
        $solicitaciones = Solicitar::all();

        return response()->json($solicitaciones);
    }

    public function nuevaSolicitacion(Request $request){

        $response = [ "status" => 0, "msg" => ""];

        $data = json_decode($request->getContent());

        $celular = $data->num_celular;
        $dni = $data->dni;

        if($celular && $dni){
            
            $nuevoSolicitar = new Solicitar();
            $nuevoSolicitar->numero_celular = $celular;
            $nuevoSolicitar->dni = $dni;
            $nuevoSolicitar->fechayhora_solicitada = date('Y-m-d H:i:s');
            $nuevoSolicitar->save();

            $response["status"] = 1;
            $response["msg"] = 'La solicitud fue enviada, en unos momentos lo estaremos contactando, Gracias';
        } else {
            $response["msg"] = "No debe haber campos vacios";
        }

        return response()->json($response);
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

}
