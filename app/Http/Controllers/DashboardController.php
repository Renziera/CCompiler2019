<?php

namespace CCompiler\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CCompiler\User;
use CCompiler\Member;
use CCompiler\Proposal;
use CCompiler\Review;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        $id = Auth::id();
        if($role < 1){
            $memberCount = User::find($id)->members()->count();
            $proposal = User::find($id)->proposal()->first();
            if(!$memberCount){
                echo 1232;
            }
            if(!$proposal){

            }
            return view('dashboardPeserta');
        }

        if($role < 2){
            return view('dashboardPending');
        }

        if($role < 3){
            return view('dashboardReviewer');
        }

        return view('dashboardAdmin');
    }
}
