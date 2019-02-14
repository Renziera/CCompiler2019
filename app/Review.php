<?php

namespace CCompiler;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user(){
        return $this->belongsTo('CCompiler\User');
    }

    public function proposal(){
        return $this->belongsTo('CCompiler\Proposal');
    }
}
