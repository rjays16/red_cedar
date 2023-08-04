<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class ConsolidatedExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return DB::table('consolidated')
            ->distinct()
            ->take($this->getConsolidatedLimit())
            ->select('column1', 'column2', 'column3') // Replace with the actual column names you want to export
            ->get();
    }

    public function headings(): array
    {
        return [
            'Column 1', // Replace with actual column names
            'Column 2',
            'Column 3',
        ];
    }

    public function getConsolidatedLimit()
    {
        $config = Config::first();
        return $config ? $config->limitrows : 1000;
    }
}
