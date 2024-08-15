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

    public function companyChanged($company)
    {
        // Jika $company merupakan array, ubah menjadi model Eloquent
        if (is_array($company)) {
            $company = \App\Models\Company::with([
                'revenues',
                'financialPositions',
                'dividends'
            ])->findOrFail($company['id']);
        }

        // Ambil data revenue per quarter
        $this->profitData = $company->revenues->map(function ($revenue) {
            return [
                'quarter' => 'Quarter ' . $revenue->quarter,
                'value' => floatval(str_replace([' B', 'B'], '', $revenue->revenue))
            ];
        })->toArray();

        // Ambil data price
        $this->priceData = [
            ['quarter' => 'Quarter 4', 'value' => floatval(str_replace([' B', 'B'], '', $company->price))],
            ['quarter' => 'Quarter 3', 'value' => floatval(str_replace([' B', 'B'], '', $company->price))],
            ['quarter' => 'Quarter 2', 'value' => floatval(str_replace([' B', 'B'], '', $company->price))],
            ['quarter' => 'Quarter 1', 'value' => floatval(str_replace([' B', 'B'], '', $company->price))],
        ];

        // Ambil data income statement (Revenue, Gross Profit, Net Profit)
        $this->incomeStatementData = [
            'categories' => $company->revenues->pluck('quarter')->toArray(),
            'series' => [
                [
                    'name' => 'Revenue',
                    'data' => $company->revenues->pluck('revenue')->map(function ($value) {
                        return floatval(str_replace(' B', '', $value));
                    })->toArray(),
                ],
                [
                    'name' => 'Gross Profit',
                    'data' => $company->revenues->pluck('gross_profit')->map(function ($value) {
                        return floatval(str_replace(' B', '', $value));
                    })->toArray(),
                ],
                [
                    'name' => 'Net Profit',
                    'data' => $company->revenues->pluck('net_profit')->map(function ($value) {
                        return floatval(str_replace(' B', '', $value));
                    })->toArray(),
                ],
            ],
        ];

        // Ambil data financial position (Asset, Liability, Equity)
        $this->financialPositionData = [
            'categories' => $company->financialPositions->pluck('quarter')->toArray(),
            'series' => [
                [
                    'name' => 'Asset',
                    'data' => $company->financialPositions->pluck('asset')->map(function ($value) {
                        return floatval(str_replace(' B', '', $value));
                    })->toArray(),
                ],
                [
                    'name' => 'Liability',
                    'data' => $company->financialPositions->pluck('liability')->map(function ($value) {
                        return floatval(str_replace(' B', '', $value));
                    })->toArray(),
                ],
                [
                    'name' => 'Equity',
                    'data' => $company->financialPositions->pluck('equity')->map(function ($value) {
                        return floatval(str_replace(' B', '', $value));
                    })->toArray(),
                ],
            ],
        ];

        // Ambil data dividend
        $this->dividendData = [
            'categories' => $company->dividends->pluck('quarter')->toArray(),
            'series' => [
                [
                    'name' => 'Dividend Per Sheet',
                    'data' => $company->dividends->pluck('dividend_per_sheet')->map(function ($value) {
                        return floatval(str_replace(' B', '', $value));
                    })->toArray(),
                ],
                [
                    'name' => 'Yield',
                    'data' => $company->dividends->pluck('yield')->map(function ($value) {
                        return floatval(str_replace(' %', '', $value));
                    })->toArray(),
                ],
            ],
        ];

        // Dispatch event untuk update chart di frontend
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