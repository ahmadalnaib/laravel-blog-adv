<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//ADD SOFT DELETE WHEN YOU WANT THE DELETE ITEM SITLL ON SQL DB
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;
//    for softdeletes
    protected $dates=[
       'deleted_at'
    ];
    protected $fillable=[
        'title',
        'content',
        'photo',
        'category_id',
        'slug',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
