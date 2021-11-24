<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Empresa;

class Users extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $email, $password;
    public $empresa_user = [];
    public $empresa_check = [];
    public $modificar_check = [];
    public $updateMode = false;
    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $empresa_user=[];
        $empresas = Empresa::get();
        return view('livewire.users.view', [
            'users' => User::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->paginate(10),
            'empresas' => $empresas
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->name = null;
		$this->email = null;
        $this->password = null;
        $this->emp = null;
        $this->empresa_check = [];
        $this->empresa_user = [];
        $this->modificar_check = [];
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'email' => 'required',
        'password' => 'required',
        ]);
        //dd($this->empresa_check);
        $user = User::create([ 
			'name' => $this->name,
			'email' => $this->email,
            'password' => Hash::make($this->password),

        ]);
        $user->empresas()->sync($this->empresa_check);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Usuario creado satisfactoriamente.');
    }

    public function edit($id)
    {
        $record = User::findOrFail($id);
        
        $empresas = Empresa::all();
        $e = $record->empresas()->get();
        //Llenamos el array con los id y si tienen check
        foreach ($empresas as $empresa) {
            if($e->contains($empresa)){
                $this->empresa_user[$empresa->nombre]['check'] = 'checked';
                $this->empresa_check[$empresa->id] = strval($empresa->id);
            }else{
                $this->empresa_user[$empresa->nombre]['check'] = '';
            }
            $this->empresa_user[$empresa->nombre]['id'] = $empresa->id;
        }
        //dd($this->empresa_user);
        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->email = $record-> email;
        
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'email' => 'required',
        ]);
        //dd($this->empresa_check);
        if ($this->selected_id) {
			$record = User::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'email' => $this-> email,
            ]);
            if($this->password != ''){
                $record->update(['password' => Hash::make($this->password)]);
            }
            $emp = Empresa::all();
            foreach ($emp as $e) {
                foreach($this->empresa_check as $check){
                    if($check == $e->id){
                        $this->modificar_check[$e->id] = $e->id;
                    }
                }
            }
            //dd($this->modificar_check);
            $record->empresas()->sync($this->modificar_check);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Usuario modificado satisfactoriamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = User::where('id', $id);
            $record->delete();
        }
    }
}
