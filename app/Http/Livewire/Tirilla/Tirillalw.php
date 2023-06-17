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

    protected $rules = [
        'cedula' => 'required|min:6',
        'email' => 'required|email',
        'movil' => 'required|min:10 | max:10',
        'listaMes' => 'required',
        'anio' => 'required',
    ];

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

    public function consultarTirilla()
    {
        $this->validate();

        foreach($this->listaMes as $m)
        {
            $tirilla = Tirillatns::where('personalid', $this->cedula)
            ->where('mes',$m)
            ->where('ano',$this->anioSel)
            ->get();

            if($tirilla->isEmpty()){
                return redirect('/')->with('status','Usuario no existe');
            }else{

                $pdf = Pdf::loadView('livewire.tirilla.download', ['tirilla' => $tirilla]);
                
                $details = [
                // 'mes' => $mes,
                // 'cedula' => $this->cedula,
                'title' => 'Consulta Tirilla de pago',
                'body' => 'Este es un correo automatico. Ver anexo',
                ];
                Mail::send('emails/tirillapago', $details, function ($mail) use ($pdf) {
                $mail->from('gestiondocumental@prodeho.com.co', 'prodeho');
                $mail->to($this->email);
                $mail->attachData($pdf->output(), $this->cedula.'.pdf');
                return redirect('/')->with('status','La Tirilla de pago se envió al correo exitosamente');
                });
            }
        }
    }// cierra consultarTirilla
}// cierra clase