@extends('dashboard')

@section('content')
    <main class="signup-form">
<<<<<<< Updated upstream
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Create User</h3>
                        <div class="card-body">
                            <form action="{{ route('user.postUser') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                           required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email_address" class="form-control"
                                           name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                           name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
=======
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
                        <p class="small mb-0">Already have an account? <a href="#" class="text-success">Login</a></p>
>>>>>>> Stashed changes
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
