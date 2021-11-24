<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PLANILLA  TRIBUTARIA</title>
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
	<h4>PLANILLA  TRIBUTARIA V.3.</h4>
	<P>CORRESPONDIENTE AL MES DE <strong>{{$meses[$planilla->mes-1]}} de {{$planilla->gestion}}</strong></p>
	<table>
		<thead>
			<tr> 
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
			</tr>
		</thead>
		<tbody>
			@foreach($tributos as $row)
			<tr>
				<td>{{ $row->planilla->gestion }}</td>
				<td>{{ $row->planilla->mes }}</td>
				<td>{{ $row->empleado->cod_rciva }}</td>
				<td>{{ $row->empleado->nombre }}</td>
				<td>{{ $row->empleado->apellido_pat }}</td>
				<td>{{ $row->empleado->apellido_mat }}</td>
				<td>{{ $row->empleado->num_doc }}</td>
				<td>{{ $row->empleado->tipo_doc }}</td>
				<td>{{ $row->empleado->novedad }}</td>
				<td>{{ number_format($row->ingreso_neto, 2, ',', '.'); }}</td>
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
			@endforeach
		</tbody>
	</table>
	<div class="page-break"></div>
	<table>
		<thead>
			<tr> 
				<th>Siete Periodo Ant</th>
				<th>Formulario C465</th>
				<th>Saldo Siete</th>
				<th>Pago Siete</th>
				<th>Impuesto Retenido</th>
				<th>Saldo Dep</th>
				<th>Saldo Siete Dep</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tributos as $row)
			<tr>
				<td>{{ $row->siete_periodo_ant }}</td>
				<td>{{ $row->formulario_c465 }}</td>
				<td>{{ $row->saldo_siete }}</td>
				<td>{{ $row->pago_siete }}</td>
				<td>{{ $row->impuesto_retenido }}</td>
				<td>{{ $row->saldo_dep }}</td>
				<td>{{ $row->saldo_siete_dep }}</td>
			@endforeach
		</tbody>
	</table>
	<br><br>{{fechaCastellano($planilla->ultimo_dia);}}
	<br><br><br><br>
	<hr width=200  align="center">
	<p><b>REP. LEGAL: {{$empresa->representante}}</b></p>
	<p><b>C.I.: {{$empresa->ci_representante}}</b></p>
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