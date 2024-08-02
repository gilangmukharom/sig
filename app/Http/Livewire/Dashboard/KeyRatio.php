<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class KeyRatio extends Component
{
    public $profitData = [];
    public $priceData = [];
    public $incomeStatementData = [];
    public $financialPositionData = [];
    public $dividendData = [];

    protected $listeners = ['companyChanged'];

    public function companyChanged($companyData)
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
                    'data' => array_map(function ($val) {
                        return floatval(str_replace(' B', '', $val['2024']));
                    }, $companyData['revenueData']['revenue']),
                ],
                [
                    'name' => 'Gross Profit',
                    'data' => array_map(function ($val) {
                        return floatval(str_replace(' B', '', $val['2024']));
                    }, $companyData['revenueData']['grossProfit']),
                ],
                [
                    'name' => 'Net Profit',
                    'data' => array_map(function ($val) {
                        return floatval(str_replace(' B', '', $val['2024']));
                    }, $companyData['revenueData']['netProfit']),
                ],
            ],
        ];

        $this->financialPositionData = [
            'categories' => array_keys($companyData['financialPositionData']['asset']),
            'series' => [
                [
                    'name' => 'Asset',
                    'data' => array_map(function ($val) {
                        return floatval(str_replace(' B', '', $val['2024']));
                    }, $companyData['financialPositionData']['asset']),
                ],
                [
                    'name' => 'Liability',
                    'data' => array_map(function ($val) {
                        return floatval(str_replace(' B', '', $val['2024']));
                    }, $companyData['financialPositionData']['liability']),
                ],
                [
                    'name' => 'Equity',
                    'data' => array_map(function ($val) {
                        return floatval(str_replace(' B', '', $val['2024']));
                    }, $companyData['financialPositionData']['equity']),
                ],
            ],
        ];

        $this->dividendData = [
            'categories' => array_keys($companyData['dividendData']['dividendPerSheet']),
            'series' => [
                [
                    'name' => 'Dividend Per Sheet',
                    'data' => array_map(function ($val) {
                        return floatval(str_replace(' B', '', $val['2024']));
                    }, $companyData['dividendData']['dividendPerSheet']),
                ],
                [
                    'name' => 'Yield',
                    'data' => array_map(function ($val) {
                        return floatval(str_replace(' B', '', $val['2024']));
                    }, $companyData['dividendData']['yield']),
                ],
            ],
        ];

        $this->dispatchBrowserEvent('update-chart', [
            'incomeStatementData' => $this->incomeStatementData,
            'financialPositionData' => $this->financialPositionData,
            'dividendData' => $this->dividendData,
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.key-ratio');
    }
}