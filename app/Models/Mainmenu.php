<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mainmenu extends Model
{
    use HasFactory;
    protected $table = 'mainmenu';

    protected $fillable = [
        'title',
        'category',
        'content',
        'file',
        'url',
        'order',
        'status',
    ];

    public static $rules = [
        'title' => 'required',
        'category' => 'required',
        'order' => 'required',
        'status' => 'required',
    ];
}
