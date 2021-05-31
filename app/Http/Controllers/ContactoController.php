<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\ContactoMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

use Inertia\Inertia;

class ContactoController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Contacto');
    }
    public function store(Request $request){
        $contenido = new ContactoMail($request);
        Mail::to('contacto@huasteca.com')->send($contenido);
        return redirect()->route('contacto.index');
    }
}
