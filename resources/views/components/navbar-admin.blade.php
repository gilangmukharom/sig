<nav class="navbar navbar-expand-lg navbar-dark primary-color">
    <div class="container-fluid">
        <!-- Bagian Kiri: Logo dan Teks -->
        <div class="d-flex align-items-center">
            <img src="{{ asset('assets/img/logo/sig-white.png') }}" alt="SIG Logo" width="70" height="30" class="me-2"> 
            <span class="text-white fw-bold">SIG Group</span>
        </div>

        <!-- Bagian Kanan: Profil User -->
        <div class="d-flex align-items-center ms-auto">
            <div class="dropdown">
                <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://via.placeholder.com/30" alt="User Avatar" class="rounded-circle me-1"> 
                    Admin
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
