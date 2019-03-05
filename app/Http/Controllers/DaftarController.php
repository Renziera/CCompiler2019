<?php

namespace CCompiler\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CCompiler\User;
use CCompiler\Member;
use CCompiler\Proposal;
use CCompiler\Review;

class DaftarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function setCabang(Request $request){
        $id = Auth::id();
        $user = User::find($id);
        $user->cabang = $request->cabang;
        $user->save();
        return redirect('/home');
    }
    
    public function daftarMember(Request $request){
        $id = Auth::id();
        
        $member1 = new Member;
        $member1->user_id = $id;
        $member1->nama = $request->nama1;
        $member1->nim = $request->nim1;
        $member1->prodi = $request->prodi1;
        $ktm = $request->file('ktm1');
        $path = $ktm->store('public/ktm');
        $publicPath = \Storage::url($path);
        $member1->ktm = $publicPath;
        $member1->save();

        $member2 = new Member;
        $member2->user_id = $id;
        $member2->nama = $request->nama2;
        $member2->nim = $request->nim2;
        $member2->prodi = $request->prodi2;
        $ktm = $request->file('ktm2');
        $path = $ktm->store('public/ktm');
        $publicPath = \Storage::url($path);
        $member2->ktm = $publicPath;
        $member2->save();

        $member3 = new Member;
        $member3->user_id = $id;
        $member3->nama = $request->nama3;
        $member3->nim = $request->nim3;
        $member3->prodi = $request->prodi3;
        $ktm = $request->file('ktm3');
        $path = $ktm->store('public/ktm');
        $publicPath = \Storage::url($path);
        $member3->ktm = $publicPath;
        $member3->save();

        return redirect('/home');
    }
    
    public function uploadProposal(Request $request){
        $proposal = $request->file('proposal');
        $path = $proposal->store('public/proposals');
        $publicPath = \Storage::url($path);
        
        $id = Auth::id();
        $cabang = User::find($id)->cabang;
        $proposal = new Proposal;
        $proposal->user_id = $id;
        $proposal->cabang = $cabang;
        $proposal->filename = $publicPath;
        $proposal->save();
        return redirect('/home');
    }
}
