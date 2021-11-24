@section('title', __('Empleados'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
						<h4><i class="fas fa-building text-primary"></i>
							<b>Empresa: {{$empresa->nombre}}</b></h4>
							<h4><i class="fas fa-user text-primary"></i>
							Lista de Empleados </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }}</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<!--<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Empleados">
						</div>--><a href="{{ url('/planillas',$empresa->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-file-alt"></i> Ver Planillas </a>
						<div class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
						<i class="fa fa-plus"></i>  Agregar Empleado
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.empleados.create')
						@include('livewire.empleados.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombre</th>
								<th>Apellido Pat</th>
								<th>Apellido Mat</th>
								<th>Tipo Doc</th>
								<th>Num Doc</th>
								<th>Telefono</th>
								<th>Fecha Ingreso</th>
								<th>Cargo</th>
								<th>Tipo Actividad</th>
								<th>Haber Basico</th>
								<th>Estado</th>
								<th>Empresa</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@foreach($empleados as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->apellido_pat }}</td>
								<td>{{ $row->apellido_mat }}</td>
								<td>{{ $row->tipo_doc }}</td>
								<td>{{ $row->num_doc }}</td>
								<td>{{ $row->telefono }}</td>
								<td>{{ $row->fecha_ingreso }}</td>
								<td>{{ $row->cargo }}</td>
								<td>{{ $row->tipo_actividad }}</td>
								<td>{{ $row->haber_basico }}</td>
								<td>{{ $row->estado }}</td>
								<td>{{ $row->empresa->nombre }}</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Empleado id {{$row->id}}? \nDeleted Empleados cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $empleados->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
