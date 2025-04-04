@extends('dashboard')

@section('content')
    <main class="user-info">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-header bg-info text-white text-center py-4">
                            <h3 class="mb-0">User Details</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $messi->id }}</td>
                                        <td>{{ $messi->name }}</td>
                                        <td>{{ $messi->email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('user.updateUser', ['id' => $messi->id]) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('user.deleteUser', ['id' => $messi->id]) }}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
