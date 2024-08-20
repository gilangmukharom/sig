<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\DividendData;
use App\Models\FinancialPositionData;
use App\Models\LiquidityRatioData;
use App\Models\ProfitabilityRatioData;
use App\Models\RelativeRatioData;
use App\Models\RevenueData;
use Illuminate\Http\Request;

class AnalyzeDashboardController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('admin_analyze.dashboard', compact('companies'));
    }

    public function create()
    {
        return view('admin_analyze.create');
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
        return redirect()->route('admin_analyze.dashboard')->with('success', 'Company created successfully.');
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
        return view('admin_analyze.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['ticker' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'address' => 'required',
            'market_cap' => 'required|string|max:50',
            'price' => 'required|string|max:50',
            'growth' => 'required|string|max:10',
        ]);

        $company = Company::find($id);
        $company->update($request->all());

        return redirect()->route('admin_analyze.dashboard')->with('success', 'Company updated successfully.');
    }

    public function destroy($id)
    {
        Company::destroy($id);
        return redirect()->route('admin_analyze.dashboard')->with('success', 'Company deleted successfully.');
    }

    public function createRevenue($companyId)
    {
        $company = Company::find($companyId);
        return view('admin_analyze.revenue.create', compact('company'));
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
        return view('admin_analyze.revenue.edit', compact('company', 'revenue'));
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
        return view('admin_analyze.financial_position.create', compact('company'));
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
        return view('admin_analyze.financial_position.edit', compact('company', 'financialPosition'));
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
        return view('admin_analyze.dividend.create', compact('company'));
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
        return view('admin_analyze.dividend.edit', compact('company', 'dividend'));
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
        return view('admin_analyze.profitability_ratio.create', compact('company'));
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
        return view('admin_analyze.profitability_ratio.edit', compact('company', 'profitabilityRatio'));
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
        return view('admin_analyze.relative_ratio.create', compact('company'));
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
        return view('admin_analyze.relative_ratio.edit', compact('company', 'relativeRatio'));
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
        return view('admin_analyze.liquidity_ratio.create', compact('company'));
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
        return view('admin_analyze.liquidity_ratio.edit', compact('company', 'liquidityRatio'));
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
}