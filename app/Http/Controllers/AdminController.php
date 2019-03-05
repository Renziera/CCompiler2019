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
        if($role < 4){
            return redirect('/illegal');
        }
        $users = User::where('role', '<', 4)->get();
        $data = array();
        foreach($users as $user){
            $data[$user->id]['name'] = $user->name;    
            $data[$user->id]['username'] = $user->username;
            if($user->role === 0){
                $data[$user->id]['role'] = 'Peserta';
                $data[$user->id]['status'] = 'Rejected';
            }elseif($user->role === 1){
                $data[$user->id]['role'] = 'Peserta';   
                $data[$user->id]['status'] = 'New';
            }elseif($user->role === 2){
                $data[$user->id]['role'] = 'Peserta';   
                $data[$user->id]['status'] = 'Approved';
            }elseif($user->role === 3){
                $data[$user->id]['role'] = 'Reviewer';   
                $data[$user->id]['status'] = 'Approved';
            } 
        }
        return view('manageuser')->with('data', $data);
    }

    public function viewMembers(Request $request){
        $role = Auth::user()->role;
        if($role < 4){
            return redirect('/illegal');
        }

        $user = User::where('username', $request->username)->first();
        $members = $user->members;
        $name = $user->name;
        $cabang = $user->cabang;

        return view('viewmember')->with('members', $members)->with('cabang', $cabang)->with('name', $name);
    }

    public function approveReviewer(Request $request){
        $role = Auth::user()->role;
        if($role < 4){
            return redirect('/illegal');
        }

        $user = User::where('username', $request->username)->first();
        $user->role = 3;
        $user->save();

        return redirect('/admin/manage');
    }

    public function approvePeserta(Request $request){
        $role = Auth::user()->role;
        if($role < 4){
            return redirect('/illegal');
        }

        $user = User::where('username', $request->username)->first();
        $user->role = 2;
        $user->save();

        return redirect('/admin/manage');
    }

    public function rejectPeserta(Request $request){
        $role = Auth::user()->role;
        if($role < 4){
            return redirect('/illegal');
        }

        $user = User::where('username', $request->username)->first();
        $user->role = 0;
        $user->members()->delete();
        $user->save();

        return redirect('/admin/manage');
    }

    public function viewProposals(){
        $role = Auth::user()->role;
        if($role < 4){
            return redirect('/illegal');
        }

        $proposals = Proposal::All();
        $data = array();
        foreach($proposals as $proposal){
            $data[$proposal->id]['nama'] = $proposal->user->name;
            $data[$proposal->id]['cabang'] = $proposal->cabang;
            $data[$proposal->id]['link'] = $proposal->filename;
            if($proposal->reviews->count() === 0){
                $data[$proposal->id]['reviewed'] = true;
                $data[$proposal->id]['kriteria1'] = 'Belum ada nilai';
                $data[$proposal->id]['kriteria2'] = 'Belum ada nilai';
                $data[$proposal->id]['kriteria3'] = 'Belum ada nilai';
                $data[$proposal->id]['kriteria4'] = 'Belum ada nilai';
                $data[$proposal->id]['kriteria5'] = 'Belum ada nilai';
                $data[$proposal->id]['total'] = 'Belum ada nilai';
            }else{
                $data[$proposal->id]['reviewed'] = true;
                $kriteria1 = 0;
                $kriteria2 = 0;
                $kriteria3 = 0;
                $kriteria4 = 0;
                $kriteria5 = 0;
                $total = 0;
                $amount = 0;
                $reviews = $proposal->reviews;
                foreach($reviews as $review){
                    $kriteria1 += $review->kriteria_1;
                    $kriteria2 += $review->kriteria_2;
                    $kriteria3 += $review->kriteria_3;
                    $kriteria4 += $review->kriteria_4;
                    $kriteria5 += $review->kriteria_5;
                    $total += $review->total;
                    $amount++;
                }
                $kriteria1 = $kriteria1 / $amount;
                $kriteria2 = $kriteria2 / $amount;
                $kriteria3 = $kriteria3 / $amount;
                $kriteria4 = $kriteria4 / $amount;
                $kriteria5 = $kriteria5 / $amount;
                $total = $total / $amount;
                $data[$proposal->id]['kriteria1'] = $kriteria1;
                $data[$proposal->id]['kriteria2'] = $kriteria2;
                $data[$proposal->id]['kriteria3'] = $kriteria3;
                $data[$proposal->id]['kriteria4'] = $kriteria4;
                $data[$proposal->id]['kriteria5'] = $kriteria5;
                $data[$proposal->id]['total'] = $total;
            }
        }
        return view('review')->with('data', $data);
    }
}
