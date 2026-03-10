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
            // Iniciamos la consulta con las relaciones necesarias
            $query = Auto::active()->with(['marca', 'thumbnail']);

            // 1. FILTRO DE BÚSQUEDA (Texto libre)
            $query->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;
                // Usamos un sub-where para que los OR no ignoren los otros filtros
                return $q->where(function ($sub) use ($search) {
                    $sub->where('modelo', 'LIKE', "%{$search}%")
                        ->orWhere('color', 'LIKE', "%{$search}%")
                        ->orWhere('year', 'LIKE', "%{$search}%")
                        ->orWhereHas('marca', function ($m) use ($search) {
                            $m->where('nombre', 'LIKE', "%{$search}%");
                        });
                });
            });

            // 2. FILTRO: Nuevos (Basado en el año actual)
            $query->when($request->filled('nuevo'), function ($q) {
                return $q->where('year', '>=', 2026);
            });

            // 3. FILTRO: Seminuevos
            $query->when($request->filled('seminuevo'), function ($q) {
                return $q->where('year', '<', 2026);
            });

            // 4. FILTRO: Consignación
            $query->when($request->filled('consignacion'), function ($q) {
                return $q->where('consignacion', 1);
            });

            // 5. EJECUCIÓN Y PAGINACIÓN
            $autos = $query->latest('id_auto')->paginate(12);

            // 6. PERSISTENCIA DE FILTROS EN LA PAGINACIÓN
            $autos->appends($request->all());

            return view('autos.autos', compact('autos'));

        } catch (Exception $e) {
            Log::error("Error en el catálogo: " . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al cargar los vehículos.');
        }
    }
}