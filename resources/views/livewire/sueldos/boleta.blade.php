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
		h3{text-align:center; font:14px;}
		p{text-align:center;}
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
	<h4><strong>{{$empresa->nombre}}</strong></h4>
	<table>
		<tbody>
			<tr>
				<td><strong>C.I.</strong></td>
				<td>{{$sueldo->empleado->num_doc}}</td>
				<td><strong>CARGO</strong></td>
				<td>{{$sueldo->empleado->cargo}}</td>
			</tr>
			<tr>
				<td><strong>NOMBRE</strong></td>
				<td>{{$sueldo->empleado->nombre}} {{$sueldo->empleado->apellido_pat}} {{$sueldo->empleado->apellido_mat}}</td>
				<td><strong>SALDO RC-IVA A FAVOR</strong></td>
				<td>0</td>
			</tr>
			<tr>
				<td><strong>FECHA DE INGRESO</strong></td>
				<td>{{$sueldo->empleado->fecha_ingreso}}</td>
				<td><strong>DÍAS TRABAJADOS</strong></td>
				<td>{{$sueldo->dias_trab}}</td>
			</tr>
			<tr>
				<td colspan="4"><strong>CORRESPONDIENTE AL MES DE {{$meses[$planilla->mes-1]}} DE {{$planilla->gestion}}</strong></td>
			</tr>
			<tr>
				<td colspan="2"><strong>INGRESOS</strong></td>
				<td colspan="2"><strong>DESCUENTOS</strong></td>
			</tr>
			<tr>
				<td>Haber Ganado</td>
				<td>{{$sueldo->haber_ganado}}</td>
				<td>Cuenta Prev.</td>
				<td>{{$sueldo->cuenta_prev}}</td>
			</tr>
			<tr>
				<td>Bono Antiguedad</td>
				<td>{{$sueldo->bono_antiguedad}}</td>
				<td>Riesgo Común.</td>
				<td>{{$sueldo->riesgo_comun}}</td>
			</tr>
			<tr>
				<td>Dominicales</td>
				<td>{{$sueldo->dominicales}}</td>
				<td>Comision AFP</td>
				<td>{{$sueldo->comision_afp}}</td>
			</tr>
			<tr>
				<td>Horas Extra</td>
				<td>{{$sueldo->importe_hrs_extra}}</td>
				<td>Aporte Solidario</td>
				<td>{{$sueldo->aporte_solidario}}</td>
			</tr>
			<tr>
				<td>Horas Noc.</td>
				<td>{{$sueldo->importe_hrs_noc}}</td>
				<td>Ap. Nac. Solidario</td>
				<td>{{$sueldo->ap_nac_solidario}}</td>
			</tr>
			<tr>
				<td>Horas Dom. y Fer.</td>
				<td>{{$sueldo->importe_dom_fer}}</td>
				<td>RC-IVA</td>
				<td>{{$sueldo->rc_iva}}</td>
			</tr>
			<tr>
				<td>Subsidio Frontera</td>
				<td>{{$sueldo->subsidio_frontera}}</td>
				<td>Anticipos</td>
				<td>{{$sueldo->anticipos}}</td>
			</tr>
			<tr>
				<td>Otro Ingreso</td>
				<td>{{$sueldo->otro_ingreso}}</td>
				<td>Descuentos</td>
				<td>{{$sueldo->descuentos}}</td>
			</tr>
			<tr>
				<td>Total Ganado</td>
				<td>{{$sueldo->total_ganado}}</td>
				<td>Total Desc.</td>
				<td>{{$sueldo->total_desc}}</td>
			</tr>
			<tr>
				<td colspan="2"><strong>LIQUIDO PAGABLE</strong></td>
				<td colspan="2"><strong>{{$sueldo->liq_pagable}}</strong></td>
			</tr>
			<tr>
				<td colspan="2" style="padding-top:10px;">...................</td>
				<td colspan="2" style="padding-top:10px;">...................</td>
			</tr>
			<tr>
				<td colspan="2"><strong>RECIBI CONFORME</strong></td>
				<td colspan="2"><strong>CONTADOR(A)</strong></td>
			</tr>
		</tbody>
	</table>
</body>
</html>
	