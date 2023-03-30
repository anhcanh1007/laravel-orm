<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';


    protected $fillable = [
        'id',
        'title',
        'content',
        'user_id'
    ];

    public $timestamp = true;

    public function scopeSearch($query)
    {
        if (request()->key)
        {
            $key = request()->key;
            $query->where('title', 'LIKE', '%'.$key.'%');
        }
        return $query;
    }

    public function scopeType($query, $type)
    {
        return $query->where('user_id', $type);
    }


    //kiểu quan hệ 1-n : một bài viết chỉ có một tác giả
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
