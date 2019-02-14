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

        $review = new Review;
        $review->proposal_id = $request->proposal_id;
        $review->user_id = $reviewerId;
        $review->kriteria_1 = $request->kriteria1;
        $review->kriteria_2 = $request->kriteria2;
        $review->kriteria_3 = $request->kriteria3;
        $review->kriteria_4 = $request->kriteria4;
        $review->kriteria_5 = $request->kriteria5;
        $review->total = $request->kriteria1 + $request->kriteria2 
            + $request->kriteria3 + $request->kriteria4 + $request->kriteria5;
        $review->save();

        return redirect()->back();
    }
    
    public function getReviewed(){
        $role = Auth::user()->role;
        if($role < 2){
            return redirect('/illegal');
        }
        $reviewerId = Auth::id();

        $reviews = Review::where('user_id', $reviewerId)->get();
        $data = array();
        foreach($reviews as $review){
            $data[$review->id]['nama'] = $review->proposal->user->name;
            $data[$review->id]['cabang'] = $review->proposal->cabang;
            $data[$review->id]['link'] = $review->proposal->filename;
            $data[$review->id]['reviewed'] = true;
            $data[$review->id]['kriteria1'] = $review->kriteria_1;
            $data[$review->id]['kriteria2'] = $review->kriteria_2;
            $data[$review->id]['kriteria3'] = $review->kriteria_3;
            $data[$review->id]['kriteria4'] = $review->kriteria_4;
            $data[$review->id]['kriteria5'] = $review->kriteria_5;
            $data[$review->id]['total'] = $review->total;
        }

        return view('review')->with('data', $data);
    }
    
    public function getAllReview(){
        $role = Auth::user()->role;
        if($role < 2){
            return redirect('/illegal');
        }
        $reviewerId = Auth::id();

        $proposals = Proposal::All();
        $data = array();
        foreach($proposals as $proposal){
            $data[$proposal->id]['nama'] = $proposal->user->name;
            $data[$proposal->id]['cabang'] = $proposal->cabang;
            $data[$proposal->id]['link'] = $proposal->filename;
            if($proposal->reviews->where('user_id', $reviewerId)->count() === 0){
                $data[$proposal->id]['reviewed'] = false;
                $data[$proposal->id]['id'] = $proposal->id;
            }else{
                $data[$proposal->id]['reviewed'] = true;
                $data[$proposal->id]['kriteria1'] = $proposal->reviews->where('user_id', $reviewerId)->first()->kriteria_1;
                $data[$proposal->id]['kriteria2'] = $proposal->reviews->where('user_id', $reviewerId)->first()->kriteria_2;
                $data[$proposal->id]['kriteria3'] = $proposal->reviews->where('user_id', $reviewerId)->first()->kriteria_3;
                $data[$proposal->id]['kriteria4'] = $proposal->reviews->where('user_id', $reviewerId)->first()->kriteria_4;
                $data[$proposal->id]['kriteria5'] = $proposal->reviews->where('user_id', $reviewerId)->first()->kriteria_5;
                $data[$proposal->id]['total'] = $proposal->reviews->where('user_id', $reviewerId)->first()->total;
            }
        }
        return view('review')->with('data', $data);
    }
    
    public function getUnreviewed(){
        $role = Auth::user()->role;
        if($role < 2){
            return redirect('/illegal');
        }
        $reviewerId = Auth::id();

        $proposals = Proposal::All();
        $data = array();
        foreach($proposals as $proposal){
            if($proposal->reviews->where('user_id', $reviewerId)->count() === 0){
                $data[$proposal->id]['nama'] = $proposal->user->name;
                $data[$proposal->id]['cabang'] = $proposal->cabang;
                $data[$proposal->id]['link'] = $proposal->filename;
                $data[$proposal->id]['reviewed'] = false;
                $data[$proposal->id]['id'] = $proposal->id;
            }
        }
        return view('review')->with('data', $data);
    }
}
