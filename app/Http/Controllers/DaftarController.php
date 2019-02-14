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

    }

    public function uploadProposal(){

    }
}
