<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'name_tm',
        'name_ru',
        'type',
        'slug',
    ];
    
    public function products() {
        return $this->hasMany(Product::class);
    }
}
