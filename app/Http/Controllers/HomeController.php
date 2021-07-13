<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\team_user;
use Illuminate\Support\Facades\Log;

use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        $role = team_user::select('role')->where('user_id', Auth::id())->value('role');
        if (Auth::check()) {
            if ($role == 'admin')
                return view('dashboard');
            else {
                Log::channel('daily')->warning('Usuario intento accesar a parte administrativa, id: ' . Auth::id());
                return Redirect::route('Inicio.index');
            }
        }
    }
}
