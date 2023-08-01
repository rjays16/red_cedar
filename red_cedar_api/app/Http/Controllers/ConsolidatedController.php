<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consolidated;
use Illuminate\Support\Facades\DB;

class ConsolidatedController extends Controller
{
    public function getConsolidated(){
        $list = DB::table('apgwellstarbiomed')->distinct()->get();

        if($list->isNotEmpty()) {
            return response()->json($list);
        } else {
            return response()->json(['message' => 'Empty table'], 404);
        }
    }
}
