<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Planilla</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="mes"></label>
                <input wire:model="mes" type="text" class="form-control" id="mes" placeholder="Mes">@error('mes') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="gestion"></label>
                <input wire:model="gestion" type="text" class="form-control" id="gestion" placeholder="Gestion">@error('gestion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="sueldo_min"></label>
                <input wire:model="sueldo_min" type="text" class="form-control" id="sueldo_min" placeholder="Sueldo Min">@error('sueldo_min') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="domingos"></label>
                <input wire:model="domingos" type="text" class="form-control" id="domingos" placeholder="Domingos">@error('domingos') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="feriados"></label>
                <input wire:model="feriados" type="text" class="form-control" id="feriados" placeholder="Feriados">@error('feriados') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="ultimo_dia"></label>
                <input wire:model="ultimo_dia" type="text" class="form-control" id="ultimo_dia" placeholder="Ultimo Dia">@error('ultimo_dia') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="estado"></label>
                <input wire:model="estado" type="text" class="form-control" id="estado" placeholder="Estado">@error('estado') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
       </div>
    </div>
</div>