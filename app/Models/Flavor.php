<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flavor extends Model
{
    protected $fillable = [
        'flavor_FA',
        'flavor_EN',
        'flavor_RU',
        'flavor_AR',
    ];

    public function contents()
    {
        return $this->hasMany(LocaleContents::class, 'element_id')->where('page', 'flavors')->where('section', 'flavors');
    }
}