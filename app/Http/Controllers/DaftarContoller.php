<?php

namespace CCompiler\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CCompiler\User;
use CCompiler\Member;
use CCompiler\Proposal;
use CCompiler\Review;

class DaftarContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function daftarMember(){

    }

    public function uploadProposal(){

    }
}
