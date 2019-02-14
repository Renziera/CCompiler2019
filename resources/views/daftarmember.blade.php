@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data anggota</div>

                <div class="card-body">
                    <form method="POST" action="/peserta/member">
                        @csrf

                        <div class="form-group row">
                            <label for="member" class="col-md-4 col-form-label text-md-right">{{ __('Member 1') }}</label>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama1" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nim" class="col-md-4 col-form-label text-md-right">{{ __('NIM') }}</label>

                            <div class="col-md-6">
                                <input id="nim" type="text" class="form-control" name="nim1" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prodi" class="col-md-4 col-form-label text-md-right">{{ __('Prodi') }}</label>

                            <div class="col-md-6">
                                <input id="prodi" type="text" class="form-control" name="prodi1" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="member" class="col-md-4 col-form-label text-md-right">{{ __('Member 2') }}</label>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama2" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nim" class="col-md-4 col-form-label text-md-right">{{ __('NIM') }}</label>

                            <div class="col-md-6">
                                <input id="nim" type="text" class="form-control" name="nim2" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prodi" class="col-md-4 col-form-label text-md-right">{{ __('Prodi') }}</label>

                            <div class="col-md-6">
                                <input id="prodi" type="text" class="form-control" name="prodi2" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="member" class="col-md-4 col-form-label text-md-right">{{ __('Member 3') }}</label>
                        </div>

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama3" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nim" class="col-md-4 col-form-label text-md-right">{{ __('NIM') }}</label>

                            <div class="col-md-6">
                                <input id="nim" type="text" class="form-control" name="nim3" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prodi" class="col-md-4 col-form-label text-md-right">{{ __('Prodi') }}</label>

                            <div class="col-md-6">
                                <input id="prodi" type="text" class="form-control" name="prodi3" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
