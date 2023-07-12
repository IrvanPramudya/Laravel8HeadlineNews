<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';

    protected $fillable = [
        'post_id',
        'name',
        'comment',
    ];

    public static $rules = [
        'post_id' => 'required',
        'name' => 'required',
        'comment' => 'required',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
