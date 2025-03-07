@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg border border-blue-200">
    <h2 class="text-2xl font-semibold text-blue-700 mb-6">Add User</h2>
    <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block text-blue-700 text-sm font-medium">Name</label>
            <input type="text" name="name" class="mt-1 p-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div>
            <label for="email" class="block text-blue-700 text-sm font-medium">Email</label>
            <input type="email" name="email" class="mt-1 p-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div>
            <label for="password" class="block text-blue-700 text-sm font-medium">Password</label>
            <input type="password" name="password" class="mt-1 p-2 w-full border border-blue-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Save</button>
    </form>
</div>
@endsection



