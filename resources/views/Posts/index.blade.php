@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 bg-pink-50 rounded-lg shadow-xl">
    <h2 class="text-3xl font-bold text-pink-600 mb-6 text-center">Blogs</h2>
    <div class="text-center mb-6">
        <a href="{{ route('posts.create') }}" class="bg-pink-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-full shadow-lg transition-all duration-300 ease-in-out">
            ➕ Create New Post
        </a>
    </div>
    
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 rounded-lg shadow-md mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-lg shadow-lg">
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-pink-400 text-white">
                    <th class="py-3 px-6 text-left">Title</th>
                    <th class="py-3 px-6 text-left">Description</th>
                    <th class="py-3 px-6 text-left">Image</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr class="border-b border-pink-200 hover:bg-pink-50 transition-all duration-300">
                        <td class="py-3 px-6">{{ $post->title }}</td>
                        <td class="py-3 px-6 truncate max-w-xs">{{ $post->description }}</td>
                        <td class="py-3 px-6">
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-20 h-20 object-cover rounded-lg border-2 border-pink-300 shadow-sm">
                        </td>
                        <td class="py-3 px-6 flex space-x-2">
                            <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-semibold py-2 px-4 rounded-full shadow-md transition-all duration-300">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-full shadow-md transition-all duration-300">
                                    🗑️ Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
