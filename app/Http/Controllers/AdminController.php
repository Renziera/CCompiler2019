<?php

namespace CCompiler\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CCompiler\User;
use CCompiler\Member;
use CCompiler\Proposal;
use CCompiler\Review;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function manageUsers(){
        $role = Auth::user()->role;
        if($role < 3){
            return redirect('/illegal');
        }
        
    }

    public function approveReviewer(){
        $role = Auth::user()->role;
        if($role < 3){
            return redirect('/illegal');
        }
    }


}
