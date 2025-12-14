<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class JuguetesController extends Controller
{

    public function index()
    {
        // Página JUGUETES (category_id = 1)

        $estimulacion = Producto::where('category_id', 3)
            ->where('classification', 'Estimulación')
            ->get();

        $motricidad = Producto::where('category_id', 3)
            ->where('classification', 'Motricidad')
            ->get();

        $entretenimiento = Producto::where('category_id', 3)
            ->where('classification', 'Entretenimiento')
            ->get();

        return view('juguetes.index', compact(
            'estimulacion',
            'motricidad',
            'entretenimiento'
        ));
    }    
}
