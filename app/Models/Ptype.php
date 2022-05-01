<?php

namespace App\Models;

use App\Models\LocaleContents;
use Illuminate\Database\Eloquent\Model;

class Ptype extends Model
{

    protected $fillable=['p_image'];

    public function contents()
    {
        return $this->hasMany(LocaleContents::class, 'element_id')->where('page', 'ptypes')->where('section', 'ptypes');
    }



    // public function categories()
    // {
    //     return $this->hasMany(Category::class, 'ptype_id');
    // }
}
