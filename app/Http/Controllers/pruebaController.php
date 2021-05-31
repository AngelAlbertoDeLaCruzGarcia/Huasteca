<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class pruebaController extends Controller
{
    public function index()
    {
        $basic  = new \Vonage\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
        $client = new \Vonage\Client($basic);
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS('527716838276', 'Huastecas', 'Probando SMS Huasteca')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {

            echo "Message status: " . $response->current()->getStatus() . "\n";
            echo "Sent message to " . $message->getTo() . ". Balance is now " . $message->getRemainingBalance() . PHP_EOL;
            echo "The message was sent successfully\n";

        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
        /*
        $query=User::where('email','angel_barsa99@hotmail.com')->first();
        Auth::loginUsingId($query->id);
        if($query!=null)
        {
            echo $query;

        }
        ///return redirect()->route('Inicio.index')->withSuccess('Email already exists!');
        /*
        return Inertia::render('User/Productos/Inicio', [
            'prods' => tblproductos::all(),
            'mensaje' => 'no se pudo',
        ]);*/
    }
}
