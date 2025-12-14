<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CheckoutController;
use App\Models\Order;
use App\Http\Controllers\BebesController;
use App\Http\Controllers\JuguetesController;
use App\Http\Controllers\MadresController;


    /*
    |--------------------------------------------------------------------------
    | RUTAS DEL FRONT OFFICE (PRODUCTOS)
    |--------------------------------------------------------------------------
    */

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::controller(ProductoController::class)->group(function () {
        Route::get('producto/', 'index')->name('productos.index');
        Route::get('/producto/{id}', 'show')->name('productos.show');
        Route::get('/bebes', function () {
            return view('bebes.index');
        })->name('bebes.index');
        Route::get('/juguetes', function () {
            return view('juguetes.index');
        })->name('juguetes.index');
        Route::get('/madres', function () {
            return view('madres.index');
        })->name('madres.index');


    });


        Route::get('/bebes', [BebesController::class, 'index'])
            ->name('bebes.index');
        Route::get('/juguetes', [JuguetesController::class, 'index'])
            ->name('juguetes.index');
        Route::get('/madres', [MadresController::class, 'index'])
            ->name('madres.index');



    /*
    |--------------------------------------------------------------------------
    | RUTAS DEL CARRITO DE COMPRAS
    |--------------------------------------------------------------------------
    */

    // Muestra la página principal del carrito
        Route::get('carrito', [CarritoController::class, 'mostrarCarrito'])->name('carrito.mostrar');

        // Agrega un producto al carrito
        Route::post('carrito/agregar/{idProducto}', [CarritoController::class, 'agregar'])->name('carrito.agregar');

        // Actualiza la cantidad (usando PUT o PATCH)
        Route::patch('carrito/actualizar/{idProducto}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');

        // Elimina un producto
        Route::delete('carrito/eliminar/{idProducto}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

    /*
    |--------------------------------------------------------------------------
    | RUTAS DE login, register, editar, cerrar sesion
    |--------------------------------------------------------------------------
    */

    //Crear Usuario
    Route::controller(UserController::class)->group(function () {
    Route::get('/user', 'index')->name('User');
    Route::get('/user/register', 'create')->name('registerUser');
    Route::post('/user/store', 'store')->name('storeUser');
    });

    //Editar usuario
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('User.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('User.update');

    //Cerrar Sesion
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //Registrar Direcciones de usuario
    Route::get('/user/address', [AddressController::class, 'index'])
    ->middleware('auth')
    ->name('address');
    Route::post('/direccion', [AddressController::class, 'store'])->name('address.store');
    
    /*
    |--------------------------------------------------------------------------
    | Autenticacion de Usuario
    |--------------------------------------------------------------------------
    */

    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/login', function () {
        return redirect()->route('User');
    });



    /*
    |--------------------------------------------------------------------------
    | Chechout y Pay
    |--------------------------------------------------------------------------
    */
    Route::get('/checkout', [CheckoutController::class, 'index'])
    ->middleware('auth')
    ->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    // Comprobante de orden
    Route::get('/order/success/{id}', function($id) {
        $order = Order::findOrFail($id);
        return view('CheckoutPay.success', compact('order'));
    })->name('orders.success');