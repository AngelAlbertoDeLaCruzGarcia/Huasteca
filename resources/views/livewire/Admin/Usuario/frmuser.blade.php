
<x-jet-dialog-modal wire:model="modalUserVisible">
    <x-slot name="title">
        {{ $msg }}Usuario
    </x-slot>

    <x-slot name="content">
        <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.p.focus(), 250)">
            <form wire:submit.prevent="storeU()" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="recipient-name" wire:model.debounce.500ms="nombre" autofocus/>
                    @error('nombre')  <p style="color: red;">{{$message}}</p>  @enderror
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Correo:</label>
                    <input class="form-control" id="message-text" wire:model.debounce.500ms="correo">
                    @error('correo')  <p style="color: red;">{{$message}}</p>  @enderror
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="message-text" class="col-form-label">Contraseña:</label>
                        <input class="form-control" id="message-text" wire:model.debounce.500ms="contra" />
                        @error('contra')  <p style="color: red;">{{$message}}</p>  @enderror
                    </div>

                </div>
                <div class="form-row">
                    <div class="col d-flex justify-content-center">
                        @if ($imgUsuario)
                        <img src="{{ $imgUsuario->temporaryUrl() }}" width="50%" height="20%">
                        @endif
                    </div>
                    <div class="col"  x-data="{ isUploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <label for="message-text" class="col-form-label"></label>
                        <input type="file" class="form-control" id="message-text" wire:model.debounce.500ms="imgUsuario"/>
                        @error('imgUsuario')  <p style="color: red;">{{$message}}</p>  @enderror
                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>
                    <div class="col">
                        <label></label>
                        <select wire:model="rol" class="custom-select">
                            @if($rol!=null)
                            <option value="{{$rol}}">{{$rol}}</option>
                            @endif
                            <option value="admin">admin</option>
                            <option value="editor">editor</option>
                            <option value="client">client</option>
                        </select>
                    </div>

                </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="cerrarUserModal()" wire:loading.attr="disabled">
            {{ __('Cancelar') }}
        </x-jet-secondary-button>
        <button type="submit" class="ml-2 btn btn-success">{{$msg}} &nbsp;<i class="far fa-save"></i></button>
    </form>
</x-slot>
</x-jet-dialog-modal>
