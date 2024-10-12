@extends('layouts.navigation-admin')
@section('title', 'Dashboard')

@section('contents')
<div class="container mt-4">
    <!-- Bagian Atas: Dashboard + Tambah Data + Search -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="add-component">
            <h4 class="fw-bold">Dashboard</h4>
            <a href="{{ route('admin_analyze.emiten.create') }}" class="btn btn-outline-primary me-3">
                + Tambah Data
            </a>
        </div>
        <div class="d-flex">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search content.." aria-label="Search">
                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>
            </div>
        </div>
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
                        <h3 class="fw-bold">1,326</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Data Emiten -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h4>Data Emiten</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet consectetur.</p>

            <!-- Tabel dengan Styling -->
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>Nama Emiten</th>
                        <th>Kode</th>
                        <th>Category</th>
                        <th>Kapitalisasi pasar (IDR)</th>
                        <th>Volume rata-rata (jt)</th>
                        <th>Price ($)</th>
                        <th>Growth Net (%)</th>
                        <th>Action</th>
                        <th>Key Ratio</th>
                        <th>Key Statistics</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td class="text-center">{{ $company->ticker }}</td>
                        <td class="text-center">
                            <span class="badge bg-secondary">Auto</span>
                        </td>
                        <td class="text-center">{{ number_format((float)$company->market_cap) }}</td>
                        <td class="text-center">85.57</td>
                        <td class="text-center">85.57</td>
                        <td class="text-center">82.08</td>
                        <td class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('admin_analyze.emiten.edit', $company->id) }}" class="btn btn-warning btn-sm">
                                <i class="text-white bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin_analyze.emiten.destroy', $company->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin_analyze.key_ratio.edit', ['companyId' => $company->id, 'id' => $company->id]) }}" class="btn btn-warning btn-sm">
                                <i class="text-white bi bi-pencil"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin_analyze.revenue.edit', ['companyId' => $company->id, 'id' => $company->id]) }}" class="btn btn-warning btn-sm">
                                <i class="text-white bi bi-pencil"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
