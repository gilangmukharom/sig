<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Company;
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
    public $years = [];

    protected $listeners = ['companyChanged' => 'updateCompany'];

    public function mount($company)
    {
        if (is_array($company)) {
            $this->company = Company::with(['revenues', 'financialPositions', 'dividends', 'profitabilityRatios', 'relativeRatios', 'liquidityRatios'])->findOrFail($company['id']);
        } else {
            $this->company = $company;
        }

        $this->updateCompany($this->company);
    }

    public function updateCompany($company)
    {
        if (is_array($company)) {
            $company = Company::with(['revenues', 'financialPositions', 'dividends', 'profitabilityRatios', 'relativeRatios', 'liquidityRatios'])->findOrFail($company['id']);
        }
    
        $this->company = $company;

        $currentYear = now()->year;
        $threeYearsAgo = $currentYear - 2;

        // Mengambil tahun-tahun yang tersedia secara dinamis
        $years = $company->dividends
            ->where('year', '>=', $threeYearsAgo)
            ->pluck('year')
            ->unique()
            ->sortDesc()
            ->values()
            ->all();

        $this->years = $years;

        $this->revenueData = $company->revenues
            ->where('year', '>=', $threeYearsAgo)
            ->groupBy('quarter')
            ->map(function ($revenues) use ($years) {
                return $revenues->pluck('revenue', 'year')->only($years);
            });

        $this->grossProfitData = $company->revenues
            ->where('year', '>=', $threeYearsAgo)
            ->groupBy('quarter')
            ->map(function ($revenues) use ($years) {
                return $revenues->pluck('gross_profit', 'year')->only($years);
            });

        $this->netProfitData = $company->revenues
            ->where('year', '>=', $threeYearsAgo)
            ->groupBy('quarter')
            ->map(function ($revenues) use ($years) {
                return $revenues->pluck('net_profit', 'year')->only($years);
            });

        $this->financialPositionData = $company->financialPositions
            ->where('year', '>=', $threeYearsAgo)
            ->groupBy('quarter')
            ->map(function ($positions) use ($years) {
                return [
                'asset' => $positions->pluck('asset', 'year')->only($years),
                'liability' => $positions->pluck('liability', 'year')->only($years),
                'equity' => $positions->pluck('equity', 'year')->only($years),
            ];
            });

        $this->dividendData = $company->dividends
            ->where('year', '>=', $threeYearsAgo)
            ->groupBy('quarter')
            ->map(function ($dividends) use ($years) {
                return $dividends->pluck('dividend_per_sheet', 'year')->only($years);
            });

        $this->profitabilityRatioData = $company->profitabilityRatios
            ->where('year', '>=', $threeYearsAgo)
            ->groupBy('quarter')
            ->map(function ($ratios) use ($years) {
                return [
                'ROE' => $ratios->pluck('ROE', 'year')->only($years),
                'GPM' => $ratios->pluck('GPM', 'year')->only($years),
                'NPM' => $ratios->pluck('NPM', 'year')->only($years),
            ];
            });

        $this->relativeRatioData = $company->relativeRatios
            ->where('year', '>=', $threeYearsAgo)
            ->groupBy('quarter')
            ->map(function ($ratios) use ($years) {
                return [
                'EPS' => $ratios->pluck('EPS', 'year')->only($years),
                'PER' => $ratios->pluck('PER', 'year')->only($years),
                'BVPS' => $ratios->pluck('BVPS', 'year')->only($years),
                'PBV' => $ratios->pluck('PBV', 'year')->only($years),
            ];
            });

        $this->liquidityRatioData = $company->liquidityRatios
            ->where('year', '>=', $threeYearsAgo)
            ->groupBy('quarter')
            ->map(function ($ratios) use ($years) {
                return [
                'DAR' => $ratios->pluck('DAR', 'year')->only($years),
                'DER' => $ratios->pluck('DER', 'year')->only($years),
            ];
        });
    }    
    
    public function render()
    {
        return view('livewire.dashboard.general-information', [
            'company' => $this->company,
            'revenueData' => $this->revenueData,
            'grossProfitData' => $this->grossProfitData,
            'netProfitData' => $this->netProfitData,
            'financialPositionData' => $this->financialPositionData,
            'dividendData' => $this->dividendData,
            'profitabilityRatioData' => $this->profitabilityRatioData,
            'relativeRatioData' => $this->relativeRatioData,
            'liquidityRatioData' => $this->liquidityRatioData,
            'years' => $this->years,
        ]);
    }
}