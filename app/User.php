<?php

namespace CCompiler;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function members(){
        return $this->hasMany('CCompiler\Member');
    }

    public function proposal(){
        return $this->hasOne('CCompiler\Proposal');
    }

    public function reviews(){
        return $this->hasMany('CCompiler\Review');
    }
}