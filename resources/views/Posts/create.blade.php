@extends('layouts.app')

@section('content')
<div class="container mx-auto my-12 px-4">
    <!-- Main form container with card design, soft shadows, and professional look -->
    <div class="card shadow-xl rounded-3xl p-8 bg-white border border-gray-200">
        <h2 class="text-center mb-8 text-gray-800 font-semibold text-3xl tracking-wide">Create New Post</h2>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Title input with subtle shadows, padding, and modern typography -->
            <div class="form-group mb-8">
                <label for="title" class="block text-gray-600 font-medium text-lg">Title:</label>
                <input type="text" name="title" class="form-control w-full p-4 rounded-lg shadow-md bg-gray-100 text-gray-700 border border-gray-300 focus:ring-2 focus:ring-lightblue-500 focus:border-lightblue-500" id="title" placeholder="Enter post title" required>
            </div>
            <!-- Description textarea with clean design and modern focus effect -->
            <div class="form-group mb-8">
                <label for="description" class="block text-gray-600 font-medium text-lg">Description:</label>
                <textarea name="description" class="form-control w-full p-4 rounded-lg shadow-md bg-gray-100 text-gray-700 border border-gray-300 focus:ring-2 focus:ring-lightblue-500 focus:border-lightblue-500" id="description" rows="6" placeholder="Enter post description" required></textarea>
            </div>
            <!-- File input for image with clear and subtle design -->
            <div class="form-group mb-8">
                <label for="image" class="block text-gray-600 font-medium text-lg">Image:</label>
                <input type="file" name="image" class="form-control-file w-full p-4 rounded-lg bg-gray-100 text-gray-700 border border-gray-300 focus:ring-2 focus:ring-lightblue-500 focus:border-lightblue-500" id="image" required>
            </div>
            <!-- Buttons section: primary save button with hover effects and smooth transitions -->
            <div class="flex justify-between gap-4">
                <button type="submit" class="btn btn-primary px-8 py-4 rounded-xl w-full sm:w-1/2 bg-lightblue-500 text-white font-semibold transition-all duration-300 hover:bg-lightblue-600 hover:shadow-lg">
                    Save
                </button>
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary px-8 py-4 rounded-xl w-full sm:w-1/2 bg-white text-lightblue-600 border-2 border-lightblue-300 font-semibold transition-all duration-300 hover:bg-lightblue-50 hover:shadow-md">
                    Back
                </a>
            </div>
        </form>
    </div>
</div>

<style>
    /* Custom Tailwind focus ring color for form elements */
    .form-control:focus, .form-control-file:focus {
        outline: none;
        box-shadow: 0 0 8px rgba(53, 162, 235, 0.3); /* Light blue focus effect */
    }
</style>
@endsection
