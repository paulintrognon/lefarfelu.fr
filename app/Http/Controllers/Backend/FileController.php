<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Media;
use Illuminate\Http\Request as Request;

/**
 * Class FileController.
 */
class FileController extends Controller
{
    /**
     * List all files
     * @return \Illuminate\View\View
     */
    public function list()
    {
        $files = File::all();
        return view('backend.file.list', [
            'files' => $files,
        ]);
    }

    /**
     * Show form for creating a new file
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backend.file.create');
    }

    /**
     * Create a new file and stores it in the database
     */
    public function store(Request $request)
    {
        $media = Media::saveFromUpload($request->file);
        $file = new File();
        $file->media()->associate($media);
        $file->save();

        return redirect()
            ->route('admin.file.list')
            ->withFlashSuccess('Le fichier a été mis en ligne avec succès !');
    }

    /**
     * Show form for editing an existing file
     * @return \Illuminate\View\View
     */
    public function edit(File $file)
    {
        return view('backend.file.edit', [
            'file' => $file,
        ]);
    }

    /**
     * Update the file in the database
     */
    public function update(File $file, StorePageRequest $request)
    {
        $user = auth()->guard('web')->user();
        $file->update([
            'title' => $request->title,
            'urlPath' => $request->urlPath,
            'content' => $request->content,
        ]);
        return redirect()
            ->route('admin.file.edit', $file)
            ->withFlashSuccess('La file a été modifiée avec succès !');
    }

    public function delete(File $file)
    {
        $file->media->delete();
        $file->delete();

        return redirect()
            ->route('admin.file.list')
            ->withFlashSuccess('Le fichier a été supprimé !');
    }
}
