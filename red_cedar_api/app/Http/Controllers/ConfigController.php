<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Config;

class ConfigController extends Controller
{
    public function getConfig(){
        $list = DB::table('config')->distinct()->get();

        if($list->isNotEmpty()) {
            return response()->json($list);
        } else {
            return response()->json(['message' => 'Empty table'], 404);
        }
    }

    public function update($id, Request $request){
        // Use where method to find the record by the 'id' column
        $update = Config::where('id', $id)->first();

        if (!$update) {
            return response()->json(['message' => 'Config not found'], 404);
        }

        // Update the 'limitrows' column
        $update->limitrows = $request->limitrows; // Assuming the input parameter is named "inputLimit"
        $update->save();

        return response()->json([
            'status' => 'success',
            'data' => $update,
        ]);
    }
}
