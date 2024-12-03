@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('add_product') }}" class="btn btn-primary">Add Product</a>
    </div>
    @foreach ($products as $val)
    <table class="table table-striped  my-5">
        <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
        </thead>

        <tbody>
            <tr>
                <th>{{ $val->id }}</th>
                <td><img height="80px" src="{{ $val->image }}" alt=""></td>
                <td>{{ $val->product_title }}</td>
                <td>{{ $val->price }}</td>
                <td>{{ $val->description }}</td>
                <td> <a href="{{ route('edit_product', $val->id) }}" class="btn btn-primary my-1">Edit</a></td>
                <td>
                    <form action="{{ route('delete_product', $val->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger my-1">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    @endforeach
@endsection


