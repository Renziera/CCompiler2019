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
        if($role < 3){
            $memberCount = User::find($id)->members()->count();
            $proposal = User::find($id)->proposal()->first();
            $cabang = User::find($id)->cabang;
            if($cabang == null){
                return view('pilihcabang');
            }
            if(!$memberCount){
                if($role === 0){
                    $pesan = 'Akun anda telah di reject oleh panitia. Silahkan isi data dengan benar.';
                    return view('daftarmember')->with('pesan', $pesan);
                }else{
                    return view('daftarmember');
                }
            }
            $members = Member::where('user_id', $id)->get();
            if($role < 2){
                return view('dashboardPeserta')->with('members', $members)
                    ->with('adaProposal', false)->with('pending', true)->with('cabang', $cabang);
            }
            if(!$proposal && $cabang != 'cp' && $cabang != 'ctf'){
                return view('uploadproposal');
            }
            if($cabang == 'cp' || $cabang == 'ctf'){
                $adaProposal = false;
            }else{
                $adaProposal = true;
            }
            return view('dashboardPeserta')->with('members', $members)
                ->with('adaProposal', $adaProposal)->with('pending', false)->with('cabang', $cabang);
        }

        if($role < 4){
            return view('dashboardReviewer');
        }

        return view('dashboardAdmin');
    }
}
