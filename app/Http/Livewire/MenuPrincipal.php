<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Departamento;

class MenuPrincipal extends Component
{
    use WithPagination;
    protected $listeners = ['MenuPrincipal' =>'viewTables'];
    public $selected_id, $keyWord, $nombreDepartamento, $nombreEdificio, $encargado, $puestoTrabajo, $correo;
    public $updateMode = false;

    public function render()
    {

		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.menu.menu-principal',[
        'departamentos' => Departamento::select('departamentos.id','departamentos.nombreDepartamento','departamentos.idedificio_fk','edificios.nombreEdificio','departamentos.encargado','departamentos.puestoTrabajo','departamentos.correo')
        ->join('edificios','idedificio_fk','=','edificios.id')
        ->orWhere('nombreDepartamento', 'LIKE', $keyWord)
        ->orWhere('nombreEdificio', 'LIKE', $keyWord)
        ->orWhere('encargado', 'LIKE', $keyWord)
        ->orWhere('puestoTrabajo', 'LIKE', $keyWord)
        ->orWhere('correo', 'LIKE', $keyWord)
        ->paginate(7)]);
    }
    public function showMap($id){
        $imgedificio = $id;
        $this->emit('MapaMenuPrincipal', $imgedificio);
    }
    public function viewTables($id)
    {
         $idedificio=Departamento::select('departamentos.id','departamentos.nombreDepartamento','departamentos.idedificio_fk','edificios.nombreEdificio','departamentos.encargado','departamentos.puestoTrabajo','departamentos.correo')
         ->join('edificios','idedificio_fk','=','edificios.id')
         ->where('idedificio_fk', '=', $id)->first();
         $this->keyWord=$idedificio->nombreEdificio;

    }



}
