<?php

namespace App\Http\Livewire\Tirilla;

use Livewire\Component;
use App\Mail\TirillaPago;
use App\Models\Tirillatns;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail as Mail;

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

//foreach($this->listaMes as $m){

     //$tirilla = Tirillatns::all();

    $tirilla = Tirillatns::where('personalid', $this->cedula)
    ->where('mes',1)
    ->where('ano',$this->anioSel)
    ->get();



 $pdf = Pdf::loadView('livewire.tirilla.download', ['tirilla' => $tirilla]);

 // return $pdf->download('tirilla.pdf');
 //dd($pdf);

 $messageData[] = "HOLA";

 $details = [
 // 'mes' => implode("-",$this->listaMes).":".$this->anioSel,
 // 'cedula' => $this->cedula,
 'title' => 'Consulta Tirilla de pago',
 'body' => 'Este es un correo automatico. Ver anexo',

 ];



    Mail::send('emails/tirillapago', $details, function ($mail) use ($pdf) {
    $mail->from('gestiondocumental@prodeho.com.co', 'prodeho');
    $mail->to($this->email);
    $mail->attachData($pdf->output(), 'mensaje.pdf');
 });


//}

return redirect('/')->with('status','La Tirilla de pago se envió al correo exitosamente');



       //return $pdf->stream('tirilla.pdf');

    }


}