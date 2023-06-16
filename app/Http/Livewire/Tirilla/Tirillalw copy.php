<?php

namespace App\Http\Livewire\Tirilla;

use Livewire\Component;
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

    public function updatedanio(){ 
        if($this->anio == 1){
            $this->anioSel = date('Y');
        }elseif($this->anio == 2) {
            $anio = date('Y');
            $this->anioSel = date("Y",strtotime($anio."- 1 year"));
        }
    }

    public function render()
    {
        return view('livewire.tirilla.tirillalw');
    }

    public function consultarTirilla(){
        $rutas=[];
        foreach($this->listaMes as $m){
            
            $nombreArchivo = $this->cedula."-".$m." ".$this->anioSel.".pdf";
            
            $ruta = "tirillas/".$this->anioSel."/".$m."/".$nombreArchivo;
            
            if (Storage::disk('local')->exists($ruta)) {
                $rutas[$m] = storage_path('app/').$ruta;
            }
        }
        if ($rutas) {
            $details = [
                'mes' => implode("-",$this->listaMes).":".$this->anioSel,
                'cedula' => $this->cedula,
                'title' => 'Consulta Tirilla de pago',
                'body' => 'Este es un correo automatico. Ver anexo',
                'file' => $rutas // file attached here
            ];
            //enviando el email al correo del input
            Mail::to($this->email)->send(new \App\Mail\TirillaPago($details));
            return redirect('/')->with('status','La Tirilla de pago se envió al correo exitosamente');
        }else { 
            $this->alerta = true;
            //return redirect('/')->with('status','No existe informacion para eso consulta');
            //return "No existe Tirilla para esta fecha en este Usuario";
        }
        
    }

    public function store(Request $request)
    {

        $tirilla = Tirilla::create($request->all());
        return $tirilla;
        //return redirect()->route('products.edit', $product->id)->with('info','Producto guardado con exito');

        /*
            Carnet::Create(
            //['id' => $this->carnet_id], 
            [ 'rh' => $this->rh, 
              'foto' => $this->cedula.".jpg",
              'tipoFoto'=>'jpg',
              'empleado_id' => $this->empleado_id,
            ]
        ); 
        */
    }
}
