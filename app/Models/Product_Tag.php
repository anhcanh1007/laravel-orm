<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Tag extends Model
{
    use HasFactory;

    protected $table = 'product__tags';

    protected $fillable = [
        'id',
        'product_id',
        'tag_id',
    ];

    public $timestamp = true;
}
