<div class="container mt-5">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-item-nav {{ $activeTab === 'my-emitten' ? 'active' : '' }}" href="#"
                wire:click.prevent="setActiveTab('my-emitten')">My Emitten</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-item-nav {{ $activeTab === 'support' ? 'active' : '' }}" href="#"
                wire:click.prevent="setActiveTab('support')">Support</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-item-nav {{ $activeTab === 'privacy-police' ? 'active' : '' }}" href="#"
                wire:click.prevent="setActiveTab('privacy-police')">Privacy Policies</a>
        </li>
    </ul>

    <div class="mt-4">
        @if ($activeTab === 'my-emitten')
            <livewire:settings.my-emitten />
        @elseif ($activeTab === 'support')
            <livewire:settings.support />
        @elseif ($activeTab === 'privacy-police')
            <livewire:settings.privacy-police />
        @endif
    </div>
</div>
