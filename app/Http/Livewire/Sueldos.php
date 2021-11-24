<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sueldo;
use App\Models\Planilla;
use App\Models\Empleado;
use App\Models\Empresa;
use Carbon\Carbon;
use PDF;
use App\Exports\SueldosExport;
use Maatwebsite\Excel\Facades\Excel;

class Sueldos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $antiguedad, $dias_habiles, $dias_trab, $haber_ganado, $porcentaje_ant, $bono_antiguedad, $dias_dom, $dominicales, $horas_extra, $importe_hrs_extra, $horas_noc, $importe_hrs_noc, $horas_dom_fer, $importe_dom_fer, $subsidio_frontera, $otro_ingreso, $total_ganado, $cuenta_prev, $riesgo_comun, $comision_afp, $aporte_solidario, $ap_nac_solidario, $rc_iva, $anticipos, $descuentos, $total_desc, $liq_pagable, $estado, $empleado_id, $planilla_id, $planilla;
    public $updateMode = false;

	public function mount(Planilla $planilla)
    {
        $this->planilla = $planilla;
    }
    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        /*return view('livewire.sueldos.view', [
            'sueldos' => Sueldo::latest()
						->orWhere('antiguedad', 'LIKE', $keyWord)
						->orWhere('dias_habiles', 'LIKE', $keyWord)
						->orWhere('dias_trab', 'LIKE', $keyWord)
						->orWhere('haber_ganado', 'LIKE', $keyWord)
						->orWhere('porcentaje_ant', 'LIKE', $keyWord)
						->orWhere('bono_antiguedad', 'LIKE', $keyWord)
						->orWhere('dias_dom', 'LIKE', $keyWord)
						->orWhere('dominicales', 'LIKE', $keyWord)
						->orWhere('horas_extra', 'LIKE', $keyWord)
						->orWhere('importe_hrs_extra', 'LIKE', $keyWord)
						->orWhere('horas_noc', 'LIKE', $keyWord)
						->orWhere('importe_hrs_noc', 'LIKE', $keyWord)
						->orWhere('horas_dom_fer', 'LIKE', $keyWord)
						->orWhere('importe_dom_fer', 'LIKE', $keyWord)
						->orWhere('subsidio_frontera', 'LIKE', $keyWord)
						->orWhere('otro_ingreso', 'LIKE', $keyWord)
						->orWhere('total_ganado', 'LIKE', $keyWord)
						->orWhere('cuenta_prev', 'LIKE', $keyWord)
						->orWhere('riesgo_comun', 'LIKE', $keyWord)
						->orWhere('comision_afp', 'LIKE', $keyWord)
						->orWhere('aporte_solidario', 'LIKE', $keyWord)
						->orWhere('ap_nac_solidario', 'LIKE', $keyWord)
						->orWhere('rc_iva', 'LIKE', $keyWord)
						->orWhere('anticipos', 'LIKE', $keyWord)
						->orWhere('descuentos', 'LIKE', $keyWord)
						->orWhere('total_desc', 'LIKE', $keyWord)
						->orWhere('liq_pagable', 'LIKE', $keyWord)
						->orWhere('estado', 'LIKE', $keyWord)
						->orWhere('empleado_id', 'LIKE', $keyWord)
						->orWhere('planilla_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);*/
		return view('livewire.sueldos.view', [
            'sueldos' => Sueldo::where('planilla_id',$this->planilla->id)->paginate(10),
			'empresa' => $this->planilla->empresa,
			'meses' => ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE']
        ])->layout('livewire.sueldos.index')->extends('layouts.app');
    }
	public function pdf($idplanilla)
    {
		$sueldos = Sueldo::where('planilla_id',$idplanilla)->get();
		$planilla = Planilla::findOrFail($idplanilla);
		$empresa = Empresa::findOrFail($planilla->empresa_id);
		$meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
		$pdf = PDF::loadView('livewire.sueldos.pdf', compact('sueldos','planilla','empresa','meses'));
		return $pdf->setPaper('legal', 'landscape')->stream('sueldos1.pdf');
    }
	public function boleta($id)
    {
		$sueldo = Sueldo::findOrFail($id);
		$planilla = Planilla::findOrFail($sueldo->planilla_id);
		$empresa = Empresa::findOrFail($planilla->empresa_id);
		$meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
		$pdf = PDF::loadView('livewire.sueldos.boleta', compact('sueldo','planilla','empresa','meses'));
		return $pdf->setPaper('letter')->stream('boleta.pdf');
    }
	public function excel($idplanilla)
    {
		$planilla = Planilla::findOrFail($idplanilla);
		$nombre_archivo = 'Planilla de Sueldos_'.$planilla->mes.'_'.$planilla->gestion.'.xlsx';
		return Excel::download(new SueldosExport($idplanilla), $nombre_archivo);
    }
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
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
		$this->estado = null;
		$this->empleado_id = null;
		$this->planilla_id = null;
    }

    public function store()
    {
        $this->validate([
			'dias_habiles' => 'required',
			'dias_trab' => 'required',
			'porcentaje_ant' => 'required',
			'dias_dom' => 'required',
			'horas_extra' => 'required',
			'horas_noc' => 'required',
			'horas_dom_fer' => 'required',
			'subsidio_frontera' => 'required',
			'otro_ingreso' => 'required',
			'empleado_id' => 'required',
			'planilla_id' => 'required',
        ]);
		$planilla = Planilla::findOrFail($this->planilla_id);
		$empleado = Empleado::findOrFail($this->empleado_id);
		$haber_ganado = $empleado->haber_basico/$this->dias_habiles*$this->dias_trab;
			$bono_antiguedad = $planilla->sueldo_min*3*($this->porcentaje_ant/100);
			$dominicales = $empleado->haber_basico/$this->dias_habiles*$this->dias_dom;
			$importe_hrs_extra = $empleado->haber_basico/$this->dias_habiles/8*2*$this->horas_extra;
			$importe_hrs_noc = $empleado->haber_basico/$this->dias_habiles/8*2*$this->horas_noc;
			$importe_dom_fer = $empleado->haber_basico/$this->dias_habiles/8*2*$this->horas_dom_fer;
			$total_ganado = $haber_ganado+$bono_antiguedad+$dominicales+$importe_hrs_extra+$importe_hrs_noc+$importe_dom_fer+$this->subsidio_frontera+$this->otro_ingreso;
			$a_l_n_s = 0;
			if($total_ganado>=13000 && $total_ganado<25000){
				$a_l_n_s = ($total_ganado-13000)*0.01;
			}
			if($total_ganado>=25000){
				$a_l_n_s = (($total_ganado-13000)*0.01)+($total_ganado-25000)*0.05;
			}

        Sueldo::create([ 
			'antiguedad' => Carbon::parse($planilla->ultimo_dia)->diffInYears(Carbon::parse($empleado->fecha_ingreso)),
			'dias_habiles' => $this->dias_habiles,
			'dias_trab' => $this->dias_trab,
			'haber_ganado' => $haber_ganado,
			'porcentaje_ant' => $this->porcentaje_ant,
			'bono_antiguedad' => $bono_antiguedad,
			'dias_dom' => $this->dias_dom,
			'dominicales' => $dominicales,
			'horas_extra' => $this->horas_extra,
			'importe_hrs_extra' => $importe_hrs_extra,
			'horas_noc' => $this->horas_noc,
			'importe_hrs_noc' => $importe_hrs_noc,
			'horas_dom_fer' => $this->horas_dom_fer,
			'importe_dom_fer' => $importe_dom_fer,
			'subsidio_frontera' => $this->subsidio_frontera,
			'otro_ingreso' => $this->otro_ingreso,
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
			'empleado_id' => $this->empleado_id,
			'planilla_id' => $this->planilla_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Sueldo Creado Satisfactoriamente.');
    }

    public function edit($id)
    {
        $record = Sueldo::findOrFail($id);

        $this->selected_id = $id;
		$this->dias_habiles = $record-> dias_habiles;
		$this->dias_trab = $record-> dias_trab;
		$this->haber_ganado = $record-> haber_ganado;
		$this->porcentaje_ant = $record-> porcentaje_ant;
		$this->bono_antiguedad = $record-> bono_antiguedad;
		$this->dias_dom = $record-> dias_dom;
		$this->dominicales = $record-> dominicales;
		$this->horas_extra = $record-> horas_extra;
		$this->importe_hrs_extra = $record-> importe_hrs_extra;
		$this->horas_noc = $record-> horas_noc;
		$this->importe_hrs_noc = $record-> importe_hrs_noc;
		$this->horas_dom_fer = $record-> horas_dom_fer;
		$this->importe_dom_fer = $record-> importe_dom_fer;
		$this->subsidio_frontera = $record-> subsidio_frontera;
		$this->otro_ingreso = $record-> otro_ingreso;
		$this->total_ganado = $record-> total_ganado;
		$this->liq_pagable = $record-> liq_pagable;
		$this->estado = $record-> estado;
		$this->empleado_id = $record-> empleado_id;
		$this->planilla_id = $record-> planilla_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'dias_habiles' => 'required',
		'dias_trab' => 'required',
		'porcentaje_ant' => 'required',
		'dias_dom' => 'required',
		'horas_extra' => 'required',
		'horas_noc' => 'required',
		'horas_dom_fer' => 'required',
		'subsidio_frontera' => 'required',
		'otro_ingreso' => 'required',
		'estado' => 'required',
		'empleado_id' => 'required',
		'planilla_id' => 'required',
        ]);
		$planilla = Planilla::findOrFail($this->planilla_id);
		$empleado = Empleado::findOrFail($this->empleado_id);
        if ($this->selected_id) {
			$record = Sueldo::find($this->selected_id);
			$haber_ganado = $empleado->haber_basico/$this->dias_habiles*$this->dias_trab;
			$bono_antiguedad = $planilla->sueldo_min*3*($this->porcentaje_ant/100);
			$dominicales = $empleado->haber_basico/$this->dias_habiles*$this->dias_dom;
			$importe_hrs_extra = $empleado->haber_basico/$this->dias_habiles/8*2*$this->horas_extra;
			$importe_hrs_noc = $empleado->haber_basico/$this->dias_habiles/8*2*$this->horas_noc;
			$importe_dom_fer = $empleado->haber_basico/$this->dias_habiles/8*2*$this->horas_dom_fer;
			$total_ganado = $haber_ganado+$bono_antiguedad+$dominicales+$importe_hrs_extra+$importe_hrs_noc+$importe_dom_fer+$this->subsidio_frontera+$this->otro_ingreso;
            $record->update([ 
			'antiguedad' => Carbon::parse($planilla->ultimo_dia)->diffInYears(Carbon::parse($empleado->fecha_ingreso)),
			'dias_habiles' => $this->dias_habiles,
			'dias_trab' => $this->dias_trab,
			'haber_ganado' => $haber_ganado,
			'porcentaje_ant' => $this->porcentaje_ant,
			'bono_antiguedad' => $bono_antiguedad,
			'dias_dom' => $this->dias_dom,
			'dominicales' => $dominicales,
			'horas_extra' => $this->horas_extra,
			'importe_hrs_extra' => $importe_hrs_extra,
			'horas_noc' => $this->horas_noc,
			'importe_hrs_noc' => $importe_hrs_noc,
			'horas_dom_fer' => $this->horas_dom_fer,
			'importe_dom_fer' => $importe_dom_fer,
			'subsidio_frontera' => $this->subsidio_frontera,
			'otro_ingreso' => $this->otro_ingreso,
			'total_ganado' => $total_ganado,
			'liq_pagable' => $total_ganado-($total_ganado*0.1)-($total_ganado*0.0171)-($total_ganado*0.005*2),
			'estado' => $this->estado,
			'empleado_id' => $this->empleado_id,
			'planilla_id' => $this->planilla_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Sueldo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Sueldo::where('id', $id);
            $record->delete();
        }
    }
}
