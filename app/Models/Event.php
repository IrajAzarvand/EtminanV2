<?php

namespace App\Models;

use App\Models\LocaleContents;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'e_image',
    ];

    public function contents()
    {
        return $this->hasMany(LocaleContents::class, 'element_id')->where('page', 'events')->where('section', 'events');
    }
}