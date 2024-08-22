@extends('layouts.navigation')

@section('contents')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body position-relative">
                <div class="row">
                    <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                        <img id="profileImage" src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('assets/img/profile-image-blank.png') }}" class="rounded-circle border mb-3" alt="Profile Image" width="180" height="150">
                        
                        <button type="button" id="changeImageButton" class="btn btn-light border rounded-circle d-none">
                            <i class="fas fa-camera"></i>
                        </button>
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex justify-content-end mb-3">
                            <button type="button" id="editButton" class="btn btn-light border rounded-circle">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>

                        <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <input type="file" id="profileImageInput" name="profile_image" class="d-none" accept="image/*">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-mandatory-validation for="fullName" label="Full Name" />
                                        <input type="text" class="form-control bg-light" id="fullName" name="name" value="{{ old('name', $user->name) }}" readonly required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-mandatory-validation for="userName" label="Username" />
                                        <input type="text" class="form-control bg-light" id="userName" name="username" value="{{ old('username', $user->username) }}" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-mandatory-validation for="email" label="Email" />
                                        <input type="email" class="form-control bg-light" id="email" name="email" value="{{ old('email', $user->email) }}" readonly required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-mandatory-validation for="phoneNumber" label="Phone Number" />
                                        <input type="text" class="form-control bg-light" id="phoneNumber" name="phone" value="{{ old('phone', $user->phone) }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-mandatory-validation for="address" label="Address" />
                                        <input type="text" class="form-control bg-light" id="address" name="address" value="{{ old('address', $user->address) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-mandatory-validation for="work" label="Work" />
                                        <input type="text" class="form-control bg-light" id="work" name="work" value="{{ old('work', $user->work) }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <x-mandatory-validation for="password" label="Password" />
                                        <div class="input-group">
                                            <input type="password" class="form-control bg-light" id="password" value="************" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex align-items-end">
                                    <button type="submit" class="btn btn-custom2 border border-2 w-100" id="saveButton" disabled>Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('status'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('status') }}',
                confirmButtonText: 'OK'
            });
        });
    </script>
    @endif

    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            // Enable all input fields
            var inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]');
            inputs.forEach(function(input) {
                input.removeAttribute('readonly');
            });

            // Show change image button
            document.getElementById('changeImageButton').classList.remove('d-none');

            // Enable the save button
            document.getElementById('saveButton').removeAttribute('disabled');
        });

        document.getElementById('changeImageButton').addEventListener('click', function() {
            document.getElementById('profileImageInput').click();
        });

        document.getElementById('profileImageInput').addEventListener('change', function(event) {
            if (event.target.files.length > 0) {
                var file = event.target.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('profileImage').src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
