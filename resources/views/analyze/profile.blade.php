@extends('layouts.navigation')

@section('contents')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body position-relative">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <img src="https://via.placeholder.com/150" class="rounded-circle border border-dark mb-3" alt="Profile Image" width="150" height="150">
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="#" class="btn btn-light border"><i class="fas fa-edit"></i></a>
                        </div>
                        <form>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="fullName">Full Name*</label>
                                    <input type="text" class="form-control bg-light" id="fullName" value="Anggung Gijoh M" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="userName">User Name*</label>
                                    <input type="text" class="form-control bg-light" id="userName" value="Anggung123" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="email">Email*</label>
                                    <input type="email" class="form-control bg-light" id="email" value="Anggung123@gmail.com" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="phoneNumber">Phone Number*</label>
                                    <input type="text" class="form-control bg-light" id="phoneNumber" value="0891XXXXXXXXX" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="address">Address*</label>
                                    <input type="text" class="form-control bg-light" id="address" value="Jakarta, Indonesia" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="work">Work*</label>
                                    <input type="text" class="form-control bg-light" id="work" value="Accounting" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="password">Password*</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control bg-light" id="password" value="************" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
