<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ConsultaSisfam;
use Illuminate\Http\JsonResponse;

class ConsultaSisfamController extends Controller
{
    public function index(): JsonResponse
    {
        $dados = ConsultaSisfam::all();
        return response()->json($dados);
    }    
}
