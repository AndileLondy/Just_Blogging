<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', auth::id())->get();
        return view('posts.index', compact('posts'));
    }

    // Display the form to create a post
    public function create()
    {
        return view('posts.create'); // Ensure this view exists
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->description = $validated['description'];
        $post->user_id = Auth::id();


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        // Ensure user can only edit their own posts
        if ($post->user_id != Auth::id()) {
            return redirect()->route('posts.index')->with('error', 'You are not authorized to edit this post.');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // Ensure user can only update their own posts
        if ($post->user_id != Auth::id()) {
            return redirect()->route('posts.index')->with('error', 'You are not authorized to update this post.');
        }

        // Validate the input fields
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional
        ]);

        // Update the title and description
        $post->title = $request->input('title');
        $post->description = $request->input('description');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($post->image) {
                Storage::delete('public/' . $post->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('post_images', 'public');
            $post->image = $imagePath;
        }

        // Save the updated post
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        // Ensure user can only delete their own posts
        if ( $post->user_id != Auth::id()) {
            return redirect()->route('posts.index')->with('error', 'You are not authorized to delete this post.');
        }

        // Delete the image if it exists
        if ($post->image) {
            Storage::delete('public/' . $post->image);
        }

        // Delete the post
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}