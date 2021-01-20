 <!-- Modal -->
 <x-jet-dialog-modal wire:model="modalUserEliminar">
    <x-slot name="title">
        Eliminar <strong>&nbsp;{{$nombre}}</strong>
    </x-slot>

    <x-slot name="content">
    <p>¿Estas seguro que desea elimiar? </p>

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalUserEliminar')" wire:loading.attr="disabled">
                Cancelar
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="eliminarUser" wire:loading.attr="disabled">
            <i class="far fa-trash-alt"></i>
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
