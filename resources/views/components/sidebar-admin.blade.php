@extends('layouts.bootstrap')
<div class="d-flex flex-column flex-shrink-0 p-3 bg-success" style="width: 250px; height: 100vh;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-5">Dashboard</span>
    </a>
    <button class="btn btn-light mb-3" type="button">
        + New Item
    </button>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link text-white">
                <i class="bi bi-house-door"></i>
                Total Emiten
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="bi bi-currency-dollar"></i>
                Total Income
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="bi bi-people"></i>
                Total User
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="bi bi-cart"></i>
                Total Orders
            </a>
        </li>
        <li>
            <a class="nav-link text-white dropdown-toggle" data-bs-toggle="collapse" href="#collapseContent"
                role="button" aria-expanded="false" aria-controls="collapseContent">
                <i class="bi bi-folder"></i> Content
            </a>
            <div class="collapse ps-3" id="collapseContent">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-light rounded">Submenu 1</a></li>
                    <li><a href="#" class="link-light rounded">Submenu 2</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a class="nav-link text-white dropdown-toggle" data-bs-toggle="collapse" href="#collapseUser" role="button"
                aria-expanded="false" aria-controls="collapseUser">
                <i class="bi bi-person"></i> User
            </a>
            <div class="collapse ps-3" id="collapseUser">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-light rounded">Submenu 1</a></li>
                    <li><a href="#" class="link-light rounded">Submenu 2</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a class="nav-link text-white dropdown-toggle" data-bs-toggle="collapse" href="#collapseOrder"
                role="button" aria-expanded="false" aria-controls="collapseOrder">
                <i class="bi bi-box"></i> Order
            </a>
            <div class="collapse ps-3" id="collapseOrder">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-light rounded">Submenu 1</a></li>
                    <li><a href="#" class="link-light rounded">Submenu 2</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a class="nav-link text-white dropdown-toggle" data-bs-toggle="collapse" href="#collapsePurchase"
                role="button" aria-expanded="false" aria-controls="collapsePurchase">
                <i class="bi bi-cash"></i> Purchase
            </a>
            <div class="collapse ps-3" id="collapsePurchase">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-light rounded">Submenu 1</a></li>
                    <li><a href="#" class="link-light rounded">Submenu 2</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
