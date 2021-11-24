<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="name"></label>
                <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="email"></label>
                <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input wire:model="password" type="password" class="form-control" id="password" placeholder="password">@error('password') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <hr>
            <h5>Empresas</h5>
                @foreach($empresas as $empresa)
                <div class="custom-control custom-checkbox">
                    <input wire:model="empresa_check.{{ $empresa->id }}" type="checkbox" class="custom-control-input" 
                    id="empresa_{{$empresa->id}}"
                    value="{{$empresa->id}}"
                    
                    >
                    <label class="custom-control-label" for="empresa_{{$empresa->id}}">
                    {{$empresa->id}}
                    -
                    {{$empresa->nombre}}
                    </label>
                </div>
                @endforeach
            <hr>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>