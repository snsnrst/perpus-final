@extends('layouts.auth')

@section('content')
<div id="layoutAuthentication_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Register</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" type="text" placeholder="Enter Your Name" name="name" required autocomplete="name" autofocus>
                                    <label for="name">Nama Lengkap</label>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control @error('email') is-invalid @enderror" id="inputEmail" value="{{ old('email') }}" type="email" placeholder="Enter Email Address" name="email" required autocomplete="email">
                                    <label for="email">Email address</label>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}" type="password" placeholder="Enter Password" name="password" required autocomplete="new-password">
                                    <label for="password">Password</label>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="password-confirm" value="{{ old('password') }}" type="password" placeholder="Enter Password" name="password_confirmation" required autocomplete="new-password">
                                    <label for="password-confirm">Confirmation Password</label>
                                </div>
                                    <button type="submit" class="btn btn-primary">Register</button>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="{{ route('login') }}">Sudah Punya Akun? Login!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
