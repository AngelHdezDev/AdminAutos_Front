<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Auto;
use Illuminate\Support\Facades\Log;
use Exception;

class AutoController extends Controller
{
    public function index()
    {
        try {

            $autos = Auto::active()
                ->with(['marca', 'thumbnail'])
                ->latest('id_auto')
                ->paginate(12);

            return view('autos.autos', compact('autos'));

        } catch (Exception $e) {
            Log::error("Error en el catálogo de autos: " . $e->getMessage());
            return redirect()->back()->with('error', 'Lo sentimos, hubo un problema al cargar los vehículos.');
        }
    }
}