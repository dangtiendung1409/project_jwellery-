@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/changePassword">
                            <i class="bx bx-lock me-1"></i>
                            Password
                        </a>
                    </li>
                </ul>
                <div class="card mb-4">
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5 class="card-header">Profile Details</h5>
                        <!-- Account -->
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img
                                    src="{{ $user->thumbnail ? asset($user->thumbnail) : asset('path/to/default/image.png') }}"
                                    alt="user-avatar"
                                    class="d-block rounded"
                                    height="100"
                                    width="100"
                                    id="uploadedAvatar"
                                />
                                <div class="button-wrapper">
                                    <label for="thumbnail" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input
                                            type="file"
                                            id="thumbnail"
                                            name="thumbnail"
                                            class="account-file-input"
                                            hidden
                                            accept="image/png, image/jpeg"
                                            onchange="previewImage(event)"
                                        />
                                    </label>

                                    <p class="text-muted mb-0">Allowed JPEG, GIF, JPG , SVG or PNG. Max size of 2048K</p>
                                </div>
                            </div>
                        </div>
                        @error('thumbnail')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="full_name" class="form-label">Full Name</label>
                                    <input
                                        class="form-control @error('full_name') is-invalid @enderror"
                                        type="text"
                                        id="full_name"
                                        name="full_name"
                                        value="{{ $user->full_name }}"
                                        autofocus
                                    />
                                    @error('full_name')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input
                                        class="form-control @error('email') is-invalid @enderror"
                                        type="text"
                                        id="email"
                                        name="email"
                                        value="{{ $user->email }}"
                                        placeholder="john.doe@example.com"
                                    />
                                    @error('email')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input
                                        type="text"
                                        id="phone_number"
                                        name="phone_number"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                        value="{{ $user->phone_number }}"
                                        placeholder="202 555 0111"
                                    />
                                    @error('phone_number')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="province" class="form-label">Province</label>
                                    <input type="text" class="form-control @error('province') is-invalid @enderror" id="province" name="province" value="{{ $user->province }}" />
                                    @error('province')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="district" class="form-label">District</label>
                                    <input type="text" class="form-control @error('district') is-invalid @enderror" id="district" name="district" value="{{ $user->district }}" />
                                    @error('district')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="ward" class="form-label">Ward</label>
                                    <input type="text" class="form-control @error('ward') is-invalid @enderror" id="ward" name="ward" value="{{ $user->ward }}" />
                                    @error('ward')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="address_detail" class="form-label">Address Detail</label>
                                    <input type="text" class="form-control @error('address_detail') is-invalid @enderror" id="address_detail" name="address_detail" value="{{ $user->address_detail }}" />
                                    @error('address_detail')
                                    <p class="help is-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            </div>

                        </div>
                        <!-- /Account -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('uploadedAvatar');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
