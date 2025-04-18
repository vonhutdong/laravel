@extends('dashboard')

@section('content')
    <main class="signup-form">
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-5">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header text-center bg-success text-white py-4">
                        <h3 class="mb-0">Create an Account</h3>
                        <p class="small">Fill in the details to sign up</p>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('user.postUser') }}" method="POST">
                            @csrf
                            
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" id="name" class="form-control rounded-pill px-3" name="name" required autofocus>
                                @if ($errors->has('name'))
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                @endif
                            </div>

                        

                            <div class="form-group mb-3">
                                <label for="email_address" class="form-label">Email Address</label>
                                <input type="email" id="email_address" class="form-control rounded-pill px-3" name="email" required>
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

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success rounded-pill btn-lg shadow-sm">
                                    Create Account
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <p class="small mb-0">Already have an account? <a href="login" class="text-success">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
