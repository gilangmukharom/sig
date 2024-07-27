<div class="container mt-5 border rounded w-80">
    <div class="text-center mb-4">
        <h2>Discover Company Stock</h2>
        <p>choose your emiten for growth business</p>
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search" wire:model="search">
    </div>

    <div class="list-group">
        @foreach($filteredEmitens as $emiten)
            <div class="d-flex justify-content-between align-items-center list-group-item">
                <div>
                    <h5>{{ $emiten['code'] }}</h5>
                    <p>{{ $emiten['name'] }}</p>
                </div>
                <button class="btn btn-outline-success" wire:click="selectEmiten('{{ $emiten['code'] }}')">
                    {{ in_array($emiten['code'], $selectedEmiten) ? 'Dipilih' : 'Pilih' }}
                </button>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-primary" wire:click="submit">Submit</button>
    </div>
</div>
