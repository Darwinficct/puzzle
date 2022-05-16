<?php

namespace App\Imports;

use App\Models\estudiante;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;

class EstudiantesImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    { 
        foreach ($collection as $key => $value){
            if($key>0 )
            {
                DB::table('estudiantes')->insert(['Registro' => $value[0],'Nombre' => $value[1],'FAC' => $value[2],
                'FACULTAD' => $value[3],'CARRERA_NOMBRE' => $value[4],'LUGAR_VOTACION' => $value[5],'MESA' => $value[6]]);
            }
        }
       
    }
}
