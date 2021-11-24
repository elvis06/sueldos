<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Descuento;

class Descuentos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $cuenta_prev, $riesgo_comun, $comision_afp, $aporte_solidario, $ap_nac_solidario, $rc_iva, $anticipos, $desc, $total_desc, $empleado_id, $tributo_id, $sueldo_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.descuentos.view', [
            'descuentos' => Descuento::latest()
						->orWhere('cuenta_prev', 'LIKE', $keyWord)
						->orWhere('riesgo_comun', 'LIKE', $keyWord)
						->orWhere('comision_afp', 'LIKE', $keyWord)
						->orWhere('aporte_solidario', 'LIKE', $keyWord)
						->orWhere('ap_nac_solidario', 'LIKE', $keyWord)
						->orWhere('rc_iva', 'LIKE', $keyWord)
						->orWhere('anticipos', 'LIKE', $keyWord)
						->orWhere('desc', 'LIKE', $keyWord)
						->orWhere('total_desc', 'LIKE', $keyWord)
						->orWhere('empleado_id', 'LIKE', $keyWord)
						->orWhere('tributo_id', 'LIKE', $keyWord)
						->orWhere('sueldo_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->cuenta_prev = null;
		$this->riesgo_comun = null;
		$this->comision_afp = null;
		$this->aporte_solidario = null;
		$this->ap_nac_solidario = null;
		$this->rc_iva = null;
		$this->anticipos = null;
		$this->desc = null;
		$this->total_desc = null;
		$this->empleado_id = null;
		$this->tributo_id = null;
		$this->sueldo_id = null;
    }

    public function store()
    {
        $this->validate([
		'cuenta_prev' => 'required',
		'riesgo_comun' => 'required',
		'comision_afp' => 'required',
		'aporte_solidario' => 'required',
		'ap_nac_solidario' => 'required',
		'rc_iva' => 'required',
		'anticipos' => 'required',
		'desc' => 'required',
		'total_desc' => 'required',
		'empleado_id' => 'required',
		'tributo_id' => 'required',
		'sueldo_id' => 'required',
        ]);

        Descuento::create([ 
			'cuenta_prev' => $this-> cuenta_prev,
			'riesgo_comun' => $this-> riesgo_comun,
			'comision_afp' => $this-> comision_afp,
			'aporte_solidario' => $this-> aporte_solidario,
			'ap_nac_solidario' => $this-> ap_nac_solidario,
			'rc_iva' => $this-> rc_iva,
			'anticipos' => $this-> anticipos,
			'desc' => $this-> desc,
			'total_desc' => $this-> total_desc,
			'empleado_id' => $this-> empleado_id,
			'tributo_id' => $this-> tributo_id,
			'sueldo_id' => $this-> sueldo_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Descuento Successfully created.');
    }

    public function edit($id)
    {
        $record = Descuento::findOrFail($id);

        $this->selected_id = $id; 
		$this->cuenta_prev = $record-> cuenta_prev;
		$this->riesgo_comun = $record-> riesgo_comun;
		$this->comision_afp = $record-> comision_afp;
		$this->aporte_solidario = $record-> aporte_solidario;
		$this->ap_nac_solidario = $record-> ap_nac_solidario;
		$this->rc_iva = $record-> rc_iva;
		$this->anticipos = $record-> anticipos;
		$this->desc = $record-> desc;
		$this->total_desc = $record-> total_desc;
		$this->empleado_id = $record-> empleado_id;
		$this->tributo_id = $record-> tributo_id;
		$this->sueldo_id = $record-> sueldo_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'cuenta_prev' => 'required',
		'riesgo_comun' => 'required',
		'comision_afp' => 'required',
		'aporte_solidario' => 'required',
		'ap_nac_solidario' => 'required',
		'rc_iva' => 'required',
		'anticipos' => 'required',
		'desc' => 'required',
		'total_desc' => 'required',
		'empleado_id' => 'required',
		'tributo_id' => 'required',
		'sueldo_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Descuento::find($this->selected_id);
            $record->update([ 
			'cuenta_prev' => $this-> cuenta_prev,
			'riesgo_comun' => $this-> riesgo_comun,
			'comision_afp' => $this-> comision_afp,
			'aporte_solidario' => $this-> aporte_solidario,
			'ap_nac_solidario' => $this-> ap_nac_solidario,
			'rc_iva' => $this-> rc_iva,
			'anticipos' => $this-> anticipos,
			'desc' => $this-> desc,
			'total_desc' => $this-> total_desc,
			'empleado_id' => $this-> empleado_id,
			'tributo_id' => $this-> tributo_id,
			'sueldo_id' => $this-> sueldo_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Descuento Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Descuento::where('id', $id);
            $record->delete();
        }
    }
}
