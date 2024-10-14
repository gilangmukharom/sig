<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\DividendData;
use App\Models\FinancialPositionData;
use App\Models\LiquidityRatioData;
use App\Models\Pack;
use App\Models\ProfitabilityRatioData;
use App\Models\RelativeRatioData;
use App\Models\RevenueData;
use App\Models\UserAnalyze;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyzeDashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Filter companies based on the search query
        $companies = Company::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('ticker', 'like', '%' . $search . '%');
        })->paginate(5)->appends(['search' => $search]);

        // Pass the filtered companies to the view
        return view('admin_analyze.emiten.dashboard', compact('companies'))
            ->with('totalEmiten', Company::count())
            ->with('totalUser', UserAnalyze::count());
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
        // Validasi input
        $request->validate([
            'ticker' => 'required|string|max:10',  // Kode atau ticker maksimal 10 karakter
            'name' => 'required|string|max:255',   // Nama perusahaan maksimal 255 karakter
            'category' => 'required|string|max:255', // Kategori maksimal 255 karakter
            'address' => 'required|string',        // Alamat harus diisi
            'market_cap' => 'required|string|max:50', // Kapitalisasi pasar maksimal 50 karakter
            'price' => 'required|numeric',         // Harga harus angka
            'growth' => 'required|numeric',        // Pertumbuhan harus angka (persentase)
            'description' => 'nullable|string',    // Deskripsi opsional
        ]);

        // Simpan data ke database
        Company::create([
            'ticker' => $request->input('ticker'),
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'address' => $request->input('address'),
            'market_cap' => $request->input('market_cap'),
            'price' => $request->input('price'),
            'growth' => $request->input('growth'),
            'description' => $request->input('description'), // Opsional
        ]);

        // Redirect kembali ke halaman dashboard dengan pesan sukses
        return redirect()->route('admin_analyze.emiten.dashboard')->with('success', 'Company created successfully.');
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
            'category' => 'required|string|max:255',
            'address' => 'required',
            'market_cap' => 'required|string|max:50',
            'price' => 'required|string|max:50',
            'growth' => 'required|string|max:10',
            'description' => 'nullable|string',
        ]);

        $company = Company::find($id);

        try {
            $company->update($request->all());
            return redirect()->route('admin_analyze.emiten.edit', $id)->with('success', 'Company updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin_analyze.emiten.edit', $id)->with('error', 'Failed to update company: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        Company::destroy($id);
        return redirect()->route('admin_analyze.emiten.dashboard')->with('success', 'Company deleted successfully.');
    }

    public function storeYear(Request $request)
    {
        // Validasi input: hanya memastikan bahwa year adalah integer 4 digit dan company_id valid
        $request->validate([
            'year' => 'required|integer|digits:4',  // Pastikan bahwa year adalah angka 4 digit
            'company_id' => 'required|exists:company,id',  // Pastikan company_id valid
        ]);

        // Definisikan array quarters
        $quarters = ['Q1', 'Q2', 'Q3', 'Q4'];

        // Cek apakah data dengan kombinasi year dan company_id sudah ada di tabel revenue_data
        $existingYear = RevenueData::where('year', $request->year)
            ->where('company_id', $request->company_id)
            ->exists();

        // Jika tahun sudah ada, kembalikan pesan error
        if ($existingYear) {
            return response()->json(['error' => 'The year already exists for this company.'], 400);
        }

        // Mulai transaksi untuk memastikan bahwa semua insert berjalan dengan aman
        DB::beginTransaction();

        try {
            // Loop untuk setiap quarter
            foreach ($quarters as $quarter) {
                // Simpan data tahun ke tabel revenue_data
                RevenueData::create([
                    'year' => $request->year,
                    'company_id' => $request->company_id,
                    'quarter' => $quarter,  // Simpan kuartal (Q1, Q2, Q3, atau Q4)
                    'revenue' => null,  // Set nilai default atau null
                    'gross_profit' => null,
                    'net_profit' => null,
                ]);

                // Simpan data tahun ke tabel profitability_ratio_data
                ProfitabilityRatioData::create([
                    'year' => $request->year,
                    'company_id' => $request->company_id,
                    'quarter' => $quarter,
                    'ROE' => null,  // Set nilai default atau null
                    'GPM' => null,
                    'NPM' => null,
                ]);

                // Simpan data tahun ke tabel liquidity_ratio_data
                LiquidityRatioData::create([
                    'year' => $request->year,
                    'company_id' => $request->company_id,
                    'quarter' => $quarter,
                    'DAR' => null,  // Set nilai default atau null
                    'DER' => null,
                ]);

                // Simpan data tahun ke tabel relative_ratio_data
                RelativeRatioData::create([
                    'year' => $request->year,
                    'company_id' => $request->company_id,
                    'quarter' => $quarter,
                    'EPS' => null,  // Set nilai default atau null
                    'PER' => null,
                    'BVPS' => null,
                    'PBV' => null,
                ]);
            }

            // Commit transaksi jika semua data berhasil disimpan
            DB::commit();

            // Kembalikan respons JSON yang sukses
            return response()->json(['year' => $request->year]);
        } catch (\Exception $e) {
            // Jika ada error, rollback transaksi
            DB::rollBack();

            // Kembalikan pesan error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function edit_key_statistics($companyId, Request $request)
    {
        // Temukan perusahaan dan hubungannya
        $company = Company::with([
            'revenues',
            'financialPositions',
            'dividends',
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
                $financialPositionData[$quarter]['equality'][$year] = $financialPosition ? $financialPosition->equality : '-';
            }
        }

        // Ambil dividend data
        $dividendData = [];
        $yieldData = [];
        foreach ($quarters as $quarter) {
            foreach ($years as $year) {
                $dividend = DividendData::where('company_id', $companyId)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();
                $dividendData[$quarter][$year] = $dividend ? $dividend->dividend_per_sheet : '-';
                $yieldData[$quarter][$year] = $dividend ? $dividend->yield : '-';
            }
        }

        // Kirim semua data ke view
        return view('admin_analyze.emiten.key_statistics', compact(
            'company',
            'years',
            'quarters',
            'revenueData',
            'financialPositionData',
            'dividendData',
            'yieldData',
            'allYears'
        ));
    }

    public function update_key_statistics(Request $request, $companyId)
    {
        // Validasi input, pastikan semua field yang diharapkan terisi
        $request->validate(
            [
                'revenues.*.*' => 'numeric|nullable',
                'gross_profits.*.*' => 'numeric|nullable',
                'net_profits.*.*' => 'numeric|nullable',
                'financial_positions.asset.*.*' => 'nullable|numeric',
                'financial_positions.liability.*.*' => 'nullable|numeric',
                'financial_positions.equality.*.*' => 'nullable|numeric',
                'dividends.*.*' => 'nullable|numeric',
            ]
        );

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
                } else {
                    RevenueData::create([
                        'company_id' => $companyId,
                        'year' => $year,
                        'quarter' => $quarter,
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
                        'equality' => $request->input("financial_positions.equality.$year.$quarter"),
                    ]);
                } else {
                    FinancialPositionData::create([
                        'company_id' => $companyId,
                        'year' => $year,
                        'quarter' => $quarter,
                        'asset' => $asset,
                        'liability' => $request->input("financial_positions.liability.$year.$quarter"),
                        'equality' => $request->input("financial_positions.equality.$year.$quarter"),
                    ]);
                }
            }
        }

        // Update Dividend Data
        foreach ($request->input('dividends', []) as $year => $quarters) {
            foreach ($quarters as $quarter => $dividend) {
                $yield = $request->input("yields.$year.$quarter");
                $dividendData = DividendData::where('company_id', $companyId)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();

                if ($dividendData) {
                    $dividendData->update([
                        'dividend_per_sheet' => $dividend,
                        'yield' => $yield,
                    ]);
                } else {
                    DividendData::create([
                        'company_id' => $companyId,
                        'year' => $year,
                        'quarter' => $quarter,
                        'dividend_per_sheet' => $dividend,
                        'yield' => $yield,
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Key Ratios updated successfully.');
    }

    public function edit_key_ratio($companyId, Request $request)
    {
        // Temukan perusahaan dan hubungannya
        $company = Company::with([
            'profitabilityRatios',
            'relativeRatios',
            'liquidityRatios',
        ])->find($companyId);

        // Jika company tidak ditemukan, redirect dengan error message
        if (!$company) {
            return redirect()->route('admin_analyze.emiten.dashboard')->with('error', 'Company not found.');
        }

        // Ambil data semua tahun dari revenue
        $allYears = ProfitabilityRatioData::where('company_id', $companyId)
            ->select('year')
            ->distinct()
            ->orderBy(
                'year',
                'desc'
            )
            ->pluck('year')
            ->toArray();

        // Jika tidak ada filter, tampilkan 3 tahun terbaru
        $years = $request->input('filter_years', array_slice($allYears, 0, 3));

        // Tentukan quarters (Q1, Q2, Q3, Q4)
        $quarters = ['Q1', 'Q2', 'Q3', 'Q4'];

        $profitabilityRatioData = [];
        foreach ($quarters as $quarter) {
            foreach ($years as $year) {
                $profitability = ProfitabilityRatioData::where('company_id', $companyId)
                    ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();

                $profitabilityRatioData[$quarter][$year] = [
                    'ROE' => $profitability ? $profitability->ROE : '-',
                    'GPM' => $profitability ? $profitability->GPM : '-',
                    'NPM' => $profitability ? $profitability->NPM : '-',
                ];
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
                $relativeRatioData[$quarter]['PER'][$year] = $relativeRatio ? $relativeRatio->PER : '-';
                $relativeRatioData[$quarter]['BVPS'][$year] = $relativeRatio ? $relativeRatio->BVPS : '-';
                $relativeRatioData[$quarter]['PBV'][$year] = $relativeRatio ? $relativeRatio->PBV : '-';
            }
        }

        // Ambil liquidity ratio data
        $liquidityRatioData = [];
        foreach ($quarters as $quarter) {
            foreach ($years as $year) {
                $liquidity = LiquidityRatioData::where('company_id', $companyId)
                ->where('year', $year)
                    ->where('quarter', $quarter)
                    ->first();
                $liquidityRatioData[$quarter]['DAR'][$year] = $liquidity ? $liquidity->DAR : '-';
                $liquidityRatioData[$quarter]['DER'][$year] = $liquidity ? $liquidity->DER : '-';
            }
        }

        // Kirim semua data ke view
        return view('admin_analyze.emiten.key_ratio', compact(
            'company',
            'years',
            'quarters',
            'profitabilityRatioData',
            'relativeRatioData',
            'liquidityRatioData',
            'allYears'
        ));
    }

    public function update_key_ratio(Request $request, $companyId)
    {
        try {
            // Validasi input untuk memastikan format data benar
            $request->validate([
                'profitability_ratios.*.*.*' => 'numeric|nullable',
                'relative_ratios.*.*.*' => 'numeric|nullable',
                'liquidity_ratios.*.*.*' => 'numeric|nullable',
            ]);

            // **Update Profitability Ratios**
            foreach ($request->input('profitability_ratios', []) as $ratio => $years) {
                foreach ($years as $year => $quarters) {
                    foreach ($quarters as $quarter => $value) {
                        ProfitabilityRatioData::updateOrCreate(
                            [
                                'company_id' => $companyId,
                                'year' => $year,
                                'quarter' => $quarter,
                            ],
                            [$ratio => $value]  // Field yang diupdate
                        );
                    }
                }
            }

            // **Update Relative Ratios**
            foreach ($request->input('relative_ratios', []) as $ratio => $years) {
                foreach ($years as $year => $quarters) {
                    foreach ($quarters as $quarter => $value) {
                        RelativeRatioData::updateOrCreate(
                            [
                                'company_id' => $companyId,
                                'year' => $year,
                                'quarter' => $quarter,
                            ],
                            [$ratio => $value]  // Field yang diupdate
                        );
                    }
                }
            }

            // **Update Liquidity Ratios**
            foreach ($request->input('liquidity_ratios', []) as $ratio => $years) {
                foreach ($years as $year => $quarters) {
                    foreach ($quarters as $quarter => $value) {
                        LiquidityRatioData::updateOrCreate(
                            [
                                'company_id' => $companyId,
                                'year' => $year,
                                'quarter' => $quarter,
                            ],
                            [$ratio => $value]  // Field yang diupdate
                        );
                    }
                }
            }

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Key Ratios updated successfully.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi kegagalan
            return redirect()->back()->with('error', 'Failed to update Key Ratios: ' . $e->getMessage());
        }
    }

    public function showUsers()
    {
        $users = UserAnalyze::all();
        $totalEmiten = Company::count();
        $totalUser = UserAnalyze::count();
        return view('admin_analyze.user.index', compact('users', 'totalEmiten', 'totalUser'));
    }

    public function index_setting()
    {
        // Mengambil data Pack terbaru terlebih dahulu
        $packs = Pack::orderBy('created_at', 'desc')->get();
        return view('admin_analyze.setting', compact('packs'));
    }

    public function store_setting(Request $request)
    {
        // Hitung jumlah data Pack
        $count = Pack::count();

        // Jika jumlah Pack sudah 3, kembalikan pesan error
        if ($count >= 3) {
            return redirect()->route('admin_analyze.setting.index')
            ->with('error', 'Data pack sudah mencapai batas maksimal 3.');
        }

        // Validasi dan simpan data
        $request->validate([
            'namePack' => 'required|string|max:255',
            'price' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Pack::create([
            'name_pack' => $request->namePack,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('admin_analyze.setting.index')
        ->with('success', 'Data pack berhasil ditambahkan.');
    }

    public function edit_setting($id)
    {
        $pack = Pack::findOrFail($id);
        return view('admin_analyze.edit_setting', compact('pack'));
    }

    public function update_setting(Request $request, $id)
    {
        $request->validate([
            'namePack' => 'required|string|max:255',
            'price' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $pack = Pack::findOrFail($id);
        $pack->update(['name_pack' => $request->namePack,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return response()->json(['success' => true]);
    }
    public function destroy_setting($id)
    {
        $pack = Pack::findOrFail($id);
        $pack->delete();

        return redirect()->route('admin_analyze.setting.index')->with('success', 'Data pack berhasil dihapus.');
    }
}