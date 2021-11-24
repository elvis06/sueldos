@section('title', __('Sueldos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-building text-primary"></i>
							<b>Empresa: {{$empresa->nombre}}</b></h4>
							<h4><i class="fas fas fa-file-invoice-dollar text-primary"></i>
							Planilla de Sueldos ({{$meses[$planilla->mes-1]}} - {{$planilla->gestion}})
							</h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }}</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<!--
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Sueldos">
						</div>-->
						<a href="{{ url('/planillas',$empresa->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-file-alt"></i> Ver Planillas </a>	
						<div class="btn-group">
							<a href="{{ url('/sueldos-excel',$planilla->id) }}" class="btn btn-sm btn-success"><i class="fa fa-file-excel"></i> Exportar EXCEL </a>
							<a href="{{ url('/sueldos-pdf',$planilla->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-file-pdf"></i> Exportar PDF </a>
						</div>
					</div>
				</div>
				
				<div class="card-body">
					@include('livewire.sueldos.create')
					@include('livewire.sueldos.update')
				@if($empresa->rubro == 'INDUSTRIAL' || $empresa->rubro == 'CONSTRUCTORA')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombres y Apellidos</th>
								<th>Fecha Ingreso</th>
								<th>Haber Básico</th>
								<th>Antig.</th>
								<th>Días Habiles</th>
								<th>Días Trab.</th>
								<th>Haber Ganado</th>
								<th>% Antig.</th>
								<th>Bono Antiguedad</th>
								<th>Días Dom.</th>
								<th>Dominicales</th>
								<th>Horas Extra</th>
								<th>Importe Hrs Extra</th>
								<th>Horas Noc</th>
								<th>Importe Hrs Noc</th>
								<th>Horas Dom Fer</th>
								<th>Importe Dom Fer</th>
								<th>Subsidio Frontera</th>
								<th>Otro Ingreso</th>
								<th>Total Ganado</th>
								<th>Cuenta Prev</th>
								<th>Riesgo Común</th>
								<th>Comision AFP</th>
								<th>Aporte Solidario</th>
								<th>Ap. Nac. Solidario</th>
								<th>RC-IVA</th>
								<th>Anticipos</th>
								<th>Descuentos</th>
								<th>Total Desc.</th>
								<th>Liq. Pagable</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@foreach($sueldos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->empleado->nombre }} {{ $row->empleado->apellido_pat }}</td> 
								<td>{{ $row->empleado->fecha_ingreso }}</td> 
								<td>{{ number_format($row->empleado->haber_basico, 2, ',', '.'); }}</td>
								<td>{{ $row->antiguedad }} años</td>
								<td>{{ $row->dias_habiles }}</td>
								<td>{{ $row->dias_trab }}</td>
								<td>{{ number_format($row->haber_ganado, 2, ',', '.'); }}</td>
								<td>{{ $row->porcentaje_ant }} %</td>
								<td>{{ number_format($row->bono_antiguedad, 2, ',', '.'); }}</td>
								<td>{{ $row->dias_dom }}</td>
								<td>{{ number_format($row->dominicales, 2, ',', '.'); }}</td>
								<td>{{ $row->horas_extra }}</td>
								<td>{{ number_format($row->importe_hrs_extra, 2, ',', '.'); }}</td>
								<td>{{ $row->horas_noc }}</td>
								<td>{{ number_format($row->importe_hrs_noc, 2, ',', '.'); }}</td>
								<td>{{ $row->horas_dom_fer }}</td>
								<td>{{ number_format($row->importe_dom_fer, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->subsidio_frontera, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->otro_ingreso, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->total_ganado, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->cuenta_prev, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->riesgo_comun, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->comision_afp, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->aporte_solidario, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->ap_nac_solidario, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->rc_iva, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->anticipos, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->descuentos, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->total_desc, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->liq_pagable, 2, ',', '.'); }}</td>
								<td width="90">
								<div class="btn-group">
								<a href="{{ url('/boleta-pdf',$row->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-file-pdf"></i> Boleta </a>
								</div>
								<!--<div class="btn-group">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Sueldo id {{$row->id}}? \nDeleted Sueldos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>-->
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $sueldos->links() }}
					</div>
				</div>
				@else
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombres y Apellidos</th>
								<th>Fecha Ingreso</th>
								<th>Haber Básico</th>
								<th>Antig.</th>
								<th>Días Trab.</th>
								<th>Haber Ganado</th>
								<th>% Antig.</th>
								<th>Bono Antiguedad</th>
								<th>Horas Extra</th>
								<th>Importe Hrs Extra</th>
								<th>Horas Noc.</th>
								<th>Importe Hrs Noc</th>
								<th>Subsidio Frontera</th>
								<th>Otro Ingreso</th>
								<th>Total Ganado</th>
								<th>Cuenta Prev</th>
								<th>Riesgo Común</th>
								<th>Comision AFP</th>
								<th>Aporte Solidario</th>
								<th>Ap. Nac. Solidario</th>
								<th>RC-IVA</th>
								<th>Anticipos</th>
								<th>Descuentos</th>
								<th>Total Desc.</th>
								<th>Liq. Pagable</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@foreach($sueldos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->empleado->nombre }} {{ $row->empleado->apellido_pat }}</td> 
								<td>{{ $row->empleado->fecha_ingreso }}</td> 
								<td>{{ number_format($row->empleado->haber_basico, 2, ',', '.'); }}</td>
								<td>{{ $row->antiguedad }} años</td>
								<td>{{ $row->dias_trab }}</td>
								<td>{{ number_format($row->haber_ganado, 2, ',', '.'); }}</td>
								<td>{{ $row->porcentaje_ant }} %</td>
								<td>{{ number_format($row->bono_antiguedad, 2, ',', '.'); }}</td>
								<td>{{ $row->horas_extra }}</td>
								<td>{{ number_format($row->importe_hrs_extra, 2, ',', '.'); }}</td>
								<td>{{ $row->horas_noc }}</td>
								<td>{{ number_format($row->importe_hrs_noc, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->subsidio_frontera, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->otro_ingreso, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->total_ganado, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->cuenta_prev, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->riesgo_comun, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->comision_afp, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->aporte_solidario, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->ap_nac_solidario, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->rc_iva, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->anticipos, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->descuentos, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->total_desc, 2, ',', '.'); }}</td>
								<td>{{ number_format($row->liq_pagable, 2, ',', '.'); }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Sueldo id {{$row->id}}? \nDeleted Sueldos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $sueldos->links() }}
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>