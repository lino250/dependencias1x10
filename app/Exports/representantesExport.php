<?php
namespace App\Exports;

use App\Models\Representante;
//use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RepresentantesExport implements FromView
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function view(): View
    {
        
        return view('reporte.exportsRepresentantes', [
            'data' => $this->data,
            //'representante' => Representante::all()
        ]);
    }
}