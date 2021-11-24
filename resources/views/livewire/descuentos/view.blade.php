@section('title', __('Descuentos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Lista de Descuentos </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }}</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Descuentos">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i>  Add Descuentos
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.descuentos.create')
						@include('livewire.descuentos.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Cuenta Prev</th>
								<th>Riesgo Comun</th>
								<th>Comision Afp</th>
								<th>Aporte Solidario</th>
								<th>Ap Nac Solidario</th>
								<th>Rc Iva</th>
								<th>Anticipos</th>
								<th>Descuentos</th>
								<th>Total Desc</th>
								<th>Empleado Id</th>
								<th>Tributo Id</th>
								<th>Sueldo Id</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@foreach($descuentos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->cuenta_prev }}</td>
								<td>{{ $row->riesgo_comun }}</td>
								<td>{{ $row->comision_afp }}</td>
								<td>{{ $row->aporte_solidario }}</td>
								<td>{{ $row->ap_nac_solidario }}</td>
								<td>{{ $row->rc_iva }}</td>
								<td>{{ $row->anticipos }}</td>
								<td>{{ $row->desc }}</td>
								<td>{{ $row->total_desc }}</td>
								<td>{{ $row->empleado_id }}</td>
								<td>{{ $row->tributo_id }}</td>
								<td>{{ $row->sueldo_id }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Actions
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Descuento id {{$row->id}}? \nDeleted Descuentos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $descuentos->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>