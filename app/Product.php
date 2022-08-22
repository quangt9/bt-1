<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'code',
        'brand',
        'type',
        'price',
        'image',
        'description',
    ];
}
