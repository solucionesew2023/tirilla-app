<?php

namespace App\Http\Controllers;

use App\Models\Tirillatns;
use Barryvdh\DomPDF\Facade\Pdf;



use Illuminate\Http\Request;

class TirillaController extends Controller
{

    public function index(){
        $tirilla = Tirillatns::all();

        return view('tirilla.index', compact('tirilla'));

    }

    public function downloadPdf()
    {
       $tirilla = Tirillatns::all();

        view()->share('tirilla.download', $tirilla);

        $pdf = Pdf::loadView('tirilla.download', ['tirilla' => $tirilla]);



        return $pdf->download('tirilla.pdf');
    }
}