@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Review Proposal</div>

                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <th>Nama Tim</th>
                            <th>Cabang</th>
                            <th>Proposal</th>
                            <th>Status</th>
                            <th>Penilaian</th>
                        </tr>
                        @foreach($data as $proposal)
                            <tr>
                                <td>{{$proposal['nama']}}</td>
                                <td>{{$proposal['cabang']}}</td>
                                <td>
                                    <a href="{{$proposal['link']}}" target="_blank" rel="noopener noreferrer">Lihat</a>
                                </td>
                                <td>
                                    @if($proposal['reviewed'] === true)
                                        Reviewed
                                    @else
                                        Belum direview
                                    @endif
                                </td>
                                <td>
                                    @if($proposal['reviewed'] === true)
                                        <br>
                                        Kriteria 1 : {{$proposal['kriteria1']}} <br>
                                        Kriteria 2 : {{$proposal['kriteria2']}} <br>
                                        Kriteria 3 : {{$proposal['kriteria3']}} <br>
                                        Kriteria 4 : {{$proposal['kriteria4']}} <br>
                                        Kriteria 5 : {{$proposal['kriteria5']}} <br>
                                        Total : {{$proposal['total']}} <br>
                                    @else
                                        <form action="/review/submit" method="post">
                                            @csrf
                                            <input type="hidden" name="proposal_id" value="{{$proposal['id']}}">
                                            Kriteria 1
                                            <input type="number" name="kriteria1" min="0" max="10">
                                            <br>
                                            Kriteria 2
                                            <input type="number" name="kriteria2" min="0" max="10">
                                            <br>
                                            Kriteria 3
                                            <input type="number" name="kriteria3" min="0" max="10">
                                            <br>
                                            Kriteria 4
                                            <input type="number" name="kriteria4" min="0" max="10">
                                            <br>
                                            Kriteria 5
                                            <input type="number" name="kriteria5" min="0" max="10">
                                            <br>
                                            <input type="submit" value="Submit Review">
                                        </form>
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
