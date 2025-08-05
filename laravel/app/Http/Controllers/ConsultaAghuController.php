<?php

    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Models\ConsultaAghu;
    use Illuminate\Http\JsonResponse;

    class ConsultaAghuController extends Controller
    {
        public function index()
        {
            $consultasAghu = ConsultaAghu::latest()->take(50)->get();

            return view('consultas.consultas_aghu', compact('consultasAghu'));
        }
    }
