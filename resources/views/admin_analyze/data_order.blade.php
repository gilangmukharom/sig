@extends('layouts.navigation-admin')

@section('contents')
    <div class="container mt-4">
        <!-- Bagian Atas: Dashboard + Tambah Data + Search -->
        <div class="card primary-color-text align-items-center mb-4 p-2 max-w-fit">
            <h4 class="fw-bold">Data Emitten</h4>
        </div>

        <!-- Header Statistik -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-light p-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-currency-bitcoin fs-2 text-warning me-3"></i>
                        <div>
                            <h6 class="mb-0">Total Emiten</h6>
                            <h3 class="fw-bold">{{$totalEmiten}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-light p-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-people fs-2 text-success me-3"></i>
                        <div>
                            <h6 class="mb-0">Total User</h6>
                            <h3 class="fw-bold">{{$totalUser}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-light p-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-box fs-2 text-purple me-3"></i>
                        <div>
                            <h6 class="mb-0">Total Orders</h6>
                            <h3 class="fw-bold">{{$orderCount}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
