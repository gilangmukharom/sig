@extends('layouts.navigation-admin')
@section('title', 'Edit Key Ratios for ' . $company->name)

@section('contents')
    <div class="container">
        <h1 class="mb-4 text-center primary-color-text">Edit Key Ratios for {{ $company->name }}</h1>

        <form method="GET" action="">
            <div class="card shadow p-4 mb-4 bg-white rounded">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6">
                        <label for="filter_years" class="form-label fw-bold primary-color-text">Select Years to
                            Display</label>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle w-100" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Select Years
                            </button>
                            <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton"
                                style="max-height: 300px; overflow-y: auto;">
                                <!-- List of existing years -->
                                @foreach ($allYears as $year)
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="filter_years[]"
                                                value="{{ $year }}" id="year_{{ $year }}"
                                                {{ in_array($year, $years) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="year_{{ $year }}">
                                                {{ $year }}
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <!-- Section to add a new year -->
                                <li>
                                    <div class="input-group">
                                        <input type="hidden" id="companyId" value="{{ $company->id }}">
                                        <input type="number" class="form-control" id="newYearInput"
                                            placeholder="Add new year">
                                        <button type="button" class="btn btn-outline-primary"
                                            id="addYearButton">Add</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <small class="text-muted d-block mt-2">You can select up to 3 years.</small>
                    </div>

                    <div class="col-md-4 offset-md-2 d-flex justify-content-md-end justify-content-start">
                        <button type="submit" class="btn btn-custom2 w-100 shadow-sm">
                            <i class="fas fa-filter me-2"></i> Filter Data
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Form for updating key ratios -->
        <form id="update-form" action="{{ route('admin_analyze.key_ratio.update', $company->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Profitability Ratios Section -->
            <div class="row d-flex flex-wrap gap-4">
                <p class="mt-4"><b>Profitability Ratios</b></p>
                <hr>
                @foreach (['ROE', 'GPM', 'NPM'] as $ratio)
                    <div class="col-md-5">
                        <div class="card p-3 border-0">
                            <h4>{{ $ratio }}</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Quarter</th>
                                        @foreach ($years as $year)
                                            <th>{{ $year }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quarters as $quarter)
                                        <tr>
                                            <td>{{ $quarter }}</td>
                                            @foreach ($years as $year)
                                                <td>
                                                    <input type="text"
                                                        name="profitability_ratios[{{ $ratio }}][{{ $year }}][{{ $quarter }}]"
                                                        value="{{ old('profitability_ratios.' . $ratio . '.' . $year . '.' . $quarter, $profitabilityRatioData[$quarter][$year][$ratio] ?? '-') }}"
                                                        class="form-control">
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Relative Ratios Section -->
            <div class="row d-flex flex-wrap gap-4">
                <p class="mt-4"><b>Relative Ratios</b></p>
                <hr>
                @foreach (['EPS', 'PER', 'BVPS', 'PBV'] as $ratio)
                    <div class="col-md-5">
                        <div class="card p-3 border-0">
                            <h4>{{ $ratio }}</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Quarter</th>
                                        @foreach ($years as $year)
                                            <th>{{ $year }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quarters as $quarter)
                                        <tr>
                                            <td>{{ $quarter }}</td>
                                            @foreach ($years as $year)
                                                <td>
                                                    <input type="text"
                                                        name="relative_ratios[{{ $ratio }}][{{ $year }}][{{ $quarter }}]"
                                                        value="{{ old('relative_ratios.' . $ratio . '.' . $year . '.' . $quarter, $relativeRatioData[$quarter][$ratio][$year] ?? '-') }}"
                                                        class="form-control">
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Liquidity Ratios Section -->
            <div class="row d-flex flex-wrap gap-4">
                <p class="mt-4"><b>Liquidity Ratios</b></p>
                <hr>
                @foreach (['DAR', 'DER'] as $ratio)
                    <div class="col-md-5">
                        <div class="card p-3 border-0">
                            <h4>{{ $ratio }}</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Quarter</th>
                                        @foreach ($years as $year)
                                            <th>{{ $year }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quarters as $quarter)
                                        <tr>
                                            <td>{{ $quarter }}</td>
                                            @foreach ($years as $year)
                                                <td>
                                                    <input type="text"
                                                        name="liquidity_ratios[{{ $ratio }}][{{ $year }}][{{ $quarter }}]"
                                                        value="{{ old('liquidity_ratios.' . $ratio . '.' . $year . '.' . $quarter, $liquidityRatioData[$quarter][$ratio][$year] ?? '-') }}"
                                                        class="form-control">
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Submit Button -->
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update Key Ratios</button>
            </div>
        </form>
    </div>

    <script>
        // Membatasi jumlah maksimum tahun yang bisa dipilih
        document.addEventListener('DOMContentLoaded', function() {
            var checkboxes = document.querySelectorAll('input[name="filter_years[]"]');
    
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    var checkedBoxes = document.querySelectorAll('input[name="filter_years[]"]:checked');
    
                    if (checkedBoxes.length > 3) {
                        // Jika lebih dari 3 checkbox yang dipilih, uncheck checkbox yang baru di-klik
                        this.checked = false;
    
                        // Tampilkan peringatan menggunakan SweetAlert2
                        Swal.fire({
                            icon: 'warning',
                            title: 'Limit Reached',
                            text: 'You can select up to 3 years only.',
                        });
                    }
                });
            });
        });
    
        // Event listener untuk menambahkan tahun baru menggunakan AJAX
        document.getElementById('addYearButton').addEventListener('click', function() {
            var newYear = document.getElementById('newYearInput').value;
            var companyId = document.getElementById('companyId').value;
    
            if (newYear && companyId) {
                // Validasi bahwa input tahun memiliki 4 digit
                if (!/^\d{4}$/.test(newYear)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Year',
                        text: 'Please enter a valid 4-digit year.',
                    });
                    return;
                }
    
                $.ajax({
                    url: '{{ route('years.store') }}',
                    type: 'POST',
                    data: {
                        year: newYear,
                        company_id: companyId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        var newYearCheckbox = `
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="filter_years[]" value="` + response.year + `" id="year_` + response.year + `" checked>
                                    <label class="form-check-label" for="year_` + response.year + `">` + response.year + `</label>
                                </div>
                            </li>`;
    
                        var dropdownMenu = document.querySelector('.dropdown-menu');
                        var divider = dropdownMenu.querySelector('.dropdown-divider');
                        dropdownMenu.insertAdjacentHTML('beforebegin', newYearCheckbox);
    
                        // Kosongkan input field
                        document.getElementById('newYearInput').value = '';
    
                        // Tambahkan validasi pada checkbox yang baru
                        var newCheckbox = document.getElementById('year_' + response.year);
                        newCheckbox.addEventListener('change', function() {
                            var checkedBoxes = document.querySelectorAll('input[name="filter_years[]"]:checked');
                            if (checkedBoxes.length > 3) {
                                this.checked = false;
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Limit Reached',
                                    text: 'You can select up to 3 years only.',
                                });
                            }
                        });
    
                        // Tampilkan SweetAlert jika sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Year Added',
                            text: 'The year has been successfully added.',
                        });
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
    
                        // Tampilkan SweetAlert jika gagal
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to Add Year',
                            text: 'Error: The year already exists for this company',
                        });
                    }
                });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Missing Information',
                    text: 'Please enter a year and make sure company ID is available.',
                });
            }
        });
    </script>    

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

@endsection
