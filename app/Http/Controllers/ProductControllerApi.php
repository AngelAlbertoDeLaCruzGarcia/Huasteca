<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tblproductos;

use App\Models\ChatMessage;

class ProductControllerApi extends Controller
{
    public function index()
    {
        return tblproductos::all();
    }
    public function show($idprod)
    {
        return tblproductos::where('intIDProd', $idprod)->first();
    }
    public function buscarProd(Request $request)
    {
        //return ChatMessage::all();
        $pa = tblproductos::where('vchProd', 'LIKE', '%' . $request->p . '%')
            ->orWhere('vchDesc', 'LIKE', '%' . $request->p . '%')
            ->orWhere('intIdCat', 'LIKE', '%' . $request->p . '%')
            ->get();
        return $pa;
    }
    public function update(Request $request)
    {
        try {
            $request->prod->update($request->all());

            return response()->json($request->prod, 200);
            //code...
        } catch (\Exception $e) {
            return response()->json('Error', 200);
        }
    }
    public function otros()
    {
        return ChatMessage::all();
    }
}
