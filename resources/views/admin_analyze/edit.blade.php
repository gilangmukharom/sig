@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1>Edit Company</h1>
    <form action="{{ route('admin_analyze.update', $company->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ticker">Ticker</label>
            <input type="text" name="ticker" class="form-control" id="ticker" value="{{ $company->ticker }}" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $company->name }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" class="form-control" id="address" required>{{ $company->address }}</textarea>
        </div>
        <div class="form-group">
            <label for="market_cap">Market Cap</label>
            <input type="text" name="market_cap" class="form-control" id="market_cap" value="{{ $company->market_cap }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" id="price" value="{{ $company->price }}" required>
        </div>
        <div class="form-group">
            <label for="growth">Growth</label>
            <input type="text" name="growth" class="form-control" id="growth" value="{{ $company->growth }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
