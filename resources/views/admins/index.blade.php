@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{ route('home') }}" class="btn btn-info">Back To Home</a>
        <div class="row justify-content-center">

            <div class="card-body">
                @foreach ($posts as $post)

                    <div class="card p-3">
                        <img src="/storage/cover_images/{{ $post->cover_image }}" width="80px">
                        <span>{{ $post->title }}</span>
                        <p>{{ $post->body }}</p>
                        <div><b class="float-right">Created by: {{ $post->user->name }}</b></div>
                        <div><b class="float-right">Topic: {{ $post->category->topic }}</b></div>
                        <div>
                            <form action="{{ route('approve', $post->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                            <form action="{{ route('delete', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-right">Delete</button>
                            </form>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>

    @endsection
