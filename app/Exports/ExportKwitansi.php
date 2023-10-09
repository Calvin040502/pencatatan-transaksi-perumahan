<?php

namespace App\Exports;

use App\Models\Kwitansi;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportKwitansi implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kwitansi::all();
    }
}


