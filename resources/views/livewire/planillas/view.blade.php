@section('title', __('Planillas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-building text-primary"></i>
							<b>Empresa: {{$empresa->nombre}}</b></h4>
							<h4><i class="fas fa-file-alt text-primary"></i>
							Planillas de sueldos y salarios</h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }}</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<!--<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Planillas">
						</div>-->
						<a href="{{ url('/empleados',$empresa->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Ver Trabajadores </a>
						<div class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i> Crear Planilla
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.planillas.create')
						@include('livewire.planillas.update')
						@include('livewire.planillas.sueldos')
						@include('livewire.planillas.editar')
						@include('livewire.planillas.tributos')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Mes</th>
								<th>Gestión</th>
								<th>Sueldo Min</th>
								<th>Domingos</th>
								<th>Feriados</th>
								<th>Último Dia</th>
								<th>Empresa</th>
								<th>SUELDOS Y SALARIOS</th>
								<th>PLANILLA TRIBUTARIA</th>
								<th>ACCIONES</th>
							</tr>
						</thead>
						<tbody>
							@foreach($planillas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->mes }}</td>
								<td>{{ $row->gestion }}</td>
								<td>{{ $row->sueldo_min }}</td>
								<td>{{ $row->domingos }}</td>
								<td>{{ $row->feriados }}</td>
								<td>{{ $row->ultimo_dia }}</td>
								<td>{{ $row->empresa->nombre }}</td>
								<td>
								<div class="btn-group">
									@if($row->sueldos->count() > 0)
									<a wire:click="editarSueldos({{$row->id}})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editSueldosModal"><i class="fa fa-donate"></i> Actualizar </a>
									<a href="{{ url('/sueldos',$row->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-search"></i> Ver Sueldos </a>	
									@else
									<a wire:click="planilla({{$row->id}})" class="btn btn-sm btn-success" data-toggle="modal" data-target="#sueldosModal"><i class="fa fa-donate"></i> Registrar </a>
									@endif
									</div>
								</div>
								</td>
								<td>
								<div class="btn-group">
									@if($row->tributos->count() > 0)
									<!--<a wire:click="editarTributos({{$row->id}})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editSueldosModal"><i class="fa fa-landmark"></i> Actualizar </a>-->
									<a href="{{ url('/tributos',$row->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-search"></i> Ver P. Tributaria </a>	
									@else
									<a wire:click="planilla({{$row->id}})" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tributosModal"><i class="fa fa-landmark"></i> Registrar </a>
									@endif
								</div>		
								</td>
								<td>
								<div class="btn-group">
									<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
									<a class="dropdown-item" onclick="confirm('Confirm Delete Planilla id {{$row->id}}? \nDeleted Planillas cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
								</div>
								</td>
							@endforeach
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>