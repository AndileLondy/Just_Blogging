@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-pink-100 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-pink-600 mb-4 text-center text-white">Blogs</h2>
    <div class="text-center mb-6">
        <a href="{{ route('posts.create') }}" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded-full shadow-md transition-all">➕ Create New Post</a>
    </div>
    
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded-lg shadow-md mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-hidden rounded-lg shadow-lg">
        <table class="w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-pink-300 text-white">
                    <th class="py-3 px-4 text-left">Title</th>
                    <th class="py-3 px-4 text-left">Description</th>
                    <th class="py-3 px-4 text-left">Image</th>
                    <th class="py-3 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr class="border-b border-pink-200 hover:bg-pink-50">
                        <td class="py-3 px-4">{{ $post->title }}</td>
                        <td class="py-3 px-4">{{ $post->description }}</td>
                        <td class="py-3 px-4">
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-20 h-20 object-cover rounded-lg border-2 border-pink-400 shadow-md">
                        </td>
                        <td class="py-3 px-4">
                            <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-600 font-bold py-1 px-3 rounded-full shadow-md">✏️ Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-gray-600 font-bold py-1 px-3 rounded-full shadow-md">🗑️ Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
