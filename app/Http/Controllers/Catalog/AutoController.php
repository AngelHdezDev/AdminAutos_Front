<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Auto;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = Auto::active()->with(['marca', 'thumbnail']);

            // Filtro: Nuevos (Ejemplo: Año actual o mayor)
            $query->when($request->filled('nuevo'), function ($q) {
                return $q->where('year', '>=', 2026);
            });

            // Filtro: Seminuevos (Ejemplo: Menores a 2026)
            $query->when($request->filled('seminuevo'), function ($q) {
                return $q->where('year', '<', 2026);
            });

            // Filtro: Consignación (Columna real en tu DB)
            $query->when($request->filled('consignacion'), function ($q) {
                return $q->where('consignacion', 1);
            });

            // Ejecutamos la consulta y paginamos
            $autos = $query->latest('id_auto')->paginate(12);

            // MUY IMPORTANTE: Esto pega los filtros a los links de la paginación
            $autos->appends($request->all());

            return view('autos.autos', compact('autos'));

        } catch (Exception $e) {
            Log::error("Error en filtros: " . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al filtrar.');
        }
    }
}