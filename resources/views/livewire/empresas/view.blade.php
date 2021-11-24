@section('title', __('Empresas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
				<h5><span class="text-center fa fa-grin-beam"></span> Hola <strong>{{ Auth::user()->name }},</strong> {{ __('Estás conectado al sistema web de sueldos y salarios') }}</h5>
				
			</div>
				
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-building text-primary"></i>
							Administrar Empresa </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<!--<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Empresas">
						</div>-->
						@if(Auth::user()->id == 1 || Auth::user()->id == 2)
						<div class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i>  Crear Empresa
						</div>
						@endif
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.empresas.create')
						@include('livewire.empresas.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombre</th>
								<th>NIT</th>
								<th>Dirección</th>
								<th>Teléfono</th>
								<th>Ciudad</th>
								<th>Representante</th>
								<th>Tel. Rep.</th>
								<th>Rubro</th>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@foreach($empresas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nombre }}</td>
								<td>{{ $row->nit }}</td>
								<td>{{ $row->direccion }}</td>
								<td>{{ $row->telefono }}</td>
								<td>{{ $row->ciudad }}</td>
								<td>{{ $row->representante }}</td>
								<td>{{ $row->tel_representante }}</td>
								<td>{{ $row->rubro }}</td>
								<td>
								<div class="btn-group">
									<a href="{{ url('/planillas',$row->id) }}" class="btn btn-sm btn-success"><i class="fa fa-caret-square-right"></i> Acceder </a>	
									<a data-toggle="modal" data-target="#updateModal" class="btn btn-sm btn-primary" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>			 
									@if(Auth::user()->id == 1 || Auth::user()->id == 2)
									<a class="btn btn-sm btn-danger" onclick="confirm('Confirm Delete Empresa id {{$row->id}}? \nDeleted Empresas cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									@endif
								</div>
								</td>
							</tr>	
							@endforeach
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>