<?php

namespace App\Http\Controllers;
use App\Models\User;


use Inertia\Inertia;

use Illuminate\Http\Request;

class PerfilcController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Usuario/Inicio');
    }
}
