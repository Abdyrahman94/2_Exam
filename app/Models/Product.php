<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'country_id',
        'name',
        'name_tm',
        'name_ru',
        'slug',
        'description',
        'description_tm',
        'description_ru',
        'price',
        'is_discount',
        'discount_percent',
        'image',
        'is_new',
        'is_stock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function getName()
    {
        $locale = app()->getLocale();

        if ($locale == 'tm') {
            return $this->name_tm ?: $this->name;
        } else if ($locale == 'ru') {
            return $this->name_ru ?: $this->name;
        }
        return $this->name;
    }

    public function getDescription()
    {
        $locale = app()->getLocale();

        if ($locale == 'tm') {
            return $this->description_tm ?: $this->description;
        } else if ($locale == 'ru') {
            return $this->description_ru ?: $this->description;
        }
        return $this->description;
    }
}
