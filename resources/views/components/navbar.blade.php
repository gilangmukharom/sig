<nav class="navbar navbar-expand-lg bg-white d-none d-lg-flex justify-content-center">
    <div class="navbar-box d-flex flex-row justify-content-between w-90 align-items-center">
        <h2>{{ $title }}</h2>
        <div class="navbar-profile" style="cursor: pointer" onclick="window.location.href='{{ route('profile-user') }}'">
            <img src="https://via.placeholder.com/150" alt="Profile Image" class="rounded-circle border border-dark" width="40" height="40">
        </div>
    </div>
</nav>
