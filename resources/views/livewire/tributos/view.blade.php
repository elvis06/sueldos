@section('title', __('Tributos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-chart-pie text-primary"></i>
							Planilla Tributaria </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }}</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<!--<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar">
						</div>-->
						<div class="btn-group">
							<a href="{{ url('/tributos-pdf',$planilla->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-file-pdf"></i> Exportar PDF </a>
							<a href="{{ url('/tributos-excel',$planilla->id) }}" class="btn btn-sm btn-success"><i class="fa fa-file-excel"></i> Exportar EXCEL </a>
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.tributos.create')
						@include('livewire.tributos.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Año</th>
								<th>Periodo</th>
								<th>Cod. RCIVA</th>
								<th>Nombre</th>
								<th>1er Apellido</th>
								<th>2do Apellido</th>
								<th>Num. Doc</th>
								<th>Tipo Doc.</th>
								<th>Novedades</th>
								<th>Ingreso Neto</th>
								<th>Dos Salarios Min</th>
								<th>Base Imponible</th>
								<th>Impuesto Rciva</th>
								<th>13 Dos Sal Min</th>
								<th>Imp Neto Rciva</th>
								<th>Formulario C693</th>
								<th>Saldo Favor Fisco</th>
								<th>Saldo Favor Dep</th>
								<th>Saldo Ant Favor Dep</th>
								<th>Mant Valor</th>
								<th>Saldo Act</th>
								<th>Saldo Utilizado</th>
								<th>Retencion Rciva</th>
								<th>Siete Periodo Ant</th>
								<th>Formulario C465</th>
								<th>Saldo Siete</th>
								<th>Pago Siete</th>
								<th>Impuesto Retenido</th>
								<th>Saldo Dep</th>
								<th>Saldo Siete Dep</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@foreach($tributos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->planilla->gestion }}</td>
								<td>{{ $row->planilla->mes }}</td>
								<td>{{ $row->empleado->cod_rciva }}</td>
								<td>{{ $row->empleado->nombre }}</td>
								<td>{{ $row->empleado->apellido_pat }}</td>
								<td>{{ $row->empleado->apellido_mat }}</td>
								<td>{{ $row->empleado->num_doc }}</td>
								<td>{{ $row->empleado->tipo_doc }}</td>
								<td>{{ $row->empleado->novedad }}</td>
								<td>{{ $row->ingreso_neto }}</td>
								<td>{{ $row->dos_salarios_min }}</td>
								<td>{{ $row->base_imponible }}</td>
								<td>{{ $row->impuesto_rciva }}</td>
								<td>{{ $row->trece_dos_sal_min }}</td>
								<td>{{ $row->imp_neto_rciva }}</td>
								<td>{{ $row->formulario_c693 }}</td>
								<td>{{ $row->saldo_favor_fisco }}</td>
								<td>{{ $row->saldo_favor_dep }}</td>
								<td>{{ $row->saldo_ant_favor_dep }}</td>
								<td>{{ $row->mant_valor }}</td>
								<td>{{ $row->saldo_act }}</td>
								<td>{{ $row->saldo_utilizado }}</td>
								<td>{{ $row->retencion_rciva }}</td>
								<td>{{ $row->siete_periodo_ant }}</td>
								<td>{{ $row->formulario_c465 }}</td>
								<td>{{ $row->saldo_siete }}</td>
								<td>{{ $row->pago_siete }}</td>
								<td>{{ $row->impuesto_retenido }}</td>
								<td>{{ $row->saldo_dep }}</td>
								<td>{{ $row->saldo_siete_dep }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Tributo id {{$row->id}}? \nDeleted Tributos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $tributos->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>