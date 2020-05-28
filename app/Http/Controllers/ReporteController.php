<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ReporteController extends Controller
{

    public function inventario(){
        $pdf = PDF::loadView('vistas.reportes.insumos')->setPaper('letter', 'portrait');
        return $pdf->download('Prueba'.'.pdf');
    }
}
