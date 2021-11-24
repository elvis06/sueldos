<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Plantilla;

class Empresas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $propietario, $nit, $direccion, $telefono, $ciudad, $representante, $ci_representante, $tel_representante, $nro_min_trabajo, $nro_caja_salud, $lucro, $rubro, $tipo, $estado;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $usuario = User::findOrFail(Auth::user()->id);
        return view('livewire.empresas.view', [
            'empresas' => $usuario->empresas,
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->propietario = null;
		$this->nit = null;
		$this->direccion = null;
		$this->telefono = null;
		$this->ciudad = null;
		$this->representante = null;
		$this->ci_representante = null;
		$this->tel_representante = null;
		$this->nro_min_trabajo = null;
		$this->nro_caja_salud = null;
		$this->lucro = null;
		$this->rubro = null;
		$this->tipo = null;
		$this->estado = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'nit' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'ciudad' => 'required',
		'representante' => 'required',
		'lucro' => 'required',
		'rubro' => 'required',
		'tipo' => 'required',
		'estado' => 'required',
        ]);

        Empresa::create([ 
			'nombre' => $this-> nombre,
			'propietario' => $this-> propietario,
			'nit' => $this-> nit,
			'direccion' => $this-> direccion,
			'telefono' => $this-> telefono,
			'ciudad' => $this-> ciudad,
			'representante' => $this-> representante,
			'ci_representante' => $this-> ci_representante,
			'tel_representante' => $this-> tel_representante,
			'nro_min_trabajo' => $this-> nro_min_trabajo,
			'nro_caja_salud' => $this-> nro_caja_salud,
			'lucro' => $this-> lucro,
			'rubro' => $this-> rubro,
			'tipo' => $this-> tipo,
			'estado' => $this-> estado
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Empresa Creada con éxito.');
    }

    public function edit($id)
    {
        $record = Empresa::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->propietario = $record-> propietario;
		$this->nit = $record-> nit;
		$this->direccion = $record-> direccion;
		$this->telefono = $record-> telefono;
		$this->ciudad = $record-> ciudad;
		$this->representante = $record-> representante;
		$this->ci_representante = $record-> ci_representante;
		$this->tel_representante = $record-> tel_representante;
		$this->nro_min_trabajo = $record-> nro_min_trabajo;
		$this->nro_caja_salud = $record-> nro_caja_salud;
		$this->lucro = $record-> lucro;
		$this->rubro = $record-> rubro;
		$this->tipo = $record-> tipo;
		$this->estado = $record-> estado;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'nit' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'ciudad' => 'required',
		'representante' => 'required',
		'lucro' => 'required',
		'rubro' => 'required',
		'tipo' => 'required',
		'estado' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Empresa::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'propietario' => $this-> propietario,
			'nit' => $this-> nit,
			'direccion' => $this-> direccion,
			'telefono' => $this-> telefono,
			'ciudad' => $this-> ciudad,
			'representante' => $this-> representante,
			'ci_representante' => $this-> ci_representante,
			'tel_representante' => $this-> tel_representante,
			'nro_min_trabajo' => $this-> nro_min_trabajo,
			'nro_caja_salud' => $this-> nro_caja_salud,
			'lucro' => $this-> lucro,
			'rubro' => $this-> rubro,
			'tipo' => $this-> tipo,
			'estado' => $this-> estado
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Empresa actualizada con éxito.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Empresa::where('id', $id);
            $record->delete();
        }
    }
}
