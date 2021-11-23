@extends('layouts.app')

@section('content')
    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $product->id }}</td>
        </tr>
        <tr>
            <th>Name</th><td>{{ $product->name }}</td>
        </tr>
        <tr>
            <th>Slug</th><td>{{ $product->slug }}</td>
        </tr>
        </tbody>
    </table>
@endsection
