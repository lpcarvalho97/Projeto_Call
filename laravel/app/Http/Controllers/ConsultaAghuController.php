<?php

    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Models\ConsultaAghu;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;

    class ConsultaAghuController extends Controller
    {
        public function index()
        {
            $consultasAghu = ConsultaAghu::latest()->take(50)->get();

            return view('consultas.consultas_aghu', compact('consultasAghu'));
        }

        public function updateCampo(Request $request)
        {
            $request->validate([
                'id' => 'required|integer|exists:consultas_aghu,id',
                'campo' => 'required|string|in:observacao,complemento',
                'valor' => 'nullable|string',
            ]);

            $consulta = ConsultaAghu::findOrFail($request->id);
            $campo = $request->campo;

            $consulta->$campo = $request->valor;
            $consulta->save();

            return response()->json(['success' => true, 'valor' => $consulta->$campo]);
        }
    }
