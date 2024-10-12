<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\DividendData;
use App\Models\FinancialPositionData;
use App\Models\LiquidityRatioData;
use App\Models\ProfitabilityRatioData;
use App\Models\RelativeRatioData;
use App\Models\RevenueData;
use App\Models\UserAnalyze;
use Illuminate\Http\Request;

class AnalyzeDashboardController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $totalEmiten = Company::count();
        $totalUser = UserAnalyze::count();
        return view('admin_analyze.emiten.dashboard', compact('companies', 'totalEmiten', 'totalUser'));
    }

    public function key_ratio_list()
    {
        $companies = Company::all();
        $totalEmiten = Company::count();
        return view('admin_analyze.emiten.index_keyRatio', compact('companies', 'totalEmiten'));
    }

    public function create()
    {
        return view('admin_analyze.emiten.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ticker' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'address' => 'required',
            'market_cap' => 'required|string|max:50',
            'price' => 'required|string|max:50',
            'growth' => 'required|string|max:10',
        ]);

        Company::create($request->all());
        return redirect()->route('admin_analyze.emiten.dashboard')->with('success', 'Company created successfully.');
    }

    public function show($id)
    {
        $company = Company::with([
            'revenues',
            'financialPositions',
            'dividends',
            'profitabilityRatios',
            'relativeRatios',
            'liquidityRatios'
        ])->find($id);

        return view('admin_analyze.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin_analyze.emiten.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ticker' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'address' => 'required',
            'market_cap' => 'required|string|max:50',
            'price' => 'required|string|max:50',
            'growth' => 'required|string|max:10',
        ]);

        $company = Company::find($id);
        $company->update($request->all());

        return redirect()->route('admin_analyze.emiten.dashboard')->with('success', 'Company updated successfully.');
    }

    public function destroy($id)
    {
        Company::destroy($id);
        return redirect()->route('admin_analyze.emiten.dashboard')->with('success', 'Company deleted successfully.');
    }

    public function edit_key_ratio($companyId, Request $request)
    {
        // Temukan perusahaan dan hubungannya
        $company = Company::with([
            'revenues',
            'financialPositions',
            'dividends',
            'profitabilityRatios',
            'relativeRatios',
            'liquidityRatios'
        ])->find($companyId);

        // Jika company tidak ditemukan, redirect dengan error message
        if (!$company) {
            return redirect()->route('admin_analyze.emiten.dashboard')->with('error', 'Company not found.');
        }

        // Ambil data semua tahun dari revenue
        $allYears = RevenueData::where('company_id', $companyId)
            ->select('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->toArray();

        // Jika tidak ada filter, tampilkan 3 tahun terbaru
        $years = $request->input('filter_years', array_slice($allYears, 0, 3));

        // Tentukan quarters (Q1, Q2, Q3, Q4)
        $quarters = ['Q1', 'Q2', 'Q3', 'Q4'];

        $revenueData = [];
        foreach ($quarters as $quarter) {
            foreach ($years as $year) {
                $revenue = RevenueData::where('company_id', $companyId)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();

                $revenueData[$quarter][$year] = [
                    'revenue' => $revenue ? $revenue->revenue : '-',
                    'gross_profit' => $revenue ? $revenue->gross_profit : '-',
                    'net_profit' => $revenue ? $revenue->net_profit : '-',
                ];
            }
        }

        // Ambil financial position data
        $financialPositionData = [];
        foreach ($quarters as $quarter) {
            foreach ($years as $year) {
                $financialPosition = FinancialPositionData::where('company_id', $companyId)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();
                $financialPositionData[$quarter]['asset'][$year] = $financialPosition ? $financialPosition->asset : '-';
                $financialPositionData[$quarter]['liability'][$year] = $financialPosition ? $financialPosition->liability : '-';
            }
        }

        // Ambil dividend data
        $dividendData = [];
        foreach ($quarters as $quarter) {
            foreach ($years as $year) {
                $dividend = DividendData::where('company_id', $companyId)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();
                $dividendData[$quarter][$year] = $dividend ? $dividend->dividend_per_sheet : '-';
            }
        }

        // Ambil profitability ratio data
        $profitabilityRatioData = [];
        foreach ($quarters as $quarter) {
            foreach ($years as $year) {
                $profitabilityRatio = ProfitabilityRatioData::where('company_id', $companyId)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();
                $profitabilityRatioData[$quarter]['ROE'][$year] = $profitabilityRatio ? $profitabilityRatio->ROE : '-';
            }
        }

        // Ambil relative ratio data
        $relativeRatioData = [];
        foreach ($quarters as $quarter) {
            foreach ($years as $year) {
                $relativeRatio = RelativeRatioData::where('company_id', $companyId)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();
                $relativeRatioData[$quarter]['EPS'][$year] = $relativeRatio ? $relativeRatio->EPS : '-';
            }
        }

        // Ambil liquidity ratio data
        $liquidityRatioData = [];
        foreach ($quarters as $quarter) {
            foreach ($years as $year) {
                $liquidityRatio = LiquidityRatioData::where('company_id', $companyId)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();
                $liquidityRatioData[$quarter]['DAR'][$year] = $liquidityRatio ? $liquidityRatio->DAR : '-';
            }
        }

        // Kirim semua data ke view
        return view('admin_analyze.emiten.key_ratio', compact(
            'company',
            'years',
            'quarters',
            'revenueData',
            'financialPositionData',
            'dividendData',
            'profitabilityRatioData',
            'relativeRatioData',
            'liquidityRatioData',
            'allYears'
        ));
    }

    public function update_key_ratio(Request $request, $companyId)
    {
        // Validasi input, pastikan semua field yang diharapkan terisi
        $request->validate([
            'revenues.*.*' => 'numeric|string',
            'gross_profits.*.*' => 'numeric|string',
            'net_profits.*.*' => 'numeric|string',
            'financial_positions.asset.*.*' => 'nullable|string',
            'financial_positions.liability.*.*' => 'nullable|string',
            'dividends.*.*' => 'nullable|string',
            'profitability_ratios.ROE.*.*' => 'nullable|string',
            'relative_ratios.EPS.*.*' => 'nullable|string',
            'liquidity_ratios.DAR.*.*' => 'nullable|string',
        ]);

        // Update Revenue Data
        foreach ($request->input('revenues', []) as $year => $quarters) {
            foreach ($quarters as $quarter => $revenue) {
                $revenueData = RevenueData::where('company_id', $companyId)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();

                if ($revenueData) {
                    $revenueData->update([
                        'revenue' => $revenue,
                        'gross_profit' => $request->input("gross_profits.$year.$quarter"),
                        'net_profit' => $request->input("net_profits.$year.$quarter"),
                    ]);
                }
            }
        }

        // Update Financial Position Data (Assets and Liabilities)
        foreach ($request->input('financial_positions.asset', []) as $year => $quarters) {
            foreach ($quarters as $quarter => $asset) {
                $financialPositionData = FinancialPositionData::where('company_id', $companyId)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();

                if ($financialPositionData) {
                    $financialPositionData->update([
                        'asset' => $asset,
                        'liability' => $request->input("financial_positions.liability.$year.$quarter"),
                    ]);
                }
            }
        }

        // Update Dividend Data
        foreach ($request->input('dividends', []) as $year => $quarters) {
            foreach ($quarters as $quarter => $dividend) {
                $dividendData = DividendData::where('company_id', $companyId)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();

                if ($dividendData) {
                    $dividendData->update([
                        'dividend_per_sheet' => $dividend,
                    ]);
                }
            }
        }

        // Update Profitability Ratios (ROE)
        foreach ($request->input('profitability_ratios.ROE', []) as $year => $quarters) {
            foreach ($quarters as $quarter => $ROE) {
                $profitabilityRatioData = ProfitabilityRatioData::where('company_id', $companyId)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();

                if ($profitabilityRatioData) {
                    $profitabilityRatioData->update([
                        'ROE' => $ROE,
                    ]);
                }
            }
        }

        // Update Relative Ratios (EPS)
        foreach ($request->input('relative_ratios.EPS', []) as $year => $quarters) {
            foreach ($quarters as $quarter => $EPS) {
                $relativeRatioData = RelativeRatioData::where('company_id', $companyId)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();

                if ($relativeRatioData) {
                    $relativeRatioData->update([
                        'EPS' => $EPS,
                    ]);
                }
            }
        }

        // Update Liquidity Ratios (DAR)
        foreach ($request->input('liquidity_ratios.DAR', []) as $year => $quarters) {
            foreach ($quarters as $quarter => $DAR) {
                $liquidityRatioData = LiquidityRatioData::where('company_id', $companyId)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();

                if ($liquidityRatioData) {
                    $liquidityRatioData->update([
                        'DAR' => $DAR,
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Key Ratios updated successfully.');
    }

    public function createRevenue($companyId)
    {
        $company = Company::find($companyId);
        return view('admin_analyze.emiten.revenue.create', compact('company'));
    }

    public function storeRevenue(Request $request, $companyId)
    {
        $request->validate([
            'year' => 'required|integer',
            'quarter' => 'required|string',
            'revenue' => 'required|string',
            'gross_profit' => 'required|string',
            'net_profit' => 'required|string',
        ]);

        $company = Company::find($companyId);
        $company->revenues()->create($request->all());

        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Revenue data added successfully.');
    }

    public function editRevenue($companyId, $id)
    {
        $company = Company::find($companyId);
        $revenue = RevenueData::find($id);
        return view('admin_analyze.emiten.revenue.edit', compact('company', 'revenue'));
    }

    public function updateRevenue(Request $request, $companyId, $id)
    {
        $request->validate([
            'year' => 'required|integer',
            'quarter' => 'required|string',
            'revenue' => 'required|string',
            'gross_profit' => 'required|string',
            'net_profit' => 'required|string',
        ]);

        $revenue = RevenueData::find($id);
        $revenue->update($request->all());

        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Revenue data updated successfully.');
    }

    public function destroyRevenue($companyId, $id)
    {
        RevenueData::destroy($id);
        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Revenue data deleted successfully.');
    }

    public function createFinancialPosition($companyId)
    {
        $company = Company::find($companyId);
        return view('admin_analyze.emiten.financial_position.create', compact('company'));
    }

    public function storeFinancialPosition(Request $request, $companyId)
    {
        $request->validate([
            'year' => 'required|integer',
            'quarter' => 'required|string',
            'asset' => 'required|string',
            'liability' => 'required|string',
            'equity' => 'required|string',
        ]);

        $company = Company::find($companyId);
        $company->financialPositions()->create($request->all());

        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Financial Position data added successfully.');
    }

    public function editFinancialPosition($companyId, $id)
    {
        $company = Company::find($companyId);
        $financialPosition = FinancialPositionData::find($id);
        return view('admin_analyze.emiten.financial_position.edit', compact('company', 'financialPosition'));
    }

    public function updateFinancialPosition(Request $request, $companyId, $id)
    {
        $request->validate([
            'year' => 'required|integer',
            'quarter' => 'required|string',
            'asset' => 'required|string',
            'liability' => 'required|string',
            'equity' => 'required|string',
        ]);

        $financialPosition = FinancialPositionData::find($id);
        $financialPosition->update($request->all());

        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Financial Position data updated successfully.');
    }

    public function destroyFinancialPosition($companyId, $id)
    {
        FinancialPositionData::destroy($id);
        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Financial Position data deleted successfully.');
    }

    public function createDividend($companyId)
    {
        $company = Company::find($companyId);
        return view('admin_analyze.emiten.dividend.create', compact('company'));
    }

    public function storeDividend(Request $request, $companyId)
    {
        $request->validate([
            'year' => 'required|integer',
            'quarter' => 'required|string',
            'dividend_per_sheet' => 'required|string',
            'yield' => 'required|string',
        ]);

        $company = Company::find($companyId);
        $company->dividends()->create($request->all());

        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Dividend data added successfully.');
    }

    public function editDividend($companyId, $id)
    {
        $company = Company::find($companyId);
        $dividend = DividendData::find($id);
        return view('admin_analyze.emiten.dividend.edit', compact('company', 'dividend'));
    }

    public function updateDividend(Request $request, $companyId, $id)
    {
        $request->validate([
            'year' => 'required|integer',
            'quarter' => 'required|string',
            'dividend_per_sheet' => 'required|string',
            'yield' => 'required|string',
        ]);

        $dividend = DividendData::find($id);
        $dividend->update($request->all());

        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Dividend data updated successfully.');
    }

    public function destroyDividend($companyId, $id)
    {
        DividendData::destroy($id);
        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Dividend data deleted successfully.');
    }

    public function createProfitabilityRatio($companyId)
    {
        $company = Company::find($companyId);
        return view('admin_analyze.emiten.profitability_ratio.create', compact('company'));
    }

    public function storeProfitabilityRatio(Request $request, $companyId)
    {
        $request->validate([
            'year' => 'required|integer',
            'quarter' => 'required|string',
            'ROE' => 'required|string',
            'GPM' => 'required|string',
            'NPM' => 'required|string',
        ]);

        $company = Company::find($companyId);
        $company->profitabilityRatios()->create($request->all());

        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Profitability Ratio data added successfully.');
    }

    public function editProfitabilityRatio($companyId, $id)
    {
        $company = Company::find($companyId);
        $profitabilityRatio = ProfitabilityRatioData::find($id);
        return view('admin_analyze.emiten.profitability_ratio.edit', compact('company', 'profitabilityRatio'));
    }

    public function updateProfitabilityRatio(Request $request, $companyId, $id)
    {
        $request->validate([
            'year' => 'required|integer',
            'quarter' => 'required|string',
            'ROE' => 'required|string',
            'GPM' => 'required|string',
            'NPM' => 'required|string',
        ]);

        $profitabilityRatio = ProfitabilityRatioData::find($id);
        $profitabilityRatio->update($request->all());

        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Profitability Ratio data updated successfully.');
    }

    public function destroyProfitabilityRatio($companyId, $id)
    {
        ProfitabilityRatioData::destroy($id);
        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Profitability Ratio data deleted successfully.');
    }

    public function createRelativeRatio($companyId)
    {
        $company = Company::find($companyId);
        return view('admin_analyze.emiten.relative_ratio.create', compact('company'));
    }

    public function storeRelativeRatio(Request $request, $companyId)
    {
        $request->validate([
            'year' => 'required|integer',
            'quarter' => 'required|string',
            'EPS' => 'required|string',
            'PER' => 'required|string',
            'BVPS' => 'required|string',
            'PBV' => 'required|string',
        ]);

        $company = Company::find($companyId);
        $company->relativeRatios()->create($request->all());

        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Relative Ratio data added successfully.');
    }

    public function editRelativeRatio($companyId, $id)
    {
        $company = Company::find($companyId);
        $relativeRatio = RelativeRatioData::find($id);
        return view('admin_analyze.emiten.relative_ratio.edit', compact('company', 'relativeRatio'));
    }

    public function updateRelativeRatio(Request $request, $companyId, $id)
    {
        $request->validate([
            'year' => 'required|integer',
            'quarter' => 'required|string',
            'EPS' => 'required|string',
            'PER' => 'required|string',
            'BVPS' => 'required|string',
            'PBV' => 'required|string',
        ]);

        $relativeRatio = RelativeRatioData::find($id);
        $relativeRatio->update($request->all());

        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Relative Ratio data updated successfully.');
    }

    public function destroyRelativeRatio($companyId, $id)
    {
        RelativeRatioData::destroy($id);
        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Relative Ratio data deleted successfully.');
    }

    public function createLiquidityRatio($companyId)
    {
        $company = Company::find($companyId);
        return view('admin_analyze.emiten.liquidity_ratio.create', compact('company'));
    }

    public function storeLiquidityRatio(Request $request, $companyId)
    {
        $request->validate([
            'year' => 'required|integer',
            'quarter' => 'required|string',
            'DAR' => 'required|string',
            'DER' => 'required|string',
        ]);

        $company = Company::find($companyId);
        $company->liquidityRatios()->create($request->all());

        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Liquidity Ratio data added successfully.');
    }

    public function editLiquidityRatio($companyId, $id)
    {
        $company = Company::find($companyId);
        $liquidityRatio = LiquidityRatioData::find($id);
        return view('admin_analyze.emiten.liquidity_ratio.edit', compact('company', 'liquidityRatio'));
    }

    public function updateLiquidityRatio(Request $request, $companyId, $id)
    {
        $request->validate([
            'year' => 'required|integer',
            'quarter' => 'required|string',
            'DAR' => 'required|string',
            'DER' => 'required|string',
        ]);

        $liquidityRatio = LiquidityRatioData::find($id);
        $liquidityRatio->update($request->all());

        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Liquidity Ratio data updated successfully.');
    }

    public function destroyLiquidityRatio($companyId, $id)
    {
        LiquidityRatioData::destroy($id);
        return redirect()->route('admin_analyze.show', $companyId)->with('success', 'Liquidity Ratio data deleted successfully.');
    }

    public function showUsers()
    {
        $users = UserAnalyze::all();
        $totalEmiten = Company::count();
        $totalUser = UserAnalyze::count();
        return view('admin_analyze.user.index', compact('users', 'totalEmiten', 'totalUser'));
    }
}