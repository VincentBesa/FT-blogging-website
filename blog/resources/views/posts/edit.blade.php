<x-guest-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Edit Post</h1>

        <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-1">Title:</label>
                <input id="title" type="text" name="title" value="{{ old('title', $post->title) }}" required class="w-full p-2 border border-gray-300 rounded">
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-1">Description:</label>
                <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded">{{ old('description', $post->description) }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Content -->
            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-medium mb-1">Content:</label>
                <textarea id="content" name="content" class="w-full p-2 border border-gray-300 rounded">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-medium mb-1">Image (optional):</label>
                <input id="image" type="file" name="image" class="w-full p-2 border border-gray-300 rounded">
                @error('image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <!-- Display current image -->
                @if($post->image_path)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" class="w-32 h-32 object-cover">
                    </div>
                @endif
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Post</button>
        </form>
    </div>
</x-guest-layout>