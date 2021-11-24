<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Planilla</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="mes">Periodo</label>
                <input wire:model="mes" type="text" class="form-control" id="mes" placeholder="Mes">@error('mes') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="gestion">Gestión</label>
                <input wire:model="gestion" type="text" class="form-control" id="gestion" placeholder="Gestión">@error('gestion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="sueldo_min">Sueldo Mínimo Nacional</label>
                <input wire:model="sueldo_min" type="text" class="form-control" id="sueldo_min" placeholder="Sueldo Min">@error('sueldo_min') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="domingos">Días Domigo del mes</label>
                <input wire:model="domingos" type="text" class="form-control" id="domingos" placeholder="Domingos">@error('domingos') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="feriados">Feriados</label>
                <input wire:model="feriados" type="text" class="form-control" id="feriados" placeholder="Feriados">@error('feriados') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="ultimo_dia">Último día del mes</label>
                <input wire:model="ultimo_dia" type="date" class="form-control" id="ultimo_dia" placeholder="Último Día">@error('ultimo_dia') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>