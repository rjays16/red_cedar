<?php

namespace App\Http\Controllers;

use App\Models\Consolidated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Config;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ConsolidatedExport;

class ConsolidatedController extends Controller
{
    public function getConsolidated()
    {
        ini_set('max_execution_time', 60000);
        set_time_limit(600);

        $list = DB::table('apgwellstarbiomed')
            ->orderBy('id') // Add an orderBy clause based on the primary key or any other appropriate column
            ->chunk(200, function ($records) {
                // Process each chunk of 200 records
                foreach ($records as $record) {
                    // Process each record
                }
            });

        // If you need to return a JSON response, you can use the collect() function to convert the chunked results back to a collection
        $collection = collect($list);

        if ($collection->isNotEmpty()) {
            return response()->json($collection);
        } else {
            return response()->json(['message' => 'Empty table'], 404);
        }
    }

    public function getConsolidatedlimit()
    {
        $config = Config::first();

        $limit = $config ? $config->limitrows : 1000;

        $list = DB::table('consolidated')
            ->distinct()
            ->take($limit)
            ->get();

        if ($list->isNotEmpty()) {
            return response()->json($list);
        } else {
            return response()->json(['message' => 'Empty table'], 404);
        }
    }

    public function getConsolidatedXLS()
    {
        return Excel::download(new ConsolidatedExport(), 'result.xlsx');
    }
}
