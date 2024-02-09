@extends('layouts.auth')  @section('content')
<div id="layoutAuthentication_content">
    @if (Auth::check())
        <div class="alert alert-success">You're already logged in!</div>
        <script>
            setTimeout(function() {
                window.location.href = "{{ route('dashboard') }}";
            }, 1500);
        </script>
    @else
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Login Perpus Online</h3></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('email') is-invalid @enderror" id="inputEmail" value="{{ old('email') }}" type="email" placeholder="Enter Email Address" name="email" required autocomplete="email" autofocus>
                                        <label for="email">Email address</label>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}" type="password" placeholder="Enter Password" name="password" required autocomplete="current-password">
                                        <label for="password">Password</label>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-check mb-3">
                                        <input name="remember" class="form-check-input" id="Remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Ingat Saya</label>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="{{ route('password.request') }}">Lupa Password?</a>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="{{ route('register') }}">Need an account? Register!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endif
</div>
@endsection
