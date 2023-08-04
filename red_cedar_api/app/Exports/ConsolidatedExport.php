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
           return [
               'id',
               'Book',
               'CURRENCY',
               'FROM-DATE',
               'TO-DATE',
               'PRELIM-CLOSE',
               'COMPANY',
               'COMPANY-NAME',
               'CURRENCY-2',
               'AMC-DATE',
               'CLASSIFICATION-XLT',
               'ACCT-UNIT',
               'AST-LEASE-COMPANY-5',
               'AST-LEASE-5',
               'DIVISION-8',
               'ASSET-TYPE-8',
               'SUB-TYPE-8',
               'PROPERTY-XLT-9',
               'Asset',
               'Tag Number',
               'Asset Group',
               'Description',
               'Asset Category',
               'Simulated',
               'Tax Exempt',
               'Used',
               'Work-in-Process',
               'AST-DISPOSAL-XLT',
               'InServiceDate',
               'Convention',
               'Life',
               'Life Remaining',
               'Method',
               'Method Switched',
               'BookBasis',
               'Over $2k',
               'Beyond Useful Life',
               'BOOK-VALUE',
               'Current Period Depreciation',
               'Year-to-Date Depreciation',
               'Life-to-Date Depreciation',
               'Asset Type',
               'Book Basis-11',
               'BOOK-VALUE-11',
               'Current Period Depreciation-11',
               'Year-to-Date Depreciation-11',
               'Life-to-Date Depreciation-11',
               'Accounting Unit-2',
               'Accounting Unit Group',
               'Book Basis-10',
               'BOOK-VALUE-10',
               'Current Period Depreciation-10',
               'Year-to-Date Depreciation-10',
               'Life-to-Date Depreciation-10',
               'Division',
               'Book Basis-8',
               'BOOK-VALUE-8',
               'Current Period Depreciation-8',
               'Year-to-Date Depreciation-8',
               'Life-to-Date Depreciation-8',
               'AST-LEASE-COMPANY-9',
               'AST-LEASE-9',
               'Book Basis-14',
               'BOOK-VALUE-14',
               'Current Period Depreciation-14',
               'Year-to-Date Depreciation-14',
               'Life-to-Date Depreciation-14',
               'Company-2',
               'Book Basis-6',
               'BOOK-VALUE-6',
               'Current Period Depreciation-6',
               'Year-to-Date Depreciation-6',
               'Life-to-Date Depreciation-6',
               'INSRV-YEAR',
               'Book Basis-3',
               'BOOK-VALUE-3',
               'Current Period Depreciation-3',
               'Year-to-Date Depreciation-3',
               'Life-to-Date Depreciation-3',
               'AMASTBOOK-CNT-2',
               'Company Group',
               'Book Basis-2',
               'BOOK-VALUE-2',
               'Current Period Depreciation-2',
               'Year-to-Date Depreciation-2',
               'Life-to-Date Depreciation-2',
               'AMASTBOOK-CNT',
               'Department',
               'InScope',
               'Assigned',
               'name',
               'asset_type',
               'asset_manufacturer',
               'model_name',
               'serial_number',
               'install_status',
               'concatenate',
               'in-scope updated',
               'Matches',
               'MatchedAsset Types',
           ];
    }

    public function collection()
    {
        $consolidated = collect(DB::select("CALL sp_getAllDataConsolidated"));

        return $consolidated;
    }
}
