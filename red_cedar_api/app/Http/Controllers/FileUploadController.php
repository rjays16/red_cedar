<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage'), $fileName);

            return response()->json(['message' => 'File uploaded successfully']);
        }

        return response()->json(['error' => 'Invalid file or file missing'], 400);
    }
}
