@extends('layouts.navigation-admin')

@section('contents')
<div class="container">
    <!-- Bagian Header atau Judul Dashboard -->
    <div class="mb-4 card shadow-sm border-light p-3">
        <h3>Add Data Emiten</h3>
    </div>

    <!-- Card untuk General Information -->
    <div class="card shadow-sm border-light p-3">
        <h2 class="mb-3">General Information</h2>
        <p class="text-muted">Please fill in the form below to add a new emiten</p>

        <form action="{{ route('admin_analyze.emiten.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Name Emiten</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter the company name">
                </div>
                <div class="col-md-6">
                    <label for="ticker" class="form-label">Ticker Code</label>
                    <input type="text" class="form-control" id="ticker" name="ticker" placeholder="Enter 4-letter ticker">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control" id="category" name="category">
                        <option value="Automotive">Automotive</option>
                        <option value="Energy">Energy</option>
                        <option value="Technology">Technology</option>
                        <!-- Tambahkan kategori lain sesuai dengan kebutuhan -->
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter the company address">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="market_cap" class="form-label">Market Capitalization (e.g., 150T IDR)</label>
                    <input type="text" class="form-control" id="market_cap" name="market_cap" placeholder="Enter market capitalization">
                </div>
                <div class="col-md-6">
                    <label for="price" class="form-label">Price (e.g., 150)</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter the price in IDR or USD">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="growth" class="form-label">Growth Net Profit (%)</label>
                    <input type="text" class="form-control" id="growth" name="growth" placeholder="Enter growth percentage">
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Additional details about the company"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
@endsection
