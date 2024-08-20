@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1>Add Profitability Ratio Data for {{ $company->name }}</h1>
    <form action="{{ route('admin_analyze.profitability_ratio.store', $company->id) }}" method="POST">
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
            <label for="ROE">ROE</label>
            <input type="text" name="ROE" class="form-control" id="ROE" required>
        </div>
        <div class="form-group">
            <label for="GPM">GPM</label>
            <input type="text" name="GPM" class="form-control" id="GPM" required>
        </div>
        <div class="form-group">
            <label for="NPM">NPM</label>
            <input type="text" name="NPM" class="form-control" id="NPM" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
