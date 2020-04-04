<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Page
 */
class Page extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    // RELATIONS

    /**
     * Get the user who created the page.
     */
    public function createdBy()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    /**
     * Get the user who last edited the page.
     */
    public function lastEditBy()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }

    /**
     * Get all old versions of the page
     */
    public function histories()
    {
        return $this->hasMany('App\Models\PageHistory');
    }

    // HELPERS

    public function publicUrl()
    {
        return config('app.url').'/'.$this->urlPath;
    }

    public function html()
    {
        return $this->content;
    }

    // STATIC HELPERS

    public static function getFromPath(string $path)
    {
        return self::where('urlPath', '=', $path)
            ->orWhere('urlPath', '=', "/$path")->first();
    }
}
