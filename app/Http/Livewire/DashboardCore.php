<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DashboardCore extends Component
{
    public $activeTab = 'general-information';
    public $selectedCompany = 'ASII';

    public $companies = [
        'ASII' => [
            'name' => 'Astra International Indonesia Tbk',
            'address' => 'Menara Astra, 59th Floor, Jl. Jend. Sudirman Kav. 5-6 Central Jakarta, DKI Jakarta',
            'marketCap' => '173,67 T IDR',
            'price' => '90.8B',
            'growth' => '82.08%'
        ],
        'ADRO' => [
            'name' => 'Adaro',
            'address' => 'Address Adaro',
            'marketCap' => 'asdasd',
            'price' => '90.8B',
            'growth' => '82.08%'
        ],
        // Add more companies here
    ];

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function updatedSelectedCompany()
    {
        $this->emit('companyChanged', $this->companies[$this->selectedCompany]);
    }

    public function render()
    {
        return view('livewire.dashboard-core', [
            'company' => $this->companies[$this->selectedCompany]
        ]);
    }
}
