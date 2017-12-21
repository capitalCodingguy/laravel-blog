<?php

namespace App;

use App\Scopes\PublishedScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new PublishedScope());
    }
    protected $dates = ['deleted_at', 'published_at'];

    const selectArrayWithOutContent = [
        'id',
        'user_id',
        'category_id',
        'title',
        'slug',
        'view_count',
        'description',
        'updated_at',
        'created_at',
        'status'
    ];

    protected $fillable = ['title', 'description', 'slug', 'category_id', 'user_id', 'content', 'published_at', 'status', 'html_content'];

    // public function category()
    // {
    //     return $this->
    // } 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function configuration()
    {
        return $this->morphOne(Configuration::class, 'configurable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}