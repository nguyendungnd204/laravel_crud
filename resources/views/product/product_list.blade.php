@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2>Product List</h2>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-md-4">
                                <form class="d-flex" role="search" action="{{route('product.index')}}" method="get">
                                    @csrf
                                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col">
                                        <a href="{{route('product.trashed')}}" class="float-end btn btn-warning">Show Deleted</a>
                                    </div>
                                    <div class="col">
                                        <a href="/create-product" class="float-end btn btn-success">Add New</a>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            
                @if (Session::has('success'))
                    <span class="text-center alert alert-success p-2 w-full">{{Session::get('success')}}</span>
                @endif
                @if (Session::has('error'))
                    <span>{{Session::get('error')}}</span>
                @endif
            
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->status }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td><a href="{{ route('product.show', $product->id) }}" class="btn btn-success btn-sm">Show</a></td>
                                    <td><a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td>
                                        <form action="{{route('product.destroy', $product->id)}}" method="post" style="display:inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">No Product Found!</td>
                            </tr>
                        @endif


                    </tbody>
                </table>
                {{$products->links()}}
            </div>
        </div>
    </div>
@endsection
