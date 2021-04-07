<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\verifyCorreoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use Inertia\Inertia;

class bcorreoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' =>'required|max:30|string',
            'correo' =>'required|email|unique:users,email',
            'cadena' => 'required|max:6|alpha_num'
        ]);

        $contenido = new verifyCorreoMail($request);
        Mail::to($request->correo)->send($contenido);
        return redirect()->route('Inicio.index');
        Log::channel('daily')->info('Verificacion de correo al registrar usuario '.$request->correo);

    }
    public function recoverAccount(Request $request)
    {
        $request->validate([
            'correo' =>'required|email|exists:users,email',
        ]);
        $query=User::where('email',$request->correo)->first();
        if($query!=null)
        {
            Log::channel('daily')->info('Inicio de proceso de recuperacion de usuario '.$request->correo);
            return $query;

        }
    }
}
