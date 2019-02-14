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
        $users = User::where('role', '<', 3)->get();
        $data = array();
        foreach($users as $user){
            $data[$user->id]['name'] = $user->name;    
            $data[$user->id]['username'] = $user->username;
            if($user->role === 0){
                $data[$user->id]['role'] = 'Peserta';
                $data[$user->id]['status'] = 'OK';
            }elseif($user->role === 1){
                $data[$user->id]['role'] = 'Reviewer';   
                $data[$user->id]['status'] = 'Pending';
            }elseif($user->role === 2){
                $data[$user->id]['role'] = 'Reviewer';   
                $data[$user->id]['status'] = 'Approved';
            }    
        }
        return view('manageuser')->with('data', $data);
    }

    public function approveReviewer(Request $request){
        $role = Auth::user()->role;
        if($role < 3){
            return redirect('/illegal');
        }

        $user = User::where('username', $request->username)->first();
        $user->role = 2;
        $user->save();

        return redirect('/admin/manage');
    }

    public function viewProposals(){
        $role = Auth::user()->role;
        if($role < 3){
            return redirect('/illegal');
        }

    }
}
