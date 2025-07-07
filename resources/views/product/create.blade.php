@extends('layouts.layout')
@section('content')
    <div class="conatiner">
        <div class="card">
            <div class="card-header">
                Add new Product
            </div>
            <div class="card-body">
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('product.form')

                    <button class="btn btn-primary" type="submit">Save</button>
                    <a href="{{route('product.index')}}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>

    </div>
@endsection
