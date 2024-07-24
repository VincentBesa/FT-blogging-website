<x-guest-layout>
    <div class="container mx-auto px-4 py-6">
        <!-- Home Button -->

        <h1 class="text-3xl font-bold mb-6">Create New Post</h1>

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md mb-6">
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-1">Title:</label>
                <input id="title" type="text" name="title" value="{{ old('title') }}" required class="w-full p-2 border border-gray-300 rounded">
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-1">Description:</label>
                <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Content -->
            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-medium mb-1">Content:</label>
                <textarea id="content" name="content" class="w-full p-2 border border-gray-300 rounded">{{ old('content') }}</textarea>
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
            </div>

            <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">Create Post</button>
        </form>
        <a href="{{ route('home') }}" class="text-blue-500 hover:underline mb-4 inline-block">
            &larr; Back to Posts
        </a>
    </div>
</x-guest-layout>
