<?php

namespace App\Http\Controllers;
use App\Models\tblproductos;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\URL;
use SebastianBergmann\Environment\Console;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $p=tblproductos::where('vchProd','LIKE','Blusa');
        return Inertia::render('User/Productos/Inicio', [
            'prods' => tblproductos::all(),
            ///'create_url' => URL::route('users.create'),
        ]);

    }
    public function show($idprod)
    {
        $datops = tblproductos::where('intIDProd',$idprod)->first();

        return Inertia::render('User/Productos/Show',[
            'datops' => $datops,
        ]);

    }
    public function buscarProd(Request $request){
        $pa=tblproductos::where('vchProd','LIKE','%'.$request->p.'%')
        ->orWhere('vchDesc','LIKE','%'.$request->p.'%')
        ->get();
        return Inertia::render('User/Productos/Buscar',[
            'prods' => $pa
        ]);
    }

}
/*
        return Inertia::render('User/Productos/Inicio', [
            'prods' => tblproductos::all()->map(function ($producto) {
                return [
                    'idp' => $producto->intIDProd,
                    'imagenp' => $producto->vchImg,
                    'nombrep' => $producto->vchProd,
                    'descp' =>   $producto->vchDesc,
                    'mostrar' => URL::route('Inicio.show',$producto->intIDProd),
                ];
            }),
            ///'create_url' => URL::route('users.create'),
        ]);
