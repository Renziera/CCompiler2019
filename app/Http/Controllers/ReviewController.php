<?php

namespace CCompiler\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CCompiler\Proposal;
use CCompiler\Review;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createReview(Request $request){
        $role = Auth::user()->role;
        if($role < 2){
            return redirect('/illegal');
        }
        $reviewerId = Auth::id();
    }
    
    public function getReviewed(Request $request){
        $role = Auth::user()->role;
        if($role < 2){
            return redirect('/illegal');
        }
        $reviewerId = Auth::id();
    }
    
    public function getAllReview(Request $request){
        $role = Auth::user()->role;
        if($role < 2){
            return redirect('/illegal');
        }
        $reviewerId = Auth::id();
    }
    
    public function getUnreviewed(Request $request){
        $role = Auth::user()->role;
        if($role < 2){
            return redirect('/illegal');
        }
        $reviewerId = Auth::id();
    }
}
