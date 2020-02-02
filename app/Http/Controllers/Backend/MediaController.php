<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request as Request;

/**
 * Class MediaController.
 */
class MediaController extends Controller
{
    public function tinymce_upload(Request $request)
    {
        $mediaFile = $request->file;
        $path = $mediaFile->store('media');
        $media = new Media([
            'original_file_name' => $mediaFile->getClientOriginalName(),
            'stored_file_name' => $mediaFile->hashName(),
            'extension' => $mediaFile->extension() || $mediaFile->clientExtension(),
            'size' => $mediaFile->getSize(),
            'local_path' => $path,
        ]);

        $user = auth()->guard('web')->user();
        $media->user()->associate($user);

        $media->save();

        return ['location' => $media->publicUrl()];
    }
}
