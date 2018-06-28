<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function download(Request $request) {
        $file_id = $request->id;

        $db_file = File::find($file_id);


        if ($request->display === 'true') {
            $file = Storage::get($db_file->path);
            $size = Storage::size($db_file->path);

            if ($db_file->isPdf()) {
                return response($file, 200, [
                    'Content-Type' => $db_file->mime,
                    'Content-Length' => $size,
                    'Content-Disposition' => 'inline; filename="'. $db_file->original_filename .'"'
                ]);
            }
            
            return response($file, 200, [
                'Content-Type' => $db_file->mime,
                'Content-Length' => $size,
            ]);
        }

        $file = new \Illuminate\Http\File(storage_path("app/{$db_file->path}"));

        return response()->download($file, $db_file->original_filename, [
            'Content-Type' => $db_file->mime
        ]);
    }

    public function deleteFile(Request $request)
    {
        $file_id = $request->id;

        $db_file = File::find($file_id);
        Storage::delete($db_file->path);
        $db_file->delete();

        // Redirect back with hash
        return redirect($request->header('referer') . '#attachment-deleted');
    }
}
