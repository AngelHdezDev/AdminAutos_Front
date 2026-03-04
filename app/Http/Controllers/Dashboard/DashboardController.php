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
        $marcas = Marca::active()
            ->with([
                'autos' => function ($query) {
                    $query->active()
                        ->select('id_marca', 'modelo')
                        ->selectRaw('count(*) as total')
                        ->groupBy('id_marca', 'modelo');
                }
            ])
            ->has('autos')
            ->take(6)
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

        $autos = $query->latest('id_auto')->get();

        return view('Dashboard.Dashboard', compact('marcas', 'autos'));
    }
}
