<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;

    protected $table = 'avatars';

    protected $fillable = [
        'id',
        'name',
        'url',
        'user_id',
    ];

    public $timestamp = true;


    // kiểu quan hệ 1-1 (một ảnh chỉ có đại diện cho một người dùng)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
