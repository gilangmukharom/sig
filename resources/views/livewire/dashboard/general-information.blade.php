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
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->revenues as $revenue)
                            <tr>
                                <td>{{ $revenue->quarter }}</td>
                                <td>{{ $revenue->revenue }}</td>
                                <td>{{ $revenue->revenue }}</td>
                                <td>{{ $revenue->revenue }}</td>
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
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->revenues as $revenue)
                            <tr>
                                <td>{{ $revenue->quarter }}</td>
                                <td>{{ $revenue->gross_profit }}</td>
                                <td>{{ $revenue->gross_profit }}</td>
                                <td>{{ $revenue->gross_profit }}</td>
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
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->revenues as $revenue)
                            <tr>
                                <td>{{ $revenue->quarter }}</td>
                                <td>{{ $revenue->net_profit }}</td>
                                <td>{{ $revenue->net_profit }}</td>
                                <td>{{ $revenue->net_profit }}</td>
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
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->financialPositions as $position)
                            <tr>
                                <td>{{ $position->quarter }}</td>
                                <td>{{ $position->asset }}</td>
                                <td>{{ $position->asset }}</td>
                                <td>{{ $position->asset }}</td>
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
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->financialPositions as $position)
                            <tr>
                                <td>{{ $position->quarter }}</td>
                                <td>{{ $position->liability }}</td>
                                <td>{{ $position->liability }}</td>
                                <td>{{ $position->liability }}</td>
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
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->financialPositions as $position)
                            <tr>
                                <td>{{ $position->quarter }}</td>
                                <td>{{ $position->equity }}</td>
                                <td>{{ $position->equity }}</td>
                                <td>{{ $position->equity }}</td>
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
                            <th>Period</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->dividends as $dividend)
                            <tr>
                                <td>{{ $dividend->quarter }}</td>
                                <td>{{ $dividend->dividend_per_sheet }}</td>
                                <td>{{ $dividend->dividend_per_sheet }}</td>
                                <td>{{ $dividend->dividend_per_sheet }}</td>
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
                            <th>Period</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->dividends as $dividend)
                            <tr>
                                <td>{{ $dividend->quarter }}</td>
                                <td>{{ $dividend->yield }}</td>
                                <td>{{ $dividend->yield }}</td>
                                <td>{{ $dividend->yield }}</td>
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
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->profitabilityRatios as $ratio)
                            <tr>
                                <td>{{ $ratio->quarter }}</td>
                                <td>{{ $ratio->ROE }}</td>
                                <td>{{ $ratio->ROE }}</td>
                                <td>{{ $ratio->ROE }}</td>
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
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->profitabilityRatios as $ratio)
                            <tr>
                                <td>{{ $ratio->quarter }}</td>
                                <td>{{ $ratio->GPM }}</td>
                                <td>{{ $ratio->GPM }}</td>
                                <td>{{ $ratio->GPM }}</td>
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
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->profitabilityRatios as $ratio)
                            <tr>
                                <td>{{ $ratio->quarter }}</td>
                                <td>{{ $ratio->NPM }}</td>
                                <td>{{ $ratio->NPM }}</td>
                                <td>{{ $ratio->NPM }}</td>
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
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->relativeRatios as $ratio)
                            <tr>
                                <td>{{ $ratio->quarter }}</td>
                                <td>{{ $ratio->EPS }}</td>
                                <td>{{ $ratio->EPS }}</td>
                                <td>{{ $ratio->EPS }}</td>
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
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->relativeRatios as $ratio)
                            <tr>
                                <td>{{ $ratio->quarter }}</td>
                                <td>{{ $ratio->PER }}</td>
                                <td>{{ $ratio->PER }}</td>
                                <td>{{ $ratio->PER }}</td>
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
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->relativeRatios as $ratio)
                            <tr>
                                <td>{{ $ratio->quarter }}</td>
                                <td>{{ $ratio->BVPS }}</td>
                                <td>{{ $ratio->BVPS }}</td>
                                <td>{{ $ratio->BVPS }}</td>
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
                            <th>Period</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->relativeRatios as $ratio)
                            <tr>
                                <td>{{ $ratio->quarter }}</td>
                                <td>{{ $ratio->PBV }}</td>
                                <td>{{ $ratio->PBV }}</td>
                                <td>{{ $ratio->PBV }}</td>
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
                            <th>Period</th>
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->liquidityRatios as $ratio)
                            <tr>
                                <td>{{ $ratio->quarter }}</td>
                                <td>{{ $ratio->DAR }}</td>
                                <td>{{ $ratio->DAR }}</td>
                                <td>{{ $ratio->DAR }}</td>
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
                            <th>2024</th>
                            <th>2023</th>
                            <th>2022</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->liquidityRatios as $ratio)
                            <tr>
                                <td>{{ $ratio->quarter }}</td>
                                <td>{{ $ratio->DER }}</td>
                                <td>{{ $ratio->DER }}</td>
                                <td>{{ $ratio->DER }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
