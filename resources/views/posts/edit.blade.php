@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'post', 'enctype' =>
    'multipart/form-data', 'class' => 'container']) !!}
    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>
    <div class="form-group">
        {{ Form::file('cover_image') }}
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Body Text']) }}
    </div>

    <div class="form-group">
        {!! Form::label('category', 'Category') !!}
        {!! Form::select('category', $categories, $categories->pluck('id'), [
        'class' => 'form-control, col-md-4',
        ]) !!}
    </div>

    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection
