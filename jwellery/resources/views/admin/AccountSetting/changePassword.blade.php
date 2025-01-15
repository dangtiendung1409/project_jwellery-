@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Password</h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.profile') }}"><i class="bx bx-user me-1"></i> Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.changePassword') }}">
                            <i class="bx bx-lock me-1"></i>
                            Password
                        </a>
                    </li>
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header">Change Password</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.changePassword.update') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input  type="password" name="password_current" class="form-control @error('password_current') is-invalid @enderror" id="current_password" required>
                            </div>
                            @error('password_current')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" autocomplete="new-password" name="password" class="form-control @error('password') is-invalid @enderror" id="new_password" required>
                            </div>
                            @error('password')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" autocomplete="new-password" class="form-control" id="new_password_confirmation" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
