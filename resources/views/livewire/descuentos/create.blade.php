<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Descuento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="cuenta_prev"></label>
                <input wire:model="cuenta_prev" type="text" class="form-control" id="cuenta_prev" placeholder="Cuenta Prev">@error('cuenta_prev') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="riesgo_comun"></label>
                <input wire:model="riesgo_comun" type="text" class="form-control" id="riesgo_comun" placeholder="Riesgo Comun">@error('riesgo_comun') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="comision_afp"></label>
                <input wire:model="comision_afp" type="text" class="form-control" id="comision_afp" placeholder="Comision Afp">@error('comision_afp') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="aporte_solidario"></label>
                <input wire:model="aporte_solidario" type="text" class="form-control" id="aporte_solidario" placeholder="Aporte Solidario">@error('aporte_solidario') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="ap_nac_solidario"></label>
                <input wire:model="ap_nac_solidario" type="text" class="form-control" id="ap_nac_solidario" placeholder="Ap Nac Solidario">@error('ap_nac_solidario') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="rc_iva"></label>
                <input wire:model="rc_iva" type="text" class="form-control" id="rc_iva" placeholder="Rc Iva">@error('rc_iva') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="anticipos"></label>
                <input wire:model="anticipos" type="text" class="form-control" id="anticipos" placeholder="Anticipos">@error('anticipos') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="desc"></label>
                <input wire:model="desc" type="text" class="form-control" id="desc" placeholder="Desc">@error('desc') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="total_desc"></label>
                <input wire:model="total_desc" type="text" class="form-control" id="total_desc" placeholder="Total Desc">@error('total_desc') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="empleado_id"></label>
                <input wire:model="empleado_id" type="text" class="form-control" id="empleado_id" placeholder="Empleado Id">@error('empleado_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="tributo_id"></label>
                <input wire:model="tributo_id" type="text" class="form-control" id="tributo_id" placeholder="Tributo Id">@error('tributo_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="sueldo_id"></label>
                <input wire:model="sueldo_id" type="text" class="form-control" id="sueldo_id" placeholder="Sueldo Id">@error('sueldo_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>