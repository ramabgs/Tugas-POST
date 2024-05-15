@extends('layout')

@section('content')
    <div class="container">
        <h1>Items</h1>
        <a href="{{ route('items.create') }}" class="btn btn-primary">Create Item</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-3">
                {{ $message }}
            </div>
        @endif
        <table class="table table-bordered mt-3">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($items as $item)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <form action="{{ route('items.destroy',$item->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('items.show',$item->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('items.edit',$item->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
