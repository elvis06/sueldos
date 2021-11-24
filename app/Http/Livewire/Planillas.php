<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Planilla;
use App\Models\Sueldo;
use App\Models\Tributo;
use App\Models\Empleado;
use App\Models\Empresa;
use App\Models\Dato;
use Carbon\Carbon;

class Planillas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
	//Variables Planillas
    public $selected_id, $keyWord, $mes, $gestion, $sueldo_min, $domingos, $feriados, $ultimo_dia, $estado, $empresa_id, $empresa;
	//Variables Sueldos
	public $antiguedad, $dias_habiles, $dias_trab, $haber_ganado, $porcentaje_ant, $bono_antiguedad, $dias_dom, $dominicales, $horas_extra, $importe_hrs_extra, $horas_noc, $importe_hrs_noc, $horas_dom_fer, $importe_dom_fer, $subsidio_frontera, $otro_ingreso, $total_ganado, $cuenta_prev, $riesgo_comun, $comision_afp, $aporte_solidario, $ap_nac_solidario, $rc_iva, $anticipos, $descuentos, $total_desc, $liq_pagable;
	//Variables Tributos
	public $ingreso_neto, $dos_salarios_min, $base_imponible, $impuesto_rciva, $trece_dos_sal_min, $imp_neto_rciva, $formulario_c693, $saldo_favor_fisco, $saldo_favor_dep, $saldo_ant_favor_dep, $mant_valor, $saldo_act, $saldo_utilizado, $retencion_rciva, $siete_periodo_ant, $formulario_c465, $saldo_siete, $pago_siete, $impuesto_retenido, $saldo_dep, $saldo_siete_dep;

	public $updateMode = false;

	public function mount(Empresa $empresa)
    {
        $this->empresa = $empresa;
    }

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        /*return view('livewire.planillas.view', [
            'planillas' => Planilla::latest()
						->orWhere('mes', 'LIKE', $keyWord)
						->orWhere('gestion', 'LIKE', $keyWord)
						->orWhere('sueldo_min', 'LIKE', $keyWord)
						->orWhere('domingos', 'LIKE', $keyWord)
						->orWhere('feriados', 'LIKE', $keyWord)
						->orWhere('ultimo_dia', 'LIKE', $keyWord)
						->orWhere('estado', 'LIKE', $keyWord)
						->orWhere('empresa_id', 'LIKE', $keyWord)
						->paginate(10),
			'empresas' => $empresas
        ]);*/
		return view('livewire.planillas.view', [
            'planillas' => Planilla::latest()->where('empresa_id',$this->empresa->id)->get(),
			'empleados' => Empleado::where('empresa_id',$this->empresa->id)->get()
        ])->layout('livewire.planillas.index')->extends('layouts.app');
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->mes = null;
		$this->gestion = null;
		$this->sueldo_min = null;
		$this->domingos = null;
		$this->feriados = null;
		$this->ultimo_dia = null;
		$this->estado = null;
		$this->empresa_id = null;

		$this->antiguedad = null;
		$this->dias_habiles = null;
		$this->dias_trab = null;
		$this->haber_ganado = null;
		$this->porcentaje_ant = null;
		$this->bono_antiguedad = null;
		$this->dias_dom = null;
		$this->dominicales = null;
		$this->horas_extra = null;
		$this->importe_hrs_extra = null;
		$this->horas_noc = null;
		$this->importe_hrs_noc = null;
		$this->horas_dom_fer = null;
		$this->importe_dom_fer = null;
		$this->subsidio_frontera = null;
		$this->otro_ingreso = null;
		$this->total_ganado = null;
		$this->cuenta_prev = null;
		$this->riesgo_comun = null;
		$this->comision_afp = null;
		$this->aporte_solidario = null;
		$this->ap_nac_solidario = null;
		$this->rc_iva = null;
		$this->anticipos = null;
		$this->descuentos = null;
		$this->total_desc = null;
		$this->liq_pagable = null;

		$this->ingreso_neto = null;
		$this->dos_salarios_min = null;
		$this->base_imponible = null;
		$this->impuesto_rciva = null;
		$this->trece_dos_sal_min = null;
		$this->imp_neto_rciva = null;
		$this->formulario_c693 = null;
		$this->saldo_favor_fisco = null;
		$this->saldo_favor_dep = null;
		$this->saldo_ant_favor_dep = null;
		$this->mant_valor = null;
		$this->saldo_act = null;
		$this->saldo_utilizado = null;
		$this->retencion_rciva = null;
		$this->siete_periodo_ant = null;
		$this->formulario_c465 = null;
		$this->saldo_siete = null;
		$this->pago_siete = null;
		$this->impuesto_retenido = null;
		$this->saldo_dep = null;
		$this->saldo_siete_dep = null;
    }
    public function store()
    {
        $this->validate([
		'mes' => 'required',
		'gestion' => 'required',
		'sueldo_min' => 'required',
		'domingos' => 'required',
		'feriados' => 'required',
		'ultimo_dia' => 'required'
        ]);

        Planilla::create([ 
			'mes' => $this-> mes,
			'gestion' => $this-> gestion,
			'sueldo_min' => $this-> sueldo_min,
			'domingos' => $this-> domingos,
			'feriados' => $this-> feriados,
			'ultimo_dia' => $this-> ultimo_dia,
			'empresa_id' => $this->empresa->id
        ]);
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Planilla creada satisfactoriamente.');
    }
	public function planilla($id){
		$this->selected_id = $id;
	}
	public function guardarSueldos()
    {
		//dd($this->dias_habiles[1]);
        $this->validate([
			'dias_habiles' => 'required',
			'dias_trab' => 'required',
			'dias_dom' => 'required',
			'horas_extra' => 'required',
			'horas_noc' => 'required',
			'horas_dom_fer' => 'required',
			'subsidio_frontera' => 'required',
			'otro_ingreso' => 'required',
        ]);
		$planilla = Planilla::findOrFail($this->selected_id);
		$empleados = Empleado::where('empresa_id',$this->empresa->id)->get();
		foreach ($empleados as $empleado){
			$this->antiguedad = Carbon::parse($planilla->ultimo_dia)->diffInYears(Carbon::parse($empleado->fecha_ingreso));
			if($this->antiguedad < 2){
				$this->porcentaje_ant = 0;
			}
			if($this->antiguedad >=2 && $this->antiguedad<=4){
				$this->porcentaje_ant = 5;
			}
			if($this->antiguedad >=5 && $this->antiguedad<=7){
				$this->porcentaje_ant = 11;
			}
			if($this->antiguedad >=8 && $this->antiguedad<=10){
				$this->porcentaje_ant = 18;
			}
			if($this->antiguedad >=11 && $this->antiguedad<=14){
				$this->porcentaje_ant = 26;
			}
			if($this->antiguedad >=15 && $this->antiguedad<=19){
				$this->porcentaje_ant = 34;
			}
			if($this->antiguedad >=20 && $this->antiguedad<=24){
				$this->porcentaje_ant = 42;
			}
			if($this->antiguedad >=25){
				$this->porcentaje_ant = 50;
			}
			$haber_ganado = $empleado->haber_basico/$this->dias_habiles[$empleado->id]*$this->dias_trab[$empleado->id];
			$bono_antiguedad = $planilla->sueldo_min*3*($this->porcentaje_ant/100);
			$dominicales = $empleado->haber_basico/$this->dias_habiles[$empleado->id]*$this->dias_dom[$empleado->id];
			$importe_hrs_extra = $empleado->haber_basico/$this->dias_habiles[$empleado->id]/8*2*$this->horas_extra[$empleado->id];
			$importe_hrs_noc = $empleado->haber_basico/$this->dias_habiles[$empleado->id]/8*2*$this->horas_noc[$empleado->id];
			$importe_dom_fer = $empleado->haber_basico/$this->dias_habiles[$empleado->id]/8*2*$this->horas_dom_fer[$empleado->id];
			$total_ganado = $haber_ganado+$bono_antiguedad+$dominicales+$importe_hrs_extra+$importe_hrs_noc+$importe_dom_fer+$this->subsidio_frontera[$empleado->id]+$this->otro_ingreso[$empleado->id];
			$a_l_n_s = 0;
			if($total_ganado>=13000 && $total_ganado<25000){
				$a_l_n_s = ($total_ganado-13000)*0.01;
			}
			if($total_ganado>=25000){
				$a_l_n_s = (($total_ganado-13000)*0.01)+($total_ganado-25000)*0.05;
			}
			Sueldo::create([ 
				'antiguedad' => $this->antiguedad,
				'dias_habiles' => $this->dias_habiles[$empleado->id],
				'dias_trab' => $this->dias_trab[$empleado->id],
				'haber_ganado' => $haber_ganado,
				'porcentaje_ant' => $this->porcentaje_ant,
				'bono_antiguedad' => $bono_antiguedad,
				'dias_dom' => $this->dias_dom[$empleado->id],
				'dominicales' => $dominicales,
				'horas_extra' => $this->horas_extra[$empleado->id],
				'importe_hrs_extra' => $importe_hrs_extra,
				'horas_noc' => $this->horas_noc[$empleado->id],
				'importe_hrs_noc' => $importe_hrs_noc,
				'horas_dom_fer' => $this->horas_dom_fer[$empleado->id],
				'importe_dom_fer' => $importe_dom_fer,
				'subsidio_frontera' => $this->subsidio_frontera[$empleado->id],
				'otro_ingreso' => $this->otro_ingreso[$empleado->id],
				'total_ganado' => $total_ganado,

				'cuenta_prev' => $total_ganado*0.1,
				'riesgo_comun' => $total_ganado*0.0171,
				'comision_afp' => $total_ganado*0.005,
				'aporte_solidario' => $total_ganado*0.005,
				'ap_nac_solidario' => $a_l_n_s,
				'rc_iva' => 0,
				'anticipos' => 0,
				'descuentos' => 0,
				'total_desc' => ($total_ganado*0.1)+($total_ganado*0.0171)+($total_ganado*0.005*2),

				'liq_pagable' => $total_ganado-($total_ganado*0.1)-($total_ganado*0.0171)-($total_ganado*0.005*2),
				'empleado_id' => $empleado->id,
				'planilla_id' => $this->selected_id
			]);
		}
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Sueldo Creado Satisfactoriamente.');
    }
	public function editarSueldos($id)
    {
        $this->selected_id = $id;
		$sueldos = Sueldo::where('planilla_id',$id)->get();
		$empleados = Empleado::where('empresa_id',$this->empresa->id)->get();
		foreach($sueldos as $sueldo){
			foreach($empleados as $empleado){
				if($sueldo->empleado_id == $empleado->id){
					$this->dias_habiles[$empleado->id] = $sueldo->dias_habiles;
					$this->dias_trab[$empleado->id] = $sueldo->dias_trab;
					$this->dias_dom[$empleado->id] = $sueldo->dias_dom;
					$this->horas_extra[$empleado->id] = $sueldo->horas_extra;
					$this->horas_noc[$empleado->id] = $sueldo->horas_noc;
					$this->horas_dom_fer[$empleado->id] = $sueldo->horas_dom_fer;
					$this->subsidio_frontera[$empleado->id] = $sueldo->subsidio_frontera;
					$this->otro_ingreso[$empleado->id] = $sueldo->otro_ingreso;
				}
			}
		}
        $this->updateMode = true;
    }
	public function actualizarSueldos()
    {
		//dd($this->dias_habiles);
        $this->validate([
			'dias_habiles' => 'required',
			'dias_trab' => 'required',
			'dias_dom' => 'required',
			'horas_extra' => 'required',
			'horas_noc' => 'required',
			'horas_dom_fer' => 'required',
			'subsidio_frontera' => 'required',
			'otro_ingreso' => 'required',
        ]);
		$planilla = Planilla::findOrFail($this->selected_id);
		$sueldos = Sueldo::where('planilla_id',$this->selected_id)->get();
		foreach ($sueldos as $sueldo){
			$empleado = Empleado::findOrFail($sueldo->empleado_id);
			$this->antiguedad = Carbon::parse($planilla->ultimo_dia)->diffInYears(Carbon::parse($empleado->fecha_ingreso));
			if($this->antiguedad < 2){
				$this->porcentaje_ant = 0;
			}
			if($this->antiguedad >=2 && $this->antiguedad<=4){
				$this->porcentaje_ant = 5;
			}
			if($this->antiguedad >=5 && $this->antiguedad<=7){
				$this->porcentaje_ant = 11;
			}
			if($this->antiguedad >=8 && $this->antiguedad<=10){
				$this->porcentaje_ant = 18;
			}
			if($this->antiguedad >=11 && $this->antiguedad<=14){
				$this->porcentaje_ant = 26;
			}
			if($this->antiguedad >=15 && $this->antiguedad<=19){
				$this->porcentaje_ant = 34;
			}
			if($this->antiguedad >=20 && $this->antiguedad<=24){
				$this->porcentaje_ant = 42;
			}
			if($this->antiguedad >=25){
				$this->porcentaje_ant = 50;
			}
			$haber_ganado = $empleado->haber_basico/$this->dias_habiles[$empleado->id]*$this->dias_trab[$empleado->id];
			$bono_antiguedad = $planilla->sueldo_min*3*($this->porcentaje_ant/100);
			$dominicales = $empleado->haber_basico/$this->dias_habiles[$empleado->id]*$this->dias_dom[$empleado->id];
			$importe_hrs_extra = $empleado->haber_basico/$this->dias_habiles[$empleado->id]/8*2*$this->horas_extra[$empleado->id];
			$importe_hrs_noc = $empleado->haber_basico/$this->dias_habiles[$empleado->id]/8*2*$this->horas_noc[$empleado->id];
			$importe_dom_fer = $empleado->haber_basico/$this->dias_habiles[$empleado->id]/8*2*$this->horas_dom_fer[$empleado->id];
			$total_ganado = $haber_ganado+$bono_antiguedad+$dominicales+$importe_hrs_extra+$importe_hrs_noc+$importe_dom_fer+$this->subsidio_frontera[$empleado->id]+$this->otro_ingreso[$empleado->id];
			$a_l_n_s = 0;
			if($total_ganado>=13000 && $total_ganado<25000){
				$a_l_n_s = ($total_ganado-13000)*0.01;
			}
			if($total_ganado>=25000){
				$a_l_n_s = (($total_ganado-13000)*0.01)+($total_ganado-25000)*0.05;
			}
			$sueldo->update([ 
				'antiguedad' => $this->antiguedad,
				'dias_habiles' => $this->dias_habiles[$empleado->id],
				'dias_trab' => $this->dias_trab[$empleado->id],
				'haber_ganado' => $haber_ganado,
				'porcentaje_ant' => $this->porcentaje_ant,
				'bono_antiguedad' => $bono_antiguedad,
				'dias_dom' => $this->dias_dom[$empleado->id],
				'dominicales' => $dominicales,
				'horas_extra' => $this->horas_extra[$empleado->id],
				'importe_hrs_extra' => $importe_hrs_extra,
				'horas_noc' => $this->horas_noc[$empleado->id],
				'importe_hrs_noc' => $importe_hrs_noc,
				'horas_dom_fer' => $this->horas_dom_fer[$empleado->id],
				'importe_dom_fer' => $importe_dom_fer,
				'subsidio_frontera' => $this->subsidio_frontera[$empleado->id],
				'otro_ingreso' => $this->otro_ingreso[$empleado->id],
				'total_ganado' => $total_ganado,

				'cuenta_prev' => $total_ganado*0.1,
				'riesgo_comun' => $total_ganado*0.0171,
				'comision_afp' => $total_ganado*0.005,
				'aporte_solidario' => $total_ganado*0.005,
				'ap_nac_solidario' => $a_l_n_s,
				'rc_iva' => 0,
				'anticipos' => 0,
				'descuentos' => 0,
				'total_desc' => ($total_ganado*0.1)+($total_ganado*0.0171)+($total_ganado*0.005*2),

				'liq_pagable' => $total_ganado-($total_ganado*0.1)-($total_ganado*0.0171)-($total_ganado*0.005*2),
				'empleado_id' => $empleado->id,
				'planilla_id' => $this->selected_id
			]);
		}
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Sueldo Actualizado Satisfactoriamente.');
    }
	public function guardarTributos()
    {
		//dd($this->formulario_c693);
        $this->validate([
			'formulario_c693' => 'required',
			'saldo_ant_favor_dep' => 'required',
			'siete_periodo_ant' => 'required',
			'formulario_c465' => 'required'
        ]);
		$planilla = Planilla::findOrFail($this->selected_id);
		$sueldos = Sueldo::where('planilla_id',$this->selected_id)->get();
		foreach ($sueldos as $sueldo){
			$ing_neto = $sueldo->total_ganado - $sueldo->cuenta_prev - $sueldo->riesgo_comun - $sueldo->comision_afp - $sueldo->aporte_solidario - $sueldo->ap_nac_solidario;
			if($ing_neto>$planilla->sueldo_min*2){
				$base = $ing_neto - $planilla->sueldo_min*2;
			}else{
				$base = 0;
			}
			if(($base * 0.13)>(($planilla->sueldo_min*2) * 0.13)){
				$impuesto_neto = ($base * 0.13) - (($planilla->sueldo_min*2) * 0.13);
			}else{
				$impuesto_neto = 0;
			}
			$saldo_fisco = 0;
			if($impuesto_neto > $this->formulario_c693[$sueldo->empleado_id]){
				$saldo_fisco = $impuesto_neto - $this->formulario_c693[$sueldo->empleado_id];
			}
			$saldo_dependiente = 0;
			if($this->formulario_c693[$sueldo->empleado_id] > $impuesto_neto){
				$saldo_dependiente = $this->formulario_c693[$sueldo->empleado_id] - $impuesto_neto;
			}
			$ufv1 = Dato::where('fecha',$planilla->ultimo_dia)->first();
			//$dia_mes_anterior = Carbon::parse($planilla->ultimo_dia)->subMonth(1);
			//$dia_mes_anterior = date('Y-m-d', strtotime("{$planilla->ultimo_dia} - 1 month"));
			$ufv2 = Dato::find($ufv1->id - 1);
			//dd($ufv2);
			$mantenimiento_valor = (($ufv1->ufv/$ufv2->ufv)-1)*$this->saldo_ant_favor_dep[$sueldo->empleado_id];
			if(($mantenimiento_valor + $this->saldo_ant_favor_dep[$sueldo->empleado_id]) <= $saldo_fisco){
				$saldo_util = $mantenimiento_valor + $this->saldo_ant_favor_dep[$sueldo->empleado_id];
			}else{
				$saldo_util = $saldo_fisco;
			}
			$retencion = 0;
			if($saldo_fisco > $saldo_util){
				$retencion = $saldo_fisco-$saldo_util;
			}
			if($retencion >= ($this->siete_periodo_ant[$sueldo->empleado_id] + $this->formulario_c465[$sueldo->empleado_id])){
				$pago_siete_rg = $this->siete_periodo_ant[$sueldo->empleado_id] + $this->formulario_c465[$sueldo->empleado_id];
			}else{
				$pago_siete_rg = $retencion;
			}
			Tributo::create([ 
				'ingreso_neto' => $ing_neto,
				'dos_salarios_min' => $planilla->sueldo_min*2,
				'base_imponible' => $base,
				'impuesto_rciva' => $base * 0.13,
				'trece_dos_sal_min' => ($planilla->sueldo_min*2) * 0.13,
				'imp_neto_rciva' => $impuesto_neto,
				'formulario_c693' => $this->formulario_c693[$sueldo->empleado_id],
				'saldo_favor_fisco' => $saldo_fisco,
				'saldo_favor_dep' => $saldo_dependiente,
				'saldo_ant_favor_dep' => $this->saldo_ant_favor_dep[$sueldo->empleado_id],
				'mant_valor' => $mantenimiento_valor,
				'saldo_act' => $mantenimiento_valor + $this->saldo_ant_favor_dep[$sueldo->empleado_id],
				'saldo_utilizado' => $saldo_util,
				'retencion_rciva' => $retencion,
				'siete_periodo_ant' => $this->siete_periodo_ant[$sueldo->empleado_id],
				'formulario_c465' => $this->formulario_c465[$sueldo->empleado_id],
				'saldo_siete' => $this->siete_periodo_ant[$sueldo->empleado_id] + $this->formulario_c465[$sueldo->empleado_id],
				'pago_siete' => $pago_siete_rg,
				'impuesto_retenido' => $retencion - $pago_siete_rg,
				'saldo_dep' => $saldo_dependiente + $mantenimiento_valor + $this->saldo_ant_favor_dep[$sueldo->empleado_id] - $saldo_util,
				'saldo_siete_dep' => $this->siete_periodo_ant[$sueldo->empleado_id] + $this->formulario_c465[$sueldo->empleado_id] + $pago_siete_rg,
				'empleado_id' => $sueldo->empleado_id,
				'planilla_id' => $this->selected_id,
				'sueldo_id' => $sueldo->id
			]);
		}
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Planilla Tributaria Registrada.');
    }
    public function edit($id)
    {
        $record = Planilla::findOrFail($id);

        $this->selected_id = $id; 
		$this->mes = $record-> mes;
		$this->gestion = $record-> gestion;
		$this->sueldo_min = $record-> sueldo_min;
		$this->domingos = $record-> domingos;
		$this->feriados = $record-> feriados;
		$this->ultimo_dia = $record-> ultimo_dia;
		$this->estado = $record-> estado;
		$this->empresa_id = $record-> empresa_id;
		
        $this->updateMode = true;
    }
    public function update()
    {
        $this->validate([
		'mes' => 'required',
		'gestion' => 'required',
		'sueldo_min' => 'required',
		'domingos' => 'required',
		'feriados' => 'required',
		'ultimo_dia' => 'required',
		'estado' => 'required',
		'empresa_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Planilla::find($this->selected_id);
            $record->update([ 
			'mes' => $this-> mes,
			'gestion' => $this-> gestion,
			'sueldo_min' => $this-> sueldo_min,
			'domingos' => $this-> domingos,
			'feriados' => $this-> feriados,
			'ultimo_dia' => $this-> ultimo_dia,
			'estado' => $this-> estado,
			'empresa_id' => $this-> empresa_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Planilla Successfully updated.');
        }
    }
    public function destroy($id)
    {
        if ($id) {
            $record = Planilla::where('id', $id);
            $record->delete();
        }
    }
}
