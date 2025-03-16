@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
    <div class="align-items-center d-flex flex-column justify-content-center h-100">
        <div class="auth-container w-25">
            <h5 class="text-center">Masuk ke BOOKING.PS</h5>
            <p class="text-center font-small m-0">Belum memiliki akun? <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('register') }}">Daftar Disini!</a> </p>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger font-smaller">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('login-process') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label font-small">Email</label>
                    <input type="email" class="form-control" name="email" id="validationCustom01" placeholder="Your Email" required>
                </div>
                <div class="mb-1">
                    <label for="validationCustom01" class="form-label font-small">Password</label>
                    <input type="password" class="form-control" name="password" id="validationCustom01" placeholder="Password" required>
                </div>
                <button class="btn btn-primary w-100 mt-3" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection