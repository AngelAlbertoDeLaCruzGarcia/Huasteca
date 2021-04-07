<?php

namespace App\Http\Controllers;
use App\Models\tblproductos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Inertia\Inertia;
use Illuminate\Support\Facades\URL;
use phpDocumentor\Reflection\Types\Boolean;
use SebastianBergmann\Environment\Console;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('User/Productos/Inicio', [
            'prods' => tblproductos::all(),
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
        Log::channel('daily')->info('Busqueda de producto: '.$request);
        $checar=true;
        $pa=tblproductos::where('vchProd','LIKE','%'.$request->p.'%')
        ->orWhere('vchDesc','LIKE','%'.$request->p.'%')
        ->orWhere('intIdCat','LIKE','%'.$request->p.'%')
        ->get();
        return Inertia::render('User/Productos/Buscar',[
            'prods' => $pa,
            'nombre'=>$request->p,
        ]);
    }
    public function buscarProdA(Request $request){
        Log::channel('daily')->info('Busqueda de producto avanzada: '.$request);
        $pa=tblproductos::where('vchProd','LIKE','%'.$request->product.'%')
        ->where('vchTalla','LIKE','%'.$request->talla.'%')
        ->where([
            ['fltPrecio', '>=', $request->preciomin],
            ['fltPrecio', '<=', $request->preciomax],
        ])
        ->get();
        return Inertia::render('User/Productos/Buscar',[
            'prods' => $pa,
            'nombre'=>$request->product,

        ]);
    }
}
