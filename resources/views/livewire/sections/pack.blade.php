<div class="container d-flex justify-content-center flex-wrap gap-4 w-100 m-auto">
    @foreach($packs as $pack)
        <div class="card border-0 flex-fill secondary-bg" style="width: 18rem;">
            <div class="card-header border-0 secondary-color bg-transparent text-center p-5">
                <h4><b>{{ ucfirst($pack->name_pack) }}</b></h4>
                <h1><b>{{ $pack->price }}</b></h1>
            </div>
            <div class="card-body pb-5 text-center">
                @if ($pack->description)
                    @foreach (explode(' ', $pack->description) as $item)
                        <p><i class="fas fa-check-circle"></i> {{ $item }}</p>
                    @endforeach
                @else
                    <p>No description available</p>
                @endif
            </div>
            <div class="card-footer border-0 bg-transparent p-4 w-100 d-flex justify-content-center">
                <button class="border-1 w-50 p-2 rounded">Purchase</button>
            </div>
        </div>
    @endforeach
</div>
