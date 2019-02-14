@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Manage User</div>

                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($data as $user)
                            <tr>
                                <td>{{$user['name']}}</td>
                                <td>{{$user['username']}}</td>
                                <td>{{$user['role']}}</td>
                                <td>{{$user['status']}}</td>
                                <td>
                                    @if($user['status'] == 'Pending')
                                        <form action="/admin/approve" method="post">
                                            @csrf
                                            <input type="hidden" name="username" value="{{$user['username']}}">
                                            <input type="submit" value="Approve">
                                        </form>
                                    @else
                                        none
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
