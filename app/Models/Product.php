<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'name',
        'price',
    ];

    public $timestamp = true;

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'product__tags', 'product_id', 'tag_id');
    }

    public function product_tag()
    {
        return $this->hasMany(Product_Tag::class);
    }
}
