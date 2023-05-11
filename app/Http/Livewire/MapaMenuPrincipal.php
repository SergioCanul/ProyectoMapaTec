<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Imgedificio;

class MapaMenuPrincipal extends Component
{

    protected $listeners = ['refreshComponent' => '$refresh','MapaMenuPrincipal' =>'viewMap'];
    use WithPagination;
    public $idimagen;
    public $changemap = false;
    public function render()
    {
        if($this->changemap==false){
            $img=Imgedificio::where('idedificio_fk','=','0')->first();
        }else{
            $img=Imgedificio::where('idedificio_fk','=',$this->idimagen)->first();
        }
        return view('livewire.menu.mapa-menu-principal',['img' => $img]);
    }
    public function viewMap($id)
   {
        $idimg=Imgedificio::where('idedificio_fk','=',$id)->first();
        $this->idimagen=$idimg->idedificio_fk;
        $this->changemap = true;
   }
   public function showtables($id){

   }
}
