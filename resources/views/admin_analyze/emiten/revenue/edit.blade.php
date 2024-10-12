@extends('layouts.navigation-admin')
@section('title', 'Dashboard')

@section('contents')
<div class="container">
    <h1>Edit Revenue Data for {{ $company->name }}</h1>
    <form action="{{ route('admin_analyze.revenue.update', [$company->id, $revenue->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" name="year" class="form-control" id="year" value="{{ $revenue->year }}" required>
        </div>
        <div class="form-group">
            <label for="quarter">Quarter</label>
            <input type="text" name="quarter" class="form-control" id="quarter" value="{{ $revenue->quarter }}" required>
        </div>
        <div class="form-group">
            <label for="revenue">Revenue</label>
            <input type="text" name="revenue" class="form-control" id="revenue" value="{{ $revenue->revenue }}" required>
        </div>
        <div class="form-group">
            <label for="gross_profit">Gross Profit</label>
            <input type="text" name="gross_profit" class="form-control" id="gross_profit" value="{{ $revenue->gross_profit }}" required>
        </div>
        <div class="form-group">
            <label for="net_profit">Net Profit</label>
            <input type="text" name="net_profit" class="form-control" id="net_profit" value="{{ $revenue->net_profit }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
