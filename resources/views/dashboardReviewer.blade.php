@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard Reviewer</div>

                <div class="card-body">
                    <a href="/review/all">Semua proposal</a>
                    <br>
                    <a href="/review/unreviewed">Belum di review</a>
                    <br>
                    <a href="/review/reviewed">Sudah di review</a>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
