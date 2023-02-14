<?php

namespace App\Exports;

use App\Models\Aldeia;
use Maatwebsite\Excel\Concerns\FromCollection;

class AldeiaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Aldeia::all();
    }
}
