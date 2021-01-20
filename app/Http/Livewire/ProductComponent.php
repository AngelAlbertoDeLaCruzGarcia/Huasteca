<?php

namespace App\Http\Livewire;
use App\Models\tblproductos;
use App\Models\tblcats;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\WithFileUploads;
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
            'product'=>   'required',
            ///'product'=>   ['required',Rule::unique('tblproductos','vchProd')],
            'desc'=>      'required',
            'cant'=>      'required',
            'precio'=>    'required',
            'talla'=>     'required',
            'imgProd'=>   'required|image|max:5024',
        ],
        [
            'product.required' => 'El nombre del producto es requerido',
            'desc.required' => 'La descripcion del producto es requerido',
            'cant.required' => 'La cantidad es requerido',
            'precio.required' => 'El precio es requerido',
            'talla.required' => 'La talla es requerida',
            'imgProd.required' => 'La imagen es requerida',
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
        $prod=tblproductos::where('intIDProd',$this->idp);
        $prod->delete();
        $this->modalEliminar=false;
        session()->flash('message', 'Producto eliminado correctamente.');
    }

}
