@extends('layouts.bootstrap')
@section('content')
<div class="d-flex flex-column flex-shrink-0 p-3 primary-color" style="width: 250px; min-height: 100vh;">
    <a href="/" class="d-flex align-items-start mb-5 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-5">Dashboard</span>
    </a>
    <ul class="nav nav-pills flex-column gap-2">
        <li class="nav-item">
            <a href="{{ url('/admin_analyze/index') }}" class="nav-link {{ Request::is('admin_analyze/index') ? 'active' : 'text-white' }}">
                <i class="bi bi-grid"></i>
                Data Emiten
            </a>
        </li>
        
        <!-- Data User -->
        <li>
            <a href="{{ url('/admin_analyze/user/index') }}" class="nav-link {{ Request::is('admin_analyze/user/index') ? 'active' : 'text-white' }}">
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
        
        <li>
            <a class="nav-link text-white dropdown-toggle {{ Request::is('admin_analyze/key_ratio_list') || Request::is('admin_analyze/key_statics') ? '' : 'collapsed' }}" 
               data-bs-toggle="collapse" href="#collapseEmiten"
               role="button" aria-expanded="{{ Request::is('admin_analyze/key_ratio_list') || Request::is('admin_analyze/key_statics') ? 'true' : 'false' }}" 
               aria-controls="collapseEmiten">
                <i class="bi bi-folder"></i> Emiten
            </a>
            <div class="collapse {{ Request::is('admin_analyze/key_ratio_list') || Request::is('admin_analyze/key_statics') ? 'show' : '' }} ps-3" id="collapseEmiten">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="{{ url('/admin_analyze/key_ratio_list') }}" class="text-decoration-none {{ Request::is('admin_analyze/key_ratio_list') ? 'active' : 'link-light' }} rounded">Key Ratio</a></li>
                    <li><a href="{{ url('/admin_analyze/key_statics') }}" class="text-decoration-none {{ Request::is('admin_analyze/key_statics') ? 'active' : 'link-light' }} rounded">Key Statics</a></li>
                </ul>
            </div>
        </li>
        
        <!-- Settings -->
        <li>
            <a href="#" class="nav-link {{ Request::is('admin_analyze/settings') ? 'active' : 'text-white' }}">
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
