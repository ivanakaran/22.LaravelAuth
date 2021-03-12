@extends('layouts.app')

@section('content')

    <div class="container text-center py-5">
        <h1 class="">Welcome to the Forum</h1>
    </div>
    <div class='container'>
        <a href="/posts/create" class="btn btn-secondary">Add New Disccussion</a>
    </div>
    @if (count($posts) > 0)
        @foreach ($posts as $post)

            <div class="card my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="/storage/cover_images/{{ $post->cover_image }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h3 class="card-title"> <a href="/posts/{{ $post->id }}">{{ $post->title }}</h3></a>
                            <p>{{ $post->body }}</p>
                        </div>
                        <div class="col-md-2">
                            <small> {{ $post->category->topic }}| {{ $post->user->name }} </small>
                        </div>
                    </div>
                </div>
            </div>
            @if ($post->status == 'Approved')
                <div class="container">
                    <form action="{{ route('storeComment', $post->id) }}" method="POST">
                        @csrf
                        <div class="form-group @error('comment') has-error @enderror">
                            <label for="comment">Comment on this post:</label>
                            <textarea class="form-control" id="comment" rows="3"
                                name="comment">{{ old('comment') }}</textarea>
                        </div>
                        <button class="btn btn-info" type="submit">Place your comment</button>
                    </form>
                </div>
                @foreach ($comments as $comment)
                    <div class="container py-3">
                        <div class="row">
                            <div class="col-md-8">
                                <p class=""><i>{{ $comment->comment }}</i></p>
                            </div>
                            <div class="col-md-4">
                                <p class=""><b>Auhtor: {{ $comment->user->name }}</b>
                                    <br>
                                    <b>Time: {{ $comment->created_at }}</b>
                                </p>
                            </div>

                        </div>
                    </div>


                @endforeach
            @endif


        @endforeach


    @else
        <div class="container text-center my-5">
            <p>No topics found. Please login in to create post.</p>
        </div>
    @endif


@endsection
