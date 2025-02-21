@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Main form container with card design, soft shadows, and modern look -->
    <div class="card shadow-lg rounded-4 p-5" style="background-color: #ffffff; border: 1px solid #e0e0e0;">
        <h2 class="text-center mb-5 text-dark" style="font-family: 'Helvetica Neue', sans-serif; font-weight: 600; letter-spacing: 0.5px;">Create New Post</h2>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Title input with subtle shadows, padding, and modern typography -->
            <div class="form-group mb-4">
                <label for="title" class="form-label text-muted" style="font-family: 'Helvetica Neue', sans-serif; font-weight: 500; font-size: 16px;">Title:</label>
                <input type="text" name="title" class="form-control border-0 p-4 rounded-3 shadow-sm" id="title" placeholder="Enter post title" required style="background-color: #f1f3f5; font-size: 16px; color: #333;">
            </div>
            <!-- Description textarea with clean design and modern focus effect -->
            <div class="form-group mb-4">
                <label for="description" class="form-label text-muted" style="font-family: 'Helvetica Neue', sans-serif; font-weight: 500; font-size: 16px;">Description:</label>
                <textarea name="description" class="form-control border-0 p-4 rounded-3 shadow-sm" id="description" rows="6" placeholder="Enter post description" required style="background-color: #f1f3f5; font-size: 16px; color: #333;"></textarea>
            </div>
            <!-- File input for image with clear and subtle design -->
            <div class="form-group mb-4">
                <label for="image" class="form-label text-muted" style="font-family: 'Helvetica Neue', sans-serif; font-weight: 500; font-size: 16px;">Image:</label>
                <div class="custom-file">
                    <input type="file" name="image" class="form-control-file" id="image" required>
                </div>
            </div>
            <!-- Buttons section: primary save button with hover effects and smooth transitions -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary px-5 py-3 rounded-3 w-48" style="font-size: 16px; font-weight: 600; transition: all 0.3s ease;">Save</button>
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary px-5 py-3 rounded-3 w-48" style="font-size: 16px; font-weight: 600; transition: all 0.3s ease; color: #5c636a;">Back</a>
            </div>
        </form>
    </div>
</div>

<style>
    /* Global body styles for clean, modern look */
    body {
        font-family: 'Helvetica Neue', sans-serif;
        background-color: #f4f7fa;
        color: #333;
    }

    /* Style for form inputs: rounded borders, soft background, and text color */
    .form-control {
        border-radius: 8px;
        padding: 16px;
        background-color: #f1f3f5;
        font-size: 16px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    /* Focus effect: subtle shadow and border color transition */
    .form-control:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
    }

    /* Card container styles */
    .card {
        border-radius: 12px;
        padding: 30px;
    }

    /* Button styles */
    .btn {
        font-size: 16px;
        font-weight: 600;
        padding: 14px 20px;
        border-radius: 8px;
    }

    /* Primary button style */
    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
    }

    /* Back button style */
    .btn-outline-secondary {
        color: #5c636a;
        background-color: #ffffff;
        border: 2px solid #e0e0e0;
    }

    .btn-outline-secondary:hover {
        color: #333;
        background-color: #f1f1f1;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Hover effect for inputs */
    .form-group input:hover, .form-group textarea:hover {
        border-color: #007bff;
    }

    /* File input styling for uniformity */
    .form-control-file {
        font-size: 16px;
        color: #333;
        border: none;
        padding: 12px 16px;
        background-color: #f1f3f5;
        border-radius: 8px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control-file:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
    }
</style>
@endsection
