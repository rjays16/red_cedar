<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Config;
class MergedController extends Controller
{
    public function getMergedData(){
        $config = Config::first();

        $limit = $config ? $config->limitrows : 1000;

        $list = DB::table('mergedata')
            ->distinct()
            ->take($limit)
            ->get();

        if ($list->isNotEmpty()) {
            return response()->json($list);
        } else {
            return response()->json(['message' => 'Empty table'], 404);
        }
    }
    }
