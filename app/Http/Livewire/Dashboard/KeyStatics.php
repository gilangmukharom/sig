<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class KeyStatics extends Component
{
    public $profitData = [];
    public $priceData = [];
    public $incomeStatementData = [];
    public $financialPositionData = [];
    public $dividendData = [];
    public $account = 'All';
    public $timeframe = '3 Years'; // Default timeframe

    protected $listeners = ['companyChanged'];

    public function updatedAccount()
    {
        // Menggunakan data perusahaan terakhir yang tersedia
        $company = \App\Models\Company::with(['revenues', 'financialPositions', 'dividends'])->first();

        // Panggil companyChanged untuk memperbarui data
        $this->companyChanged($company);
    }

    public function updatedTimeframe()
    {
        $this->updatedAccount(); // Atau panggil metode serupa untuk Timeframe
    }

    public function updatedGraphic()
    {
        $this->updatedAccount(); // Atau panggil metode serupa untuk Graphic
    }

    public function companyChanged($company)
    {
        if (is_array($company)) {
            $company = \App\Models\Company::with(['revenues', 'financialPositions', 'dividends'])
                ->findOrFail($company['id']);
        }

        $currentYear = now()->year;
        $yearsAgo = 0;

        if ($this->timeframe === '3 Years') {
            $yearsAgo = 3;
        } elseif ($this->timeframe === '5 Years') {
            $yearsAgo = 5;
        } elseif ($this->timeframe === '10 Years') {
            $yearsAgo = 10;
        }

        $startYear = $currentYear - $yearsAgo;

        // Reset data sebelum mengisi ulang sesuai filter
        $this->incomeStatementData = [];
        $this->financialPositionData = [];
        $this->dividendData = [];

        // Filter dan sorting berdasarkan tahun terbaru
        $filteredRevenues = $company->revenues
            ->sortByDesc('year')
            ->filter(function ($revenue) use ($startYear) {
                return $revenue->year >= $startYear;
            });

        $filteredFinancialPositions = $company->financialPositions
            ->sortByDesc('year')
            ->filter(function ($position) use ($startYear) {
                return $position->year >= $startYear;
            });

        $filteredDividends = $company->dividends
            ->sortByDesc('year')
            ->filter(function ($dividend) use ($startYear) {
                return $dividend->year >= $startYear;
            });

        // Kondisi untuk setiap account type dan update data untuk chart terkait
        if ($this->account === 'IncomeStatement' || $this->account === 'All') {
            $this->incomeStatementData = [
                'categories' => $filteredRevenues->pluck('quarter')->toArray(),
                'series' => [
                    [
                        'name' => 'Revenue',
                        'data' => $filteredRevenues->pluck('revenue')->map(function ($value) {
                            return floatval(str_replace(' B', '', $value));
                        })->toArray(),
                    ],
                    [
                        'name' => 'Gross Profit',
                        'data' => $filteredRevenues->pluck('gross_profit')->map(function ($value) {
                            return floatval(str_replace(' B', '', $value));
                        })->toArray(),
                    ],
                    [
                        'name' => 'Net Profit',
                        'data' => $filteredRevenues->pluck('net_profit')->map(function ($value) {
                            return floatval(str_replace(' B', '', $value));
                        })->toArray(),
                    ],
                ],
            ];
        }

        if ($this->account === 'FinancialPosition' || $this->account === 'All') {
            $this->financialPositionData = [
                'categories' => $filteredFinancialPositions->pluck('quarter')->toArray(),
                'series' => [
                    [
                        'name' => 'Asset',
                        'data' => $filteredFinancialPositions->pluck('asset')->map(function ($value) {
                            return floatval(str_replace(' B', '', $value));
                        })->toArray(),
                    ],
                    [
                        'name' => 'Liability',
                        'data' => $filteredFinancialPositions->pluck('liability')->map(function ($value) {
                            return floatval(str_replace(' B', '', $value));
                        })->toArray(),
                    ],
                    [
                        'name' => 'Equality',
                        'data' => $filteredFinancialPositions->pluck('equality')->map(function ($value) {
                            return floatval(str_replace(' B', '', $value));
                        })->toArray(),
                    ],
                ],
            ];
        }

        if ($this->account === 'Dividend' || $this->account === 'All') {
            $this->dividendData = [
                'categories' => $filteredDividends->pluck('quarter')->toArray(),
                'series' => [
                    [
                        'name' => 'Dividend Per Sheet',
                        'data' => $filteredDividends->pluck('dividend_per_sheet')->map(function ($value) {
                            return floatval(str_replace(' B', '', $value));
                        })->toArray(),
                    ],
                    [
                        'name' => 'Yield',
                        'data' => $filteredDividends->pluck('yield')->map(function ($value) {
                            return floatval(str_replace(' %', '', $value));
                        })->toArray(),
                    ],
                ],
            ];
        }

        $this->dispatchBrowserEvent('update-chart', [
            'incomeStatementData' => $this->incomeStatementData,
            'financialPositionData' => $this->financialPositionData,
            'dividendData' => $this->dividendData,
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.key-statics');
    }
}