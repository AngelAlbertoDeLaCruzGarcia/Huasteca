<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\team_user;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use App\Mail\verifyCorreoMail;
use Illuminate\Support\Facades\Mail;
use Stevebauman\Purify\Facades\Purify;


Route::get('/aaa', function () {
    $array = [
        '<script>alert("Harmful Script");</script> <p style="a style" class="a-different-class">Test</p>',
        '<script>alert("Harmful Script");</script> <p style="a style" class="a-different-class">asdasdas</p>',
    ];

    $cleaned = Purify::clean($array);
echo $cleaned[1];
    ///return view('mail.recoveryPass');
});


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
Route::post('bproda', 'App\Http\Controllers\ProductController@buscarProdA');

Route::get('/Aviso', function () {
    return Inertia::render('User/Aviso');
});
Route::get('/Acerca', function () {
    return Inertia::render('User/Acerca');
});
Route::get('/Carrito', function () {
    return Inertia::render('User/Productos/Carrito');
});

Route::get('/Ayuda', function () {
    return Inertia::render('User/Ayuda');
});

Route::resource('/perfilc', 'App\Http\Controllers\PerfilcController');


Route::resource('/contacto', 'App\Http\Controllers\ContactoController');
Route::resource('/recoverPass', 'App\Http\Controllers\recoverPassController');
Route::post('/bcorreo', 'App\Http\Controllers\bcorreoController@store');
Route::post('/bcuenta', 'App\Http\Controllers\bcorreoController@recoverAccount');
Route::post('/bcelular', 'App\Http\Controllers\bcelularController@recoverAccount');
Route::post('/verifycelular', 'App\Http\Controllers\bcelularController@verifycelular');
Route::post('/verifyCall', 'App\Http\Controllers\bcelularController@verifyCall');



///chat
Route::get('chat', function () {
    return Inertia::render('User/Chat/Contenedor');
});
Route::get('/chat/rooms', 'App\Http\Controllers\ChatController@rooms');
Route::get('/chat/room/{roomId}/messages', 'App\Http\Controllers\ChatController@messages');
Route::post('/chat/room/{roomId}/message', 'App\Http\Controllers\ChatController@newMessage');

Route::get('datos', function () {
    return Auth::user();
})->name('datos');


///Pruebas
Route::get('test', function () {
    Log::channel('slack')->info('a!'); ///laravel
    Log::channel('single')->info('b!'); ///local
    Log::channel('syslog')->info('c!'); ///local
    Log::channel('daily')->info('d!'); ///local
    Log::channel('monolog')->info('e!'); ///local
    Log::channel('custom')->info('f!'); ///local
    Log::error('probando');
});
Route::resource('/pruebac', 'App\Http\Controllers\pruebaController');
/*
Route::get('/pemail',function () {
    $r='20170990@uthh.edu.mx';
    $correo = new verifyCorreoMail();
    Mail::to($r)->send($correo);

});*/
