@extends('layouts.navigation-admin')

@section('contents')
    <div class="container m-2">
        <!-- Bagian Header atau Judul -->
        <div class="mb-4 card shadow-sm border-light p-3">
            <h3>Edit Data Emiten</h3>
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
                        <label for="name" class="form-label">Name Emiten</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ $company->name }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="ticker" class="form-label">Ticker Code</label>
                        <input type="text" name="ticker" class="form-control" id="ticker"
                            value="{{ $company->ticker }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="category" class="form-label">Category</label>
                        <!-- Update to Dropdown for Category -->
                        <select name="category" class="form-control" id="category">
                            <option value="Automotive" {{ $company->category == 'Automotive' ? 'selected' : '' }}>Automotive
                            </option>
                            <option value="Energy" {{ $company->category == 'Energy' ? 'selected' : '' }}>Energy</option>
                            <option value="Technology" {{ $company->category == 'Technology' ? 'selected' : '' }}>Technology
                            </option>
                            <option value="Finance" {{ $company->category == 'Finance' ? 'selected' : '' }}>Finance</option>
                            <option value="Health" {{ $company->category == 'Health' ? 'selected' : '' }}>Health</option>
                            <!-- Tambahkan kategori lain jika ada -->
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="address"
                            value="{{ $company->address }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="market_cap" class="form-label">Market Capitalization (e.g., 150T IDR)</label>
                        <input type="text" name="market_cap" class="form-control" id="market_cap"
                            value="{{ $company->market_cap }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label">Price ($)</label>
                        <input type="text" name="price" class="form-control" id="price"
                            value="{{ $company->price }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="growth" class="form-label">Growth Net Profit (%)</label>
                        <input type="text" name="growth" class="form-control" id="growth"
                            value="{{ $company->growth }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3" required>{{ $company->description }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>

    <!-- SweetAlert2 Success/Error Handling -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
