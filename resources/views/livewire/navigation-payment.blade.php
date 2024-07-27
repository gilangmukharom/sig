<div>
    <ul class="navbar-nav d-flex flex-row gap-5">
        <li class="nav-item">
            <a class="nav-link {{ $activeLink === 'pack' ? 'active' : '' }}" href="#" wire:click.prevent="setActiveLink('pack')">Pack</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeLink === 'emiten' ? 'active' : '' }}" href="#" wire:click.prevent="setActiveLink('emiten')">Emiten</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeLink === 'paymentDetail' ? 'active' : '' }}" href="#" wire:click.prevent="setActiveLink('paymentDetail')">Payment Detail</a>
        </li>
    </ul>

    <div class="mt-4">
        @if ($activeLink === 'pack')
            @include('livewire.sections.pack')
        @elseif ($activeLink === 'emiten')
            <livewire:emiten-stock />
        @elseif ($activeLink === 'paymentDetail' && $selectedEmiten)
            <livewire:payment-detail :selectedEmiten="$selectedEmiten" />
        @endif
    </div>
</div>
