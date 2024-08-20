@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1>Add New Company</h1>
    <form action="{{ route('admin_analyze.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ticker">Ticker</label>
            <input type="text" name="ticker" class="form-control" id="ticker" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" class="form-control" id="address" required></textarea>
        </div>
        <div class="form-group">
            <label for="market_cap">Market Cap</label>
            <input type="text" name="market_cap" class="form-control" id="market_cap" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" id="price" required>
        </div>
        <div class="form-group">
            <label for="growth">Growth</label>
            <input type="text" name="growth" class="form-control" id="growth" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
