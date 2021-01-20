<div class="row">
    <div class="container col-xs-12 col-sm-12 col-md-10 col-lg-12 col-md-4" >
        <button class="btn btn-success" wire:click="createUserModal" wire:loading.attr="disabled">Agregar &nbsp;<i class="fas fa-plus-square"></i></button>
    </div>
</div>

@include('livewire.Admin.Usuario.frmuser')
