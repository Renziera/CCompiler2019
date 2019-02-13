<?php

namespace CCompiler;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function user(){
        return $this->belongsTo('CCompiler\User');
    }
}
