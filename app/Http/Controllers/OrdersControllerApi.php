<?php

namespace App\Http\Controllers;

use Stripe;
use Illuminate\Http\Request;

class OrdersControllerApi extends Controller
{
    public function orders(Request $request)
    {
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge = Stripe\Charge::create([
                "amount" => 500 * 100,
                "currency" => "mxn",
                "source" => $request->tokenStripe,
                "description" => "Test payment Huasteca"
            ]);
            return $charge;
        } catch (\Exception $e) {
            return response()->json('Error', 200);
        }
    }
}
