<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Departamento;
use App\Models\Edificio;
use Livewire\WithPagination;
class MenuAdmin extends Component
{
    use WithPagination;

    public $selected_id, $keyWord, $nombreDepartamento,$idedificio_fk, $nombreEdificio, $encargado, $puestoTrabajo, $correo;
    public $updateMode = false;
    public $createMode = false;
    public function render()
    {

		$keyWord = '%'.$this->keyWord .'%';
        $edificios=Edificio::all();
        return view('livewire.menuadmin.menu-admin',[
        'departamentos' => Departamento::select('departamentos.id','departamentos.nombreDepartamento','departamentos.idedificio_fk','edificios.nombreEdificio','departamentos.encargado','departamentos.puestoTrabajo','departamentos.correo')
        ->join('edificios','idedificio_fk','=','edificios.id')
        ->orWhere('nombreDepartamento', 'LIKE', $keyWord)
        ->orWhere('nombreEdificio', 'LIKE', $keyWord)
        ->orWhere('encargado', 'LIKE', $keyWord)
        ->orWhere('puestoTrabajo', 'LIKE', $keyWord)
        ->orWhere('correo', 'LIKE', $keyWord)
        ->paginate(10),'edificios'=>$edificios]);
        dd($edificios);
    }
    public function create(){
        if($this->createMode == true){
            $this->resetInput();
            $this->updateMode = false;
            $this->createMode = false;
        }else{
            $this->resetInput();
            $this->updateMode = false;
            $this->createMode = true;
        }
    }
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
    private function resetInput()
    {
		$this->nombreDepartamento = null;
		$this->nombreEdificio = null;
		$this->encargado = null;
		$this->puestoTrabajo = null;
		$this->correo = null;

    }
    public function store()
    {
        Departamento::create([
			'nombreDepartamento' => $this-> nombreDepartamento,
			'idedificio_fk' => $this-> nombreEdificio,
			'encargado' => $this-> encargado,
			'puestoTrabajo' => $this-> puestoTrabajo,
			'correo' => $this-> correo,

        ]);
        $this->resetInput();
		$this->createMode = false;
		session()->flash('message', 'Departamento exitosamente creado.');
    }
    public function edit($id)
    {
        $record = Departamento::select('departamentos.id','departamentos.nombreDepartamento','departamentos.idedificio_fk','edificios.nombreEdificio','departamentos.encargado','departamentos.puestoTrabajo','departamentos.correo')
        ->join('edificios','idedificio_fk','=','edificios.id')
        ->where('departamentos.id','=',$id)->first();
        $this->selected_id = $id;
		$this->nombreDepartamento = $record-> nombreDepartamento;
        $this->idedificio_fk = $record-> idedificio_fk;
		$this->nombreEdificio = $record-> nombreEdificio;
		$this->encargado = $record-> encargado;
		$this->puestoTrabajo = $record-> puestoTrabajo;
		$this->correo = $record-> correo;
        $this->updateMode = true;
    }

    public function update()
    {
        if ($this->selected_id) {
			$record = Departamento::find($this->selected_id);
            $record->update([
			'nombreDepartamento' => $this-> nombreDepartamento,
			'idedificio_fk' => $this-> nombreEdificio,
			'encargado' => $this-> encargado,
			'puestoTrabajo' => $this-> puestoTrabajo,
			'correo' => $this-> correo,
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Departamento actualizado  exitosamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Departamento::where('id', $id);
            $record->delete();
            session()->flash('message', 'Departamento Eliminado exitosamente.');
        }
    }

}
