@extends('layouts.bootstrap')
<div class="sidebarNav d-none d-lg-block">
    <ul class="nav flex-column gap-5">
        <li class="nav-item" style="cursor: pointer" onclick="window.location.href='{{ route('dashboard-core') }}'">
            <img src="{{ asset('assets/img/logo/sig2.png') }}" alt="Profile Image"
                class="rounded-circle border border-dark" width="40" height="40">
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard-core') }}"><i
                    class="primary-color-text bi-bar-chart-fill"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/payment"><i class="primary-color-text bi-plus-lg"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="primary-color-text bi-gear-fill"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" id="logoutLink"><i class="primary-color-text bi-box-arrow-right"></i></a>
        </li>
    </ul>
</div>

<script>
    document.getElementById('logoutLink').addEventListener('click', function(event) {
        event.preventDefault();
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('logout') }}";
            }
        });
    });
</script>
