<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * Class Media
 */
class Media extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    // RELATIONS

    /**
     * Get the user who uploaded the media
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    // HELPERS

    public function localPath()
    {
        return storage_path('app/media').'/'.$this->stored_file_name;
    }

    public function publicUrl()
    {
        return route('frontend.media.get', ['filename' => $this->stored_file_name]);
    }

    public function downloadUrl()
    {
        return route('frontend.media.download', ['filename' => $this->stored_file_name]);
    }

    public function deleteFile()
    {
        if (Storage::disk('media')->delete($this->stored_file_name)) {
            $this->delete();
            return true;
        }
        return false;
    }

    // STATIC HELPERS

    public static function saveFromUpload(UploadedFile $file)
    {
        $path = $file->store('media');
        $media = new Media([
            'original_file_name' => $file->getClientOriginalName(),
            'stored_file_name' => $file->hashName(),
            'extension' => $file->extension() || $file->clientExtension(),
            'size' => $file->getSize(),
            'local_path' => $path,
        ]);

        $user = auth()->guard('web')->user();
        $media->user()->associate($user);

        $media->save();
        return $media;
    }
}
