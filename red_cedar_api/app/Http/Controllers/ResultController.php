<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ResultExport;

class ResultController extends Controller
{
    public function getResult(){
        $result = collect(DB::select("CALL sp_apn()"));
        if(!is_null($result)) {
            return response()->json($result);
        } else {
            return response()->json(['message' => 'Empty Data'], 404);
        }
    }
    public function getResultXLS()
    {
        return Excel::download(new ResultExport(), 'result.xlsx');
    }
}
