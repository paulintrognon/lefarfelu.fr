<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function get(string $filename)
    {
        $attachment = Media::where('stored_file_name', $filename)->first();
        if (!$attachment) {
            abort(404);
        }
        return response()->file($attachment->localPath());
    }

    public function download(string $filename)
    {
        $attachment = Media::where('stored_file_name', $filename)->first();
        if (!$attachment) {
            abort(404);
        }
        return Storage::disk('media')->download($attachment->stored_file_name, $attachment->original_file_name);
    }
}
