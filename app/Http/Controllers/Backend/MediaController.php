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
        $media = Media::saveFromUpload($request->file);

        return ['location' => $media->publicUrl()];
    }
}
