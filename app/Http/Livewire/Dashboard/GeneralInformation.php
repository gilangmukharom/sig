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
        // Periksa jika $company adalah array
        if (is_array($company)) {
            // Mengambil kembali data perusahaan dari database dengan ID yang diterima
            $company = Company::with(['revenues', 'financialPositions', 'dividends', 'profitabilityRatios', 'relativeRatios', 'liquidityRatios'])->findOrFail($company['id']);
        }

        $this->company = $company;

        // Mengisi data dari relasi yang sudah dimuat di model Company
        $this->revenueData = $company->revenues->map(function ($revenue) {
            return [
                'year' => $revenue->year,
                'quarter' => $revenue->quarter,
                'revenue' => $revenue->revenue,
            ];
        })->toArray();

        $this->grossProfitData = $company->revenues->map(function ($revenue) {
                return [
                    'year' => $revenue->year,
                    'quarter' => $revenue->quarter,
                    'gross_profit' => $revenue->gross_profit,
                ];
            })->toArray();

        $this->netProfitData = $company->revenues->map(function ($revenue) {
            return [
                'year' => $revenue->year,
                'quarter' => $revenue->quarter,
                'net_profit' => $revenue->net_profit,
            ];
        })->toArray();

        $this->financialPositionData = $company->financialPositions->map(function ($position) {
            return [
                'year' => $position->year,
                'quarter' => $position->quarter,
                'asset' => $position->asset,
                'liability' => $position->liability,
                'equity' => $position->equity,
            ];
        })->toArray();

        $this->dividendData = $company->dividends->map(function ($dividend) {
                return [
                    'year' => $dividend->year,
                    'quarter' => $dividend->quarter,
                    'dividend_per_sheet' => $dividend->dividend_per_sheet,
                    'yield' => $dividend->yield,
                ];
            })->toArray();

        $this->profitabilityRatioData = $company->profitabilityRatios->map(function ($ratio) {
            return [
                'year' => $ratio->year,
                'quarter' => $ratio->quarter,
                'ROE' => $ratio->ROE,
                'GPM' => $ratio->GPM,
                'NPM' => $ratio->NPM,
            ];
        })->toArray();

        $this->relativeRatioData = $company->relativeRatios->map(function ($ratio) {
            return [
                'year' => $ratio->year,
                'quarter' => $ratio->quarter,
                'EPS' => $ratio->EPS,
                'PER' => $ratio->PER,
                'BVPS' => $ratio->BVPS,
                'PBV' => $ratio->PBV,
            ];
        })->toArray();

        $this->liquidityRatioData = $company->liquidityRatios->map(function ($ratio) {
            return [
                'year' => $ratio->year,
                'quarter' => $ratio->quarter,
                'DAR' => $ratio->DAR,
                'DER' => $ratio->DER,
            ];
        })->toArray();
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
        ]);
    }
}