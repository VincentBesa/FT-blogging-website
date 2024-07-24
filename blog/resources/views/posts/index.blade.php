<x-guest-layout>
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">All Blog Posts</h1>

        <!-- Link to Create New Post -->

        @if ($posts->count())
            <ul>
                @foreach ($posts as $post)
                    <li class="mb-4 p-4 border border-gray-300 rounded">
                        <h2 class="text-xl font-semibold mb-2">
                            <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        </h2>
                        <p class="mb-2">{{ $post->description }}</p>
                        <p class="text-gray-600">Posted by {{ $post->user->name }} on {{ $post->created_at->format('M d, Y') }}</p>
                        
                        @auth
                            @if (Auth::id() == $post->user_id)
                                <div class="mt-2">
                                    <a href="{{ route('posts.edit', $post) }}" class="text-blue-500 hover:text-blue-700">
                                        Edit
                                    </a>
                                </div>
                            @endif
                        @endauth
                    </li>
                @endforeach
            </ul>

            <!-- Pagination -->
            {{ $posts->links() }}
        @else
            <p class="mb-6">No blog posts found.</p>
            <div class="mb-4">
                <a href="{{ route('posts.create') }}" class="text-blue-500 hover:text-blue-700">
                    Create New Post
                </a>
            </div>
        @endif
    </div>

        @auth
            <div class="mb-4">
                <a href="{{ route('posts.create') }}" class="text-blue-500 hover:text-blue-700">
                    Create New Post
                </a>
            </div>
        @endauth
</x-guest-layout>
