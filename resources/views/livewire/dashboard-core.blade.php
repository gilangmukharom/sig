<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-group">
            <label for="companySelect">Select Company</label>
            <select id="companySelect" class="form-control" wire:model="selectedCompany">
                @foreach ($companies as $code => $company)
                    <option value="{{ $code }}">{{ $company['name'] }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-outline-secondary">Download</button>
    </div>

    <hr class="mt-3">

    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-item-nav {{ $activeTab === 'general-information' ? 'active' : '' }}" href="#"
                wire:click.prevent="setActiveTab('general-information')">General Information</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-item-nav {{ $activeTab === 'key-statics' ? 'active' : '' }}" href="#"
                wire:click.prevent="setActiveTab('key-statics')">Key Statistics</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-item-nav {{ $activeTab === 'key-ratio' ? 'active' : '' }}" href="#"
                wire:click.prevent="setActiveTab('key-ratio')">Key Ratio</a>
        </li>
    </ul>

    <div class="mt-4">
        @if ($activeTab === 'general-information')
            <livewire:dashboard.general-information :company="$companies[$selectedCompany]" />
        @elseif ($activeTab === 'key-statics')
            <livewire:dashboard.key-statics :company="$companies[$selectedCompany]" :incomeStatementData="$incomeStatementData" />
        @elseif ($activeTab === 'key-ratio')
            <livewire:dashboard.key-ratio :company="$companies[$selectedCompany]" />
        @endif
    </div>
</div>