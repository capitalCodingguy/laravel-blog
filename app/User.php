<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getMetaAttribute($meta)
    {
        $a = json_decode($meta, true);
        return $a ? $a : array();
    }

    public function setMetaAttribute($meta)
    {
        $this->attributes['meta'] = json_encode($meta);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
