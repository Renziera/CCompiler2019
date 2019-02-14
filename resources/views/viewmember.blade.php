@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar anggota</div>

                <div class="card-body">
                    Nama tim : {{$name}}
                    <br>
                    Cabang lomba : {{$cabang}} 
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
