@extends('layouts.navigation-admin')
@section('title', 'Dashboard')

@section('contents')
<div class="container mt-5">
    <h1>Company List</h1>
    <a href="{{ route('admin_analyze.create') }}" class="btn btn-primary mb-3">Add Company</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Ticker</th>
                <th>Name</th>
                <th>Market Cap</th>
                <th>Price</th>
                <th>Growth</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->ticker }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->market_cap }}</td>
                    <td>{{ $company->price }}</td>
                    <td>{{ $company->growth }}</td>
                    <td>
                        <a href="{{ route('admin_analyze.edit', $company->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('admin_analyze.show', $company->id) }}" class="btn btn-info">View</a>
                        <form action="{{ route('admin_analyze.destroy', $company->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
