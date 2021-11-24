<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Sueldo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
                <div class="form-group">
                <label for="dias_habiles">Días Hábiles</label>
                <input wire:model="dias_habiles" type="text" class="form-control" id="dias_habiles" placeholder="Dias Habiles">@error('dias_habiles') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="dias_trab">Días Trabajados</label>
                <input wire:model="dias_trab" type="text" class="form-control" id="dias_trab" placeholder="Dias Trab">@error('dias_trab') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="porcentaje_ant">% Antiguedad</label>
                <input wire:model="porcentaje_ant" type="text" class="form-control" id="porcentaje_ant" placeholder="Porcentaje Ant">@error('porcentaje_ant') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="dias_dom">Días Domingo</label>
                <input wire:model="dias_dom" type="text" class="form-control" id="dias_dom" placeholder="Dias Dom">@error('dias_dom') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="horas_extra">Hrs. Extra</label>
                <input wire:model="horas_extra" type="text" class="form-control" id="horas_extra" placeholder="Horas Extra">@error('horas_extra') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="horas_noc">Hrs. Nocturnas</label>
                <input wire:model="horas_noc" type="text" class="form-control" id="horas_noc" placeholder="Horas Noc">@error('horas_noc') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="horas_dom_fer">Hrs. Domigos y Feriados</label>
                <input wire:model="horas_dom_fer" type="text" class="form-control" id="horas_dom_fer" placeholder="Horas Dom Fer">@error('horas_dom_fer') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="subsidio_frontera">Subsidio Frontera</label>
                <input wire:model="subsidio_frontera" type="text" class="form-control" id="subsidio_frontera" placeholder="Subsidio Frontera">@error('subsidio_frontera') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="otro_ingreso">Otros Ingresos</label>
                <input wire:model="otro_ingreso" type="text" class="form-control" id="otro_ingreso" placeholder="Otro Ingreso">@error('otro_ingreso') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="empleado_id">Nro Empleado</label>
                <input wire:model="empleado_id" type="text" class="form-control" id="empleado_id" placeholder="Empleado Id">@error('empleado_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="planilla_id">Nro. Planilla</label>
                <input wire:model="planilla_id" type="text" class="form-control" id="planilla_id" placeholder="Planilla Id">@error('planilla_id') <span class="error text-danger">{{ $message }}</span> @enderror
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