<div wire:ignore.self class="modal fade" id="tributosModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tributosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tributosModalLabel">Datos Planilla Tributaria</h5>
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
								<th>FORMULARIO 110 CASILLA 693</th>
								<th>Saldo a Favor del Dependiente periodo anterior</th>
								<th>Pago a cuenta SIETE-RG periodo anterior</th>
								<th> FORMULARIO 110 CASILLA 465</th>
							</tr>
						</thead>
						<tbody>
						<form>
						@foreach($empleados as $row)
							<tr>
							<td>{{ $loop->iteration }}</td> 
							<td>{{ $row->nombre }} {{ $row->apellido_pat }}</td>
							<td>
								<input wire:model="formulario_c693.{{ $row->id }}" type="text" class="form-control" id="formulario_c693_{{ $row->id }}" placeholder="F-110 CASILLA 693" value="30">@error('dias_habiles') <span class="error text-danger">{{ $message }}</span> @enderror
							</td>
							<td>
								<input wire:model="saldo_ant_favor_dep.{{ $row->id }}" type="text" class="form-control" id="saldo_ant_favor_dep_{{ $row->id }}" placeholder="Saldo a Favor del Dependiente">@error('dias_trab') <span class="error text-danger">{{ $message }}</span> @enderror
							</td>
							<td>
								<input wire:model="siete_periodo_ant.{{ $row->id }}" type="text" class="form-control" id="siete_periodo_ant_{{ $row->id }}" placeholder="Pago a cuenta SIETE-RG">@error('dias_dom') <span class="error text-danger">{{ $message }}</span> @enderror
							</td>
							<td>
								<input wire:model="formulario_c465.{{ $row->id }}" type="text" class="form-control" id="formulario_c465_{{ $row->id }}" placeholder="F-110 CASILLA 465">@error('horas_extra') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <button type="button" wire:click.prevent="guardarTributos()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>