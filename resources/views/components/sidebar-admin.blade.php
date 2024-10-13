@extends('layouts.bootstrap')
@section('content')
    <div class="d-flex flex-column flex-shrink-0 p-3 primary-color" style="width: 250px; min-height: 100vh;">
        <div class="profile-admin w-100" style="min-height: 10vh">
            <a href="/" class="text-white text-decoration-none">
                <span class="fs-5">Dashboard Admin</span>
            </a>
        </div>
        <ul class="nav nav-pills flex-column gap-2">
            <li class="nav-item">
                <a href="{{ url('/admin_analyze/index') }}"
                    class="nav-link {{ Request::is('admin_analyze/index') ? 'bg-white' : 'text-white' }}">
                    <i class="bi bi-grid"></i>
                    Data Emiten
                </a>
            </li>

            <!-- Data User -->
            <li class="nav-item">
                <a href="{{ url('/admin_analyze/user/index') }}"
                    class="nav-link {{ Request::is('admin_analyze/user/index') ? 'bg-white' : 'text-white' }}">
                    <i class="bi bi-person"></i>
                    Data User
                </a>
            </li>

            <!-- Data Orders -->
            <li>
                <a href="#" class="nav-link {{ Request::is('admin_analyze/orders') ? 'active' : 'text-white' }}">
                    <i class="bi bi-cart"></i>
                    Data Orders
                </a>
            </li>

            <!-- Settings -->
            <li>
                <a href="{{ url('/admin_analyze/settings') }}" class="nav-link {{ Request::is('admin_analyze/settings') ? 'bg-white' : 'text-white' }}">
                    <i class="bi bi-gear"></i>
                    Settings
                </a>
            </li>

            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-box-arrow-right"></i>
                    Keluar
                </a>
            </li>
        </ul>
    </div>
@endsection
