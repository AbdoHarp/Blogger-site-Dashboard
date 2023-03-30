<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        "yt_iframe",
        'meta_title',
        'mate_description',
        'mate_keyword',
        'status',
        'created_by',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
