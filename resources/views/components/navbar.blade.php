<nav class="navbar navbar-expand-lg bg-white d-none d-lg-flex justify-content-center">
    <div class="navbar-box d-flex flex-row justify-content-between w-90 align-items-center">
        <h2>{{ $title }}</h2>
        <div class="navbar-profile" style="cursor: pointer">
            <img src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('assets/img/profile-image-blank.png') }}"
                alt="Profile Image" class="rounded-circle border border-dark" width="40" height="40">
            <div id="profileDropdown" class="dropdown-menu position-absolute"
                style="display: none; top: 50px; right: 0;">
                <a class="dropdown-item" href="{{ route('profile-user') }}">View Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>
</nav>

<script>
    document.querySelector('.navbar-profile').addEventListener('click', function(event) {
        event.stopPropagation();
        let dropdown = document.getElementById('profileDropdown');
        dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
    });

    document.addEventListener('click', function(event) {
        let dropdown = document.getElementById('profileDropdown');
        if (!document.querySelector('.navbar-profile').contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });
</script>
