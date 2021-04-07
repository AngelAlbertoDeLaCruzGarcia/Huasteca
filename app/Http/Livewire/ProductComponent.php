<?php

namespace App\Http\Livewire;
use App\Models\tblproductos;
use App\Models\tblcats;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ProductComponent extends Component
{
    ///Listado con paginacion
    use WithPagination;
    protected $queryString=['searchProd' => ['except'=>''] ];
    public $searchProd='', $porpagProd='10';protected $paginationTheme = 'bootstrap';

    /////Guardar
    use WithFileUploads;
    public $ViewProd='crearprod';
    public $product,$imgProd,$desc,$cant,$precio,$talla,$cate=1,$cat,$idp,$idupd,$img,$msg;
    public $modalFormVisible=false; public $modalEliminar=false;
    public function render()
    {
        if($this->searchProd!=null){
            Log::channel('daily')->info('Busque de producto: '.$this->searchProd.', Parte administrativa,'.', Usuario: '.Auth::id());
        }
        //$searchTerm = '%'.$this->search.'%';
        return view('livewire.Admin.prod.product-component',[
            'prods'=> tblproductos::where('vchProd','LIKE',"%{$this->searchProd}%")
            ->orWhere('fltPrecio','LIKE',"%{$this->searchProd}%")
            ->orderBy('intIDProd','desc')
            ->paginate($this->porpagProd),
            'cats'=> tblcats::all()
        ]);
    }
    public function clear(){
        $this->searchProd='';
        $this->porpagProd=10;
        $this->pageProd=1;
    }

    /////////////Guardar
    public function createShowModal(){
        $this->modalFormVisible=true;
        $this->cleanVars();
        $this->msg='Guardar ';
    }
    public function store(){

        $this->validate([
            'product'=>   'required|max:100',
            ///'product'=>   ['required',Rule::unique('tblproductos','vchProd')],
            'desc'=>      'required|max:500',
            'cant'=>      'required|integer|min:1|max:20000',
            'precio'=>    'required|numeric|min:1|max:20000',
            'talla'=>     'required|max:20',
            'imgProd'=>   'required|image|max:5024',
        ],
        [
            'product.required' => 'El nombre del producto es requerido',
            'product.max' => 'Maximo 100 caracteres',
            'desc.required' => 'La descripcion del producto es requerida',
            'desc.max' => 'Maximo 500 caracteres',
            'cant.required' => 'La cantidad es requerida',
            'cant.integer' => 'Introduce un numero entero',
            'cant.min' => 'Debe ser mayor o igual a 1',
            'cant.max' => 'Maximo 20000 unidades',
            'precio.required' => 'El precio es requerido',
            'precio.min' => 'Debe ser mayor o igual a 1',
            'cant.max' => 'Precio maximo: $20000',
            'precio.numeric' => 'Introduce una cantidad',
            'talla.required' => 'La talla es requerida',
            'talla.max' => 'Maximo 20 caracteres',
            'imgProd.required' => 'La imagen es requerida',
            'imgProd.image' => 'Solo imagenes',
            'imgProd.max' => '5MB Maximo',
        ]);
        $nombre=$this->imgProd->store('storage/img','subirArchivos');
        tblproductos::updateOrInsert(['intIDProd'=>$this->idupd],[
            'vchProd'=>      $this->product,
            'vchDesc'=>      $this->desc,
            'intCant'=>      $this->cant,
            'fltPrecio'=>    $this->precio,
            'intIdCat'=>     $this->cate,
            'vchTalla'=>     $this->talla,
            'vchImg'=>       $nombre,
        ]);
        $this-> cleanVars();
        $this->cerrarModal();
        session()->flash('message', 'Producto modificado correctamente.');
        Log::channel('daily')->info('Producto '.$this->idupd.'Estado: '.$this->msg.', Usuario: '.Auth::id());

    }
    public function cerrarModal()
    {
        $this->modalFormVisible=false;
        $this->cleanVars();

    }
    private function cleanVars()
    {
        $this->product = null;
        $this->desc = null;
        $this->cant = null;
        $this->precio = null;
        $this->talla=null ;
        $this->imgProd=null;
    }

    /////Editar
    public function mostrarupdprod($id){
        $this->modalFormVisible=true;
        $prod = tblproductos::where('intIDProd', $id)->first();
         $this->idupd=$id;
         $this->product= $prod->vchProd;
         $this->desc=    $prod->vchDesc;
         $this->cant=    $prod->intCant;
         $this->precio=  $prod->fltPrecio;
         $this->talla=   $prod->vchTalla;
         $this->img= $prod->vchImg;
         $this->cate= $prod->intIdCat;
        $this->msg='Actualizar';
    }

    //////Eliminar
    public function mostrarEliminar($id){
        $this->modalEliminar=true;
        $this->idp=$id;
        $prod = tblproductos::where('intIDProd', $id)->first();
        $this->product= $prod->vchProd;

    }
    public function eliminarProd(){
        Log::channel('daily')->info('Producto '.$this->idupd.'Estado: Eliminado'.', Usuario: '.Auth::id());
        $prod=tblproductos::where('intIDProd',$this->idp);
        $prod->delete();
        $this->modalEliminar=false;
        session()->flash('message', 'Producto eliminado correctamente.');
    }

}
