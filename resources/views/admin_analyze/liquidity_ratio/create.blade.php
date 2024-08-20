@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1>Add Liquidity Ratio Data for {{ $company->name }}</h1>
    <form action="{{ route('admin_analyze.liquidity_ratio.store', $company->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" name="year" class="form-control" id="year" required>
        </div>
        <div class="form-group">
            <label for="quarter">Quarter</label>
            <input type="text" name="quarter" class="form-control" id="quarter" required>
        </div>
        <div class="form-group">
            <label for="DAR">DAR</label>
            <input type="text" name="DAR" class="form-control" id="DAR" required>
        </div>
        <div class="form-group">
            <label for="DER">DER</label>
            <input type="text" name="DER" class="form-control" id="DER" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
