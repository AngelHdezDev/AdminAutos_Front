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

            // 3. LÓGICA DE ORDENAMIENTO (Nuevo)
            // Usamos un switch para decidir cómo ordenar según el parámetro 'sort'
            switch ($request->sort) {
                case 'price_asc':
                    $query->orderBy('precio', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('precio', 'desc');
                    break;
                case 'latest':
                    $query->latest('id_auto');
                    break;
                default:
                    // Orden por defecto: los más recientes primero
                    $query->latest('id_auto');
                    break;
            }

            // 4. EJECUCIÓN Y PAGINACIÓN
            // Ya no ponemos latest() aquí porque ya lo manejamos en el switch de arriba
            $autos = $query->paginate(12);

            // 5. PERSISTENCIA DE FILTROS EN LA PAGINACIÓN
            $autos->appends($request->all());

            return view('autos.autos', compact('autos'));

        } catch (Exception $e) {
            Log::error("Error en el catálogo: " . $e->getMessage());
            return redirect()->back()->with('error', 'Ocurrió un error al cargar los vehículos.');
        }
    }
}