<div wire:ignore.self class="modal fade" id="sueldosModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="sueldosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sueldosModalLabel">Datos Sueldos y Salarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombre Completo</th>
								<th>Días Laborables del Mes</th>
								<th>Días Trabajados</th>
								<th>Dominicales</th>
								<th>Hrs. Extra</th>
								<th>Hrs. Nocturnas</th>
								<th>Hrs. Dom. y Feriado</th>
								<th>Subsidio Frontera</th>
								<th>Otros Ingresos</th>
							</tr>
						</thead>
						<tbody>
						<form>
						@foreach($empleados as $row)
							<tr>
							<td>{{ $loop->iteration }}</td> 
							<td>{{ $row->nombre }} {{ $row->apellido_pat }}</td>
							<td>
								<input wire:model="dias_habiles.{{ $row->id }}" type="text" class="form-control" id="dias_habiles_{{ $row->id }}" placeholder="Dias Hábiles" value="30">@error('dias_habiles') <span class="error text-danger">{{ $message }}</span> @enderror
							</td>
							<td>
								<input wire:model="dias_trab.{{ $row->id }}" type="text" class="form-control" id="dias_trab_{{ $row->id }}" placeholder="Dias Trab">@error('dias_trab') <span class="error text-danger">{{ $message }}</span> @enderror
							</td>
							<td>
								<input wire:model="dias_dom.{{ $row->id }}" type="text" class="form-control" id="dias_dom_{{ $row->id }}" placeholder="Dias Dom">@error('dias_dom') <span class="error text-danger">{{ $message }}</span> @enderror
							</td>
							<td>
								<input wire:model="horas_extra.{{ $row->id }}" type="text" class="form-control" id="horas_extra_{{ $row->id }}" placeholder="Horas Extra">@error('horas_extra') <span class="error text-danger">{{ $message }}</span> @enderror
							</td>
							<td>
								<input wire:model="horas_noc.{{ $row->id }}" type="text" class="form-control" id="horas_noc_{{ $row->id }}" placeholder="Horas Noc">@error('horas_noc') <span class="error text-danger">{{ $message }}</span> @enderror
							</td>
							<td>
								<input wire:model="horas_dom_fer.{{ $row->id }}" type="text" class="form-control" id="horas_dom_fer_{{ $row->id }}" placeholder="Horas Dom Fer">@error('horas_dom_fer') <span class="error text-danger">{{ $message }}</span> @enderror
							<td>
								<input wire:model="subsidio_frontera.{{ $row->id }}" type="text" class="form-control" id="subsidio_frontera_{{ $row->id }}" placeholder="Subsidio Frontera">@error('subsidio_frontera') <span class="error text-danger">{{ $message }}</span> @enderror
							</td>
							<td>
								<input wire:model="otro_ingreso.{{ $row->id }}" type="text" class="form-control" id="otro_ingreso_{{ $row->id }}" placeholder="Otro Ingreso">@error('otro_ingreso') <span class="error text-danger">{{ $message }}</span> @enderror
							</td>
							<tr>
						@endforeach
						</form>
						</tbody>
					</table>					
					</div>
				</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="guardarSueldos()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>