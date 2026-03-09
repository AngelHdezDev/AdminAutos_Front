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
        $query = Auto::active()->with(['marca', 'thumbnail']);

        // Filtros que vienen de la búsqueda
        if ($request->filled('marca')) {
            $query->whereHas('marca', fn($q) => $q->where('nombre', $request->marca));
        }

        // Paginamos los resultados
        $autos = $query->latest('id_auto')->paginate(12);

        // Solo enviamos los autos. Las marcas se cargan solas en el componente.
        return view('Dashboard.Dashboard', compact('autos'));
    }
}