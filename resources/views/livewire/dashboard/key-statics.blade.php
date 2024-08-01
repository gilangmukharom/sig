<div class="container">
    <div class="row mb-4">
        <div class="col-md-4">
            <label for="account" class="form-label">Account:</label>
            <select id="account" class="form-select" wire:model="account">
                <option value="All">All</option>
                <option value="Account1">Account1</option>
                <option value="Account2">Account2</option>
                <!-- Tambahkan opsi lain sesuai kebutuhan -->
            </select>
        </div>
        <div class="col-md-4">
            <label for="timeframe" class="form-label">Timeframe:</label>
            <select id="timeframe" class="form-select" wire:model="timeframe">
                <option value="All">All</option>
                <option value="Monthly">Monthly</option>
                <option value="Quarterly">Quarterly</option>
                <option value="Annual">Annual</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="graphic" class="form-label">Graphic:</label>
            <select id="graphic" class="form-select" wire:model="graphic">
                <option value="Annual">Annual</option>
                <option value="Monthly">Monthly</option>
                <option value="Weekly">Weekly</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 card p-3 border-0">
            <h5>Growth net Profit</h5>
            @foreach ($profitData as $data)
                <div class="d-flex align-items-center mb-2">
                    <img src="/path/to/icon.png" alt="icon" class="me-2" style="width: 24px; height: 24px;">
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
                    <img src="/path/to/price-icon.png" alt="icon" class="me-2" style="width: 24px; height: 24px;">
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

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div id="container"></div>
        </div>
    </div>
</div>

<script>
    console.log('Raw incomeStatementData:', @json($incomeStatementData));

    document.addEventListener('DOMContentLoaded', function() {
        loadKeyStatisticsChart(@json($incomeStatementData));
    });

    window.addEventListener('update-chart', function(event) {
        loadKeyStatisticsChart(event.detail.incomeStatementData);
    });

    function loadKeyStatisticsChart(incomeStatementData) {
        console.log('loadKeyStatisticsChart called with:', incomeStatementData);

        const formattedData = {
            categories: incomeStatementData.categories,
            series: incomeStatementData.series.map(series => ({
                name: series.name,
                data: series.data.map(value => !isNaN(parseFloat(value)) ? parseFloat(value) : null)
            }))
        };

        console.log('Formatted data:', formattedData);

        if (formattedData.categories && formattedData.series) {
            try {
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Income Statement Data for 2024'
                    },
                    xAxis: {
                        categories: formattedData.categories
                    },
                    yAxis: {
                        title: {
                            text: 'Values in Billion'
                        }
                    },
                    series: [{
                        name: 'Revenue',
                        data: formattedData.series[0].data
                    }]
                });
            } catch (error) {
                console.error('Highcharts error:', error);
            }
        } else {
            console.error("Data for chart is not available or improperly formatted.");
        }
    }
</script>
