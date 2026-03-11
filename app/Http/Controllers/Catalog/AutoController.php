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
                return $q->where(function ($sub) use ($search) {
                    $sub->where('modelo', 'LIKE', "%{$search}%")
                        ->orWhere('color', 'LIKE', "%{$search}%")
                        ->orWhere('year', 'LIKE', "%{$search}%")
                        ->orWhereHas('marca', function ($m) use ($search) {
                            $m->where('nombre', 'LIKE', "%{$search}%");
                        });
                });
            });

            // 2. FILTROS DE TIPO DE OFERTA
            $query->when($request->filled('nuevo'), function ($q) {
                return $q->where('year', '>=', 2026);
            });

            $query->when($request->filled('seminuevo'), function ($q) {
                return $q->where('year', '<', 2026);
            });

            $query->when($request->filled('consignacion'), function ($q) {
                return $q->where('consignacion', 1);
            });

            // 3. FILTRO POR AÑOS (Pills multiselección)
            $query->when($request->filled('years'), function ($q) use ($request) {
                return $q->whereIn('year', (array) $request->years);
            });

            // 4. NUEVO: FILTRO POR KILOMETRAJE (Slider Dual)
            // Usamos whereBetween para filtrar dentro del rango del slider
            if ($request->filled('km_min') || $request->filled('km_max')) {
                $min = $request->input('km_min', 0);
                $max = $request->input('km_max', 500000);
                $query->whereBetween('kilometraje', [$min, $max]);
            }

            // 5. LÓGICA DE ORDENAMIENTO
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('precio', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('precio', 'desc');
                    break;
                case 'discount': // Basado en tu imagen de "Mayor Descuento"
                    $query->selectRaw('*, (precio_lista - precio) as ahorro')
                        ->orderBy('ahorro', 'desc');
                    break;
                case 'latest':
                default:
                    $query->latest('id_auto');
                    break;
            }

            // 6. EJECUCIÓN Y PAGINACIÓN
            $autos = $query->paginate(12);

            // 7. PERSISTENCIA DE FILTROS EN LA URL
            // Esto es vital para que al cambiar de página no se pierda el slider de KM o los años
            $autos->appends($request->all());

            return view('autos.autos', compact('autos'));

        } catch (Exception $e) {
            Log::error("Error en el catálogo: " . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al filtrar los vehículos.');
        }
    }
}