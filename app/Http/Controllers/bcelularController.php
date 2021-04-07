<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class bcelularController extends Controller
{
    public function recoverAccount(Request $usuario)
    {
        $usuario->validate([
            'cel' =>'required',
        ]);

        try {
            $basic  = new \Vonage\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
            $client = new \Vonage\Client($basic);
            $request = new \Vonage\Verify\Request('52'.$usuario->cel, 'Huastecas');
            $response = $client->verify()->start($request);
            echo "Verificacion iniciada, id: " . $response->getRequestId();
            session(['vonage_request_id' => $response->getRequestId()]);
            Log::channel('daily')->info($response->getRequestId());

            return 'Mensaje enviado';
        } catch (\Exception $e) {
            Log::channel('daily')->error($e->getMessage().'cel: '.$usuario->cel);
        }

    }
    public function verifycelular(Request $cel)
    {
        $cel->validate([
            'id' =>'required',
            'codigo' =>'required',
        ]);

       /// Log::channel('daily')->info($cod);
        try {
            $basic  = new \Vonage\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
            $client = new \Vonage\Client($basic);
            $verification = $client->verify()->check(session('vonage_request_id'),$cel->codigo);
            echo "Verificacion satisfactoria: " . $verification->getStatus() . "\n";
            if ($verification->getStatus() == 0) {
                Auth::loginUsingId($cel->id);
            }

        } catch (\Exception $e) {
            Log::channel('daily')->error('Fallo verificacion, error: '.$e->getMessage().' Estatus: '.$e->getCode());
        }
    }
    public function verifyCall(Request $cel)
    {
        $cel->validate([
            'cel' =>'required|integer',
        ]);
        try {
            $sid = "AC75c296af700224c827257ce0f4e4ed0a";
            $token = "503ed7091d1d2d69a2d5ee07ad20ac0a";
            $client = new \Twilio\Rest\Client($sid, $token);

            $call = $client->calls->create
            (
                '52'.$cel->cel, // Call this number
                '+17813497894', // From a valid Twilio number
                [
                    'twiml' => '<Response><Say>Buenas tardes somos la tienda de ropa Indumentarias de la Huasteca y estamos probando nuestro servicio de llamada!</Say></Response>'
                ]

            );
            Log::channel('daily')->info('Llamada de verificacion realizada: '.$cel->cel.' Estatus: '.$call);

        /*
        // Start our TwiML response
        $response = new VoiceResponse;

        // Read a message aloud to the caller
        $response->say(
            "Thank you for calling! Have a great day.",
            array("voice" => "alice")
        );*/

        } catch (\Exception $e) {
            Log::channel('daily')->error('Fallo verificacion por llamada, error: '.$e->getMessage());
        }
    }
}
