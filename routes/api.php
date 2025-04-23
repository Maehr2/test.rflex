<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Models\DolarValue;

Route::get('/api', function () {
    Artisan::call('/dolar');  // Ejecutar el comando

    // Obtener el último valor del dólar desde la base de datos
    $ultimoDolar = DolarValue::latest()->first();

    if (!$ultimoDolar) {
        return response()->json([
            'message' => 'No se pudo obtener el valor del dólar.',
        ], 500);
    }

    return response()->json([
        'dolar' => $ultimoDolar->valor,  // Valor actual del dólar
        'fecha' => $ultimoDolar->fecha,  // Fecha de la consulta
    ]);

Route::get('/rango', [DolarApiController::class, 'obtenerPorRango']);
});