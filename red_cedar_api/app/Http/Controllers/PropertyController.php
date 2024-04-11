<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function getProperty(){
        $list = DB::table('property')->distinct()->get();

        if($list->isNotEmpty()) {
            return response()->json($list);
        } else {
            return response()->json(['message' => 'Empty table'], 404);
        }
    }
}
