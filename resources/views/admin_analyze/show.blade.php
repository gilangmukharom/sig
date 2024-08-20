@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1>{{ $company->name }}</h1>
    <p>Ticker: {{ $company->ticker }}</p>
    <p>Address: {{ $company->address }}</p>
    <p>Market Cap: {{ $company->market_cap }}</p>
    <p>Price: {{ $company->price }}</p>
    <p>Growth: {{ $company->growth }}</p>

    <h2>Revenue Data</h2>
    <ul>
        @foreach($company->revenues as $revenue)
            <li>
                {{ $revenue->year }} - {{ $revenue->revenue }}
                <a href="{{ route('admin_analyze.revenue.edit', [$company->id, $revenue->id]) }}" class="btn btn-warning btn-sm">Edit</a>
            </li>
        @endforeach
    </ul>

    <h2>Financial Position Data</h2>
    <ul>
        @foreach($company->financialPositions as $position)
            <li>
                {{ $position->year }} - Asset: {{ $position->asset }} Liability: {{ $position->liability }} Equity: {{ $position->equity }}
                <a href="{{ route('admin_analyze.financial_position.edit', [$company->id, $position->id]) }}" class="btn btn-warning btn-sm">Edit</a>
            </li>
        @endforeach
    </ul>

    <h2>Dividend Data</h2>
    <ul>
        @foreach($company->dividends as $dividend)
            <li>
                {{ $dividend->year }} ({{ $dividend->quarter }}) - Dividend per Sheet: {{ $dividend->dividend_per_sheet }} - Yield: {{ $dividend->yield }}
                <a href="{{ route('admin_analyze.dividend.edit', [$company->id, $dividend->id]) }}" class="btn btn-warning btn-sm">Edit</a>
            </li>
        @endforeach
    </ul>

    <h2>Profitability Ratios</h2>
    <ul>
        @foreach($company->profitabilityRatios as $ratio)
            <li>
                {{ $ratio->year }} ({{ $ratio->quarter }}) - ROE: {{ $ratio->ROE }} - GPM: {{ $ratio->GPM }} - NPM: {{ $ratio->NPM }}
                <a href="{{ route('admin_analyze.profitability_ratio.edit', [$company->id, $ratio->id]) }}" class="btn btn-warning btn-sm">Edit</a>
            </li>
        @endforeach
    </ul>

    <h2>Relative Ratios</h2>
    <ul>
        @foreach($company->relativeRatios as $ratio)
            <li>
                {{ $ratio->year }} ({{ $ratio->quarter }}) - EPS: {{ $ratio->EPS }} - PER: {{ $ratio->PER }} - BVPS: {{ $ratio->BVPS }} - PBV: {{ $ratio->PBV }}
                <a href="{{ route('admin_analyze.relative_ratio.edit', [$company->id, $ratio->id]) }}" class="btn btn-warning btn-sm">Edit</a>
            </li>
        @endforeach
    </ul>

    <h2>Liquidity Ratios</h2>
    <ul>
        @foreach($company->liquidityRatios as $ratio)
            <li>
                {{ $ratio->year }} ({{ $ratio->quarter }}) - DAR: {{ $ratio->DAR }} - DER: {{ $ratio->DER }}
                <a href="{{ route('admin_analyze.liquidity_ratio.edit', [$company->id, $ratio->id]) }}" class="btn btn-warning btn-sm">Edit</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
