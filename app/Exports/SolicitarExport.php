<?php

namespace App\Exports;

use App\Models\Solicitar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;
use DB;

class SolicitarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $solicitar = Solicitar::select('numero_celular', 'dni', 'fechayhora_solicitada')->get();

        $i = 0;
        $nuevosolicitar = collect([]);
        foreach($solicitar as $key => $value) {
            $i=$i+1;
            /*$solicitar[$key]->index = $i;
            $solicitar[$key]->numero_celular = $solicitar[$key]->numero_celular;
            $solicitar[$key]->dni = $solicitar[$key]->dni;
            $solicitar[$key]->hora_solicitada = \Carbon\Carbon::parse($solicitar[$key]->fechayhora_solicitada)->format('H:i:s');
            $solicitar[$key]->fecha_solicitada = \Carbon\Carbon::parse($solicitar[$key]->fechayhora_solicitada)->format('d/m/Y');
            unset($solicitar[$key]->fechayhora_solicitada);*/

            $collectdata = (object)[ 
                'index' => $i,
                'numero_celular' => $solicitar[$key]->numero_celular,
                'dni' => $solicitar[$key]->dni,
                'hora_solicitada' => \Carbon\Carbon::parse($solicitar[$key]->fechayhora_solicitada)->format('H:i:s'),
                'fecha_solicitada' => \Carbon\Carbon::parse($solicitar[$key]->fechayhora_solicitada)->format('d/m/Y'),
            ];

            $nuevosolicitar->put($key, collect($collectdata));
        }

        return $nuevosolicitar;
    }

    public function headings(): array
    {
        return [
            '#',
            'NUM. CELULAR',
            'DNI',
            'HORA SOLICITADA',
            'FECHA SOLICITADA',
        ];
    }
}
