<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class KeyStatics extends Component
{
    public $company;
    public $profitData = [];
    public $priceData = [];
    public $incomeStatementData = [];

    protected $listeners = ['companyChanged'];

    public function mount($company)
    {
        $this->company = $company;
        $this->updateData($company);
    }

    public function companyChanged($companyData)
    {
        $this->updateData($companyData);
        $this->dispatchBrowserEvent('update-chart', ['incomeStatementData' => $this->incomeStatementData]);
    }

    private function updateData($companyData)
    {
        $this->profitData = [
            ['quarter' => 'Quartal 4', 'value' => floatval(str_replace([' B', 'B'], '', $companyData['revenueData']['revenue']['Q4']['2024']))],
            ['quarter' => 'Quartal 3', 'value' => floatval(str_replace([' B', 'B'], '', $companyData['revenueData']['revenue']['Q3']['2024']))],
            ['quarter' => 'Quartal 2', 'value' => floatval(str_replace([' B', 'B'], '', $companyData['revenueData']['revenue']['Q2']['2024']))],
            ['quarter' => 'Quartal 1', 'value' => floatval(str_replace([' B', 'B'], '', $companyData['revenueData']['revenue']['Q1']['2024']))],
        ];

        $this->priceData = [
            ['quarter' => 'Quartal 4', 'value' => floatval(str_replace([' B', 'B'], '', $companyData['price']))],
            ['quarter' => 'Quartal 3', 'value' => floatval(str_replace([' B', 'B'], '', $companyData['price']))],
            ['quarter' => 'Quartal 2', 'value' => floatval(str_replace([' B', 'B'], '', $companyData['price']))],
            ['quarter' => 'Quartal 1', 'value' => floatval(str_replace([' B', 'B'], '', $companyData['price']))],
        ];

        $this->incomeStatementData = [
            'categories' => array_keys($companyData['revenueData']['revenue']),
            'series' => [
                [
                    'name' => 'Revenue',
                    'data' => array_values(array_map(function ($val) {
                        $value = floatval(str_replace([' B', 'B'], '', $val['2024']));
                        return is_nan($value) ? null : $value;
                    }, $companyData['revenueData']['revenue']))
                ],
                [
                    'name' => 'Gross Profit',
                    'data' => array_values(array_map(function ($val) {
                        $value = floatval(str_replace([' B', 'B'], '', $val['2024']));
                        return is_nan($value) ? null : $value;
                    }, $companyData['revenueData']['grossProfit']))
                ],
                [
                    'name' => 'Net Profit',
                    'data' => array_values(array_map(function ($val) {
                        $value = floatval(str_replace([' B', 'B'], '', $val['2024']));
                        return is_nan($value) ? null : $value;
                    }, $companyData['revenueData']['netProfit']))
                ],
            ],
        ];
    }

    public function render()
    {
        return view('livewire.dashboard.key-statics', [
            'incomeStatementData' => $this->incomeStatementData,
        ]);
    }
}