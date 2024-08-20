@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1>Edit Profitability Ratio Data for {{ $company->name }}</h1>
    <form action="{{ route('admin_analyze.profitability_ratio.update', [$company->id, $profitabilityRatio->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" name="year" class="form-control" id="year" value="{{ $profitabilityRatio->year }}" required>
        </div>
        <div class="form-group">
            <label for="quarter">Quarter</label>
            <input type="text" name="quarter" class="form-control" id="quarter" value="{{ $profitabilityRatio->quarter }}" required>
        </div>
        <div class="form-group">
            <label for="ROE">ROE</label>
            <input type="text" name="ROE" class="form-control" id="ROE" value="{{ $profitabilityRatio->ROE }}" required>
        </div>
        <div class="form-group">
            <label for="GPM">GPM</label>
            <input type="text" name="GPM" class="form-control" id="GPM" value="{{ $profitabilityRatio->GPM }}" required>
        </div>
        <div class="form-group">
            <label for="NPM">NPM</label>
            <input type="text" name="NPM" class="form-control" id="NPM" value="{{ $profitabilityRatio->NPM }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
