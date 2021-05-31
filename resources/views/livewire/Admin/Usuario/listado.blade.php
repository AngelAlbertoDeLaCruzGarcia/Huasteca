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
<h2 class="px-md-5 font-weight-bold text-center" style="margin-end: 20px;">Usuarios</h2>

<div class="form-row" style="margin: 10px; align:center;">
    <div class="col-md-6 mb-3" >
        <input type="text"  class="form-control" placeholder="Buscar" wire:model="searchUsuario" />

    </div>
    <div class="col-md-auto">
        @if($searchUsuario!=null)
        <button wire:click="clear"><i class="fas fa-backspace"></i></button>
        @endif
      </div>
    <div class="col-md-auto">
        <label for="validationCustom04">Mostrar</label>
    </div>
    <div class="col-md-1">
        <select wire:model="porpagUsuario" class="custom-select">
            <option value="10">10</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
    <div class="col-md-auto">
        <label>por pagina</label>
    </div>
</div>

@if($users->count())
<table class="table table-hover table-info ">
    <thead>
        <tr  class="table-active ">
            <th>Usuario</th>
            <th>Email</th>
            <th>Creacion</th>
            <th>Actualizacion</th>

            <th colspan="2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>

            <td>
                <div class="form-row">
                    <div class="col-md-auto">
                @if($user->profile_photo_path!=null)
                    <img src="{{$user->profile_photo_path }}" width="50px" height="50px" alt="Responsive image" class="img-thumbnail img-fluid"/>
                @elseif ($user->profile_photo_path==null)
                    <img src="{{$user->profile_photo_url}}" width="50px" height="50px" alt="Responsive image" class="img-thumbnail img-fluid"/>
                @endif
                </div><div class="col-md-auto">
                {{ $user->name }}</div>
                </div>
            </td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
            <td>
                <button type="button" class="btn btn-primary" wire:click="mostrarupdusuario({{ $user->id }})">
                    <i class="far fa-edit"></i>
                  </button>

                <button type="button" class="btn btn-danger"  wire:click="mostrarUserEliminar({{ $user->id }})" >
                    <i class="far fa-trash-alt"></i>
                  </button>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    {{$users->links()}}
@else
<p>  No hay resultados para: <strong>{{$searchUsuario}}</strong></p>
@endif

