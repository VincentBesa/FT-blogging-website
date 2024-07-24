<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Show the form for creating a new blog post
    public function create()
    {
        return view('posts.create');
    }

    // Store a newly created blog post in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image_path = $imagePath;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    // Display a listing of all blog posts
    public function index()
    {
        $posts = Post::with('user')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    // Display the specified blog post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Show the form for editing the specified blog post
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    // Update the specified blog post in the database
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            if ($post->image_path) {
                Storage::delete('public/' . $post->image_path);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image_path = $imagePath;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    // Remove the specified blog post from the database
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        if ($post->image_path) {
            Storage::delete('public/' . $post->image_path);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}