<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\tblproductos;
use App\Models\team_user;
use Hamcrest\Core\HasToString;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


/*
Route::get('/', function () {
    return view('welcome');
});
*/

////Administrador
Route::get('/redirects',[HomeController::class,'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/prod', function () {
    $role = team_user::select('role')->where('user_id', Auth::id())->value('role');
    if ($role=='admin')
        return view('livewire/Admin/prod/productos');
     else
        return Redirect::route('Inicio.index');
})->name('prod');
Route::middleware(['auth:sanctum', 'verified'])->get('/usuarios', function () {
    $role = team_user::select('role')->where('user_id', Auth::id())->value('role');
    if ($role=='admin')
        return view('livewire/Admin/Usuario/usuarios');
     else
         return Redirect::route('Inicio.index');

})->name('usuarios');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $role = team_user::select('role')->where('user_id', Auth::id())->value('role');
    if ($role=='admin')
        return view('dashboard');
    else
       return Redirect::route('Inicio.index');
})->name('dashboard');


/////Usuarios
Route::get('/',
    function(){
        return Redirect::route('Inicio.index');
});
Route::resource('Inicio', 'App\Http\Controllers\ProductController');
Route::get('bprod', 'App\Http\Controllers\ProductController@buscarProd');

Route::get('/Aviso', function () {
    return Inertia::render('User/Aviso');
});
Route::get('/Acerca', function () {
    return Inertia::render('User/Acerca');
});
Route::get('/Carrito', function () {
    return Inertia::render('User/Productos/Carrito');
});






//Route::post('login', 'App\Http\Controllers\ProductController');
Route::get('datos', function () {

    return $user = Auth::user();

})->name('datos');
