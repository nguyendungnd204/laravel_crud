@extends('layouts.layout')
@section('content')
    <div class="conatiner">
        <div class="card">
            <div class="card-header">
                Edit Product
            </div>
            <div class="card-body">
                <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @include('product.form')

                    <button class="btn btn-primary" type="submit">Update</button>
                    <a href="{{route('product.index')}}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>

    </div>
@endsection
