<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiomedController extends Controller
{
    public function getBiomed(){
        $list = DB::table('apgwellstarbiomed')->distinct()->get();

        if($list->isNotEmpty()) {
            return response()->json($list);
        } else {
            return response()->json(['message' => 'Empty table'], 404);
        }
    }

}
