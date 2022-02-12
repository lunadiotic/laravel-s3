<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('file');
        $fileMeta = [
            'name' => $file->getClientOriginalName(),
            'extension' => $file->getClientOriginalExtension(),
            'mimeType' => $file->getClientMimeType(),
            'fileSize' => $file->getSize()
        ];

        $result = Storage::putFileAs('directory', $file, $file->hashName());

        return $result;
    }
}
