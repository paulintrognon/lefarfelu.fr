<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Page
 */
class PageHistory extends Model
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
    public function editedBy()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }
}
