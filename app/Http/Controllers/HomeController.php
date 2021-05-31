<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\team_user;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        $datos=(['Usuario'  =>  'Logueado' ]);

        $role = team_user::select('role')->where('user_id', Auth::id())->value('role');
        if (Auth::check()) {
            if ($role=='admin')
                return view('dashboard');
            else{
                return Redirect::route('Inicio.index');

            }

        }
    }
}
