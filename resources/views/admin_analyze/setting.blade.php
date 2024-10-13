@extends('layouts.navigation-admin')

@section('contents')
    <div class="container">
        <!-- Settings Title -->
        <div class="card shadow-sm mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h3 class="fw-bold">Settings</h3>
            </div>
        </div>

        <!-- Purchase Order Form -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title">Purchase Order</h5>
                <p class="card-text text-muted">Lorem ipsum dolor sit amet</p>

                <form action="{{ route('admin_analyze.setting.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="namePack" class="form-label">Name Pack</label>
                        <input type="text" class="form-control" id="namePack" name="namePack" value="Bundle" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <select class="form-select" id="price" name="price">
                            <option selected>Choose</option>
                            <option value="free">Free</option>
                            <option value="paid">Paid</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Placeholder content"></textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Pack Table -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Pack</h5>
                <p class="card-text text-muted">Lorem ipsum dolor sit amet consectetur.</p>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>Name Pack</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Banyaknya</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bundle</td>
                            <td>0</td>
                            <td>desc</td>
                            <td>9</td>
                            <td class="text-center">
                                <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Custom</td>
                            <td>desc</td>
                            <td>desc</td>
                            <td>No limit</td>
                            <td class="text-center">
                                <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Trial</td>
                            <td>desc</td>
                            <td>desc</td>
                            <td>3</td>
                            <td class="text-center">
                                <button class="btn btn-info btn-sm"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
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
    </div>
@endsection
