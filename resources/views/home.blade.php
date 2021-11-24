@extends('layouts.app')
@section('title', __('Inicio'))
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
			<div class="card-body">
				<h5>Hola <strong>{{ Auth::user()->name }},</strong> Estás conectado al sistema web de sueldos y salarios.</h5>
				
				</br> 
				<hr>

				<div class="dropdown show">
					Empresa
					<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Seleccionar
					</a>

					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						@foreach($empresas_disponibles as $emp)
						<a class="dropdown-item" href="#">{{$emp->nombre}}</a>
						@endforeach
					</div>
				</div>

				<hr>
			
			<div class="row w-100">
					<div class="col-md-3">
						<div class="card border-info mx-sm-1 p-3">
							<div class="card border-info text-info p-3" ><span class="text-center fa fa-building" aria-hidden="true"></span></div>
							<div class="text-info text-center mt-3"><h4>Empresas</h4></div>
							<div class="text-info text-center mt-2"><h1>{{ $empresas_disponibles->count() }}</h1></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-success mx-sm-1 p-3">
							<div class="card border-success text-success p-3 my-card"><span class="text-center fa fa-users" aria-hidden="true"></span></div>
							<div class="text-success text-center mt-3"><h4>Trabajadores</h4></div>
							<div class="text-success text-center mt-2"><h1>9</h1></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-danger mx-sm-1 p-3">
							<div class="card border-danger text-danger p-3 my-card" ><span class="text-center fa fa-file-alt" aria-hidden="true"></span></div>
							<div class="text-danger text-center mt-3"><h4>Planillas</h4></div>
							<div class="text-danger text-center mt-2"><h1>12</h1></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card border-warning mx-sm-1 p-3">
							<div class="card border-warning text-warning p-3 my-card" ><span class="text-center fa fa-users" aria-hidden="true"></span></div>
							<div class="text-warning text-center mt-3"><h4>Usuarios</h4></div>
							<div class="text-warning text-center mt-2"><h1>{{ Auth::user()->count() }}</h1></div>
						</div>
					</div>
				 </div>				
			</div>
		</div>
	</div>
</div>
</div>
@endsection