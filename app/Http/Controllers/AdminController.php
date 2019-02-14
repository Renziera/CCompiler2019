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

        return view('manageuser');
    }

    public function approveReviewer(Request $request){
        $role = Auth::user()->role;
        if($role < 3){
            return redirect('/illegal');
        }

        $user = User::find($request->user_id)->first();
        $user->role = 2;
        $user->save();

        return redirect('/admin/manage');
    }

    public function viewProposals(){

    }
}
