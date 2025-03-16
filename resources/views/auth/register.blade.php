@extends('layouts.app')
@section('title', 'Register')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
    <div class="align-items-center d-flex flex-column justify-content-center">
        <div class="auth-container w-25">
            <h5 class="text-center">Daftar ke BOOKING.PS</h5>
            <p class="text-center font-small m-0">Sudah memiliki akun? <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="{{ route('login') }}">Masuk Disini!</a> </p>
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
            <form action="{{ route('register-process') }}" method="POST" class="needs-validation">
                @csrf
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label font-small">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Your Username" required>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label font-small">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label font-small">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="mb-1">
                    <label for="validationCustom01" class="form-label font-small">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
                <button class="btn btn-primary w-100 mt-3" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection