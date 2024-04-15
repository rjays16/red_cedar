<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Config;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ResultExport implements WithHeadings, FromCollection, ShouldAutoSize
{
    use Exportable;

    public function headings(): array
    {
           return [
            'Owner_1_first',
            'Owner_1_last',
            'Apn',
            'County',
            'MAIL_STATE',
            'Prop_address',
            'Prop_city',
            'PROP_STATE',
            'Acreage',
            'Prop_zip',
            'Mail_addr',
            'Mail_city',
            'Mail_zip',
            'Building_sqft',
            'Land_sqft',
            'Val_transfer',
            'Units_number',
            'Date_transfer',
            'Yr_blt',
            'Zoning',
            'Owner_name_1',
            'Owner_name_2',
            'Val_assd_land',
            'Appraise_val',
            'Aggr_lot_count',
            'Val_market',
            'Cal_acreage',
            'Use_code_muni_desc',
            'Deed_type',
            'Flood_factor',
            'Imprv_pct',
            'Landuse_category',
            'Landuse_code',
            'Landuse_desc',
            'Latitude',
            'Legal_1',
            'Longitude',
            'Lot_number',
            'Ownership_status_desc',
            'Tax_amount',
            'Tax_year',
            '_simplified',
            'MyUnknownColumn',
            'Owner_1_first',
            'OWNER_1_FIRST',
            'OWNER_1_LAST',
            'APN',
            'COUNTY',
            'MAIL_STATE',
            'PROP_ADDRESS',
            'PROP_CITY',
            'PROP_STATE',
            'ACREAGE',
            'PROP_ZIP',
            'MAIL_ADDR',
            'MAIL_CITY',
            'MAIL_ZIP',
            'BUILDING_SQFT',
            'LAND_SQFT',
            'VAL_TRANSFER',
            'UNITS_NUMBER',
            'DATE_TRANSFER',
            'YR_BLT',
            'ZONING',
            'OWNER_NAME_1',
            'OWNER_NAME_2',
            'VAL_ASSD_LAND',
            'APPRAISE_VAL',
            'AGGR_LOT_COUNT',
            'VAL_MARKET',
            'CAL_ACREAGE',
            'USE_CODE_MUNI_DESC',
            'DEED_TYPE',
            'FLOOD_FACTOR',
            'IMPRV_PCT',
            'LANDUSE_CATEGORY',
            'LANDUSE_CODE',
            'LANDUSE_DESC',
            'LATITUDE',
            'LEGAL_1',
            'LONGITUDE',
            'LOT_NUMBER',
            'OWNERSHIP_STATUS_DESC',
            'TAX_AMOUNT',
            'TAX_YEAR',
            '_SIMPLIFIED'            
           ];
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
