@extends('layouts.back')
@section('contents')
<div class="container">
<form action="{{route('updatevoucher',$coupons->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-10 mb-10">
            <h5 class="fs-5 fw-semibold text-gray-800">Code Voucher</h5>
            <input name="code" class="form-control form-control-solid" type="text" value="{{$coupons->code}}" required>
        </div>
        <div class="col-md-10 mb-10">
            <h5 class="fs-5 fw-semibold text-gray-800">Diskon (percent)</h5>
            <input name="discount" class="form-control  form-control-solid" type="number" value="{{$coupons->discount}}" required>
        </div>
        <div class="col-md-5 mb-10">
        <button type="submit" class="btn btn-light-success">Update</button>
        </div>
    </div>
    </form>
</div>
@endsection