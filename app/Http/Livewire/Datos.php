<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dato;

class Datos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha, $ufv;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.datos.view', [
            'datos' => Dato::latest()
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('ufv', 'LIKE', $keyWord)
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
		$this->fecha = null;
		$this->ufv = null;
    }

    public function store()
    {
        $this->validate([
		'fecha' => 'required',
		'ufv' => 'required',
        ]);

        Dato::create([ 
			'fecha' => $this-> fecha,
			'ufv' => $this-> ufv
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Dato creado satisfactoriamente.');
    }

    public function edit($id)
    {
        $record = Dato::findOrFail($id);

        $this->selected_id = $id; 
		$this->fecha = $record-> fecha;
		$this->ufv = $record-> ufv;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'fecha' => 'required',
		'ufv' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Dato::find($this->selected_id);
            $record->update([ 
			'fecha' => $this-> fecha,
			'ufv' => $this-> ufv
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Dato modificado satisfactoriamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Dato::where('id', $id);
            $record->delete();
        }
    }
}
