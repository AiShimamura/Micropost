<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    use HasFactory;
    
        protected $fillable = ['content'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
           /**
     * この投稿をお気に入りに入れているユーザ。（Userモデルとの関係を定義）
     */
    public function favorites_users()
    {
        return $this->belongsToMany(User::class, 'favorite', 'user_id', 'micropost_id')->withTimestamps();
    }
}
