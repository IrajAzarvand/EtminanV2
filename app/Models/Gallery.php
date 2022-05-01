<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'g_img',
    ];

    public function contents()
    {
        return $this->hasMany(LocaleContents::class, 'element_id')->where('page', 'gallery')->where('section', 'gallery');
    }
}