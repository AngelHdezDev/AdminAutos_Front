<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Auto;
use App\Models\Marca;
use App\Models\Imagen;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // 1. PAGINACIÓN DE MARCAS: 6 marcas por página para el dropdown
        // Usamos pageName para que no choque con la paginación de autos si la usaras después
        $marcas = Marca::active()
            ->with([
                'autos' => function ($query) {
                    $query->active()
                        ->select('id_marca', 'modelo')
                        ->selectRaw('count(*) as total')
                        ->groupBy('id_marca', 'modelo')
                        ->orderBy('modelo', 'asc');
                }
            ])
            ->has('autos')
            ->orderBy('nombre', 'asc')
            ->get();
       
        
        $query = Auto::active()->with(['marca', 'thumbnail']);

        if ($request->filled('marca')) {
            $query->whereHas('marca', function ($q) use ($request) {
                $q->where('nombre', $request->marca);
            });
        }

        if ($request->filled('modelo')) {
            $query->where('modelo', $request->modelo);
        }

        // Aquí traemos todos los autos filtrados o puedes paginarlos también
        $autos = $query->latest('id_auto')->get();

        return view('Dashboard.Dashboard', compact('marcas', 'autos'));
    }
}
