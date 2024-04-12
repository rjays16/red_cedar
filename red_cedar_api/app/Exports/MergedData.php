<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Config;

class ConsolidatedExport implements WithHeadings, FromCollection
{
    use Exportable;

    public function headings(): array
    {
           return [];
    }

    public function collection()
    {
        $mergedData = collect(DB::select("CALL sp_getAllDataMergedata"));

        return $mergedData;
    }

    public function getMergedDataXLS()
    {
        return Excel::download(new MergedDataExport(), 'result.xlsx');
    }
}
