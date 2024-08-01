<div>
    <div class="row">
        <div class="col-md-6">
            <div class="card p-3 border-0">
                <h4>Company Profile</h4>
                <p>{{ $company['name'] }}</p>
                <p>Address: {{ $company['address'] }}</p>
                <p>Market Cap: {{ $company['marketCap'] }}</p>
                <p>Price: {{ $company['price'] }}</p>
                <p>Growth Net (YoY): {{ $company['growth'] }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3 border-0">
                <h4>Description</h4>
                <p>{{ $company['description'] ?? 'Description not available.' }}</p>
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
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['revenueData']['revenue'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
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
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['revenueData']['grossProfit'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
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
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['revenueData']['netProfit'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
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
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['financialPositionData']['asset'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
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
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['financialPositionData']['liability'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
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
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['financialPositionData']['equity'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
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
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>Dividend per Sheet</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['dividendData']['dividendPerSheet'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 border-0">
                <h4>Yield</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['dividendData']['yield'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
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
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['profitabilityRatioData']['ROE'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
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
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['profitabilityRatioData']['GPM'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
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
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['profitabilityRatioData']['NPM'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
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
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['relativeRatioData']['EPS'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
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
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['relativeRatioData']['PER'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
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
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['relativeRatioData']['BVPS'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card p-3 border-0">
                <h4>PBV</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['relativeRatioData']['PBV'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['liquidityRatioData']['DAR'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
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
                            <th>Periode</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company['liquidityRatioData']['DER'] as $period => $data)
                            <tr>
                                <td>{{ $period }}</td>
                                <td>{{ $data['2024'] }}</td>
                                <td>{{ $data['2023'] }}</td>
                                <td>{{ $data['2022'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
