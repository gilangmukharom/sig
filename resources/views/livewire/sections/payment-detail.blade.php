<div class="container mt-5">
    <div class="card border-1">
        <div class="text-center">
            <h2>Payment Detail</h2>
        </div>
        <div class="card-body">
            <h4>Your Package</h4>
            <h2 class="font-weight-bold">Bundle</h2>
            <p>Period: 25 - 04 - 2024</p>
            <p>Your account: Anggung Gigih P</p>
            <p>Total: Rp. 50.000,-</p>

            <h4 class="mt-4">Selected Emiten</h4>
            <ul>
                @foreach ($selectedEmiten as $emiten)
                    <li>{{ $emiten }}</li>
                @endforeach
            </ul>

            <h4 class="mt-4">Pilih metode pembayaran</h4>
            @foreach ($paymentMethods as $method)
                <div class="d-flex justify-content-between align-items-center list-group-item border-0">
                    <div>
                        <h5>{{ $method['code'] }}</h5>
                        <p>{{ $method['name'] }}</p>
                    </div>
                    <button class="btn btn-outline-success">Pilih</button>
                </div>
            @endforeach

            <div class="text-center mt-4">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
