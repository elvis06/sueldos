<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empleado;
use App\Models\Empresa;

class Empleados extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $apellido_pat, $apellido_mat, $apellido_casada, $tipo_doc, $num_doc, $ext_ci, $nacionalidad, $fecha_nac, $sexo, $direccion, $telefono, $fecha_ingreso, $cargo, $tipo_actividad, $haber_basico, $banco, $nro_cuenta, $entidad_afp, $cua, $cod_rciva, $novedad, $estado, $empresa_id, $empresa;
    public $updateMode = false;

	public function mount(Empresa $empresa)
    {
        $this->empresa = $empresa;
    }
    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
		//$empresas = Empresa::all();
        /*return view('livewire.empleados.view', [
            'empleados' => Empleado::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('apellido_pat', 'LIKE', $keyWord)
						->orWhere('apellido_mat', 'LIKE', $keyWord)
						->orWhere('apellido_casada', 'LIKE', $keyWord)
						->orWhere('tipo_doc', 'LIKE', $keyWord)
						->orWhere('num_doc', 'LIKE', $keyWord)
						->orWhere('ext_ci', 'LIKE', $keyWord)
						->orWhere('nacionalidad', 'LIKE', $keyWord)
						->orWhere('fecha_nac', 'LIKE', $keyWord)
						->orWhere('sexo', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
						->orWhere('telefono', 'LIKE', $keyWord)
						->orWhere('fecha_ingreso', 'LIKE', $keyWord)
						->orWhere('cargo', 'LIKE', $keyWord)
						->orWhere('tipo_actividad', 'LIKE', $keyWord)
						->orWhere('haber_basico', 'LIKE', $keyWord)
						->orWhere('banco', 'LIKE', $keyWord)
						->orWhere('nro_cuenta', 'LIKE', $keyWord)
						->orWhere('entidad_afp', 'LIKE', $keyWord)
						->orWhere('cua', 'LIKE', $keyWord)
						->orWhere('cod_rciva', 'LIKE', $keyWord)
						->orWhere('novedad', 'LIKE', $keyWord)
						->orWhere('estado', 'LIKE', $keyWord)
						->orWhere('empresa_id', 'LIKE', $keyWord)
						->paginate(10),
			'empresas' => $empresas,
        ]);*/
		return view('livewire.empleados.view', [
			'empleados' => Empleado::where('empresa_id',$this->empresa->id)->paginate(10)
        ])->layout('livewire.empleados.index')->extends('layouts.app');
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->apellido_pat = null;
		$this->apellido_mat = null;
		$this->apellido_casada = null;
		$this->tipo_doc = null;
		$this->num_doc = null;
		$this->ext_ci = null;
		$this->nacionalidad = null;
		$this->fecha_nac = null;
		$this->sexo = null;
		$this->direccion = null;
		$this->telefono = null;
		$this->fecha_ingreso = null;
		$this->cargo = null;
		$this->tipo_actividad = null;
		$this->haber_basico = null;
		$this->banco = null;
		$this->nro_cuenta = null;
		$this->entidad_afp = null;
		$this->cua = null;
		$this->cod_rciva = null;
		$this->novedad = null;
		$this->estado = null;
		$this->empresa_id = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'tipo_doc' => 'required',
		'num_doc' => 'required',
		'ext_ci' => 'required',
		'nacionalidad' => 'required',
		'fecha_nac' => 'required',
		'sexo' => 'required',
		'fecha_ingreso' => 'required',
		'cargo' => 'required',
		'tipo_actividad' => 'required',
		'haber_basico' => 'required',
		'estado' => 'required',
        ]);

        Empleado::create([ 
			'nombre' => $this-> nombre,
			'apellido_pat' => $this-> apellido_pat,
			'apellido_mat' => $this-> apellido_mat,
			'apellido_casada' => $this-> apellido_casada,
			'tipo_doc' => $this-> tipo_doc,
			'num_doc' => $this-> num_doc,
			'ext_ci' => $this-> ext_ci,
			'nacionalidad' => $this-> nacionalidad,
			'fecha_nac' => $this-> fecha_nac,
			'sexo' => $this-> sexo,
			'direccion' => $this-> direccion,
			'telefono' => $this-> telefono,
			'fecha_ingreso' => $this-> fecha_ingreso,
			'cargo' => $this-> cargo,
			'tipo_actividad' => $this-> tipo_actividad,
			'haber_basico' => $this-> haber_basico,
			'banco' => $this-> banco,
			'nro_cuenta' => $this-> nro_cuenta,
			'entidad_afp' => $this-> entidad_afp,
			'cua' => $this-> cua,
			'cod_rciva' => $this-> cod_rciva,
			'novedad' => $this-> novedad,
			'estado' => $this-> estado,
			'empresa_id' => $this->empresa->id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Empleado creado con éxito.');
    }

    public function edit($id)
    {
        $record = Empleado::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->apellido_pat = $record-> apellido_pat;
		$this->apellido_mat = $record-> apellido_mat;
		$this->apellido_casada = $record-> apellido_casada;
		$this->tipo_doc = $record-> tipo_doc;
		$this->num_doc = $record-> num_doc;
		$this->ext_ci = $record-> ext_ci;
		$this->nacionalidad = $record-> nacionalidad;
		$this->fecha_nac = $record-> fecha_nac;
		$this->sexo = $record-> sexo;
		$this->direccion = $record-> direccion;
		$this->telefono = $record-> telefono;
		$this->fecha_ingreso = $record-> fecha_ingreso;
		$this->cargo = $record-> cargo;
		$this->tipo_actividad = $record-> tipo_actividad;
		$this->haber_basico = $record-> haber_basico;
		$this->banco = $record-> banco;
		$this->nro_cuenta = $record-> nro_cuenta;
		$this->entidad_afp = $record-> entidad_afp;
		$this->cua = $record-> cua;
		$this->cod_rciva = $record-> cod_rciva;
		$this->novedad = $record-> novedad;
		$this->estado = $record-> estado;
		$this->empresa_id = $this->empresa->id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'tipo_doc' => 'required',
		'num_doc' => 'required',
		'ext_ci' => 'required',
		'nacionalidad' => 'required',
		'fecha_nac' => 'required',
		'sexo' => 'required',
		'fecha_ingreso' => 'required',
		'cargo' => 'required',
		'tipo_actividad' => 'required',
		'haber_basico' => 'required',
		'estado' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Empleado::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'apellido_pat' => $this-> apellido_pat,
			'apellido_mat' => $this-> apellido_mat,
			'apellido_casada' => $this-> apellido_casada,
			'tipo_doc' => $this-> tipo_doc,
			'num_doc' => $this-> num_doc,
			'ext_ci' => $this-> ext_ci,
			'nacionalidad' => $this-> nacionalidad,
			'fecha_nac' => $this-> fecha_nac,
			'sexo' => $this-> sexo,
			'direccion' => $this-> direccion,
			'telefono' => $this-> telefono,
			'fecha_ingreso' => $this-> fecha_ingreso,
			'cargo' => $this-> cargo,
			'tipo_actividad' => $this-> tipo_actividad,
			'haber_basico' => $this-> haber_basico,
			'banco' => $this-> banco,
			'nro_cuenta' => $this-> nro_cuenta,
			'entidad_afp' => $this-> entidad_afp,
			'cua' => $this-> cua,
			'cod_rciva' => $this-> cod_rciva,
			'novedad' => $this-> novedad,
			'estado' => $this-> estado,
			'empresa_id' => $this-> empresa_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Empleado modificado con éxito.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Empleado::where('id', $id);
            $record->delete();
        }
    }
}
