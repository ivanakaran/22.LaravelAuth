@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Post</h1>
    </div>
    {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'post', 'enctype' =>
    'multipart/form-data', 'class' => 'container']) !!}
    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>
    <div class="form-group">
        {{ Form::file('cover_image') }}
    </div>

    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {!! Form::textarea('body', '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category', 'Category') !!}
        {!! Form::select('category', $categories, $categories->pluck('id'), [
        'class' => 'form-control, col-md-4',
        ]) !!}
    </div>


    {{ Form::submit('Submit', ['class' => 'btn btn-primary my-3']) }}
    {!! Form::close() !!}
@endsection
