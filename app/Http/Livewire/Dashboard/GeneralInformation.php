<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class GeneralInformation extends Component
{
    public $company;
    public $revenueData = [];
    public $grossProfitData = [];
    public $netProfitData = [];
    public $financialPositionData = [];
    public $dividendData = [];
    public $profitabilityRatioData = [];
    public $relativeRatioData = [];
    public $liquidityRatioData = [];

    protected $listeners = ['companyChanged' => 'updateCompany'];

    public function mount($company)
    {
        $this->updateCompany($company);
    }

    public function updateCompany($company)
    {
        // Assuming $company is an array with all necessary data
        $this->company = $company;

        // Setting data, replace with actual data retrieval logic
        $this->revenueData = $company['revenueData'];
        $this->grossProfitData = $company['revenueData']['grossProfit'];
        $this->netProfitData = $company['revenueData']['netProfit'];
        $this->financialPositionData = $company['financialPositionData'];
        $this->dividendData = $company['dividendData'];
        $this->profitabilityRatioData = $company['profitabilityRatioData'];
        $this->relativeRatioData = $company['relativeRatioData'];
        $this->liquidityRatioData = $company['liquidityRatioData'];
    }

    public function render()
    {
        return view('livewire.dashboard.general-information');
    }
}