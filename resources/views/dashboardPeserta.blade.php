@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard Peserta</div>

                <div class="card-body">
                    Tim anda berhasil terdaftar.
                    @if($adaProposal)
                    <br>
                    Proposal sudah terupload dan dalam proses.
                    @endif
                    <br>
                    @foreach($members as $member)
                        <br>
                        Nama: {{$member->nama}}
                        <br>
                        NIM: {{$member->nim}}
                        <br>
                        Prodi: {{$member->prodi}}
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
