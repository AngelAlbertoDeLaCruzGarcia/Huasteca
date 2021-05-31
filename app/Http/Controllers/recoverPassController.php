<?php

namespace App\Http\Controllers;
use App\Mail\recoverPassMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\tblproductos;
use Inertia\Inertia;

class recoverPassController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'correo' =>'required|exists:users,email'
        ]);
        $query=User::where('email',$request->correo)->first();
        if($query!=null)
        {
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $contra=$this->generate_string($permitted_chars, 10);
            User::updateOrInsert(['email'=>$request->correo],[
                'password'=>      Hash::make($contra),
                'updated_at'=>      now(),
            ]);
            Log::channel('daily')->warning('Recuperacion de contraseña por correo: '.$request);
            $correo = new recoverPassMail($request,$contra);
            Mail::to($request->correo)->send($correo);
            return redirect()->route('Inicio.index');
        }
    }
    protected function generate_string($input, $strength = 16)
    {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++)
        {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
}
