<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sueldos y Salarios</title>
	<style>
		html, body, div, span, h1, h2, h3, h4, h5, h6, p,
		small, strong, b, i, dl, dt, dd, ol, ul, li,fieldset,
		form, label, table, caption, tbody, tfoot, thead, tr, th, td {
			font-size:100%;
			vertical-align:baseline;
			background:transparent;
		}
		h4{text-align:center; font:14px;}
		p{text-align:center;}
		strong{font:16px;}
		body {
			margin:0;
			padding:0;
			font:12px/15px "Helvetica Neue",Arial, Helvetica, sans-serif;
			color: #555;
		}
		
		a {color:#666;}
		
		#content {width:65%; max-width:690px; margin:6% auto 0;}
		
		/*
		Pretty Table Styling
		CSS Tricks also has a nice writeup: https://css-tricks.com/feature-table-design/
		*/
		
		table {
			overflow:hidden;
			border:1px solid #d3d3d3;
			background:#fefefe;
			-moz-border-radius:5px; /* FF1+ */
			-webkit-border-radius:5px; /* Saf3-4 */
			border-radius:5px;
			-moz-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
			-webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
		}
		
		th, td {padding:1px 2px 1px; text-align:center; }
		
		th {padding-top:10px; padding-bottom:10px; text-shadow: 1px 1px 1px #fff; background:#e8eaeb;}
		
		td {border-top:1px solid #e0e0e0; border-right:1px solid #e0e0e0;}

		.page-break {
			page-break-after: always;
		}
	</style>
</head>
<body>
	<h3><strong>{{$empresa->nombre}}</strong></h3>
	<h3>{{$empresa->ciudad}} - BOLIVIA</h3>
	<h4>PLANILLA DE SUELDOS Y SALARIOS</h4>
	<P>CORRESPONDIENTE AL MES DE <strong>{{$meses[$planilla->mes-1]}} de {{$planilla->gestion}}</strong></p>
	@if($empresa->rubro == 'INDUSTRIAL' || $empresa->rubro == 'CONSTRUCTORA')
	<table>
		<thead>
			<tr> 
				<th>#</th> 
				<th>Nombres y Apellidos</th>
				<th>Fecha Ingreso</th>
				<th>Haber Básico</th>
				<th>Años Antig.</th>
				<th>Días Habiles</th>
				<th>Días Trab.</th>
				<th>Haber Ganado</th>
				<th>Bono Antig.</th>
				<th>Domini cales</th>
				<th>Importe Hrs. Extra</th>
				<th>Importe Hrs. Noc.</th>
				<th>Importe Dom. Fer.</th>
				<th>Subsidio Frontera</th>
				<th>Otro Ingreso</th>
				<th>Total Ganado</th>
				<th>Aportes AFP</th>
				<th>RC-IVA</th>
				<th>Anticipos y Desc.</th>
				<th>Total Descu entos</th>
				<th>Liquido Pagable</th>
				<th>FIRMA</th>
			</tr>
		</thead>
		<tbody>
			@foreach($sueldos as $row)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $row->empleado->nombre }} {{ $row->empleado->apellido_pat }} {{ $row->empleado->apellido_mat }}</td> 
				<td>{{ $row->empleado->fecha_ingreso }}</td> 
				<td>{{ number_format($row->empleado->haber_basico, 2, ',', '.'); }}</td>
				<td>{{ $row->antiguedad }}</td>
				<td>{{ $row->dias_habiles }}</td>
				<td>{{ $row->dias_trab }}</td>
				<td>{{ number_format($row->haber_ganado, 2, ',', '.'); }}</td>
				<td>{{ number_format($row->bono_antiguedad, 2, ',', '.'); }}</td>
				<td>{{ number_format($row->dominicales, 2, ',', '.'); }}</td>
				<td>{{ number_format($row->importe_hrs_extra, 2, ',', '.'); }}</td>
				<td>{{ number_format($row->importe_hrs_noc, 2, ',', '.'); }}</td>
				<td>{{ number_format($row->importe_dom_fer, 2, ',', '.'); }}</td>
				<td>{{ number_format($row->subsidio_frontera, 2, ',', '.'); }}</td>
				<td>{{ number_format($row->otro_ingreso, 2, ',', '.'); }}</td>
				<td>{{ number_format($row->total_ganado, 2, ',', '.'); }}</td>
				<td>{{ number_format($row->cuenta_prev+$row->riesgo_comun+$row->comision_afp+$row->aporte_solidario+$row->ap_nac_solidario, 2, ',', '.'); }}</td>
				<td>{{ number_format($row->rc_iva, 2, ',', '.'); }}</td>
				<td>{{ number_format($row->anticipos+$row->descuentos, 2, ',', '.') }}</td>
				<td>{{ number_format($row->total_desc, 2, ',', '.'); }}</td>
				<td>{{ number_format($row->liq_pagable, 2, ',', '.'); }}</td>
				<td></td>
			@endforeach
		</tbody>
	</table>
	<br><br>{{fechaCastellano($planilla->ultimo_dia);}}
	<br><br><br><br>
	<hr width=200  align="center">
	<p><b>REP. LEGAL: {{$empresa->representante}}</b></p>
	<p><b>C.I.: {{$empresa->ci_representante}}</b></p>
	@else
	<table>
		<thead>
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
			@endforeach
		</tbody>
	</table>
	<div class="page-break"></div>
	<table>
		<thead>
			<tr>
				<th>Cuenta Prev.</th>
				<th>Riesgo Común</th>
				<th>Comisión AFP</th>
				<th>Aporte Solidario</th>
				<th>Ap. Nac. Solidario</th>
				<th>RC-IVA</th>
				<th>Anticipos</th>
				<th>Descuentos</th>
				<th>Total Descuentos</th>
				<th>Liquido Pagable</th>
			</tr>
		</thead>
		<tbody>
			@foreach($sueldos as $row)
			<tr>
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
			@endforeach
		</tbody>
	</table>
	@endif
</body>
</html>
<?php
function fechaCastellano ($fecha) {
  $fecha = substr($fecha, 0, 10);
  $numeroDia = date('d', strtotime($fecha));
  $dia = date('l', strtotime($fecha));
  $mes = date('F', strtotime($fecha));
  $anio = date('Y', strtotime($fecha));
  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
  return $nombredia.", ".$numeroDia." de ".$nombreMes." de ".$anio;
}
?>