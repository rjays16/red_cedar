<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Config;

class ResultExport implements WithHeadings, FromCollection
{
    use Exportable;

    public function headings(): array
    {
           return [];
    }

    public function collection()
    {
        return collect(DB::select("CALL sp_apn"));
    }

    public function getResultXLS()
    {
        return Excel::download(new ResultExport(), 'result.xlsx');
    }
}
