@extends('layouts.navigation-admin')

@section('contents')
<div class="container m-2">
    <!-- Bagian Header atau Judul Dashboard -->
    <div class="mb-4 card shadow-sm border-light p-3">
        <h3>Add data emiten</h3>
    </div>

    <!-- Card untuk Edit Company -->
    <div class="card shadow-sm border-light p-3">
        <h2 class="mb-3">Edit Company</h2>
        <p class="text-muted">Edit the details of the company</p>

        <form action="{{ route('admin_analyze.emiten.update', $company->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="ticker" class="form-label">Ticker</label>
                    <input type="text" name="ticker" class="form-control" id="ticker" value="{{ $company->ticker }}" required>
                </div>
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $company->name }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" value="Dropdown beberapa category">
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{ $company->address }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="kapitalisasi_podar" class="form-label">Kapitalisasi podar</label>
                    <input type="text" class="form-control" id="kapitalisasi_podar" placeholder="Placeholder content">
                </div>
                <div class="col-md-6">
                    <label for="sector" class="form-label">Sector</label>
                    <input type="text" class="form-control" id="sector" placeholder="Placeholder content">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="market_cap" class="form-label">Kapitalisasi pasar (IDR)</label>
                    <input type="text" name="market_cap" class="form-control" id="market_cap" value="{{ $company->market_cap }}" required>
                </div>
                <div class="col-md-6">
                    <label for="volume_rata_rata" class="form-label">Volume rata-rata (JT)</label>
                    <input type="text" class="form-control" id="volume_rata_rata" placeholder="string">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="price" class="form-label">Price ($)</label>
                    <input type="text" name="price" class="form-control" id="price" value="{{ $company->price }}" required>
                </div>
                <div class="col-md-6">
                    <label for="growth" class="form-label">Growth net profit (%)</label>
                    <input type="text" name="growth" class="form-control" id="growth" value="{{ $company->growth }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" placeholder="Placeholder content"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection
