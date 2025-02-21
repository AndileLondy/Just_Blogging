@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-white rounded-lg shadow-lg text-gray-900">
    <h2 class="text-3xl font-bold text-pink-600 mb-4 text-center">Edit Your Cute Post ✨</h2>
    <div class="max-w-2xl mx-auto bg-pink-100 p-6 rounded-lg shadow-md">
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label class="block text-pink-600 font-semibold">Title:</label>
                <input type="text" name="title" class="w-full p-2 border-2 border-pink-300 rounded-lg focus:ring-2 focus:ring-pink-500" value="{{ $post->title }}" required>
            </div>
            
            <div class="form-group">
                <label class="block text-pink-600 font-semibold">Description:</label>
                <textarea name="description" class="w-full p-2 border-2 border-pink-300 rounded-lg focus:ring-2 focus:ring-pink-500" required>{{ $post->description }}</textarea>
            </div>
            
            <div class="form-group">
                <label class="block text-pink-600 font-semibold">Current Image:</label><br>
                <img src="{{ asset('storage/' . $post->image) }}" class="w-32 h-32 object-cover rounded-lg border-2 border-pink-400 shadow-md">
            </div>
            
            <div class="form-group">
                <label class="block text-pink-600 font-semibold">New Image (Optional):</label>
                <input type="file" name="image" class="w-full p-2 border-2 border-pink-300 rounded-lg focus:ring-2 focus:ring-pink-500">
            </div>
            
            <div class="text-center space-x-4">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full shadow-md">✅ Update</button>
                <a href="{{ route('posts.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-full shadow-md">🔙 Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
