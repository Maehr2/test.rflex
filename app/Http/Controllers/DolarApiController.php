<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DolarValue;

class DolarApiController extends Controller
{
    public function obtenerPorRango(Request $request)
    {
        $request->validate([
            'inicio' => 'required|date',
            'fin' => 'required|date|after_or_equal:inicio',
        ]);

        $valores = DolarValue::whereBetween('fecha', [$request->inicio, $request->fin])
            ->orderBy('fecha')
            ->get();

        return response()->json($valores);
    }
}

