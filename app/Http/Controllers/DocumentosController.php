<?php

namespace App\Http\Controllers;

use App\Models\Documentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DocumentosController extends Controller
{
    public static function ver($file)
    {
        $doc = Documentos::where('doc_file', $file)->where('doc_estado', 1)->first();

        if (!$doc) {
            abort(404);
        } else {
            $name = $doc->doc_file;
            $filePath = storage_path('app/problemas/' . $name);
            if (File::exists($filePath)) {
                return response()->file($filePath);
            } else {
                abort(404);
            }
        }
    }
}
