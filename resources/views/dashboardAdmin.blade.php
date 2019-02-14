@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard Admin</div>

                <div class="card-body">
                    <a href="/admin/manage">Manage user</a>
                    <br>
                    <a href="/admin/proposal">Lihat proposal</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
