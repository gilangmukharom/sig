<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;

class DashboardCore extends Component
{
    public $activeTab = 'general-information';
    public $selectedCompany = 'ASII';
    public $incomeStatementData = [];
    public $financialPositionData = [];
    public $dividendData = [];
    public $profitData = [];
    public $priceData = [];

    public function mount()
    {
        $this->loadCompanyData();
    }

    public function updatedSelectedCompany()
    {
        $this->loadCompanyData();
    }

    public function loadCompanyData()
    {
        // Ambil data perusahaan berdasarkan ticker yang dipilih
        $company = Company::with([
            'revenues',
            'financialPositions',
            'dividends'
        ])->where('ticker', $this->selectedCompany)->firstOrFail();

        // Inisialisasi data income statement
        $this->incomeStatementData = [
            'categories' => $company->revenues->pluck('quarter')->toArray(),
            'series' => [
                ['name' => 'Revenue', 'data' => $company->revenues->pluck('revenue')->toArray()],
                ['name' => 'Gross Profit', 'data' => $company->revenues->pluck('gross_profit')->toArray()],
                ['name' => 'Net Profit', 'data' => $company->revenues->pluck('net_profit')->toArray()],
            ],
        ];

        // Inisialisasi data financial position
        $this->financialPositionData = [
            'categories' => $company->financialPositions->pluck('quarter')->toArray(),
            'series' => [
                ['name' => 'Asset', 'data' => $company->financialPositions->pluck('asset')->toArray()],
                ['name' => 'Liability', 'data' => $company->financialPositions->pluck('liability')->toArray()],
                ['name' => 'Equality', 'data' => $company->financialPositions->pluck('equality')->toArray()],
            ],
        ];

        // Inisialisasi data dividend
        $this->dividendData = [
            'categories' => $company->dividends->pluck('quarter')->toArray(),
            'series' => [
                ['name' => 'Dividend Per Sheet',
                    'data' => $company->dividends->pluck('dividend_per_sheet')->toArray()
                ],
                ['name' => 'Yield', 'data' => $company->dividends->pluck('yield')->toArray()],
            ],
        ];

        // Inisialisasi data profit dan price
        $this->profitData = $company->revenues->map(function ($revenue) {
                return [
                    'quarter' => 'Quarter ' . $revenue->quarter,
                    'value' => floatval(str_replace([' B', 'B'], '', $revenue->net_profit)),
                ];
        })->toArray();

        $this->priceData = [
            ['quarter' => 'Quarter 4', 'value' => floatval(str_replace([' B', 'B'], '', $company->price))],
            ['quarter' => 'Quarter 3', 'value' => floatval(str_replace([' B', 'B'], '', $company->price))],
            ['quarter' => 'Quarter 2', 'value' => floatval(str_replace([' B', 'B'], '', $company->price))],
            ['quarter' => 'Quarter 1', 'value' => floatval(str_replace([' B', 'B'], '', $company->price))],
        ];

        // Emit event untuk komponen lain
        $this->emit('companyChanged', $company);
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
        if ($tab === 'key-statics' || $tab === 'key-ratio') {
            $this->loadCompanyData();
        }
    }

    public function render()
    {
        // Ambil semua perusahaan untuk ditampilkan di dropdown
        $companies = Company::all();

        return view('livewire.dashboard-core', [
            'companies' => $companies,
            'companyData' => Company::with([
                'revenues',
                'financialPositions',
                'dividends'
            ])->where('ticker', $this->selectedCompany)->firstOrFail(),
            'incomeStatementData' => $this->incomeStatementData,
            'financialPositionData' => $this->financialPositionData,
            'dividendData' => $this->dividendData,
            'profitData' => $this->profitData,
            'priceData' => $this->priceData,
        ]);
    }
}