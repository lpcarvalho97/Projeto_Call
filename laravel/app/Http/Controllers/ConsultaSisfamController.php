<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConsultaSisfam;
use App\Models\ConsultaAghu;
use Illuminate\Http\JsonResponse;

class ConsultaSisfamController extends Controller
{
    //public function index(): JsonResponse
    //{
    //    $dados = ConsultaSisfam::all();
    //    return response()->json($dados);
    //}    

    public function index()
    {
        $consultasAghu = ConsultaAghu::latest()->take(50)->get();
        $consultasSisfam = ConsultaSisfam::latest('criacao')->take(50)->get();

        return view('consultas.consultas_sisfam', compact('consultasAghu', 'consultasSisfam'));
    }
}
