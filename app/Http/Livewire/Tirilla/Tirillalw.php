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
    public $cedula, $movil, $email, $anio, $alerta = false, $anioSel;
    public $listaMes = [];
    public $mesActual, $tirilla;

    protected $rules = [
        'cedula' => 'required|min:6',
        'email' => 'required|email',
        'movil' => 'required|min:10 | max:10',
        'listaMes' => 'required',
        'anio' => 'required',
    ];

    public function mount()
    {
        $this->mesActual = date("m");
    }

    public function updatedanio()
    {
        if ($this->anio == 1) {
            $this->anioSel = date('Y');
        } elseif ($this->anio == 2) {
            $anio = date('Y');
            $this->anioSel = date("Y", strtotime($anio . "- 1 year"));
        }
    }

    public function render()
    {
        return view('livewire.tirilla.tirillalw');
    }

    public function consultarTirilla()
    {
        $this->validate();

        foreach ($this->listaMes as $m) {
            $this->tirilla = Tirillatns::where('personalid', $this->cedula)
                ->where('mes', $m)
                ->where('ano', $this->anioSel)
                ->get()->toArray();

            if (empty($this->tirilla)) {
                return redirect('/')->with('status', 'Usuario no existe');
            } else {
                
                //$pdf = Pdf::loadView('livewire.tirilla.download', ['tirilla' => $tirilla]);

                $this->download($m);
                
                $details = [
                    // 'mes' => $mes,
                    // 'cedula' => $this->cedula,
                    'title' => 'Consulta Tirilla de pago',
                    'body' => 'Este es un correo automatico. Ver anexo',
                ];
                /*Mail::send('emails/tirillapago', $details, function ($mail) use ($pdf) {
                    $mail->from('gestiondocumental@prodeho.com.co', 'prodeho');
                    $mail->to($this->email);
                    $mail->attachData($pdf->output(), $this->cedula . '.pdf');
                    return redirect('/')->with('status', 'La Tirilla de pago se envió al correo exitosamente');
                });*/
            }
        }
    } // cierra consultarTirilla


    public function download($mes)
    {
        
        /*
        return Pdf::loadView('livewire.tirilla.download', $data)
            ->setPaper('a4', 'landscape')
            ->download('archivo.pdf');*/
            $content = Pdf::loadView('livewire.tirilla.download', ['tirilla' => $this->tirilla])->setPaper('a4', 'landscape')->output();

            Storage::disk('public')->put($this->cedula.'-'.$mes.'.pdf', $content);
    }
}// cierra clase