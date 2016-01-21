@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Categories</h3>

        <a href="{{ route('admin.categories.create') }}">Create Category</a>
        <br><br>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Parent</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            </thead>
            <tboby>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->parent_id}}</td>
                        <td>{{$category->active}}</td>
                        <td>
                            <a href="{{route('admin.categories.edit', ['id'=>$category->id])}}">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tboby>
        </table>
    </div>

@endsection
