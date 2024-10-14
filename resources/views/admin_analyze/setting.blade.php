@extends('layouts.navigation-admin')

@section('contents')
    <div class="container">
        <!-- Settings Title -->
        <div class="card shadow-sm mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h3 class="fw-bold primary-color-text">Settings</h3>
            </div>
        </div>

        <!-- Purchase Order Form -->
        @if($packs->count() < 3)
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Purchase Order</h5>
                    <form action="{{ route('admin_analyze.setting.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="namePack" class="form-label">Name Pack</label>
                            <select class="form-select" name="namePack" id="namePack" required>
                                <option value="" disabled selected>Pilih Pack</option>
                                <option value="trial">Trial</option>
                                <option value="bundle">Bundle</option>
                                <option value="custom">Custom</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Rp.">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="alert alert-warning">
                Data pack sudah mencapai batas maksimal 3. Tidak dapat menambahkan data baru.
            </div>
        @endif

        <!-- Pack Table -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Pack</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Name Pack</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packs as $pack)
                            <tr>
                                <td>{{ $pack->name_pack }}</td>
                                <td>{{ $pack->price }}</td>
                                <td>{{ $pack->description }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin_analyze.setting.edit', $pack->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin_analyze.setting.destroy', $pack->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 Notifications -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    <script>
        document.getElementById('price').addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^,\d]/g, '');
            if (value) {
                value = parseInt(value, 10).toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).replace(/\sIDR|IDR/g, 'Rp. ');
            }
            e.target.value = value;
        });
    </script>
@endsection
