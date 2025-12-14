<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class BebesController extends Controller
{
    public function index()
    {
        $ropaBebe = Producto::where('category_id', 2)
            ->where('classification', 'Ropa')
            ->get();

        $alimentacion = Producto::where('category_id', 2)
            ->where('classification', 'Alimentación')
            ->get();

        $higiene = Producto::where('category_id', 2)
            ->where('classification', 'Higiene')
            ->get();

        return view('bebes.index', compact(
            'ropaBebe',
            'alimentacion',
            'higiene'
        ));
    }
}
