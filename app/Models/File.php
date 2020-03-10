<?php

namespace App\Models;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Page
 */
class File extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    // RELATIONS

    /**
     * Get the media file
     */
    public function user()
    {
        return $this->hasOneThrough(User::class, Media::class);
    }

    /**
     * Get the media file
     */
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
