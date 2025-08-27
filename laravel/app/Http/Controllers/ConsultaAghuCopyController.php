<?php

    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Models\ConsultaAghu;
    use Illuminate\Http\JsonResponse;

    class ConsultaAghuCopyController extends Controller
    {
        public function index()
        {
            $consultasAghu = ConsultaAghu::latest()->take(50)->get();

            return view('consultas.consultas_aghu_copy', compact('consultasAghu'));
        }
    }
