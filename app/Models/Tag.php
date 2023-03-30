<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'id',
        'name',
    ];

    public $timestamp = true;

    public function products()
    {
        return $this->belongsToMany(Tag::class, 'product__tags', 'tag_id', 'product_id');
    }
}
