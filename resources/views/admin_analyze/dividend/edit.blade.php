@extends('layouts.bootstrap')

@section('content')
<div class="container">
    <h1>Edit Dividend Data for {{ $company->name }}</h1>
    <form action="{{ route('admin_analyze.dividend.update', [$company->id, $dividend->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" name="year" class="form-control" id="year" value="{{ $dividend->year }}" required>
        </div>
        <div class="form-group">
            <label for="quarter">Quarter</label>
            <input type="text" name="quarter" class="form-control" id="quarter" value="{{ $dividend->quarter }}" required>
        </div>
        <div class="form-group">
            <label for="dividend_per_sheet">Dividend Per Sheet</label>
            <input type="text" name="dividend_per_sheet" class="form-control" id="dividend_per_sheet" value="{{ $dividend->dividend_per_sheet }}" required>
        </div>
        <div class="form-group">
            <label for="yield">Yield</label>
            <input type="text" name="yield" class="form-control" id="yield" value="{{ $dividend->yield }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
