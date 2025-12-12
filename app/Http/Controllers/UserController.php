<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.SessionUser');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.RegisterUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validación
    $request->validate([
        'name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
        'phone' => 'required',
        'birth_date' => 'required|date'
    ]);

    // Crear usuario y GUARDARLO EN UNA VARIABLE
    $user = User::create([
        'name' => $request->name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'phone' => $request->phone,
        'birth_date' => $request->birth_date,
        'is_admin' => false
    ]);

    // Iniciar sesión automáticamente
    Auth::login($user);
    $request->session()->regenerate();

    // Redirigir a la pantalla de address
    return redirect()->route('address')->with('success', 'Usuario registrado e iniciado sesión correctamente');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
