<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocaleContents extends Model
{
    protected $fillable = [
        'page',
        'section',
        'element_id',
        'locale',
        'element_title',
        'element_content',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}