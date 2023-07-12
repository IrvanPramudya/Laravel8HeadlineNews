<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    protected $fillable = [
        'title',
        'image',
        'category_id',
        'url',
        'order',
        'status',
    ];
    public static $rules = [
        'title'         => 'required',
        'image'         => 'required',
        'category_id'   => 'required',
        'url'           => 'required',
        'order'         => 'required',
        'status'        => 'required'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
