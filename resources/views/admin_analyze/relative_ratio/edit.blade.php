@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1>Edit Relative Ratio Data for {{ $company->name }}</h1>
    <form action="{{ route('admin_analyze.relative_ratio.update', [$company->id, $relativeRatio->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" name="year" class="form-control" id="year" value="{{ $relativeRatio->year }}" required>
        </div>
        <div class="form-group">
            <label for="quarter">Quarter</label>
            <input type="text" name="quarter" class="form-control" id="quarter" value="{{ $relativeRatio->quarter }}" required>
        </div>
        <div class="form-group">
            <label for="EPS">EPS</label>
            <input type="text" name="EPS" class="form-control" id="EPS" value="{{ $relativeRatio->EPS }}" required>
        </div>
        <div class="form-group">
            <label for="PER">PER</label>
            <input type="text" name="PER" class="form-control" id="PER" value="{{ $relativeRatio->PER }}" required>
        </div>
        <div class="form-group">
            <label for="BVPS">BVPS</label>
            <input type="text" name="BVPS" class="form-control" id="BVPS" value="{{ $relativeRatio->BVPS }}" required>
        </div>
        <div class="form-group">
            <label for="PBV">PBV</label>
            <input type="text" name="PBV" class="form-control" id="PBV" value="{{ $relativeRatio->PBV }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
