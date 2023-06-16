<?php

namespace App\Http\Livewire\Tirilla;

use Livewire\Component;
use App\Models\Tirillatns;
use Barryvdh\DomPDF\Facade\Pdf;
use Mail;
use Illuminate\Support\Facades\Storage;

class Tirillalw extends Component
{
    public $cedula, $movil, $email, $anio, $alerta=false, $anioSel;
    Public $listaMes = [];
    public $mesActual;

    public function mount(){
        $this->mesActual = date("m");
    }
/*
    public function updatedanio(){ 
        if($this->anio == 1){
            $this->anioSel = date('Y');
        }elseif($this->anio == 2) {
            $anio = date('Y');
            $this->anioSel = date("Y",strtotime($anio."- 1 year"));
        }
    }*/

    public function render()
    {
        return view('livewire.tirilla.tirillalw');
    }


    public function index(){
       
        $tirilla = Tirillatns::all();

        return view('livewire.tirilla.index', compact('tirilla'));

    }


    public function consultarTirilla(){
       
        $tirilla = Tirillatns::all();

       view()->share('livewire.tirilla.download', $tirilla);

        $pdf = Pdf::loadView('livewire.tirilla.download', ['tirilla' => $tirilla]);

        return $pdf->download('tirilla.pdf');

       // return $pdf->stream('tirilla.pdf');
        
    }

    
}
