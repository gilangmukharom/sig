<div>
    <div class="row">
        <div class="col-md-6">
            <div class="card p-3 border-0">
                <h4>Company Profile</h4>
                <p>{{ $company->name }}</p>
                <p>Address: {{ $company->address }}</p>
                <p>Market Cap: {{ $company->market_cap }}</p>
                <p>Price: {{ $company->price }}</p>
                <p>Growth Net (YoY): {{ $company->growth }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3 border-0">
                <h4>Description</h4>
                <p>{{ $company->description ?? 'Description not available.' }}</p>
            </div>
        </div>
    </div>

    <p class="mt-4"><b>Income Statement</b></p>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>Revenue</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($revenueData as $quarter => $revenues)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $revenues[$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>Gross Profit</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grossProfitData as $quarter => $profits)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $profits[$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>Net Profit</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($netProfitData as $quarter => $profits)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $profits[$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <p class="mt-4"><b>Financial Position</b></p>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>Asset</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($financialPositionData as $quarter => $positions)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $positions['asset'][$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>Liability</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($financialPositionData as $quarter => $positions)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $positions['liability'][$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>Equity</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($financialPositionData as $quarter => $positions)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $positions['equity'][$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <p class="mt-4"><b>Dividend</b></p>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="card p-3 border-0">
                <h4>Dividend per Sheet</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dividendData as $quarter => $dividends)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $dividends[$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3 border-0">
                <h4>Yield</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dividendData as $quarter => $dividends)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $dividends[$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <p class="mt-4"><b>Profitability Ratio</b></p>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>ROE</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profitabilityRatioData as $quarter => $ratios)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $ratios['ROE'][$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>GPM</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profitabilityRatioData as $quarter => $ratios)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $ratios['GPM'][$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>NPM</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profitabilityRatioData as $quarter => $ratios)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $ratios['NPM'][$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <p class="mt-4"><b>Relative Ratio</b></p>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>EPS</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($relativeRatioData as $quarter => $ratios)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $ratios['EPS'][$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>PER</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($relativeRatioData as $quarter => $ratios)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $ratios['PER'][$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>BVPS</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($relativeRatioData as $quarter => $ratios)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $ratios['BVPS'][$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4 mt-4">
        <div class="card p-3 border-0">
            <h4>PBV</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Period</th>
                        @foreach ($years as $year)
                            <th>{{ $year }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($relativeRatioData as $quarter => $ratios)
                        <tr>
                            <td>{{ $quarter }}</td>
                            @foreach ($years as $year)
                                <td>{{ $ratios['PBV'][$year] ?? '-' }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <p class="mt-4"><b>Liquidity Ratio</b></p>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>DAR</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($liquidityRatioData as $quarter => $ratios)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $ratios['DAR'][$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>DER</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Period</th>
                            @foreach ($years as $year)
                                <th>{{ $year }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($liquidityRatioData as $quarter => $ratios)
                            <tr>
                                <td>{{ $quarter }}</td>
                                @foreach ($years as $year)
                                    <td>{{ $ratios['DER'][$year] ?? '-' }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
