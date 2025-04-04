@extends('dashboard')

@section('content')
    <main class="login-form">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-5">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header text-center bg-primary text-white py-4">
                        <h3 class="mb-0">Welcome Back</h3>
                        <p class="small">Please login to continue</p>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('user.authUser') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control rounded-pill px-3" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control rounded-pill px-3" name="password" required>
                                @if ($errors->has('password'))
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                @endif
                            </div>

                            <div class="form-group d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label for="remember" class="form-check-label">Remember Me</label>
                                </div>
                                <a href="#" class="text-primary small">Forgot Password?</a>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary rounded-pill btn-lg shadow-sm">
                                    Sign In
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <p class="small mb-0">Don't have an account? <a href="#" class="text-primary">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
