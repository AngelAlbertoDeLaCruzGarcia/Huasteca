
<x-jet-dialog-modal wire:model="modalFormVisible">
    <x-slot name="title">
        {{ $msg  }} Producto
    </x-slot>

    <x-slot name="content">
        <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.p.focus(), 250)">
            <form wire:submit.prevent="store" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="recipient-name" wire:model.debounce.500ms="product" autofocus/>
                    @error('product')  <p style="color: red;">{{$message}}</p>  @enderror
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Descripcion:</label>
                    <input class="form-control" id="message-text" wire:model.debounce.500ms="desc"/>
                    @error('desc')  <p style="color: red;">{{$message}}</p>  @enderror

                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="message-text" class="col-form-label">Talla:</label>
                        <input class="form-control" id="message-text" wire:model.debounce.500ms="talla"/>
                        @error('talla')  <p style="color: red;">{{$message}}</p>  @enderror
                    </div>
                    <div class="col">
                        <label for="message-text" class="col-form-label">Cantidad:</label>
                        <input class="form-control" id="message-text" wire:model.debounce.500ms="cant"/>
                        @error('cant')  <p style="color: red;">{{$message}}</p>  @enderror
                    </div>
                    <div class="col">
                        <label for="message-text" class="col-form-label">Precio:</label>
                        <input class="form-control" id="message-text" wire:model.debounce.500ms="precio"/>
                        @error('precio')  <p style="color: red;">{{$message}}</p>  @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col d-flex justify-content-center">
                        @if ($imgProd)
                        <img src="{{ $imgProd->temporaryUrl() }}" width="50%" height="20%">
                        @endif
                    </div>
                    <div class="col"  x-data="{ isUploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="isUploading = true"
                                        x-on:livewire-upload-finish="isUploading = false"
                                        x-on:livewire-upload-error="isUploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <label for="message-text" class="col-form-label"></label>
                        <input type="file" class="form-control" id="message-text" wire:model.debounce.500ms="imgProd"/>
                        @error('imgProd')  <p style="color: red;">{{$message}}</p>  @enderror
                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>
                    <div class="col">
                        <label></label>
                        <select wire:model="cate" class="custom-select">
                            <option value="{{$cate}}">@if($cate==1)Caballero @elseif($cate==2)Dama  @elseif($cate==3)Niño @endif</option>
                            @foreach($cats as $cat)
                            <option value="{{$cat->intIdCat}}">{{$cat->vchCat}}</option>
                           @endforeach
                        </select>
                    </div>
                </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="cerrarModal()" wire:loading.attr="disabled">
            {{ __('Cancelar') }}
        </x-jet-secondary-button>
        <button type="submit" class="ml-2 btn btn-success">{{$msg}} &nbsp;<i class="far fa-save"></i></button>
    </form>
</x-slot>
</x-jet-dialog-modal>
