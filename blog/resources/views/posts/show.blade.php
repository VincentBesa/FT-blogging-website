<x-guest-layout>
    <div class="container mx-auto px-4">
        <div class="mb-4">
            <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
            <p class="text-gray-600">Posted by {{ $post->user->name }} on {{ $post->created_at->format('M d, Y') }}</p>
        </div>

        <div class="mb-4">
            <p>{{ $post->description }}</p>
            <div class="mt-2">
                {!! $post->content !!}
                @if ($post->image_path)
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post image" class="mt-4">
                @endif
            </div>
        </div>

        <!-- Edit and Delete options for the post owner -->
        @can('update', $post)
            <a href="{{ route('posts.edit', $post) }}" class="text-blue-600">Edit</a>
        @endcan
        @can('delete', $post)
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600">Delete</button>
            </form>
        @endcan
    </div>
</x-guest-layout>