@extends('layouts.auth', ['title' => 'Login'])
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
    @endpush

    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('auth.login.cek') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input id="name" type="text" class="form-control" name="name" tabindex="1" required
                        autofocus>
                    <div class="invalid-feedback">
                        Please fill in your nama
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                        please fill in your password
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>
            <div class="text-center">
                <a href="{{ route('auth.login-user') }}">Login sebagai User</a>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('index') }}">Kembali beranda</a>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush
@endsection
