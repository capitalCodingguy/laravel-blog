<?php

namespace App;

// use App\Scopes\
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    protected static function boot()
    {
        parent::boot();
    }

    use SoftDeletes;

    protected $fillable = ['content'];

    protected $dates = ['deleted_at'];

    public function commentable()
    {
        return $this->morphTo();
    }
}
