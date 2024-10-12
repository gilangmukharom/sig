@extends('layouts.navigation-admin')

@section('contents')
<div class="container">
    <!-- Bagian Header atau Judul Dashboard -->
    <div class="mb-4 card shadow-sm border-light p-3">
        <h3>Add data emiten</h3>
    </div>

    <!-- Card untuk General Information -->
    <div class="card shadow-sm border-light p-3">
        <h2 class="mb-3">General Information</h2>
        <p class="text-muted">Lorem ipsum dolor sit amet</p>

        <form action="{{ route('admin_analyze.emiten.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name_emiten" class="form-label">Name emiten</label>
                    <input type="text" class="form-control" id="name_emiten" placeholder="Placeholder content">
                </div>
                <div class="col-md-6">
                    <label for="kode" class="form-label">Kode</label>
                    <input type="text" class="form-control" id="kode" placeholder="Lock 4 huruf">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" placeholder="Dropdown beberapa category">
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Placeholder content">
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
                    <label for="kapitalisasi_pasar" class="form-label">Kapitalisasi pasar (IDR)</label>
                    <input type="text" class="form-control" id="kapitalisasi_pasar" placeholder="string">
                </div>
                <div class="col-md-6">
                    <label for="volume_rata_rata" class="form-label">Volume rata-rata (JT)</label>
                    <input type="text" class="form-control" id="volume_rata_rata" placeholder="string">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="price" class="form-label">Price ($)</label>
                    <input type="text" class="form-control" id="price" placeholder="Placeholder content">
                </div>
                <div class="col-md-6">
                    <label for="growth" class="form-label">Growth net profit (%)</label>
                    <input type="text" class="form-control" id="growth" placeholder="Placeholder content">
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" placeholder="Placeholder content"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
@endsection
