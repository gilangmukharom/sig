@extends('layouts.back')
@section('contents')
<div class="container">
<form action="{{route('updateproduct',$products->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-10 mb-10">
            <h5 class="fs-5 fw-semibold text-gray-800">Nama Produk</h5>
            <input name="product_name" class="form-control  form-control-solid" type="text" value="{{$products->product_name}}">
        </div>
        <div class="col-md-10 mb-10">
        <h5 class="fs-5 fw-semibold text-gray-800">Deskripsi</h5>
            <textarea name="product_desc" class="form-control  form-control-solid">{{$products->product_desc}}</textarea>
        </div>
        <div class="col-md-10 mb-10">
            <h5 class="fs-5 fw-semibold text-gray-800">Harga Produk</h5>
            <input name="harga" class="form-control  form-control-solid" value="{{$products->harga}}" type="text">
        </div>
        <div class="col-md-5 mb-10">
        <button type="submit" class="btn btn-light-success">Update</button>
        </div>
    </div>
    </form>
</div>
@endsection