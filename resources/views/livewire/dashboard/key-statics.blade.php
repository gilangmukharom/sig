<div class="container">
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="account" class="form-label">Account:</label>
            <select id="account" class="form-select" wire:model="account">
                <option value="All">All</option>
                <option value="IncomeStatement">Income Statement</option>
                <option value="FinancialPosition">Financial Position</option>
                <option value="Dividend">Dividend</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="timeframe" class="form-label">Timeframe:</label>
            <select id="timeframe" class="form-select" wire:model="timeframe">
                <option value="All">All</option>
                <option value="3 Years">3 Years</option>
                <option value="5 Years">5 Years</option>
                <option value="10 Years">10 Years</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="graphic" class="form-label">Periode :</label>
            <select id="graphic" class="form-select" wire:model="graphic">
                <option value="Annual">Annual</option>
                <option value="Monthly">Quarterly</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 card p-3 border-0">
            <h5>Growth net Profit</h5>
            @foreach ($profitData as $data)
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between">
                            <span>{{ $data['quarter'] }}</span>
                            <span>{{ number_format((float) $data['value'], 2, ',', '.') }}%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $data['value'] }}%;"
                                aria-valuenow="{{ $data['value'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-6 card p-3 border-0">
            <h5>Price</h5>
            @foreach ($priceData as $data)
                <div class="d-flex align-items-center mb-2">
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between">
                            <span>{{ $data['quarter'] }}</span>
                            <span>{{ number_format($data['value'], 0, ',', '.') }} B</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar"
                                style="width: {{ $data['value'] / 10 }}%;" aria-valuenow="{{ $data['value'] }}"
                                aria-valuemin="0" aria-valuemax="1000"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <p class="mt-4"><b>Analyze Statistics</b></p>
    <hr>

    <div class="row">
        @if ($account === 'IncomeStatement' || $account === 'All')
            <!-- Tampilkan Income Statement Chart -->
            <div class="col-md-4">
                <div id="incomeStatement"></div>
            </div>
        @endif

        @if ($account === 'FinancialPosition' || $account === 'All')
            <!-- Tampilkan Financial Position Chart -->
            <div class="col-md-4">
                <div id="financialPosition"></div>
            </div>
        @endif

        @if ($account === 'Dividend' || $account === 'All')
            <!-- Tampilkan Dividend Chart -->
            <div class="col-md-4">
                <div id="dividendData"></div>
            </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const incomeStatementData = @json($incomeStatementData);
        const financialPositionData = @json($financialPositionData);
        const dividendData = @json($dividendData);

        loadKeyStatisticsChart('incomeStatement', incomeStatementData, 'Income Statement');
        loadKeyStatisticsChart('financialPosition', financialPositionData, 'Financial Position');
        loadKeyStatisticsChart('dividendData', dividendData, 'Dividend');
    });

    window.addEventListener('update-chart', function(event) {
        loadKeyStatisticsChart('incomeStatement', event.detail.incomeStatementData, 'Income Statement');
        loadKeyStatisticsChart('financialPosition', event.detail.financialPositionData, 'Financial Position');
        loadKeyStatisticsChart('dividendData', event.detail.dividendData, 'Dividend');
    });

    function loadKeyStatisticsChart(container, data, title) {
        if (!data || !data.categories || !data.series) {
            console.error("Invalid data format:", data);
            return;
        }

        const formattedData = {
            categories: data.categories,
            series: data.series.map(series => {
                return {
                    name: series.name,
                    data: series.data.map(value => parseFloat(value))
                };
            })
        };

        if (formattedData.categories && formattedData.series) {
            Highcharts.chart(container, {
                chart: {
                    type: 'column'
                },
                title: {
                    text: title
                },
                xAxis: {
                    categories: formattedData.categories
                },
                yAxis: {
                    title: {
                        text: 'Values in Billion'
                    }
                },
                series: formattedData.series
            });
        }
    }
</script>
