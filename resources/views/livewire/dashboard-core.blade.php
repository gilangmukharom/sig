<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-group">
            <label for="companySelect">Select Company</label>
            <select id="companySelect" class="form-control" wire:model="selectedCompany">
                @foreach ($companies as $company)
                    <option value="{{ $company->ticker }}">{{ $company->ticker }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-outline-secondary">Download</button>
    </div>

    <hr class="mt-3">

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ $activeTab === 'general-information' ? 'active' : '' }}" href="#"
               wire:click.prevent="setActiveTab('general-information')">General Information</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab === 'key-statics' ? 'active' : '' }}" href="#"
               wire:click.prevent="setActiveTab('key-statics')">Key Statistics</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab === 'key-ratio' ? 'active' : '' }}" href="#"
               wire:click.prevent="setActiveTab('key-ratio')">Key Ratio</a>
        </li>
    </ul>

    <div class="mt-4">
        @if ($activeTab === 'general-information')
            <livewire:dashboard.general-information :company="$companyData" />
        @elseif ($activeTab === 'key-statics')
            <livewire:dashboard.key-statics 
                :company="$companyData"
                :incomeStatementData="$incomeStatementData"
                :financialPositionData="$financialPositionData"
                :dividendData="$dividendData"
                :profitData="$profitData"
                :priceData="$priceData" />
        @elseif ($activeTab === 'key-ratio')
            <livewire:dashboard.key-ratio 
                :company="$companyData"
                :incomeStatementData="$incomeStatementData"
                :financialPositionData="$financialPositionData"
                :dividendData="$dividendData"
                :profitData="$profitData"
                :priceData="$priceData" />
        @endif
    </div>
</div>
