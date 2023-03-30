<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'mate_title',
        'mate_description',
        'mate_keyword',
        'navbar_status',
        'status',
        'created_by',
    ];


    /**
     * Get all of the comments for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function post()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
