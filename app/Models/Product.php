<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'ptype_id',
        'weight_id',
        'flavor_id',
        'p_img',
    ];

    public function contents()
    {
        return $this->hasMany(LocaleContents::class, 'element_id')->where('page', 'products')->where('section', 'products');
    }
}