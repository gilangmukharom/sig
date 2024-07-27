<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class GeneralInformation extends Component
{
    public $company;

    protected $listeners = ['companyChanged' => 'updateCompany'];

    public function mount($company)
    {
        $this->company = $company;
    }

    public function updateCompany($company)
    {
        $this->company = $company;
    }

    public function render()
    {
        return view('livewire.dashboard.general-information');
    }
}
