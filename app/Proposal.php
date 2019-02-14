<?php

namespace CCompiler;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    public function user(){
        return $this->belongsTo('CCompiler\User');
    }

    public function reviews(){
        return $this->hasMany('CCompiler\Review');
    }
}
