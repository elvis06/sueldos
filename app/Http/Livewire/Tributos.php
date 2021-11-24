<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tributo;
use App\Models\Sueldo;
use App\Models\Planilla;
use App\Models\Empleado;
use App\Models\Empresa;
use PDF;
use App\Exports\TributosExport;
use Maatwebsite\Excel\Facades\Excel;

class Tributos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $ingreso_neto, $dos_salarios_min, $base_imponible, $impuesto_rciva, $trece_dos_sal_min, $imp_neto_rciva, $formulario_c693, $saldo_favor_fisco, $saldo_favor_dep, $saldo_ant_favor_dep, $mant_valor, $saldo_act, $saldo_utilizado, $retencion_rciva, $siete_periodo_ant, $formulario_c465, $saldo_siete, $pago_siete, $impuesto_retenido, $saldo_dep, $saldo_siete_dep, $empleado_id, $planilla_id, $sueldo_id, $planilla;
    public $updateMode = false;

	public function mount(Planilla $planilla)
    {
        $this->planilla = $planilla;
    }
    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        /*return view('livewire.tributos.view', [
            'tributos' => Tributo::latest()
						->orWhere('ingreso_neto', 'LIKE', $keyWord)
						->orWhere('dos_salarios_min', 'LIKE', $keyWord)
						->orWhere('base_imponible', 'LIKE', $keyWord)
						->orWhere('impuesto_rciva', 'LIKE', $keyWord)
						->orWhere('trece_dos_sal_min', 'LIKE', $keyWord)
						->orWhere('imp_neto_rciva', 'LIKE', $keyWord)
						->orWhere('formulario_c693', 'LIKE', $keyWord)
						->orWhere('saldo_favor_fisco', 'LIKE', $keyWord)
						->orWhere('saldo_favor_dep', 'LIKE', $keyWord)
						->orWhere('saldo_ant_favor_dep', 'LIKE', $keyWord)
						->orWhere('mant_valor', 'LIKE', $keyWord)
						->orWhere('saldo_act', 'LIKE', $keyWord)
						->orWhere('saldo_utilizado', 'LIKE', $keyWord)
						->orWhere('retencion_rciva', 'LIKE', $keyWord)
						->orWhere('siete_periodo_ant', 'LIKE', $keyWord)
						->orWhere('formulario_c465', 'LIKE', $keyWord)
						->orWhere('saldo_siete', 'LIKE', $keyWord)
						->orWhere('pago_siete', 'LIKE', $keyWord)
						->orWhere('impuesto_retenido', 'LIKE', $keyWord)
						->orWhere('saldo_dep', 'LIKE', $keyWord)
						->orWhere('saldo_siete_dep', 'LIKE', $keyWord)
						->orWhere('empleado_id', 'LIKE', $keyWord)
						->orWhere('planilla_id', 'LIKE', $keyWord)
						->orWhere('sueldo_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);*/
		return view('livewire.tributos.view', [
            'tributos' => Tributo::where('planilla_id',$this->planilla->id)->paginate(10),
			'empresa' => $this->planilla->empresa
        ])->layout('livewire.tributos.index')->extends('layouts.app');
    }
	public function pdf($idplanilla)
    {
		$tributos = Tributo::where('planilla_id',$idplanilla)->get();
		$planilla = Planilla::findOrFail($idplanilla);
		$empresa = Empresa::findOrFail($planilla->empresa_id);
		$meses = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
		$pdf = PDF::loadView('livewire.tributos.pdf', compact('tributos','planilla','empresa','meses'));
		return $pdf->setPaper('legal', 'landscape')->stream('tributos1.pdf');
    }
	public function excel($idplanilla)
    {
		$planilla = Planilla::findOrFail($idplanilla);
		$nombre_archivo = 'Planilla Tributaria_'.$planilla->mes.'_'.$planilla->gestion.'.xlsx';
		return Excel::download(new TributosExport($idplanilla), $nombre_archivo);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
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
		$this->empleado_id = null;
		$this->planilla_id = null;
		$this->sueldo_id = null;
    }

    public function store()
    {
        $this->validate([
		'base_imponible' => 'required',
		'impuesto_rciva' => 'required',
		'trece_dos_sal_min' => 'required',
		'imp_neto_rciva' => 'required',
		'formulario_c693' => 'required',
		'saldo_favor_fisco' => 'required',
		'saldo_favor_dep' => 'required',
		'saldo_ant_favor_dep' => 'required',
		'mant_valor' => 'required',
		'saldo_act' => 'required',
		'saldo_utilizado' => 'required',
		'retencion_rciva' => 'required',
		'siete_periodo_ant' => 'required',
		'formulario_c465' => 'required',
		'saldo_siete' => 'required',
		'pago_siete' => 'required',
		'impuesto_retenido' => 'required',
		'saldo_dep' => 'required',
		'saldo_siete_dep' => 'required',
		'empleado_id' => 'required',
		'planilla_id' => 'required',
		'sueldo_id' => 'required',
        ]);
		$sueldo = Sueldo::findOrFail($this->sueldo_id);
		$planilla = Planilla::findOrFail($this->planilla_id);
		$empleado = Empleado::findOrFail($this->empleado_id);
        Tributo::create([ 
			'ingreso_neto' => $sueldo->total_ganado,
			'dos_salarios_min' => $planilla->sueldo_min*2,
			'base_imponible' => $this-> base_imponible,
			'impuesto_rciva' => $this-> impuesto_rciva,
			'trece_dos_sal_min' => $this-> trece_dos_sal_min,
			'imp_neto_rciva' => $this-> imp_neto_rciva,
			'formulario_c693' => $this-> formulario_c693,
			'saldo_favor_fisco' => $this-> saldo_favor_fisco,
			'saldo_favor_dep' => $this-> saldo_favor_dep,
			'saldo_ant_favor_dep' => $this-> saldo_ant_favor_dep,
			'mant_valor' => $this-> mant_valor,
			'saldo_act' => $this-> saldo_act,
			'saldo_utilizado' => $this-> saldo_utilizado,
			'retencion_rciva' => $this-> retencion_rciva,
			'siete_periodo_ant' => $this-> siete_periodo_ant,
			'formulario_c465' => $this-> formulario_c465,
			'saldo_siete' => $this-> saldo_siete,
			'pago_siete' => $this-> pago_siete,
			'impuesto_retenido' => $this-> impuesto_retenido,
			'saldo_dep' => $this-> saldo_dep,
			'saldo_siete_dep' => $this-> saldo_siete_dep,
			'empleado_id' => $this-> empleado_id,
			'planilla_id' => $this-> planilla_id,
			'sueldo_id' => $this-> sueldo_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Tributo Successfully created.');
    }

    public function edit($id)
    {
        $record = Tributo::findOrFail($id);

        $this->selected_id = $id; 
		$this->ingreso_neto = $record-> ingreso_neto;
		$this->dos_salarios_min = $record-> dos_salarios_min;
		$this->base_imponible = $record-> base_imponible;
		$this->impuesto_rciva = $record-> impuesto_rciva;
		$this->trece_dos_sal_min = $record-> trece_dos_sal_min;
		$this->imp_neto_rciva = $record-> imp_neto_rciva;
		$this->formulario_c693 = $record-> formulario_c693;
		$this->saldo_favor_fisco = $record-> saldo_favor_fisco;
		$this->saldo_favor_dep = $record-> saldo_favor_dep;
		$this->saldo_ant_favor_dep = $record-> saldo_ant_favor_dep;
		$this->mant_valor = $record-> mant_valor;
		$this->saldo_act = $record-> saldo_act;
		$this->saldo_utilizado = $record-> saldo_utilizado;
		$this->retencion_rciva = $record-> retencion_rciva;
		$this->siete_periodo_ant = $record-> siete_periodo_ant;
		$this->formulario_c465 = $record-> formulario_c465;
		$this->saldo_siete = $record-> saldo_siete;
		$this->pago_siete = $record-> pago_siete;
		$this->impuesto_retenido = $record-> impuesto_retenido;
		$this->saldo_dep = $record-> saldo_dep;
		$this->saldo_siete_dep = $record-> saldo_siete_dep;
		$this->empleado_id = $record-> empleado_id;
		$this->planilla_id = $record-> planilla_id;
		$this->sueldo_id = $record-> sueldo_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'ingreso_neto' => 'required',
		'dos_salarios_min' => 'required',
		'base_imponible' => 'required',
		'impuesto_rciva' => 'required',
		'trece_dos_sal_min' => 'required',
		'imp_neto_rciva' => 'required',
		'formulario_c693' => 'required',
		'saldo_favor_fisco' => 'required',
		'saldo_favor_dep' => 'required',
		'saldo_ant_favor_dep' => 'required',
		'mant_valor' => 'required',
		'saldo_act' => 'required',
		'saldo_utilizado' => 'required',
		'retencion_rciva' => 'required',
		'siete_periodo_ant' => 'required',
		'formulario_c465' => 'required',
		'saldo_siete' => 'required',
		'pago_siete' => 'required',
		'impuesto_retenido' => 'required',
		'saldo_dep' => 'required',
		'saldo_siete_dep' => 'required',
		'empleado_id' => 'required',
		'planilla_id' => 'required',
		'sueldo_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Tributo::find($this->selected_id);
            $record->update([ 
			'ingreso_neto' => $this-> ingreso_neto,
			'dos_salarios_min' => $this-> dos_salarios_min,
			'base_imponible' => $this-> base_imponible,
			'impuesto_rciva' => $this-> impuesto_rciva,
			'trece_dos_sal_min' => $this-> trece_dos_sal_min,
			'imp_neto_rciva' => $this-> imp_neto_rciva,
			'formulario_c693' => $this-> formulario_c693,
			'saldo_favor_fisco' => $this-> saldo_favor_fisco,
			'saldo_favor_dep' => $this-> saldo_favor_dep,
			'saldo_ant_favor_dep' => $this-> saldo_ant_favor_dep,
			'mant_valor' => $this-> mant_valor,
			'saldo_act' => $this-> saldo_act,
			'saldo_utilizado' => $this-> saldo_utilizado,
			'retencion_rciva' => $this-> retencion_rciva,
			'siete_periodo_ant' => $this-> siete_periodo_ant,
			'formulario_c465' => $this-> formulario_c465,
			'saldo_siete' => $this-> saldo_siete,
			'pago_siete' => $this-> pago_siete,
			'impuesto_retenido' => $this-> impuesto_retenido,
			'saldo_dep' => $this-> saldo_dep,
			'saldo_siete_dep' => $this-> saldo_siete_dep,
			'empleado_id' => $this-> empleado_id,
			'planilla_id' => $this-> planilla_id,
			'sueldo_id' => $this-> sueldo_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Tributo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Tributo::where('id', $id);
            $record->delete();
        }
    }
}
