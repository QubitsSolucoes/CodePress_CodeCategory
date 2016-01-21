@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Edit Category</h3>

        {!! Form::model($category, ['method'=>'put', 'route'=>['admin.categories.update', $category->id]]) !!}

        <div class="form-group">
            {!! Form::label('Parent', "Parent:") !!}
            <select name="parent_id" class="form-control">
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}"
                            @if($cat->id==$category->parent_id)selected="selected"@endif>{{$cat->name}}
                    </option>
                @endforeach
                <option value="" @if($category->parent_id=='')selected="selected"@endif>-Nenhum-</option>
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('Name', "Name:") !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Active', "Active:") !!}
            {!! Form::checkbox('active', null) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection
