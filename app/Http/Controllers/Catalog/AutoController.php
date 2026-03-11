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

            // 1. BÚSQUEDA (Texto libre)
            $query->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;
                return $q->where(function ($sub) use ($search) {
                    $sub->where('modelo', 'LIKE', "%{$search}%")
                        ->orWhere('color', 'LIKE', "%{$search}%")
                        ->orWhere('year', 'LIKE', "%{$search}%")
                        ->orWhereHas('marca', function ($m) use ($search) {
                            $m->where('nombre', 'LIKE', "%{$search}%");
                        });
                });
            });

            // 2. TIPO DE OFERTA
            $query->when($request->filled('nuevo'), function ($q) {
                return $q->where('year', '>=', 2026);
            });

            $query->when($request->filled('consignacion'), function ($q) {
                return $q->where('consignacion', 1);
            });

            // 3. AÑOS (Pills multiselección)
            $query->when($request->filled('years'), function ($q) use ($request) {
                return $q->whereIn('year', (array) $request->years);
            });

            // 4. KILOMETRAJE (Slider Dual)
            if ($request->filled('km_min') || $request->filled('km_max')) {
                $query->whereBetween('kilometraje', [
                    $request->input('km_min', 0),
                    $request->input('km_max', 500000)
                ]);
            }

            // 5. PRECIO (Slider Dual)
            if ($request->filled('price_min') || $request->filled('price_max')) {
                $query->whereBetween('precio', [
                    $request->input('price_min', 0),
                    $request->input('price_max', 3500000)
                ]);
            }

            // 6. ORDENAMIENTO
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('precio', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('precio', 'desc');
                    break;
                default:
                    $query->latest('id_auto');
                    break;
            }

            // 7. EJECUCIÓN Y PERSISTENCIA
            $autos = $query->paginate(12);
            $autos->appends($request->all()); // Crucial para no perder filtros al paginar

            return view('autos.autos', compact('autos'));

        } catch (Exception $e) {
            Log::error("Error en el catálogo: " . $e->getMessage());
            return redirect()->back()->with('error', 'Error al cargar los vehículos.');
        }
    }
}