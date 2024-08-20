@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1>Add Dividend Data for {{ $company->name }}</h1>
    <form action="{{ route('admin_analyze.dividend.store', $company->id) }}" method="POST">
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
            <label for="dividend_per_sheet">Dividend Per Sheet</label>
            <input type="text" name="dividend_per_sheet" class="form-control" id="dividend_per_sheet" required>
        </div>
        <div class="form-group">
            <label for="yield">Yield</label>
            <input type="text" name="yield" class="form-control" id="yield" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
