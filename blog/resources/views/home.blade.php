@extends('layouts.app')

@section('content')
    <h1>All Blog Posts</h1>
    
    @if($posts->count())
        @foreach ($posts as $post)
            <div>
                <h2><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>
                <p>{{ $post->description }}</p>
                <p>Posted by: {{ $post->user->full_name }}</p>
                <p>Comments: {{ $post->comments_count ?? 0 }}</p>
            </div>
        @endforeach

        <!-- Pagination Links -->
        {{ $posts->links() }}
    @else
        <p>No posts available.</p>
    @endif
@endsection
