<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
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
    /** 获取存储在JWT中的key */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /** JWT的自定义声明 */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
