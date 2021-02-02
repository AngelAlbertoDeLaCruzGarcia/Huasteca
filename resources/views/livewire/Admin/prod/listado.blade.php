<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">

    </h2>
</x-slot>
<div>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('message') }}&nbsp;<i class="far fa-check-circle"></i>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
<div>
<h2 class="px-md-5 font-weight-bold text-center" style="margin-end: 20px;">Productos</h2>

<div class="form-row" style="margin: 10px; align:center;">
    <div class="col-md-6 mb-3" >
        <input type="text"  class="form-control" placeholder="Buscar" wire:model="searchProd" />

    </div>
    <div class="col-md-auto">
        @if($searchProd!=null)
        <button wire:click="clear"><i class="fas fa-backspace"></i></button>
        @endif
      </div>
    <div class="col-md-auto">
        <label for="validationCustom04">Mostrar</label>
    </div>
    <div class="col-md-1">
        <select wire:model="porpagProd" class="custom-select">
            <option value="10">10</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
    <div class="col-md-auto">
        <label>por pagina</label>
    </div>
</div>

@if($prods->count())
<table class="table table-hover table-info ">
    <thead>
        <tr  class="table-active ">
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Talla</th>
            <th>Categoria</th>

            <th colspan="2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($prods as $prod)
        <tr>

            <td>
                <div class="form-row">
                    <div class="col-md-auto">
                        <img src="{{ $prod->vchImg }} " width="50px" height="50px" alt="Responsive image" class="img-thumbnail img-fluid"/>
                    </div>
                    <div class="col-md-auto">
                        {{ $prod->vchProd }}
                    </div>
                </div>
            </td>
            <td>${{ $prod->fltPrecio }}</td>
            <td>{{ $prod->intCant }}</td>
            <td>{{ $prod->vchTalla }}</td>
            <td>{{ $prod->Categoria->vchCat }}</td>

            <td>
                <button type="button" class="btn btn-primary" wire:click="mostrarupdprod({{ $prod->intIDProd }})">
                    <i class="far fa-edit"></i>
                  </button>

                <button type="button" class="btn btn-danger"  wire:click="mostrarEliminar({{ $prod->intIDProd}})" >
                    <i class="far fa-trash-alt"></i>
                  </button>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    {{$prods->links()}}
@else
<p>  No hay resultados para: <strong>{{$searchProd}}</strong></p>
@endif

