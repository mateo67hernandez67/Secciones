<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class MadresController extends Controller
{
    public function index()
    {
        // Página MADRES (category_id = 3)

        $confort = Producto::where('category_id', 1)
            ->where('classification', 'Confort')
            ->get();

        $salud = Producto::where('category_id', 1)
            ->where('classification', 'Salud')
            ->get();

        $vestimenta = Producto::where('category_id', 1)
            ->where('classification', 'Vestimenta')
            ->get();

        return view('madres.index', compact(
            'confort',
            'salud',
            'vestimenta'
        ));
    }

}
